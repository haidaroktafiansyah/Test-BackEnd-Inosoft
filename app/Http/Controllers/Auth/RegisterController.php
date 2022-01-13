<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        request()->validate([
            'username' => ['required', 'min:3', 'max:25', 'unique:user'],
            'email' => ['required', 'email', 'unique:user'],
            'password' => ['required', 'min:3']
        ]);

        return User::create($request->all());
    }
}
