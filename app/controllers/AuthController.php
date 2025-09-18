<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\UserAccount;

class AuthController
{
    public function showLoginForm()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $email    = $request->input('email_pln');
        $password = $request->input('password');

        $userModel = new UserAccount();
        $user = $userModel->where('email_pln', $email);

        if (!$user) {
            return "❌ Email tidak ditemukan!";
        }

        if (password_verify($password, $user['password_hash'])) {
            header("Location: /dashboard");
            exit;
        }

        return "❌ Password salah!";
    }

    public function showSignupForm()
    {
        return view('auth/signup');
    }

    public function signup(Request $request)
    {
        $userModel = new UserAccount();

        $data = [
            'nip'           => $request->input('nip'),
            'full_name'     => $request->input('full_name'),
            'email_pln'     => $request->input('email_pln'),
            'area'          => $request->input('area'),
            'level_user'    => $request->input('level_user'),
            'password_hash' => password_hash($request->input('password'), PASSWORD_BCRYPT),
        ];

        if ($userModel->where('email_pln', $data['email_pln'])) {
            return "❌ Email sudah terdaftar!";
        }

        if ($userModel->create($data)) {
            return "✅ User baru berhasil didaftarkan!";
        }

        return "❌ Gagal mendaftarkan user.";
    }
}
