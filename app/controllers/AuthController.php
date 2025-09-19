<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\UserAccount;

class AuthController
{
    /**
     * Tampilkan halaman login
     */
    public function showLoginForm()
    {
        return view('auth/login');
    }

    /**
     * Proses login user
     */
    public function login(Request $request)
    {
        [$valid, $data] = $request->validate([
            'email_pln' => 'required|email',
            'password'  => 'required|min:6',
        ]);

        if (!$valid) {
            $errors = $data; // $data berisi errors validasi
            return view('auth/login', compact('errors'));
        }

        $userModel = new UserAccount();
        $user      = $userModel->where('email_pln', $data['email_pln']);

        // cek user & password sekaligus
        $passwordValid = false;
        if ($user) {
            // Try bcrypt first (newer format)
            if (password_verify($data['password'], $user['password_hash'])) {
                $passwordValid = true;
            }
            // Try SHA256 (legacy format)
            elseif (hash('sha256', $data['password']) === $user['password_hash']) {
                $passwordValid = true;
            }
        }
        
        if (!$user || !$passwordValid) {
            $errors['login'][] = "Email atau password salah!";
            return view('auth/login', compact('errors'));
        }

        // login sukses -> simpan session
        $_SESSION['user'] = [
            'id'         => $user['id'],
            'nip'        => $user['nip'],
            'full_name'  => $user['full_name'],
            'email_pln'  => $user['email_pln'],
            'area'       => $user['area'],
            'level_user' => $user['level_user'],
        ];

        header("Location: /dashboard");
        exit;
    }


    /**
     * Tampilkan halaman signup
     */
    public function showSignupForm()
    {
        return view('auth/signup');
    }

    /**
     * Proses register user baru
     */
    public function signup(Request $request)
    {
        [$valid, $data] = $request->validate([
            'nip'        => 'required|min:5|max:20|unique:user_account,nip',
            'full_name'  => 'required|min:3|max:100',
            'email_pln'  => 'required|email|unique:user_account,email_pln',
            'area'       => 'required|max:100',
            'level_user' => 'required',
            'password'   => 'required|min:6',
        ]);

        if (!$valid) {
            $errors = $data; // $data isinya errors
            return view('auth/signup', compact('errors'));
        }

        $userModel = new UserAccount();
        $userModel->create([
            'nip'           => $data['nip'],
            'full_name'     => $data['full_name'],
            'email_pln'     => $data['email_pln'],
            'area'          => $data['area'],
            'level_user'    => $data['level_user'],
            'password_hash' => password_hash($data['password'], PASSWORD_BCRYPT),
        ]);

        header("Location: /login");
        exit;
    }

    /**
     * Proses logout user
     */
    public function logout()
    {
        // pastikan session dimulai
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // hapus semua data session
        $_SESSION = [];
        session_unset();
        session_destroy();

        // hapus cookie session biar bener-bener fresh
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // redirect ke login
        header("Location: /login");
        exit;
    }
}
