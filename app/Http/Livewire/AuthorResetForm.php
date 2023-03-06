<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;

class AuthorResetForm extends Component
{
    public function render()
    {
        return view('livewire.author-reset-form');
    }

    public $email, $token, $new_password, $confirm_new_password;
    // Get Value to put in input field
    public function Mount()
    {
        $this->email = request()->email;
        $this->token = request()->token;
    }

    // Reset Password
    public function ResetHandler()
    {
        // Validation
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'new_password' => 'required|min:5',
            'confirm_new_password'=> 'same:new_password'
        ],[
            'email.required' => 'The email field is required',
            'email.email' => 'Invalid email address',
            'email.exists' => 'This email is not registered',
            'new_password.required' => 'Enter new password',
            'new_password.min' => 'Minum characters must be 5',
            'confirm_new_password' => 'The confirm new password and new password must match'
        ]);

        // Store
        $check_token = DB::table('password_resets')->where([
            'email' => $this->email,
            'token' => $this->token
        ])->first();

        if (!$check_token) {
            session()->flash('fail', 'Invalid token');
        } else {
            // Update password in User Table
            User::where('email', $this->email)->update([
                'password' => Hash::make($this->new_password)
            ]);

            // Delete row in password_resets Table
            DB::table('password_resets')->where([
                'email' => $this->email
            ])->delete();

            $success_token = Str::random(64);

            // Message Notif
            session()->flash('success', 'Your password has been updated successfully.
            Login with your email and your new password');

            $this->redirectRoute('author.login', [
                'tkn' => $success_token,
                'UEmail' => $this->email
            ]);
        }
        
    }
}
