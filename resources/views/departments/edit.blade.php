<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-center">
                  <div class="card w-96 bg-base-300 text-neutral-content">
                    <div class="card-body items-center text-center">
                      <h2 class="card-title text-neutral">Edit Departemen</h2>
                      <div class="form-control w-full max-w-xs">
                        <label class="label">
                          <span class="label-text">Fakultas</span>
                        </label>
                        <select class="select select-bordered w-full max-w-xs text-neutral">
                          <option>Ilmu Komputer</option>
                          <option>Ekonomi Bisnis</option>
                        </select>
                        <label class="label mt-4 text-neutral">
                          <span class="label-text">Departemen</span>
                        </label>
                        <input type="text" class="input input-bordered w-full max-w-xs text-neutral" value="Sistem Informasi" />
                      </div>
                      <div class="card-actions justify-end mt-4">
                        <button class="btn btn-outline btn-error">Cancel</button>
                        <button class="btn btn-primary">Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
