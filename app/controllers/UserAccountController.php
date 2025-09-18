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
        $data = [
            'nip'           => $request->input('nip'),
            'full_name'     => $request->input('full_name'),
            'email_pln'     => $request->input('email_pln'),
            'area'          => $request->input('area'),
            'level_user'    => $request->input('level_user'),
            'password_hash' => password_hash($request->input('password'), PASSWORD_BCRYPT),
        ];

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
        $data = [
            'nip'        => $request->input('nip'),
            'full_name'  => $request->input('full_name'),
            'email_pln'  => $request->input('email_pln'),
            'area'       => $request->input('area'),
            'level_user' => $request->input('level_user'),
        ];

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
