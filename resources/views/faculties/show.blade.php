<x-app-layout> 

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Fakultas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div data-theme="light" class="p-10">
                    <div class="grid">
                        <div class="grid justify-start">
                            <h1 class="text-4xl font-semibold">{{ $faculty->name }}</h1>
                        </div>
                        <div class="grid justify-end">
                            <a href="{{ route('faculties.edit', [$faculty]) }}">
                                <button class="btn btn-accent font-bold text-black">Edit</button>
                            </a>
                            <form action="{{ route('faculties.destroy', [$faculty]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-error btn-sm m-1" value="{{ $faculty->id }}"
                                    onclick="return confirm('Yakin ingin menghapus data ?');">Delete</button>
                            </form>
                            <a href="{{ route('faculties.index') }}">
                                <button class="btn btn-accent font-bold text-black">Back</button>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto py-4">
                        <table class="table table-zebra w-full">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Departemen</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1?>
                                @foreach ($departments as $department)
                                <tr>
                                    <th>{{ $i }}</th>
                                    <td>{{ $department->name }}</td>
                                    <td>
                                        <div class="flex items-strecth">
                                            <a href="{{ route('faculties.departments.index', [$faculty]) }}">
                                                <button class="btn btn-warning btn-sm m-1">Detail</button>
                                            </a>
                                            <table class="table table-zebra w-full">
                                                <!-- head -->
                                                <thead>
                                                    <tr>
                                                        <th>Nomor</th>
                                                        <th>Nama Program Studi</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $j = 1;
                                                    $studyProgramss = $studyPrograms->where('department_id', $department->id);
                                                    ?>
                                                    @foreach ($studyProgramss as $studyprogram)
                                                    <tr>
                                                        <th>{{ $j }}</th>
                                                        <td>{{ $studyprogram->name }}</td>
                                                        <td>
                                                            <div class="flex items-strecth">
                                                                <a href="{{ route('faculties.departments.study-programs.index', [$faculty, $department]) }}">
                                                                    <button class="btn btn-warning btn-sm m-1">Detail</button>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $j++?>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++?>
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