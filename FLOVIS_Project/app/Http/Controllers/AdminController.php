<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home() {
        return view('Admin.master');
    }

    public function login() {
        return view('Admin.login');
    }

    public function pagenone() {
        return view('Admin.404');
    }

    public function forgot_password() {
        return view('Admin.forgot_password');
    }

    public function register() {
        return view('Admin.register');
    }

    public function tables() {
        return view('Admin.tables');
    }

    public function blank() {
        return view('Admin.blank');
    }

}
