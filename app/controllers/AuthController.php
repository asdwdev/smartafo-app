<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\UserAccount;

class AuthController
{
    public function showLoginForm()
    {
        echo view('auth/login');
    }

    public function login(Request $request)
    {
        $email    = $request->input('email_pln');   // pakai field email PLN
        $password = $request->input('password');

        $userModel = new UserAccount();
        $user = $userModel->where('email_pln', $email);

        if (!$user) {
            echo "❌ Email tidak ditemukan!";
            return;
        }

        // cek password hash
        if (password_verify($password, $user['password_hash'])) {
            echo "✅ Login berhasil! Selamat datang, {$user['full_name']}";
        } else {
            echo "❌ Password salah!";
        }
    }

    public function showSignupForm()
    {
        echo view('auth/signup');
    }

    public function signup(Request $request)
    {
        $userModel = new UserAccount();

        // ambil data dari form
        $data = [
            'nip'           => $request->input('nip'),
            'full_name'     => $request->input('full_name'),
            'email_pln'     => $request->input('email_pln'),
            'area'          => $request->input('area'),
            'level_user'    => $request->input('level_user'),
            'password_hash' => password_hash($request->input('password'), PASSWORD_BCRYPT),
        ];

        // cek email sudah ada atau belum
        if ($userModel->where('email_pln', $data['email_pln'])) {
            echo "❌ Email sudah terdaftar!";
            return;
        }

        // simpan user baru
        if ($userModel->create($data)) {
            echo "✅ User baru berhasil didaftarkan!";
        } else {
            echo "❌ Gagal mendaftarkan user.";
        }
    }
}
