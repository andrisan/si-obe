<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Departments') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.0/dist/full.css" rel="stylesheet" type="text/css" />
    <html data-theme="light"></html>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!--dropdown pilih fakultas-->
                    <div class="dropdown">
                        <label tabindex="0" class="btn m-1">Fakultas Ilmu komputer</label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a>Fakultas Ilmu Komputer</a></li>
                            <li><a>Fakultas Ekonomi dan Bisnis</a></li>
                            <li><a>Fakultas Kedokteran</a></li>
                        </ul>
                    </div>

                    <!--Judul-->
                    <div class="flex justify-center py-6">
                        <h1 class="text-3xl font-bold">Departments</h1>
                    </div>

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
                            <tr class="hover">
                                <th>1</th>
                                <td>Teknik Informatika</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-error btn-sm">Delete</button>
                                </td>
                            </tr>
                            <!-- row 2 -->
                            <tr class="hover">
                                <th>2</th>
                                <td>Sistem Informasi</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-error btn-sm">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
                    <!--batas bawah-->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>