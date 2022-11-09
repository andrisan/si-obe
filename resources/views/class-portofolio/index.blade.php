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
        <h1 class="text-4xl font-extrabold sm:pl-14 pt-10 text-center text-black">PORTOFOLIO KELAS</h1>
    </div>

    <div class="flex mt-10">
        <table class="table-fixed w-3/4 mx-auto">
            <thead class="text-black">
                <tr class="h-10">
                    <th rowspan="2" class="w-10 border-x-2 border-t-2 border-black">No</th>
                    <th rowspan="2" class="w-[35rem] border-x-2 border-t-2 border-black">Sub-Capaian Mata Kuliah</th>
                    <th colspan="10" class="w-[35rem] border-2 border-t-2 border-black">Bobot(%)</th>
                    <th rowspan="2" class="w-44 border-x-2 border-t-2 border-black">Jumlah Mahasiswa</th>
                    <th rowspan="2" class="w-44 border-x-2 border-t-2 border-black">Jumlah Mahasiswa Lulus</th>
                    <th rowspan="2" class="w-44 border-x-2 border-t-2 border-black">Persentase Mahasiswa Lulus</th>
                    <th rowspan="2" class="w-44 border-x-2 border-t-2 border-black">Persentase Mahasiswa Tidak Lulus</th>
                </tr>
                <tr class="border-x-2 border-black h-10">
                    <th class="border-x-2 border-black">LK-01</th>
                    <th class="border-x-2 border-black">LK-02</th>
                    <th class="border-x-2 border-black">LK-03</th>
                    <th class="border-x-2 border-black">LK-04</th>
                    <th class="border-x-2 border-black">LK-05</th>
                    <th class="border-x-2 border-black">LK-06</th>
                    <th class="border-x-2 border-black">LK-07</th>
                    <th class="border-x-2 border-black">LK-08</th>
                    <th class="border-x-2 border-black">UTS</th>
                    <th class="border-x-2 border-black">UAS</th>
                </tr>
            </thead>
            <tbody class="text-center text-black">
                <tr class="border-2 border-black h-14">
                    <td class="border-2 border-black">1</td>
                    <td class="text-justify px-3 border-2 border-black">Mahasiswa mampu memahami konsep website dinamis</td>
                    <td class="border-2 border-black">10</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">2,5</td>
                    <td class="border-2 border-black">0</td>
                    <td rowspan="8" class="border-2 border-black">40</td>
                    <td rowspan="8" class="border-2 border-black">40</td>
                    <td rowspan="8" class="border-2 border-black">100%</td>
                    <td rowspan="8" class="border-2 border-black">0%</td>
                </tr>
                <tr class="border-2 border-black h-14">
                    <td class="border-2 border-black">2</td>
                    <td class="text-justify px-3 border-2 border-black">Mahasiswa mampu memahami perbedaan website dinamis dan statis</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">10</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">2,5</td>
                    <td class="border-2 border-black">0</td>
                </tr>
                <tr class="border-2 border-black h-14">
                    <td class="border-2 border-black">3</td>
                    <td class="text-justify px-3 border-2 border-black">Mahasiswa mampu memahami dan mengimplementasikan server-side-scripting untuk membuat website</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">10</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">2,5</td>
                    <td class="border-2 border-black">0</td>
                </tr>
                <tr class="border-2 border-black h-14">
                    <td class="border-2 border-black">4</td>
                    <td class="text-justify px-3 border-2 border-black">Mahasiswa mampu mengimplementasikan server-side-scripting untuk mengelola file di server</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">10</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">2,5</td>
                    <td class="border-2 border-black">0</td>
                </tr>
                <tr class="border-2 border-black h-14">
                    <td class="border-2 border-black">5</td>
                    <td class="text-justify px-3 border-2 border-black">Mahasiswa mampu mengimplementasikan server-side-scripting untuk mengelola data di database</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">10</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">2,5</td>
                </tr>
                <tr class="border-2 border-black h-14">
                    <td class="border-2 border-black">6</td>
                    <td class="text-justify px-3 border-2 border-black">Mahasiswa mampu memahami konsep MVC</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">10</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">2,5</td>
                </tr>
                <tr class="border-2 border-black h-14">
                    <td class="border-2 border-black">7</td>
                    <td class="text-justify px-3 border-2 border-black">Mahasiswa mampu memahami dan mengimplementasikan salah satu framework PHP untuk membuat website dinamis</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">10</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">2,5</td>
                </tr>
                <tr class="border-2 border-black h-14">
                    <td class="border-2 border-black">8</td>
                    <td class="text-justify px-3 border-2 border-black">Mahasiswa mampu mengimplementasikan teknologi AJAX untuk membuat website</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">10</td>
                    <td class="border-2 border-black">0</td>
                    <td class="border-2 border-black">2,5</td>
                </tr>
            </tbody>
          </table>
      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
