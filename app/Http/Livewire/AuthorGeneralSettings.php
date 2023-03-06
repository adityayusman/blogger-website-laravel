<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class AuthorGeneralSettings extends Component
{
    public $settings;

    public $blog_name, $blog_email, $blog_description;

    public function mount()
    {
        $this->settings = Setting::find(1);
        $this->blog_name = $this->settings->blog_name;
        $this->blog_email = $this->settings->blog_email;
        $this->blog_description = $this->settings->blog_description;
    }

    // Edit General Settings
    public function UpdateGeneralSettings()
    {
        $this->validate([
            'blog_name' => 'required',
            'blog_email' => 'required|email',
            'blog_description' => 'required'
        ]);

        // Update and store
        $update = $this->settings->update([
            'blog_name' => $this->blog_name,
            'blog_email' => $this->blog_email,
            'blog_description' => $this->blog_description
        ]);

        if ($update) {
            $this->showToastr('General Settings have been successfully updated', 'success');
            $this->emit('updateAuthorFooter');
        } else {
            $this->showToastr('Something went wrong', 'error');
        }
        
    }

    public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToastr', [
            'message' => $message,
            'type' => $type
        ]);
    }

    public function render()
    {
        return view('livewire.author-general-settings');
    }

}
