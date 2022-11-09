<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Syllabi Edit of '.$syllabus) }}
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

      <div class="grid grid-cols-1 pb-5">
        <div>
          <div class="form-control w-full px-10">
            <label class="label">
              <span class="label-text text-neutral font-bold">Syllabus Name</span>
            </label>
            <input type="text" class="input text-neutral input-bordered bg-white w-full h-18" />
          </div>
          <div class="form-control w-full px-10">
            <label class="label">
              <span class="label-text text-neutral font-bold">Author</span>
            </label>
            <input type="text" class=" input text-neutral input-bordered bg-white w-full h-18" />
          </div>
        </div>

        <div>
          <div class="form-control w-full px-10">
            <label class="label">
              <span class="label-text text-neutral font-bold">Head of Study Program</span>
            </label>
            <textarea class="textarea text-neutral input-bordered  bg-white w-full h-full"></textarea>
          </div>

          <div class="px-10 pt-3 border-gray-400" style="float:right">
            <button class="btn btn-outline " href="/syllabi">Save</button>
          </div>
        </div>
      </div>

    </div>
  </div>
</x-app-layout>