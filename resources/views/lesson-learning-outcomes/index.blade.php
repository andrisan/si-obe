<script src="https://kit.fontawesome.com/b79c47ea42.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/61cc44f0a1.js" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lesson Learning Outcome') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.0/dist/full.css" rel="stylesheet" type="text/css" />
    <html data-theme="light"></html>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-20">
                    <div class="flex flex-col border-b-2">
                        <div>
                            <h1 class="text-2xl font-extrabold" style="font-weight: 900;">Lesson Learning Outcome</h1>
                        </div>
                        <div>
                          <button class="btn btn-success btn-sm">+ Tambah LLO</button>  
                        </div>
                    </div>
                    <div class="mt-10">
                        <table class="table-fixed w-full">
                            @if($llos->isNotEmpty())
                            <thead>
                              <tr class="bg-[#F7F7F9] border-2 h-10">
                                <th class="w-auto">Kode LLO</th>
                                <th class="w-auto">Kode CLO</th>
                                <th class="w-auto">Posisi</th>
                                <th class="w-auto">deskripsi</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody class="text-center border-2 border-black text-black">
                            @foreach($llos as $llo) 
                                <tr class="border-2 h-14">
                                <td>{{ $llo->id }}</td>
                                <td>{{ $llo->clo_id }}</td>
                                <td>{{ $llo->position }}</td>
                                <td>{{ $llo->description }}</td>    
                                <td>
                                    <button href="`lesson-learning-outcomes/${row.id}/edit`" class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-error btn-sm" @click="confirm('Are you sure?') ? console.log('asdasd') : false">Delete</button>
                                </td>        
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                          @else
                          <br>
                          <h1 class="text-2xl font-extrabold text-center" style="font-weight: 900;">Data tidak ditemukan</h1>
                          <br>
                          @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>