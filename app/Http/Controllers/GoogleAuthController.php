<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        if (request()->has('redirect')) {
            session(['intended_url' => request('redirect')]);
        }

        return Socialite::driver('google')->redirect();
    }

    public function callback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            session(['jemaah' => [
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'avatar' => $googleUser->getAvatar(),
                'google_id' => $googleUser->getId(),
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
