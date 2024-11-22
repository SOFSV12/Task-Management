<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\Project;
use Livewire\Component;

class EditProjectTask extends Component
{

    public $project_id;
    public $taskname;
    public $priority;
    public $projects;
    public $taskId;

    public function rules()
    {
        return [
            'project_id'     => 'required|exists:projects,id', // Ensure the project exists
            'taskname'       => 'required|string|max:255',
            'priority'       => 'required|in:high,medium,low',
        ];
    }

    public function editTask(string $id)
    {
        //retreive task

        $task = Task::find($id);
        if($task){
            $validatedData      = $this->validate();
            $task->project_id   = $validatedData['project_id'];
            $task->name         = $validatedData['taskname'];
            $task->priority     = $validatedData['priority'];
            $task->update();
            session()->flash('message', 'Task Updated succesfully');
            return redirect()->route('home');
        }else{
            session()->flash('error', 'Something Went Wrong');
        }
    }


    public function mount(string $id)
    {
        //fetch all projects
        $this->projects   = Project::all();

        //find task and fetch attributes
        $task             = Task::find($id);
        $this->project_id = $task->project_id;
        $this->taskname   = $task->name;
        $this->priority   = $task->priority;
        $this->taskId     = $task->id;
    }

    public function render()
    {
        return view('livewire.edit-project-task');
    }
}
