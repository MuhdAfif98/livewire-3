<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Clicker extends Component
{
    use WithFileUploads;

    #[Rule('required|min:2|max:50')]
    public $name;

    #[Rule('required|email|unique:users')]
    public $email;

    #[Rule('required|min:2')]
    public $password;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;

    public function createNewUser()
    {
        $validated = $this->validate();

        if ($this->image) {
            $validated['image'] = $this->image->store('uploads');
        }

        User::create($validated);

        $this->reset('name', 'email', 'password', 'image');

        session()->flash('success', 'User created successfully');
    }

    public function render()
    {
        $users = User::paginate(10);

        return view('livewire.clicker', [
            'users' => $users,
        ]);
    }
}
