<?php

namespace App\Controllers;

use App\Models\UserAccount;
use App\Core\Request;

class UserAccountController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserAccount();
    }

    public function index()
    {
        $users = $this->userModel->all();
        return view("user-account/index", compact('users'));
    }

    public function create()
    {
        return view("user-account/create");
    }

    public function store(Request $request)
    {
        [$valid, $data] = $request->validate([
            'nip'        => 'required|min:5|max:20|unique:user_account,nip',
            'full_name'  => 'required|min:3|max:100',
            'email_pln'  => 'required|email|unique:user_account,email_pln',
            'area'       => 'required|max:100',
            'level_user' => 'required',
            'password'   => 'required|min:6',
            'is_approved' => 'required|in:TRUE,FALSE',
        ]);

        if (!$valid) {
            $errors = $data;
            $old = $request->all();
            return view("user-account/create", compact('errors', 'old'));
        }

        $data['password_hash'] = password_hash($data['password'], PASSWORD_BCRYPT);
        unset($data['password']); // biar gak nyimpen plain password

        $this->userModel->create($data);
        header("Location: /user-account");
        exit;
    }

    public function show($id)
    {
        $user = $this->userModel->find($id);
        return view("user-account/show", compact('user'));
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);
        return view("user-account/edit", compact('user'));
    }

    public function update(Request $request, $id)
    {
        [$valid, $data] = $request->validate([
            'nip'        => 'required|min:5|max:20|unique:user_account,nip',
            'full_name'  => 'required|min:3|max:100',
            'email_pln'  => 'required|email|unique:user_account,email_pln',
            'area'       => 'required|max:100',
            'level_user' => 'required',
            'password'   => 'required|min:6',
            'is_approved' => 'required|in:TRUE,FALSE',
        ]);

        if (!$valid) {
            $errors = $data;
            $user = $this->userModel->find($id);
            return view("user-account/edit", compact('errors', 'user'));
        }

        $this->userModel->update($id, $data);
        header("Location: /user-account");
        exit;
    }

    public function destroy($id)
    {
        $this->userModel->delete($id);
        header("Location: /user-account");
        exit;
    }
}
