
<div class="container mx-auto p-4">
  @if (session()->has('message'))
          <div class="p-3 bg-green-300 text-green-700 rounded shadow-sm mb-4">
              {{ session('message') }}
          </div>
      @endif
    <!-- Page Title -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-gray-800">Tasks</h1>
      <div>
        <a href="{{ route('all.project') }}" class="btn bg-yellow-400 hover:bg-yellow-600 text-black font-semibold py-2 mr-2 px-4 rounded flex items-center" >
          View all Projects
      </a>
      </div>
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
            <th></th>
            <th class="py-1 px-4 text-center">#ID</th>
            <th class="py-1 px-4 text-center">Task Name</th>
            <th class="py-1 px-4 text-center">Priority</th>
            <th class="py-1 px-4 text-center">Action</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 text-sm " wire:sortable="updateTaskOrder">
          @php
            $n= 0;
          @endphp

          @foreach ($tasks as $task )
          <tr class="border-b border-gray-200 hover:bg-gray-100 bg-red-100" wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}" >
            <td style="width: 15px" class="pl-4" wire:sortable.handle>
              <i class="fa fa-arrows-alt text-muted" ></i>
            </td>
            <td class="py-3 px-6 text-left">{{++$n}}</td>
            <td class="py-3 px-6 text-left">{{ $task->name }}</td>
            <td class="py-3 px-6 text-left">{{ $task->priority }}</td>
            <td class="py-3 px-6 text-center">
              <div class="flex justify-center">
                <a  href="{{ route('task.edit', ['id' => $task->id]) }}" class="bg-blue-500  text-white font-semibold py-1 px-3  mr-2 rounded text-xs">
                  Edit
                </a>
                <button class="bg-red-500  text-white font-semibold py-1 px-3 rounded text-xs" wire:click="delete({{ $task->id }})">
                  Delete
                </button>
              </div>
            </td>
          </tr>
          @endforeach
          @if($tasks->count() == 0)
          <td class="py-4 px-6 text-left text-lg">
            No tasks available. 
            <a href="{{ route('tasks.create') }}" class="text-blue-600 font-bold underline">Create a task</a>
          </td>
          @endif
        </tbody>
      </table>
    </div>
  </div>


  