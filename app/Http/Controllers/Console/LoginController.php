<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function show(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('console.dashboard');
        }

        $captcha = $this->generateCaptcha();
        session(['login_captcha_answer' => $captcha['answer']]);

        return view('console.login', ['captchaQuestion' => $captcha['question']]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
            'captcha' => ['required', 'integer'],
        ]);

        $captchaAnswer = session('login_captcha_answer');

        if ($captchaAnswer === null || (int) $request->captcha !== (int) $captchaAnswer) {
            return back()->withErrors([
                'captcha' => 'Jawaban captcha salah.',
            ])->onlyInput('username');
        }

        session()->forget('login_captcha_answer');

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('console.dashboard'));
        }

        return back()->withErrors([
            'username' => 'Username atau password tidak valid.',
        ])->onlyInput('username');
    }

    public function refreshCaptcha(): JsonResponse
    {
        $captcha = $this->generateCaptcha();
        session(['login_captcha_answer' => $captcha['answer']]);

        return response()->json(['question' => $captcha['question']]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('console.login');
    }

    private function generateCaptcha(): array
    {
        $num1 = rand(1, 9);
        $num2 = rand(1, 9);
        $operators = ['+', '-'];
        $operator = $operators[array_rand($operators)];

        if ($operator === '-') {
            if ($num1 < $num2) {
                $temp = $num1;
                $num1 = $num2;
                $num2 = $temp;
            }
            $answer = $num1 - $num2;
        } else {
            $answer = $num1 + $num2;
        }

        return [
            'question' => "$num1 $operator $num2 = ?",
            'answer' => $answer,
        ];
    }
}
