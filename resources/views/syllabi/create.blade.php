<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Syllabi Create') }}
    </h2>
  </x-slot>

  <div class="text-sm breadcrumbs pl-8 pt-5 font-bold text-gray-600">
    <ul>
      <li><a href="">Dashboard</a></li>
      <li><a href="">Syllabi</a></li>
      <li class="text-blue-600">Syllabi Create</li>
    </ul>
  </div>

  <div class="px-8 pt-3 pb-10">
    <div class="border-b rounded-lg bg-primary-content shadow-xl px-5 py-5">

      <div class="grid grid-cols-1 pb-5">
        <div>
          <form action="{{ route('syllabi.store') }}"method="post">
                @csrf
            <div class="form-control w-full px-10">
              <div class="dropdown">
                <select name="course_id" id="">
                 @foreach ($course as $courses)
                 <option value="{{ $courses->id  }}">{{$courses->name   }}</option>
                 @endforeach
                 
                </select>
               </div>
              <label class="label">
                
  
                <span class="label-text text-neutral font-bold">Syllabus Name</span>
              </label>
              <input type="text" class="input text-neutral input-bordered bg-white w-full h-18"  name="title" required />
              <x-input-error :messages="$errors->get('title')" class="mt-2" />

            </div>
            <div class="form-control w-full px-10">
              <label class="label">
                <span class="label-text text-neutral font-bold">Author</span>
              </label>
             
              <input name="author" type="text" class=" input text-neutral input-bordered bg-white w-full h-18" />
              <x-input-error :messages="$errors->get('author')" class="mt-2" />
            
            </div>
          </div>
  
          <div>
            <div class="form-control w-full px-10">
              <label class="label">
                <span class="label-text text-neutral font-bold">Head of Study Program</span>
              </label>
              <input type="text" name="head_of_study_program" class="textarea text-neutral p-10 input-bordered bg-white w-full h-full">
              <x-input-error :messages="$errors->get('head_of_study_program')" class="mt-2" />

            </div>
  
            <div class="px-10 pt-3" style="float:right">
              <button class="btn btn-outline " href="/syllabi">Create</button>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</x-app-layout>