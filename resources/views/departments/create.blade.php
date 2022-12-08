@section('pageTitle', 'Create Departement')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Department') }}
        </h2>
    </x-slot>
    <html data-theme="light" lang="en">

    </html>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/a73fac8683.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Create New Department</title>

    <div class="p-10">
        <!--awal header title-->
        <div class="flex justify-center">
            <p class="text-3xl pb-4 p-2 px-4 font-bold rounded-lg mb-4 w-fit">
                Create New Department
            </p>
        </div>

        <!--awal form create-->
        <div class="flex flex-row justify-center">
            <div class="block p-6 rounded-lg shadow-2xl bg-white max-w-md basis-1/2">
                <form action="{{ route('faculties.departments.store', $faculty) }}" method="post">
                    @csrf
                    <div class="form-group mb-6">
                        <h1>{{ $faculty->name }}</h1>


                    </div>
                    <div class="form-group mb-6">


                        <input type="text"
                            class="form-control mt-5 block w-full px-3 py-1.5 text-gray-700 bg-white border border-solid border-gray-400 rounded"
                            placeholder="Nama Departement baru" name="name">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />


                    </div>
                    <div class="flex space-x-3">
                        <button type="submit" class="btn px-6 py-2.5 text-white font-medium text-xs rounded shadow-md">
                           create
                        </button>

                </form>
                <div class="card-actions ml-4 ">
                    <form action="{{ route('faculties.departments.index', [$faculty]) }}"> <button
                            class="btn btn-outline btn-error">Cancel</button></form>



                </div>
            </div>

        </div>
    </div>
    <!--akhir form create-->
    </div>
</x-app-layout>
