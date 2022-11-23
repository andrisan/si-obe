<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Tambah Fakultas') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="container p-4 text-primary mt-2 text-sm">
                      <form action="{{ route('faculties.store') }}" method="post">
                          @csrf
                          <div class="form-control">
                              <label class="uppercase font-bold  text-black" for="fname">nama fakultas</label>
                              <input type="text" placeholder="Type here" class="input input-bordered input-ghost input-l w-full max-w-xl mb-6 mt-2" name="name"/>
                          </div>
                          <div class="actions justify-start">
                              <button class="btn bg-accent hover:bg-white hover:text-accent text-white font-bold py-2 px-4 rounded border-accent border-2 hover:border-accent mr-2">Tambah</button>
                              <form action="{{ route('faculties.index') }}">
                                  <button class="btn bg-red-600 hover:bg-white hover:text-red-500 text-white font-bold py-2 px-4 rounded border-red-500 border-2 hover:border-red-500">Cancel</button>
                              </form>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>