<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fakultas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div data-theme="light" class="p-10">
                    <div class="grid">
                        <div class="grid justify-start">
                            <h1 class="text-4xl font-semibold">Daftar Fakultas</h1>
                        </div>
                        <div class="grid justify-end">
                            <button class="btn btn-accent font-bold text-black ">
                                <a href="{{ route('faculties.create') }}">Tambah</a>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto py-4">
                        <table class="table table-zebra w-full">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Fakultas</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($faculties as $faculty)
                                    <tr>
                                        <th>{{ $i }}</th>
                                        <td>{{ $faculty->name }}</td>
                                        <td>
                                            <div class="flex items-strecth">
                                                {{-- <form action="faculties/{{ $faculty->id }}/edit" method="get">
                                                    <button class="btn btn-warning btn-sm m-1"
                                                        value="{{ $faculty->id }}">Edit</button>
                                                </form>
                                                <form action="faculties/{{ $faculty->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-error btn-sm m-1" value="{{ $faculty->id }}"
                                                        onclick="return confirm('Yakin ingin menghapus data ?');">Delete</button>
                                                </form> --}}
                                                <a href="{{ route('faculties.show', [$faculty]) }}">
                                                    <button class="btn btn-warning btn-sm m-1">Detail</button>
                                                </a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>