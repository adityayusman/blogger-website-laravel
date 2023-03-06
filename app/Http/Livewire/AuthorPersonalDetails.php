<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AuthorPersonalDetails extends Component
{
    // Mounting author data
    public $author; 
    public $name, $username, $email, $biography;
    public function mount()
    {
        $this->author = User::find(auth('web')->id());
        $this->name = $this->author->name;
        $this->username = $this->author->username;
        $this->email = $this->author->email;
        $this->biography = $this->author->biography;
    }

    // Update Author Personal Details
    public function UpdateDetails()
    {
        $this->validate([
            'name' => 'required|string',
            'username' => 'required|unique:users,username,'.auth('web')->id()
        ],[
            'name.required' => 'Name field is required',
            'name.string' => 'Name must be string',
            'username.required' => 'Username field is required',
            'username.unique' => 'Username is not available',
        ]);

        // Store
        User::where('id', auth('web')->id())->update([
            'name' => $this->name,
            'username' => $this->username,
            'biography' => $this->biography
        ]);

        // Tanpa refresh dulu
        $this->emit('updateTopHeader');
        $this->emit('updateAuthorProfileHeader');

        $this->showToastr('Your Profile info have been successfully updated', 'success');
    }

    // Show toast notification
    public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToastr',[
            'message' => $message,
            'type' => $type
        ]);
    }

    public function render()
    {
        return view('livewire.author-personal-details');
    }
}
