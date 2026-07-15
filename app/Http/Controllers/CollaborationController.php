<?php

namespace App\Http\Controllers;

use App\Models\Collaboration;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CollaborationController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'tujuan' => 'required|string',
            'captcha' => 'required|integer',
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'whatsapp.required' => 'Nomor WhatsApp wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'tujuan.required' => 'Tujuan kolaborasi wajib diisi.',
            'captcha.required' => 'Captcha wajib diisi.',
        ]);

        $captchaAnswer = session('captcha_answer');

        if ($captchaAnswer === null || (int) $request->captcha !== (int) $captchaAnswer) {
            return response()->json([
                'success' => false,
                'message' => 'Jawaban captcha salah. Silakan coba lagi.',
                'errors' => [
                    'captcha' => ['Jawaban captcha tidak cocok.'],
                ],
            ], 422);
        }

        // Clear captcha answer so it can't be reused
        session()->forget('captcha_answer');

        Collaboration::create([
            'nama' => $request->nama,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
            'tujuan' => $request->tujuan,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih! Permohonan kolaborasi Anda telah kami terima dan akan segera kami proses.',
        ]);
    }

    public function refreshCaptcha(): JsonResponse
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

        $question = "$num1 $operator $num2 = ?";

        session(['captcha_answer' => $answer]);

        return response()->json([
            'question' => $question,
        ]);
    }
}
