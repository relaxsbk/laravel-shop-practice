<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.register');
    }


    public function createUser(RegisterRequest $request)
    {
        $validated = $request->validated();
        dd($validated);
        $validated['password'] = Hash::make($validated['password']);

        $user = User::query()->create($validated);

        auth()->login($user);

        return redirect()->route('HomePage');
    }


}
