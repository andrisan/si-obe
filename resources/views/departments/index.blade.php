<?php

$rows = collect($departments)->all()['data'] ?? [];
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Departments') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.0/dist/full.css" rel="stylesheet" type="text/css" />
    <html data-theme="light">

    </html>
    <div x-data="{
    
        rows: {{ collect($rows) }},
    }" x-cloak>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!--dropdown pilih fakultas-->
                        <div class="dropdown">
                            <div class="dropdown dropdown-end ml-10">
                                <label tabindex="0" class="btn m-1">Nama Fakultas</label>
                                <ul tabindex="0"
                                    class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                                    @foreach ($faculties as $faculty)
                                        <li><a @selected(true)
                                                href="/faculties/{{ $faculty->id }}/departments/">{{ $faculty->name }}</a>
                                        </li>
                                    @endforeach

                                </ul>


                            </div>


                        </div>
                        @foreach ($departments as $department)
                        @endforeach
                        <a href="/faculties/{{ $department->faculty_id }}/departments/create" class="btn ">

                            tambah

                        </a>



                        <!--Judul-->
                        <div class="flex justify-center">
                            <h1 class="text-3xl font-bold">Departments</h1>

                        </div>

                        <br>
                        <!--Tabel departments-->
                        <div class="overflow-x-auto">
                            <table class="table w-full text-center">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- row 1 -->
                                    @foreach ($departments as $department)
                                        <tr class="hover">
                                            <th>{{ $department['id'] }}</th>
                                            <td>{{ $department['name'] }}</td>
                                            <td>
                                                <div class="flex  ">





                                                    <a href="/faculties/{{ $department->faculty_id }}/departments/{{ $department->id }}/edit"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <form
                                                        action="/faculties/{{ $department->faculty_id }}/departments/{{ $department->id }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-error btn-sm"
                                                            value="{{ $department->id }}">Delete</button>

                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <!-- row 2 -->

                                </tbody>
                            </table>
                        </div>
                        <!--batas bawah-->
                    </div>
                </div>
            </div>
        </div>
        </template>

    </div>
</x-app-layout>
