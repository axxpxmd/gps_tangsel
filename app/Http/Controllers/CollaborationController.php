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
            'nama' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\.,\'\-]+$/'],
            'whatsapp' => ['required', 'string', 'max:20', 'regex:/^(?:\+62|62|0)8[1-9][0-9]{7,11}$/'],
            'email' => ['required', 'email', 'max:255'],
            'tujuan' => ['required', 'string'],
            'captcha' => ['required', 'integer'],
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'nama.regex' => 'Nama lengkap hanya boleh berisi huruf, spasi, titik, koma, tanda petik, dan tanda hubung.',
            'whatsapp.required' => 'Nomor WhatsApp wajib diisi.',
            'whatsapp.regex' => 'Format nomor WhatsApp tidak valid. Gunakan format seperti 081234567890 atau +6281234567890.',
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
            'nama' => strip_tags($request->nama),
            'whatsapp' => strip_tags($request->whatsapp),
            'email' => strip_tags($request->email),
            'tujuan' => strip_tags($request->tujuan),
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
