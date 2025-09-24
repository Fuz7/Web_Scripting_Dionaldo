<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'username'  => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender'    => ['string'],
            'hobbies'   => ['array'],
            'hobbies.*' => ['string'], // each hobby must be a string
            'country'   => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::create([
            'full_name' => $request->full_name,
            'username'  => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
            'gender'    => $request->gender,
            'hobbies'   => $request->hobbies, // array → JSON column
            'country'   => $request->country,


        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
}
