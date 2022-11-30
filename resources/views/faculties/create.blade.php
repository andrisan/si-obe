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
                    <div class="container p-4 text-primary text-sm">
                        <form action="{{ route('faculties.store') }}" method="post">
                            @csrf
                            <div class="form-control">
                                <label class="uppercase font-bold  text-black mb-1" for="fname">nama fakultas</label>
                                <input type="text" placeholder="Type here" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4   " name="name" required/>
                            </div>
                            <div class="actions justify-start">
                                <button class="btn bg-green-400 hover:bg-white hover:text-green-400 text-white font-bold rounded border-green-400 border-2 hover:border-green-400 mr-2">Tambah</button>
                            </div>
                        </form>
                        <div class="actions justify-start">
                            <a href="{{ route('faculties.index') }}">
                                <button class="btn bg-red-400 hover:bg-white hover:text-red-400 text-white font-bold rounded border-red-400 border-2 hover:border-red-400">Cancel</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>