
<div class="container mx-auto p-4">
      <!-- Page Title -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Projects</h1>
        <div class="flex">
          <a href="{{ route('project.create') }}" class="btn bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 mr-2 px-4 rounded flex items-center" >
              Create New Project
          </a>
          <a href="{{ route('tasks.create') }}" class="bg-green-500 hover:green-600 text-white font-semibold py-2  px-4 rounded flex items-center" >
              Create New Task
          </a>  
        </div>
      </div>
    
      <!-- Contracts Table -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="table-auto w-full border-collapse">
          <thead>
            <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
              <th class="py-1 px-4 text-center">#ID</th>
              <th class="py-1 px-4 text-center">Task Name</th>
              <th class="py-1 px-4 text-center">Action</th>
            </tr>
          </thead>
          <tbody class="text-gray-600 text-sm ">
            @php
              $n= 0;
            @endphp
  
  @foreach ($projects as $project)
  <tr class="border-b border-gray-200 hover:bg-gray-100 bg-red-100">
      <td class="py-3 px-6 text-left">{{ ++$n }}</td>
      <td class="py-3 px-6 text-left">{{ $project->name }}</td>
      <td class="py-3 px-6 text-center">
          <div class="flex justify-center">
              <button
                  wire:click="viewTasks({{ $project->id }})"
                  class="bg-blue-500 text-white font-semibold py-1 px-3 mr-2 rounded text-xs">
                  View Tasks
              </button>
          </div>
      </td>
  </tr>

  {{-- task dropdown --}}
            @if ($selectedProjectId === $project->id)
            <tr>
                <td colspan="3" class="bg-gray-100">
                    @if (count($tasks) > 0)
                    <ul class="list-disc pl-5">
                        @foreach ($tasks as $task)
                        <li>{{ $task->name }}</li>
                        @endforeach
                    </ul>
                    @else
                    <p class="text-gray-500">No tasks have been created for this project., create a task</p>
                    @endif
                </td>
            </tr>
            @endif
            @endforeach
            @if($projects->count() == 0)
            <td class="py-4 px-6 text-left text-lg">
              No Projects Available
              <a href="{{ route('project.create') }}" class="text-blue-600 font-bold underline">Create a project</a>
            </td>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  
  
    