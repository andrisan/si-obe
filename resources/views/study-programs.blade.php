<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div data-theme="light" class="p-6 flex justify-center">
                      <div class="card w-96 bg-base-100 text-neutral-content">
                          <div class="card-body items-center text-center">
                            <h2 class="card-title">Edit Program Study</h2>
                            <div class="form-control w-full max-w-xs">
                              <label class="label">
                                  <span class="label-text">ID Program Study</span> 
                              </label>
                                <input type="text" class="input input-bordered w-full max-w-xs" value="123"/>
                              <label class="label">
                                <span class="label-text">Nama Program Study</span>
                              </label>
                                <input type="text" class="input input-bordered w-full max-w-xs" value="Program Study A"/>
                            </div>
                            <div class="card-actions justify-end mt-4">
                                <button class="btn btn-error m-2">Cancel</button>
                                <button class="btn btn-success m-2">Save</button>
                            </div>
                          </div>
                      </div>
                </div>
            </div>
      </div>
    </div>
</x-app-layout>
