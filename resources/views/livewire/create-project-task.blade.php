
<div>
  <div>
    @if (session()->has('message'))
        <div class="p-3 bg-green-300 text-green-700 rounded shadow-sm">
            {{ session('message') }}
        </div>
    @endif
</div>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-sm">
          <h2 class="text-xl font-semibold text-center mb-4">Assign a Task To a Project</h2>
          <form wire:submit.prevent="createTask">
            <div class="mb-4">
            <label for="project" class="block text-gray-700 font-medium mb-2">Select A project</label>
            <select id="project" class="w-full  w-64 px-4 py-2 border border-gray-300 mt-2 mb-2" wire:model='project_id'>
                <option value="" selected>Select an option</option>
              @foreach($projects as $project)
                  <option value="{{ $project->id }}">{{ $project->name }}</option>
              @endforeach
            </select>
            @if ($projects->count() == 0)
              <p>Please Create a Project In order to assign a task 
                <a href="{{ route('project.create') }}" class="text-blue-600 font-bold underline">Create a Project</a>
              </p>
            @endif
            @error('project_id')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
              <label for="name" class="block text-gray-700 font-medium mb-2">Task</label>
              <input type="text" id="name"  wire:model='taskname' placeholder="Create A Task"  class="w-full p-2 border border-gray-300 rounded mb-2" value="{{ old('taskname') }}" />
              @error('taskname')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
              <label for="project" class="block text-gray-700 font-medium mb-2">Select Priority Level</label>
            <select id="priority" class="w-full  w-64 px-4 py-2 border border-gray-300 mt-2 mb-4" wire:model='priority'>
             <option value=""  selected>Select an option</option>
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">low</option>
            </select>
            @error('priority')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div>
              <div wire:loading wire:target="createTask">
                  <img src="{{asset('frontend/images/loader.gif')}}"/>
              </div>
              <div wire:loading.remove>
                  <button 
                    type="submit" 
                    class="w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 ">
                    Submit
                  </button>
              </div>
          </div>
        </form>
        <a 
        href="{{ route('home') }}" 
        class="w-full mt-2 bg-orange-500 text-white py-2 px-4 rounded flex justify-center items-center text-center">
        Home Page
        </a>
        </div>
      </div>      
</div>
