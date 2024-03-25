<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $search;

    public function placeholder()
    {
        return view('livewire.component.placeholder');
    }

    #[Computed()]
    public function users()
    {
        return User::latest()
            ->where('name', 'like', "%{$this->search}%")
            ->paginate(5);
    }

    public function render()
    {
        sleep(1);
        return view('livewire.user-list', [
            'count' => User::count()
        ]);
    }
}
