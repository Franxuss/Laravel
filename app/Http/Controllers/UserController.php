<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function showUserPrestamos(){
        $prestamos = $this->user->all();
        return view('prestamos\showPrestamos')->with('prestamos', $prestamos);
    }

    public function showAllUsers(){
        $users = $this->user->allUsers();
        return $users;
    }

    public function showCurrentUser(){
        $user = $this->user->showUser();
        return $user;
    }

    public function showUserID(){
        $user = $this->user->showUser();
        $user_id = $user->id;
        return $user_id;
    }

    public function showUserRol(){
        $user = $this->user->showUser();
        $user_rol = $user->rol;
        return $user_rol;
    }
}
