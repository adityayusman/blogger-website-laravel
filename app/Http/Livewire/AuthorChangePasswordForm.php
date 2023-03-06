<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AuthorChangePasswordForm extends Component
{
    public function render()
    {
        return view('livewire.author-change-password-form');
    }

    public $current_password, $new_password, $confirm_new_password;
    public function ChangePassword()
    {
        // Validation
        $this->validate([
            'current_password' => [
                'required', function($attribute, $value, $fail) {
                    if (!Hash::check($value, User::find(auth('web')->id())->password)) {
                        return $fail(__('The current password is incorrect'));
                    }
                }
            ],
            'new_password' => 'required|min:5|max:25',
            'confirm_new_password' => 'same:new_password'
        ],[
            'current_password.required' => 'Enter your current password',
            'new_password.required' => 'Enter your new password',
            'confirm_new_password.same' => 'The confirm password must be equal to the new password',
        ]);

        // Update Password
        $query = User::find(auth('web')->id())->update([
            'password' => Hash::make($this->new_password)
        ]);

        if ($query) {
            $this->showToastr('Your password has been successfully updated', 'success');
            $this->current_password = $this->new_password = $this->confirm_new_password = null;
        } else {
            $this->showToastr('Something went wrong', 'error');
        }
        
    }

    // Make Toast
    public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToastr', [
            'message' => $message,
            'type' => $type
        ]);
    }
}
