    @section('pageTitle', 'Faculty')
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
                            <a href="{{ route('faculties.create') }}">
                            <button class="btn btn-black hover:bg-white hover:text-black text-white font-bold rounded border-black border-2 hover:border-black mb-2 btn-md">Tambah Fakultas</button>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto py-4">
                        <table class="table table-zebra w-full">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Fakultas</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faculties as $faculty)
                                    <tr>
                                        <td>{{ $loop->index + $faculties->firstItem() }}</td>
                                        <td><a href="{{ route('faculties.show', [$faculty]) }}">{{ $faculty->name }}</a></td>
                                        <td class="text-center">
                                            <div class="flex justify-center">
                                                <a href="{{ route('faculties.edit', [$faculty]) }}">
                                                    <button class="btn bg-orange-600 hover:bg-orange-700 hover:text-orange-600 rounded-full border-orange-600 border-2 hover:border-orange-700 btn-sm"><img class="w-5 h-5" src="{{ asset('img/icon-edit.png') }}" alt=""></button>
                                                </a>
                                            </div>
                                            <div class="flex justify-center mt-2">
                                                <form action="{{ route('faculties.destroy', [$faculty]) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn rounded-full btn-error font-bold btn-sm text-white hover:bg-red-500" value="{{ $faculty->id }}"
                                                        onclick="return confirm('Yakin ingin menghapus data ?');"><img class="w-5 h-5" src="{{ asset('img/icon-delete.png') }}" alt="">
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- <?php $i++; ?> --}}
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <div class="mt-5">
                            {{ $faculties->links() }}
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
