@section('pageTitle', 'LLO Portofolio'. ' - ' . $cc->name)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Class Portofolio') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto pb-16 sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('class-portofolios.index', $cc) }}
        <div>
            @if($lloTotalPoint->count() > 0)
                <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                    <table class="border-collapse table-auto w-full bg-white table-striped relative">
                        <thead>
                        <tr class="text-left">
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">No</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">LLO</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-48">Passing rate*</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($lloTotalPoint as $llo)
                            <tr>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $llo['description'] }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ round($llo['lulus'] / $cc->students->count() * 100, 2) }} %</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center p-8">
                    No LLO portofolio found.
                </div>
            @endif
            <p class="text-gray-500">* tingkat keberhasilan dihitung berdasarkan threshold kelulusan LLO 50%</p>
        </div>
        <div>
            <h1 class="text-2xl font-bold p-3 mt-5 text-gray-700">Summary</h1>
            <table class="table-fixed mx-auto">
                <thead class="text-black">
                <tr class="h-10">
                    <th class="w-[24rem] border-x-2 border-2 border-black">Jumlah Mahasiswa Lulus</th>
                    <th class="w-[24rem] border-x-2 border-2 border-black">Jumlah Mahasiswa Tidak Lulus
                    </th>
                    <th class="w-[24rem] border-2 border-2 border-black">Persentase Mahasiswa Lulus(%)
                    </th>
                    <th class="w-[24rem] border-2 border-2 border-black">Persentase Mahasiswa Tidak
                        Lulus(%)</th>
                </tr>
                </thead>
                <tbody class="text-center text-black">
                <tr class="border-2 border-black h-14">
                    <td class="border-2 border-black">{{ $lulus }}</td>
                    <td class="border-2 border-black">{{ $gagal }}</td>
                    <td class="border-2 border-black">{{ round(($lulus / $studentSum) * 100, 2) }}%</td>
                    <td class="border-2 border-black">{{ round(($gagal / $studentSum) * 100, 2) }}%
                    </td>
                </tr>
                <tr class="border-2 border-black h-14">
                    <td class="border-2 border-black font-bold">Jumlah Mahasiswa</td>
                    <td colspan="3" class="border-2 border-black">{{ $cc->students->count() }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
