@section('pageTitle', 'Criterias Index')

<script src="https://kit.fontawesome.com/b79c47ea42.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/61cc44f0a1.js" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criteria') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="flex flex-row sm:justify-end mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
            <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                <a href="{{ route('rubrics.criterias.create', [$rubric, $criterias->id])}}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="pr-1">New Criterias</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>


                </a>
            </div>
        </div>
        <div class="p-20 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex justify-between border-b-2 pb-4 ">
                <h1 class="text-2xl font-extrabold" style="font-weight: 900;">Criterias</h1>
            </div>

            <nav class="">
                <ul class="flex space-x-2 font-extrabold">
                    <li class="text-[#2E65F3]">Rubrics <span class="mx-2">/</span> </li>
                    <li class="">Criterias <span class="mx-2"></span> </li>
                </ul>
            </nav>

            <div class="flex  mt-5 space-x-5 relative">
                <div class="">
                    
                </div>
                <div class="">
                    <button></button>
                </div>
            </div>


            <table class="mt-10 table-fixed w-full">
                <thead>
                    <tr class="bg-[#F7F7F9] border-2 h-10">
                        <th class="w-32">No</th>
                        <th class="w-64">Title</th>
                        <th class="w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border-2 border-black text-black">
                    <tr class="border-2 h-14">
                        <td class="px-6 py-3 border-t border-gray-100">{{ $criterias->id }}</td>
                        <td class="px-6 py-3 border-t border-gray-100">{{ $criterias->title }}</td>
                        <td>
                            <div class="flex flex-wrap m-1">
                                <form action="{{ route('rubrics.criterias.edit', [$rubric, $criterias->id]) }}" method="GET">
                                    <button class="basis-full px-4 py-1 m-1 bg-yellow-600 rounded-xl text-white text-sm font-bold">Edit</button>
                                </form>

                                <form action="{{ route('rubrics.criterias.destroy', [$rubric, $criterias->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="basis-full px-4 py-1 m-1 bg-red-600 rounded-xl text-white text-sm font-bold " value="{{ $criterias->id }}" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                
                                <form action="{{route('rubrics.criterias.show', [$rubric, $criterias->id]) }}" method="get">
                                    <button class="text-blue-600" value="{{ $criterias->id }}"><strong>Open Details</strong></button>
                                </form>  
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
