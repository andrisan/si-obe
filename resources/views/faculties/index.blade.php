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
                            <button class="btn btn-black hover:bg-white hover:text-black text-white font-bold rounded border-black border-2 hover:border-black mb-2 btn-dm">Tambah Fakultas</button>
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
                                <?php $i = 1; ?>
                                @foreach ($faculties as $faculty)
                                    <tr>
                                        <th>{{ $i }}</th>
                                        <td>{{ $faculty->name }}</td>
                                        <td class="text-center">
                                            <div class="flex     justify-center">
                                                <a href="{{ route('faculties.show', [$faculty]) }}">
                                                    <button class="btn bg-orange-600 hover:bg-white hover:text-orange-600 text-white font-bold py-2 px-4 rounded border-orange-600 border-2 hover:border-orange-600 btn-sm">Detail</button>
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
                        <div class="mt-5">
                            {{ $faculties->links() }}
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>