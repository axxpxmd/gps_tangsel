<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Mockery;
use Tests\TestCase;

class GoogleAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_google_auth_redirects_and_saves_intended_url_to_session(): void
    {
        $googleUser = Mockery::mock('Laravel\Socialite\Two\User');
        $provider = Mockery::mock('Laravel\Socialite\Two\GoogleProvider');
        $provider->shouldReceive('redirect')->andReturn(redirect('https://accounts.google.com'));

        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

        $response = $this->get('/auth/google?redirect=http://localhost/berita/some-slug');

        $response->assertRedirect();
        $this->assertEquals('http://localhost/berita/some-slug', session('intended_url'));
    }

    public function test_google_auth_callback_redirects_to_intended_url(): void
    {
        $googleUser = Mockery::mock('Laravel\Socialite\Two\User');
        $googleUser->shouldReceive('getName')->andReturn('Jemaah Test');
        $googleUser->shouldReceive('getEmail')->andReturn('jemaah@example.com');
        $googleUser->shouldReceive('getAvatar')->andReturn('avatar_url');
        $googleUser->shouldReceive('getId')->andReturn('123456');

        $provider = Mockery::mock('Laravel\Socialite\Two\GoogleProvider');
        $provider->shouldReceive('user')->andReturn($googleUser);

        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

        $response = $this->withSession(['intended_url' => 'http://localhost/berita/some-slug'])
            ->get('/auth/google/callback');

        $response->assertRedirect('http://localhost/berita/some-slug');
        $this->assertEquals([
            'name' => 'Jemaah Test',
            'email' => 'jemaah@example.com',
            'avatar' => 'avatar_url',
            'google_id' => '123456',
        ], session('jemaah'));

        $this->assertDatabaseHas('jemaahs', [
            'name' => 'Jemaah Test',
            'email' => 'jemaah@example.com',
            'avatar' => 'avatar_url',
            'google_id' => '123456',
        ]);
    }
}
