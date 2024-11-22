<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class DashBoard extends Component
{
    public $tasks;

    public function mount()
    {
        $this->tasks = Task::all();
    }

    public function delete($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
        }
    
        // Refresh the tasks list
        $this->tasks = Task::all();
    }

    public function updateTaskOrder($items)
    {
        //update position of each item
        foreach($items as $item)
        {
            $task = Task::find($item['value']);
            $task->order_position = $item['order'];
            $task->update();
        }

        $this->tasks = Task::orderBy('order_position', 'asc')->get();

        session()->flash('message', "Tasks order got updated");
    }

    public function render()
    {
        return view('livewire.dash-board');
    }
}
