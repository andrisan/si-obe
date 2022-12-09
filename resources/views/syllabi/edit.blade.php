<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Syllabi Edit of ' . "$syllabus->title") }}
    </h2>
  </x-slot>

  <div class="text-sm breadcrumbs pl-8 pt-5 font-bold text-gray-600">
    <ul>
      <li><a href="">Dashboard</a></li>
      <li><a href="">Syllabi</a></li>
      <li class="text-blue-600"> Syllabi Edit</li>
    </ul>
  </div>

  <div class="px-8 pt-3 pb-10">
    <div class="border-b rounded-lg bg-primary-content shadow-xl px-5 py-5">
          <form action="{{route('syllabi.update',$syllabus)}}" method="POST">
              @csrf
              @method('patch')
      <div class="grid grid-cols-1 pb-5">
        <div>
          <div class="form-control w-full px-10">
            <label class="label">
              <span class="label-text text-neutral font-bold">Syllabus Name</span>
            </label>
            <input type="text" class="input text-neutral input-bordered bg-white w-full h-18"
            value="{{ $syllabus->title }}" name="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />

          </div>
          <div class="form-control w-full px-10">
            <label class="label">
              <span class="label-text text-neutral font-bold">Author</span>
            </label>
            <input type="text" class="input text-neutral input-bordered bg-white w-full h-18"
            value="{{ $syllabus->author }}" name="author" />
            <x-input-error :messages="$errors->get('author')" class="mt-2" />

          </div>
          <div class="form-control w-full px-10">
            <label class="label">
              <span class="label-text text-neutral font-bold">Head program studi</span>
            </label>
            <input type="text" class="input text-neutral input-bordered bg-white w-full h-18"
            value="{{ $syllabus->head_of_study_program }}" name="head_of_study_program" />
            <x-input-error :messages="$errors->get('head_of_study_program')" class="mt-2" />
            
          </div>
          
        </div>

        <div>
         

          <div class="px-10 pt-3 border-gray-400" style="float:right">
            <button type="submit"  class="btn btn-outline " >Save</button>
          </div>
        </div>
      </div>
   </form>

    </div>
  </div>
</x-app-layout>