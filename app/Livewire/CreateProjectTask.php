<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\Project;
use Livewire\Component;

class CreateProjectTask extends Component
{
    public $projects;      
    public $taskname;          
    public $project_id = null;
    public $priority   = null;    

    public function mount()
    {
        $this->projects = Project::all(); // Fetch all projects
    }

    public function rules()
    {
        return [
            'project_id'     => 'required|exists:projects,id', // Ensure the project exists
            'taskname'       => 'required|string|max:255',
            'priority'       => 'required|in:high,medium,low',
        ];
    }

    public function createTask()
    {
        // Validate the input
        $validatedData = $this->validate();

        // Create a new task
        Task::create([
            'project_id' => $validatedData['project_id'],
            'name'       => $validatedData['taskname'],
            'priority'   => $validatedData['priority'],
        ]);

        // Flash success message
        session()->flash('message', 'Task created successfully');

        $this->reset('project_id', 'taskname', 'priority');
        
    }
    
    public function render()
    {
        return view('livewire.create-project-task');
    }
}
