<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Syllabus ID '.$syllabus) }}
    </h2>
  </x-slot>

  <div class="mx-10 my-5">
    <div class="border-b rounded-lg bg-base-300 px-4 py-5">
      <div class="form-control w-full max-w-xs">
        <label class="label">
          <span class="label-text text-primary">Syllabus Name</span>
        </label>
        <input type="text" class="input input-bordered input-primary bg-primary w-full max-w-xs" />
      </div>
    
      <div class="form-control w-full max-w-xs">
        <label class="label">
          <span class="label-text text-primary">Author</span>
        </label>
        <input type="text" class="input input-bordered input-primary bg-primary w-full max-w-xs" />
      </div>
    
      <div class="form-control">
        <label class="label">
          <span class="label-text text-primary">Head of Study Program</span>
        </label> 
        <textarea class="textarea textarea-primary bg-primary w-full h-24"></textarea>
      </div>
    </div>
  
    <div class="py-5" style="float:right">
      <button class="btn btn-outline justify-end">Save</button>
    </div>
  </div>
</x-app-layout>