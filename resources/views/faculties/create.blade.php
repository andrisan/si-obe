<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div data-theme="light" class="hero min-h-screen bg-base-100">
        <div class="hero-content text-center">
          <div class="max-w-xl">
            <div class="card w-96 bg-slate-200 shadow-xl text-neutral-content">
                <div class="card-body items-center text-center">
                  <h2 class="card-title text-black font-bold">Tambah Fakultas</h2>
                  <div class="form-control w-full max-w-xs">
                    <label class="label">
                      <span class="label-text font-bold">Nama Fakultas</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                  </div>
                  <div class="card-actions justify-end mt-4">
                      <button class="btn btn-outline btn-error font-bold">Cancel</button>
                      <button class="btn btn-primary font-bold">Tambah</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>