<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    <div class="py-5 px-20">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  shadow-sm sm:rounded-lg">
                <div class="p-10     bg-white border-b border-gray-200">

                    <div class="text-center">
                        <h1 class="text-black text-3xl text-center mx-auto justify-center font-extrabold">LEMBAR PENILAIAN PORTOFOLIO
                        </h1>
                    </div>
                    <div class="ml-10 mt-14">
                      
                        <div class="flex text-black">
                            <h1>Mata Kuliah <span class="pl-[6.1rem]">:</span></h1>
                            <p class="ml-2">{{ $cc->course->name }}</p>
                        </div>
                        <div class="flex text-black justify-between">
                            <h1 class="flex">Jumlah SKS <span class="pl-[6.5rem]">:</span>
                            <p class="ml-2">{{ $cc->course->course_credit }} SKS</p>
                            </h1>
                            <h1 class="mr-10">Kelas: {{ $cc->name }}</h1>
                        </div>
                        
                        <div class="mt-2    py-20 ">
                            <style>
                                .border-{
                                    background: black;
                                }
                                table , th, td{
                                    border: black 2px solid;
                                } 
                            </style>

                            <table class="w-full border-colapse border-2 border-black" border="1" cellpadding="15">
                                <tr>
                                    <th rowspan="2" bgcolor="#AFC7F5">NO</th>
                                    <th rowspan="2" bgcolor="#AFC7F5">NAMA
                                    </th>
                                    <th rowspan="2" bgcolor="#AFC7F5">NIM
                                    </th>
                                    <th colspan="{{ $llo->count() }}" bgcolor="#AFC7F5">SUB-CPMK</th>
                                    <th rowspan="2" bgcolor="#AFC7F5">TOTAL NILAI</th>
                                    <th rowspan="2" bgcolor="#AFC7F5">NILAI AKHIR</th>

                                </tr>
                                
                                <tr>
                                    @foreach ($llo as $llo)

                                    <th bgcolor="#AFC7F5">
                                        <div class="tooltip tooltip-top cursor-pointer"
                                            data-tip="{{ $llo->description }}">
                                            {{ $llo->id }}
                                        </div>
                                    </th>
                                    @endforeach
                                </tr>

                                <?php $i = 1; ?>
                                @foreach ($userData as $data)
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td class="text-center">{{ $data['name'] }}</td>
                                    <td class="text-center">{{ $data['nim'] }}</td>
                                    @foreach ($data['cpmk'] as $cpmk)
                                    {{-- <td class="text-center">{{ round($cpmk['point'] / $cpmk['maxPoint'] * 100, 2)
                                        }}%</td> --}}
                                    <td class="text-center">{{ $cpmk['point'] }}</td>
                                    @endforeach
                                    <?php
                                    $totalPoint = $data['cpmk']->sum('point');
                                    
                                    if ($totalPoint > 80 ) {
                                        $pointLetter = 'A';
                                    }
                                    elseif ($totalPoint > 75) {
                                        $pointLetter = 'B+';
                                    }
                                    elseif ($totalPoint > 69) {
                                        $pointLetter = 'B';
                                    }
                                    elseif ($totalPoint > 60) {
                                        $pointLetter = 'C+';
                                    }
                                    elseif ($totalPoint > 55) {
                                        $pointLetter = 'C';
                                    }
                                    elseif ($totalPoint > 50) {
                                        $pointLetter = 'D+';
                                    }
                                    elseif ($totalPoint > 44) {
                                        $pointLetter = 'D';
                                    }
                                    else {
                                        $pointLetter = 'E';
                                    }
                                    ?>
                                    <td class="text-center">{{ $totalPoint }}</td>
                                    <td class="text-center">{{ $pointLetter }}</td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                                </tfoot>
                            </table>
                               
                    </div>
                  </div>




                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
