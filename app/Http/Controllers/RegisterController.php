<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(RegisterRequest $r)
    {
        $data = $r->validated();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        auth()->login($user);

        return to_route('home');
    }
}
