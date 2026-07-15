<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CollaborationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_refresh_captcha(): void
    {
        $response = $this->getJson(route('kolaborasi.captcha'));

        $response->assertStatus(200)
            ->assertJsonStructure(['question']);

        $this->assertNotNull(session('captcha_answer'));
    }

    public function test_cannot_submit_collaboration_without_data(): void
    {
        $response = $this->postJson(route('kolaborasi.store'), []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['nama', 'whatsapp', 'email', 'tujuan', 'captcha']);
    }

    public function test_cannot_submit_collaboration_with_invalid_captcha(): void
    {
        // First set up the captcha in the session
        session(['captcha_answer' => 15]);

        $response = $this->postJson(route('kolaborasi.store'), [
            'nama' => 'Joko Widodo',
            'whatsapp' => '081234567890',
            'email' => 'joko@gmail.com',
            'tujuan' => 'Kerjasama program kajian Subuh Akbar.',
            'captcha' => 10, // Incorrect captcha
        ]);

        $response->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Jawaban captcha salah. Silakan coba lagi.',
            ])
            ->assertJsonValidationErrors(['captcha']);

        $this->assertDatabaseMissing('collaborations', [
            'nama' => 'Joko Widodo',
        ]);
    }

    public function test_can_submit_collaboration_with_valid_captcha(): void
    {
        // Set up the correct captcha answer
        session(['captcha_answer' => 12]);

        $response = $this->postJson(route('kolaborasi.store'), [
            'nama' => 'Joko Widodo',
            'whatsapp' => '081234567890',
            'email' => 'joko@gmail.com',
            'tujuan' => 'Kerjasama program kajian Subuh Akbar.',
            'captcha' => 12, // Correct captcha
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Terima kasih! Permohonan kolaborasi Anda telah kami terima dan akan segera kami proses.',
            ]);

        $this->assertDatabaseHas('collaborations', [
            'nama' => 'Joko Widodo',
            'whatsapp' => '081234567890',
            'email' => 'joko@gmail.com',
            'tujuan' => 'Kerjasama program kajian Subuh Akbar.',
        ]);

        // Assert that captcha answer has been cleared from session
        $this->assertNull(session('captcha_answer'));
    }

    public function test_cannot_submit_collaboration_with_invalid_name_format(): void
    {
        session(['captcha_answer' => 12]);

        $response = $this->postJson(route('kolaborasi.store'), [
            'nama' => 'Joko <script>alert("xss")</script>',
            'whatsapp' => '081234567890',
            'email' => 'joko@gmail.com',
            'tujuan' => 'Kerjasama program kajian Subuh Akbar.',
            'captcha' => 12,
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['nama']);
    }

    public function test_cannot_submit_collaboration_with_invalid_whatsapp_format(): void
    {
        session(['captcha_answer' => 12]);

        $response = $this->postJson(route('kolaborasi.store'), [
            'nama' => 'Joko Widodo',
            'whatsapp' => '12345', // Invalid format (doesn't start with 08, 628, +628)
            'email' => 'joko@gmail.com',
            'tujuan' => 'Kerjasama program kajian Subuh Akbar.',
            'captcha' => 12,
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['whatsapp']);
    }
}
