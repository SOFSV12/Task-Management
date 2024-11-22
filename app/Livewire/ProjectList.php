<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectList extends Component
{
    public $projects;
    public $selectedProjectId = null;
    public $tasks = []; 

    public function viewTasks($projectId)
    {
        $this->selectedProjectId = $projectId;
        $project = Project::with('tasks')->find($projectId);

        $this->tasks = $project ? $project->tasks : [];
    }

    public function mount()
    {
        $this->projects = Project::with('tasks')->get();

    }

    public function render()
    {
        return view('livewire.project-list');
    }
}
