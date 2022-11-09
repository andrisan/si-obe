<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create New Course') }}
    </h2>
  </x-slot>

  <x-slot name="slot">
    <div class="text-sm breadcrumbs pl-8 pt-5 font-bold text-grey-600">
      <ul>
        <li><a href="">Dashboard</a></li>
        <li><a href="">Courses</a></li>
        <li class="text-blue-600">Create</li>
      </ul>
    </div>

    <!-- <div class="border-r-2 border-indigo-500"> -->
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col px-10 pt-5 border-primary-content border-l border-slate-500">
      <!-- Page content here -->
      <div class="">
        <div class="border-transparent rounded-lg bg-white px-5 py-5">
          <div class="grid grid-cols-2 grid-flow-row gap-1 justify-items-center">

            <div class="form-control w-full max-w-xs">
              <label class="label">
                <span class="label-text text-neutral font-bold">Course Code</span>
              </label>
              <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xs" />
            </div>

            <div class="form-control w-full max-w-xs">
              <label class="label">
                <span class="label-text text-neutral font-bold">Short Description</span>
              </label>
              <textarea class="textarea input-bordered bg-white text-neutral"></textarea>
            </div>

            <div class="form-control w-full max-w-xs">
              <label class="label">
                <span class="label-text text-neutral font-bold">Course Name</span>
              </label>
              <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xs" />
            </div>

            <div class="form-control w-full max-w-xs">
              <label class="label">
                <span class="label-text text-neutral font-bold">Minimal Requirement</span>
              </label>
              <textarea class="textarea input-bordered bg-white text-neutral"></textarea>
            </div>

            <div class="form-control w-full max-w-xs">
              <label class="label">
                <span class="label-text text-neutral font-bold">Course Credit</span>
              </label>
              <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xs" />
            </div>

            <div class="form-control w-full max-w-xs">
              <label class="label">
                <span class="label-text text-neutral font-bold">Study Material</span>
              </label>
              <textarea class="textarea input-bordered bg-white text-neutral"></textarea>
            </div>

            <div class="form-control w-full max-w-xs">
              <label class="label">
                <span class="label-text text-neutral font-bold">Lab Credit</span>
              </label>
              <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xs" />
            </div>

            <div class="form-control w-full max-w-xs">
              <label class="label">
                <span class="label-text text-neutral font-bold">Learning Media</span>
              </label>
              <textarea class="textarea input-bordered bg-white text-neutral"></textarea>
            </div>

            <div class="form-control w-full max-w-xs">
              <label class="label">
                <span class="label-text text-neutral font-bold">Course Type</span>
              </label>
              <select class="select text-neutral input-bordered bg-white w-full max-w-xs">
                <option>Mandatory</option>
                <option>Elective</option>
              </select>
            </div>
            <!-- <div class="form-control w-full max-w-xs">
              <label class="label">
                <span class="label-text text-blue-600 text-blue-600">Course Type</span>
              </label>
              <input type="text" class="input text-blue-600 input-bordered input-primary bg-white w-full max-w-xs" />
            </div> -->

            <div class="form-control w-full max-w-xs">
              <label class="label">
                <span class="label-text text-neutral font-bold">Study Program</span>
              </label>
              <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xs" />
            </div>

            <div class="form-control w-full max-w-xs">
              <label class="label">
                <span class="mt-7 label-text text-neutral font-bold">User Creator</span>
              </label>
              <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xs" />
            </div>

          </div>
        </div>


        <div class="py-5" style="float:right">
          <button class="btn btn-outline justify-end">Create</button>
        </div>
      </div>
      <!-- End content -->
    </div>
  </x-slot>
</x-app-layout>