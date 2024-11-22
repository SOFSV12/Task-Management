
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
          <h2 class="text-xl font-semibold text-center mb-4">Create Project</h2>
          <form wire:submit.prevent="createProject">
            @csrf
            <div class="mb-4">
              <label for="name" class="block text-gray-700 font-medium mb-2">Project Name</label>
              <input 
                type="text" 
                id="name" 
                name="name" 
                placeholder="Enter Project Name" 
                class="w-full p-2 border border-gray-300 rounded"
                wire:model="name" value = "{{old('name')}}"
              />
              @error('name')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div>
                <div wire:loading wire:target="createProject">
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
