<?php

namespace App\Livewire;

use App\Models\Todo;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public $name;

    public $search;

    public $editTodoId;

    #[Rule('required|min:3|max:50')]
    public $editNewName;

    public function create()
    {
        // validate
        $validated = $this->validateOnly('name');

        // create todo
        Todo::create($validated);

        // clear input
        $this->reset();

        // send flash message
        session()->flash('success', 'Todo Created Successfully!');

        $this->resetPage();
    }

    public function delete($id)
    {
        try {
            Todo::findOrFail($id)->delete();
        } catch (Exception $e) {
            session()->flash('error', 'Failed to delete todo');
            return;
        }
    }

    public function edit($id)
    {
        $this->editTodoId = $id;
        $this->editNewName = Todo::find($id)->name;
    }

    public function update()
    {
        $this->validateOnly('editNewName');
        Todo::find($this->editTodoId)->update([
            'name' => $this->editNewName,
        ]);

        $this->cancelEdit();
    }

    public function cancelEdit()
    {
        $this->reset('editTodoId', 'editNewName');
    }

    public function toggleCompleted($id)
    {
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;

        $todo->save();
    }

    public function render()
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(5)
        ]);
    }
}
