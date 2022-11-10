<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Edit: Student Grades
        </h2>
    </x-slot>

    <!-- cek -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="grid grid-cols-2">
                        <div>
                            <h2 class="text-lg"><b>Nama Mahasiswa</b></h2>
                            <p>Status Pengumpulan</p>
                        </div>
                        <div class="text-right">
                            <h2 class="text-lg"><b>100/100</b></h2>
                            <p>Status Penilaian</p>
                        </div>
                    </div> 

                        <!-- colapse -->
                    <div tabindex="0" class=" border border-base-300 bg-base-100 rounded-box" id="rubrik">
                        <div class="text-xl font-medium">
                            <div class="grid md:grid-cols-10 gap-4">
                            <div class="col-span-8">NO1-1</div>
                            <button class="btn-sm bg-white text-red-600 rounded-full bg-transparent">clear</button>
                            <div><input type="text" placeholder="" value="../3" class="input w-full input-sm max-w-sm input-bordered" readonly /></div>
                            </div>
                        </div>
                        <div class="">
                            <p>Mampu menjelaskan konsep pemrograman basis data dalam pengembangan aplikasi</p>
                            <br />
                            <div class="btn-group">
                            <input type="radio" name="options" data-title="baik (3 pts)" class="btn" />
                            <input type="radio" name="options" data-title="cukup (2 pts)" class="btn" checked />
                            <input type="radio" name="options" data-title="kurang (1 pts)" class="btn" />
                            </div>
                        </div>
                    </div>
                    <!-- end colapse -->

                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>