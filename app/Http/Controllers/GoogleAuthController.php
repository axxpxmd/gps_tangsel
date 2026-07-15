<?php

namespace App\Http\Controllers;

use App\Models\Jemaah;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        $redirect = request('redirect') ?: url()->previous();

        if ($redirect && ! str_contains($redirect, '/auth/google')) {
            session(['intended_url' => $redirect]);
            session()->save();
        }

        return Socialite::driver('google')->redirect();
    }

    public function callback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $jemaah = Jemaah::updateOrCreate(
                ['google_id' => $googleUser->getId()],
                [
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'avatar' => $googleUser->getAvatar(),
                ]
            );

            session(['jemaah' => [
                'name' => $jemaah->name,
                'email' => $jemaah->email,
                'avatar' => $jemaah->avatar,
                'google_id' => $jemaah->google_id,
            ]]);

            $intendedUrl = session()->pull('intended_url', route('berita'));

            return redirect($intendedUrl);
        } catch (\Exception $e) {
            return redirect()->route('berita')->with('error', 'Gagal masuk menggunakan Google.');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('jemaah');

        return back();
    }
}
