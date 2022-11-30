@section('pageTitle', 'Edit Faculty')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Fakultas') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-center">
                    <div class="card w-96 bg-white text-neutral-content">
                        <div class="card-body items-center text-center">
                          <div class="card-title text-neutral">Nama Fakultas</div>
                            <div class="form-control w-full max-w-xs">
                                <form action="/faculties/{{ $faculty->id }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="text" class="input input-bordered w-full max-w-xs text-neutral"
                                        name="name" value="{{ $faculty->name }}" />
                            </div>
                            <div class="card-actions justify-end mt-4">
                                <button
                                    class="btn bg-green-400 hover:bg-white hover:text-green-400 text-white font-bold rounded border-green-400 border-2 hover:border-green-400"
                                    type="submit">Simpan</button>
                                </form>
                                <a href="{{ route('faculties.show', [$faculty]) }}">
                                    <button
                                        class="btn bg-red-400 hover:bg-white hover:text-red-400 text-white font-bold rounded border-red-400 border-2 hover:border-red-400">Cancel</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>
