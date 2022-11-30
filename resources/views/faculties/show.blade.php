<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Fakultas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div data-theme="light" class="p-10">
                    <div class="flex flex-col lg:flex-row mb-3">
                        <div class="grid flex-grow place-items-start">
                            <h1 class="text-4xl font-semibold">{{ $faculty->name }}</h1>
                        </div>
                        <div class="grid flex-grow place-items-end">
                            <div class="flex flex-col lg:flex-row">
                                <div class="grid flex-grow mr-2">
                                    <a href="{{ route('faculties.index') }}">
                                        <button class="btn rounded-full btn-black font-bold btn-sm text-white"><img class="w-6 h-6" src="{{ asset('img/icon-back.png') }}" alt=""></button>
                                    </a>
                                </div>
                                <div class="grid flex-grow mr-2">
                                    <a href="{{ route('faculties.edit', [$faculty]) }}">
                                        <button class="btn rounded-full btn-accent font-bold btn-sm text-white"><img class="w-5 h-5" src="{{ asset('img/icon-edit.png') }}" alt=""></button>
                                    </a>
                                </div>
                                <div class="grid flex-grow">
                                    <form action="{{ route('faculties.destroy', [$faculty]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn rounded-full btn-error font-bold btn-sm text-white hover:bg-red-500" value="{{ $faculty->id }}"
                                            onclick="return confirm('Yakin ingin menghapus data ?');"><img class="w-5 h-5" src="{{ asset('img/icon-delete.png') }}" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <a href="{{ route('faculties.departments.index', [$faculty]) }}">
                            <button class="btn btn-black hover:bg-white hover:text-black text-white font-bold rounded border-black border-2 hover:border-black btn-sm mt-8">Manage Department</button>
                        </a>
                    </div>
                    <div class="overflow-x-auto py-4">
                        <table class="table w-full">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Department</th>
                                    <th>Nama Program Studi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($departments as $department)
                                    <tr>
                                        <th>{{ $i }}</th>
                                        <td>{{ $department->name }}
                                            <div class="flex items-strecth">
                                                <a href="{{ route('faculties.departments.study-programs.index', [$faculty, $department]) }}">
                                                    <button class="btn btn-black hover:bg-white hover:text-black text-white font-bold rounded border-black border-2 hover:border-black btn-xs">Manage Prodi</button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-strecth">
                                                <table class="w-full">
                                                    <!-- head -->
                                                    <thead>
                                                        {{-- <tr>
                                                            <th>Nama Program Studi</th>
                                                        </tr> --}}
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $j = 1;
                                                        $studyProgramss = $studyPrograms->where('department_id', $department->id);
                                                        ?>
                                                        @foreach ($studyProgramss as $studyprogram)
                                                            <tr>
                                                                {{-- <th>{{ $j }}</th> --}}
                                                                <td>{{ $studyprogram->name }}</td>
                                                                {{-- <td>
                                                                    
                                                                </td> --}}
                                                            </tr>
                                                            <?php $j++; ?>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-5">
                            {{ $departments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
