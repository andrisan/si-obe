@section('pageTitle', 'Edit Departement')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Departmen') . " $department->name" }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div data-theme="light" class="p-6 flex justify-center">
                    <div class="card w-96 bg-white text-neutral-content">
                        <div class="card-body items-center text-center">
                            <h2 class="card-title text-neutral">Edit Departemen</h2>

                            <div class="form-control w-full max-w-xs">
                                <form method="post"
                                    action="{{ route('faculties.departments.update', [$faculty, $department]) }}">
                                    @csrf
                                    @method('patch')

                                    <label class="label mt-4 text-neutral">
                                        <span class="label-text">Departemen</span>
                                    </label>
                                    <input type="text" class="input input-bordered w-full max-w-xs text-neutral"
                                        value="{{ $department->name }}" name="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                    <div class="flex mt-4">

                                        <button class="btn btn-primary">Simpan</button>


                                </form>

                                <div class="card-actions ml-4 ">
                                    <form action="{{ route('faculties.departments.index', [$faculty]) }}"> <button
                                            class="btn btn-outline btn-error">Cancel</button></form>



                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
{{-- /faculties/{{ $department->id }}/departments/{{$department->id}}/edit --}}
