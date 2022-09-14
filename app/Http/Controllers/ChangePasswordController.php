<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect('/login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword',
        ]);
        #Match The Old Password
        if (Hash::check($request->oldPassword, auth()->user()->password)) {
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->newPassword),
            ]);
            return back()->with("success", "Le mot de passe a été changé avec succès !");
        } else {
            return back()->withErrors("L'ancien mot de passe ne correspond pas !");
        }
    }
}