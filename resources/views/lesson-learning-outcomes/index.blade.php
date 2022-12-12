@section('pageTitle', "Lesson Learning Outcome")

<script src="https://kit.fontawesome.com/b79c47ea42.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/61cc44f0a1.js" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lesson Learning Outcome') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-20">
                    <div class="flex flex-col border-b-2">
                        <div>
                            <h1 class="text-2xl font-extrabold" style="font-weight: 900;">Lesson Learning Outcome</h1>
                        </div>
                        <br>
                        <div>
                            <table>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tbody>
                                    @foreach($clos as $clo)
                                    <tr>
                                        <td class="font-bold">Kode CLO</td>
                                        <td>: {{ $clo->id }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Deskripsi</td>
                                        <td><a href="{{ route('syllabi.ilos.clos.index', [$syllabus, $ilo]) }}">: {{ $clo->description}}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div>
                            <form action="{{ route('syllabi.ilos.clos.llos.create', [$syllabus, $ilo, $clo]) }}" method="get">
                                <button class="btn btn-success btn-sm"><strong>+ Tambah LLO</strong></button>
                            </form>
                        </div>
                    </div>
                    <div class="mt-10">
                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-[#F7F7F9] border-2 h-10">
                                    <th class="w-auto">Posisi</th>
                                    <th class="w-auto">Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center border-2 border-black text-black">
                            @foreach($llos as $llo) 
                            <tr class="border-2 h-14">
                                <td>{{ $llo->position }}</td>
                                <td>{{ $llo->description }}</td>    
                                <td>
                                    <div class="card-actions justify-center pt-5">
                                        <form action="{{ route('syllabi.ilos.clos.llos.edit', [$syllabus, $ilo, $clo, $llo->id]) }}" method="get">
                                            <button class="btn btn-warning btn-sm" value="{{ $llo->id }}"><strong>Edit</strong></button>
                                        </form>
                                        <form action="{{ route('syllabi.ilos.clos.llos.destroy', [$syllabus, $ilo, $clo, $llo->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-error btn-sm" value="{{ $llo->id }}" onclick="return confirm('Yakin ingin menghapus data?');"><strong>Delete</strong></button>
                                        </form>
                                    </div>
                                </td>        
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>