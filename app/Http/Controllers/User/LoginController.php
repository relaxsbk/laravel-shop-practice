<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.login');
    }


    public function loginUser(LoginRequest $request)
    {
        $validated = $request->validated();

        if (auth()->attempt($validated)) {
            return redirect()->route('HomePage');
        }
        return  back()->with(['invalid' => 'Неверный логин или пароль']);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('HomePage');
    }


}
