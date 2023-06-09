<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(LoginRequest $r)
    {
        $data = $r->validated();

        if(auth()->attempt($data)){
            return to_route('home');
        }
        return back();
    }
    public function logout()
    {
        auth()->logout();
        return view('about');
    }
}
