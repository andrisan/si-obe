<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Edit: Student Grades
        </h2>
    </x-slot>

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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>