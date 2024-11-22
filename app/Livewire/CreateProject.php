<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class CreateProject extends Component
{
    public $name;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255'
        ];
    }

    public function createProject()
    {
       
        //validate data 
        $validatedData     = $this->validate();
        
        //save data to Projects table
        Project::create([
            'name'  => $validatedData['name']
        ]);

        session()->flash('message', 'New Project created successfully.');

        $this->reset('name');

    }


    public function render()
    {
        return view('livewire.create-project');
    }
}
