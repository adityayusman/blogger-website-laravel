<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AuthorLoginForm extends Component
{
    // Login Handler
    public $login_id, $password;
    public $returnUrl;

    // Return URL
    public function mount()
    {
        $this->returnUrl = request()->returnUrl;
    }

    public function LoginHandler()
    {

        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if ($fieldType == 'email') {
            // Validation
            $this->validate([
                'login_id' => 'required|email|exists:users,email',
                'password' => 'required|min:5',
            ],[
                'login_id' => 'Email or Username is required',
                'login_id.email' => 'Invalid email address',
                'login_id.exists' => 'Email is not registered',
                'password.required' => 'Password is required'
            ]);
        } else {
            $this->validate([
                'login_id' => 'required|exists:users,username',
                'password' => 'required|min:5'
            ],[
                'login_id.required' => 'Email or Username is required',
                'login_id.exists' => 'Username is not registered',
                'password.required' => 'Password is required'
            ]);
        }

        // Creds
        $creds = array(
            $fieldType => $this->login_id,
            'password' => $this->password
        );

        // Web guard attempt creds
        if (Auth::guard('web')->attempt($creds)) {
            $checkuser = User::where($fieldType, $this->login_id)->first();
            if ($checkuser->blocked == 1) {
                Auth::guard('web')->logout();
                return redirect()->route('author.login')->with('fail', 'Your Account has been blocked');
            } else {
                // return redirect()->route('author.home');
                if ($this->returnUrl != null) {
                    return redirect()->to($this->returnUrl);
                } else {
                    redirect()->route('author.home');
                }
            }
            
        } else {
            session()->flash('fail', 'Incorrect Email/Username or Password');
        }
        
        
        // Validation
        // $this->validate([
        //     'email' => 'required|email|exists:users,email',
        //     'password' => 'required|min:5'
        // ], [
        //     'email.required' => 'Enter your email address',
        //     'email.email' => 'Invalid email address',
        //     'email.exists' => 'This email not registered',
        //     'password.required' => 'Password is required' 
        // ]);

        // // Credentials
        // $creds = array(
        //     'email' => $this->email,
        //     'password' => $this->password
        // );

        // // Web guard attempt the creds
        // if (Auth::guard('web')->attempt($creds)) {
        //     $checkuser = User::where('email', $this->email)->first();
        //     if ($checkuser->blocked == 1) {
        //         Auth::guard('web')->logout();
        //         return redirect()->route('author.login')->with('fail', 'Your account had been blocked.');
        //     } else {
        //         return redirect()->route('author.home');
        //     }
        // } else {
        //     session()->flash('fail', 'incorrect email or password');
        // }
    }

    public function render()
    {
        return view('livewire.author-login-form');
    }
}
