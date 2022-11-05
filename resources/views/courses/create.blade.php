<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Course') }}
        </h2>
    </x-slot>

        <!-- <div class="border-r-2 border-indigo-500"> -->
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col px-10 pt-5 border-primary-content border-l border-slate-500">
            <!-- Page content here -->
            <div class="">
              <div class="border-transparent rounded-lg bg-base-300 px-5 py-5">
              <div class="grid grid-cols-2 grid-flow-row gap-1 justify-items-center">

                <div class="form-control w-full max-w-xs">
                  <label class="label">
                    <span class="label-text text-primary text-violet-400">Course Code</span>
                  </label>
                  <input type="text" class="input text-white input-bordered input-primary bg-primary w-full max-w-xs" />
                </div>

                <div class="form-control w-full max-w-xs">
                  <label class="label">
                    <span class="label-text text-primary text-violet-400">Short Description</span>
                  </label> 
                  <textarea class="textarea textarea-primary bg-primary text-white"></textarea>
                </div>
              
                <div class="form-control w-full max-w-xs">
                  <label class="label">
                    <span class="label-text text-primary text-violet-400">Course Name</span>
                  </label>
                  <input type="text" class="input text-white input-bordered input-primary bg-primary w-full max-w-xs" />
                </div>

                <div class="form-control w-full max-w-xs">
                  <label class="label">
                    <span class="label-text text-primary text-violet-400">Minimal Requirement</span>
                  </label> 
                  <textarea class="textarea textarea-primary bg-primary text-white"></textarea>
                </div>
              
                <div class="form-control w-full max-w-xs">
                  <label class="label">
                    <span class="label-text text-primary text-violet-400">Course Credit</span>
                  </label>
                  <input type="text" class="input text-white input-bordered input-primary bg-primary w-full max-w-xs" />
                </div>

                <div class="form-control w-full max-w-xs">
                  <label class="label">
                    <span class="label-text text-primary text-violet-400">Study Material</span>
                  </label> 
                  <textarea class="textarea textarea-primary bg-primary text-white"></textarea>
                </div>

                <div class="form-control w-full max-w-xs">
                  <label class="label">
                    <span class="label-text text-primary text-violet-400">Lab Credit</span>
                  </label>
                  <input type="text" class="input text-white input-bordered input-primary bg-primary w-full max-w-xs" />
                </div>

                <div class="form-control w-full max-w-xs">
                  <label class="label">
                    <span class="label-text text-primary text-violet-400">Learning Media</span>
                  </label> 
                  <textarea class="textarea textarea-primary bg-primary text-white"></textarea>
                </div>

                <div class="form-control w-full max-w-xs">
                  <label class="label">
                    <span class="label-text text-primary text-violet-400">Course Type</span>
                  </label>
                  <input type="text" class="input text-white input-bordered input-primary bg-primary w-full max-w-xs" />
                </div>

                <div class="form-control w-full max-w-xs">
                  <label class="label">
                    <span class="label-text text-primary text-violet-400">Study Program</span>
                  </label>
                  <input type="text" class="input text-white input-bordered input-primary bg-primary w-full max-w-xs" />
                </div>

                <div class="form-control w-full max-w-xs">
                  <label class="label">
                    <span class="label-text text-primary text-violet-400">User Creator</span>
                  </label>
                  <input type="text" class="input text-white input-bordered input-primary bg-primary w-full max-w-xs" />
                </div>

              </div>
              </div>

              
              <div class="py-5" style="float:right">
                <button class="btn btn-outline justify-end">Create</button>
              </div>
            </div>
            <!-- End content -->
        </div>
    </div>
            </div>
        </div>
    </div>
</x-app-layout>