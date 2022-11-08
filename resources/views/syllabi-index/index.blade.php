<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rencana Pembelajaran Semester - Pemrograman Basis Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col lg:flex-row">
                            <div class="grid flex-grow place-item-start">
                                <p class="text-blue-600 font-semibold ml-4">Kode</p>
                                <p class="text-black ml-4 mb-2">CSD60001</p>
                                <p></p>
                                <p class="text-blue-600 font-semibold ml-4">Semester</p>
                                <p class="text-black ml-4 mb-2">3</p>
                                <p class="text-blue-600 font-semibold ml-4">Course ID</p>
                                <p class="text-black ml-4 mb-4">CSD60001</p>
                            </div>
                            <div class="grid flex-grow"></div>
                            <div class="grid flex-grow"></div>
                            <div class="grid flex-grow"></div>
                            <div class="grid flex-grow"></div>
                            <div class="grid flex-grow"></div>
                            <div class="grid flex-grow"></div>
                            <div class="grid flex-grow"></div>
                            <div class="grid flex-grow"></div>
                            <div class="grid flex-grow place-item-end">
                                <button class="bg-blue-300 btn btn-active btn-outline btn-md text-white">Edit</button>
                                <button class="bg-blue-300  mt-5 btn btn-active btn-outline text-white">Create New</button>
                                <br>
                            </div>
                    </div>

                    <div class="bg-gray-300 shadow-xl p-20 rounded-lg">
                        <div class="flex space-x-20">
                            <div class="">
                                <h1 class="text-black font-bold">Dosen Penyusun RPS</h1>
                                <h1 class="bg-white text-black px-5 py-2 rounded-lg">Issa Arwani, S.Kom, M.Sc</h1>
                            </div>
                            <div class="">
                                <h1 class="text-black font-bold">Ketua Program Studi</h1>
                                <h1 class="bg-white text-black px-5 py-2 rounded-lg">Ir. Widhy Hayuhardhika N.P, S.Kom., M.Kom.</h1>
                            </div>
                        </div>

                        <div class="mt-10">
                            <h1 class="text-black font-bold">Deskripsi Singkat MK</h1>
                            <p class="bg-white text-black px-5 py-2 rounded-lg">Mata kuliah ini Pemrograman Basis Data merupakan mata kuliah wajib yang bisa diambil setelah lulus mata kuliah Sistem Basis Data.</p>
                        </div>

                        <div class="mt-10">
                            <h1 class="text-black font-bold">Capaian Pembelajaran</h1>
                            <div class="bg-white text-black px-5 py-2 rounded-lg">
                                <p class="">CPL: Mampu merancang dan mengimplementasikan solusi teknologi informasi terintegrasi yang diperlukan.</p>
                                <p class="">CPMK: Mampu menyampaikan hasil rancangan dan implementasi projek secara ilmiah</p>
                            </div>
                        </div>

                        <div class="flex mt-10 space-x-36">
                            <div class="">
                                <h1 class="text-black font-bold">MK Prasyarat dan Nilai Minimal</h1>
                                <div class="bg-white text-black px-5 py-2 rounded-lg">
                                    <h1 class="">Sistem Basis Data - (D)</h1>
                                </div>
                            </div>
                            <div class="">
                                <h1 class="text-black font-bold">Bahan Kajian</h1>
                                <div class="bg-white text-black px-5 py-2 rounded-lg">
                                    <h1 class="">Sistem Basis Data</h1>
                                    <h1 class="">Stored Procedure </h1>
                                    <h1 class="">Logika Pemrograman</h1>
                                    <h1 class="">Cursor</h1>
                                    <h1 class="">Trigger</h1>
                                </div>
                            </div>
                            <div class="">
                                <h1 class="text-black font-bold">Dosen Pengampu</h1>
                                <div class="bg-white text-black px-5 py-2 rounded-lg">
                                    <h1>Welly Pramono</h1>
                                    <h1>Issa Arwani</h1>
                                    <h1>Agus Wahyu Widodo</h1>
                                    <h1>Andri Santoso</h1>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>