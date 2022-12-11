<title>Class Portofolio {{ $cc->title }}</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Portofolio Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="items-center">
                        <h1 class="text-4xl font-extrabold sm:pl-14 pt-10 text-center text-black">KELAS
                            {{ strtoupper($cc->name) }}</h1>
                    </div>

                    <div class="flex flex-col mt-10">
                        <table class="table-fixed  mx-auto">
                            <thead class="text-black">
                                <tr class="h-10">
                                    <th rowspan="2" class="w-10 border-x-2 border-t-2 border-black">No</th>
                                    <th rowspan="2" class="w-[50rem] border-x-2 border-t-2 border-black">Sub-Capaian
                                        Mata Kuliah</th>
                                    <th class="w-[10rem] border-2 border-t-2 border-black">Tingkat Keberhasilan*</th>
                                </tr>
                            </thead>
                            <tbody class="text-center text-black">
                                <?php $i = 1; ?>
                                @foreach ($lloTotalPoint as $llo)
                                    <tr class="border-2 border-black h-14">
                                        <td class="border-2 border-black">{{ $i }}</td>
                                        <td class="text-justify px-3 border-2 border-black">{{ $llo['description'] }}
                                        </td>
                                        <td class="border-2 border-black">{{ round($llo['lulus'] / $cc->students->count() * 100, 2) }} %</td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="mx-20">*tingkat keberhasilan dengan threshold 50%</p>
                    </div>
                    <div class="mt-10">
                        <table class="table-fixed  mx-auto">
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
            </div>
        </div>
    </div>
</x-app-layout>
