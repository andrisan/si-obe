<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create New Syllabi') }}
    </h2>
  </x-slot>


      <!-- Page content here -->
      <div class="mx-10 my-5">
        <div class="border-transparent rounded-lg bg-base-300 px-4 py-5">
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text text-primary text-violet-400">Syllabus Name</span>
            </label>
            <input type="text" class="input text-white input-bordered input-primary bg-primary w-full max-w-xs" />
          </div>

          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text text-primary text-violet-400">Author</span>
            </label>
            <input type="text" class="input text-white input-bordered input-primary bg-primary w-full max-w-xs" />
          </div>

          <div class="form-control">
            <label class="label">
              <span class="label-text text-primary text-violet-400">Head of Study Program</span>
            </label>
            <textarea class="textarea textarea-primary bg-primary text-white"></textarea>
          </div>
        </div>

        <div class="py-5" style="float:right">
          <button class="btn btn-outline justify-end">Create</button>
        </div>
      </div>
      <!-- End content -->
      
  <!--END SIDEBAR-->
  </div>
  </div>
  </div>
  </div>
</x-app-layout>