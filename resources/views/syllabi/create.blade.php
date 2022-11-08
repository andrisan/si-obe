<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create Syllabus') }}
    </h2>
  </x-slot>

  <div class="mx-10 my-5">
    <div class="border-b rounded-lg bg-base-300 px-4 py-5">
      <div class="form-control w-full max-w-xs">
        <label class="label">
          <span class="label-text text-blue-600 text-blue-600">Syllabus Name</span>
        </label>
        <input type="text" class="input text-blue-600 input-bordered input-primary bg-white w-full max-w-xs" />
      </div>
    
      <div class="form-control w-full max-w-xs">
        <label class="label">
          <span class="label-text text-blue-600 text-blue-600">Author</span>
        </label>
        <input type="text" class=" input text-blue-600 input-bordered input-primary bg-white w-full max-w-xs" />
      </div>
    
      <div class="form-control">
        <label class="label">
          <span class="label-text text-blue-600 text-blue-600">Head of Study Program</span>
        </label> 
        <textarea class="textarea text-blue-600 input-bordered input-primary bg-white w-full h-24"></textarea>
      </div>
    </div>
  
    <div class="py-5" style="float:right">
      <a class="btn btn-outline justify-end" href="/syllabi">Create</a>
    </div>
  </div>
</x-app-layout>