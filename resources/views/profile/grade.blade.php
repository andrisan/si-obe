<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile Grade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-span-3 p-10 shadow-xl justify-items-auto overflow-y-auto">
                        <!--"text-4xl font-semibold text-primary-content">Student Grade - Assignment 1</h1>-->
                        <div class="overflow-x-auto py-4">
                            <table class="table-zebra w-full">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode</th>
                                        <th>NAMA MATA KULIAH</th>
                                        <th>SKS</th>
                                        <th>NILAI</th>
                                        <th>NILAI HURUF</th>
                                        <th>Detail Nilai Lembar Kerja</th>
                                        <th>Detail Nilai Sub CPMK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; $totalCredit = 0?>
                                    @foreach ($user->courseClass as $cc)
                                    <?php $totalCredit += $cc->course->course_credit; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $cc->course->code }}</td>
                                        <td>{{ $cc->course->name }}</td>
                                        <td>{{ $cc->course->course_credit }}</td>
                                        <td>{{ $grade }}</td>
                                        <td>{{ $gradeLetter }}</td>
                                        <td>
                                            <!--<button class="btn btn-success btn-sm">Tampilkan</button>-->
                                            <!-- The button to open modal -->
                                            <label for="my-modal-3" class="btn">Tampilkan</label>

                                            <!-- Put this part before </body> tag -->
                                            <input type="checkbox" id="my-modal-3" class="modal-toggle" />
                                            <div class="modal  mx-auto ">
                                                <div class="modal-overlay relative    mx-auto">

                                                    <div class="modal-box mx-auto w-[80rem]  ">
                                                        <table class=" w-[100%] ">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th class="text-lg font-bold" colspan="1">Detail Nilai Lembar Kerja</th>
                                                                    <th class="text-lg font-bold" colspan="1"><label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2 fixed">✕</label></th>
                                                                </tr>
                                                                <tr class="">
                                                                    <th>No</th>
                                                                    <th class="w-80">Lembar Kerja</th>
                                                                    <th>NILAI</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $j = 1; ?>
                                                                @foreach ($cc->assignments as $ass)
                                                                <tr>
                                                                    <td>{{ $j }}</td>
                                                                    <td  >{{ $ass->assignmentPlan->title }}</td>
                                                                    <?php $point = 0; $maxPoint = 0;?>
                                                                    @foreach ($ass->studentGrades as $stud)
                                                                    <?php
                                                                        if ($stud->student_user_id != $user->id) {
                                                                            continue;
                                                                        }
                                                                        $point += $stud->criteriaLevel->point;
                                                                        $maxPoint += $stud->criteriaLevel->criteria->max_point;
                                                                        ?>
                                                                    @endforeach
                                                                    <td>{{ round($point / $maxPoint * 100, 2) }} %</td>
                                                                </tr>
                                                                <?php $j++; ?>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <!--<button class="btn btn-success btn-sm">Tampilkan</button>-->
                                            <!-- The button to open modal -->
                                            <label for="my-modal-2" class="btn">Tampilkan</label>

                                            <!-- Put this part before </body> tag -->
                                            <input type="checkbox" id="my-modal-2" class="modal-toggle" />
                                            <div class="modal">
                                                <div class="modal-overlay relative mx-auto ">
                                                    <div class=" modal-box mx-auto">
                                                        <table class="w-[100%]">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th class="text-lg font-bold" colspan="3">Detail Nilai Sub CPMK</th>
                                                                    <th class="text-lg font-bold" colspan="1">  <label for="my-modal-2" class="btn btn-sm btn-circle absolute right-4 -mt-7">✕</label></th>
                                                                </tr>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th class="w-96">Sub CPMK</th>
                                                                    <th class="w-24">NILAI</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $j = 1; ?>
                                                                @foreach ($llo as $llo)
                                                                <tr>
                                                                    <td>{{ $j }}</td>
                                                                    <td>{{ $llo->description }}</td>
                                                                    <?php $point = 0; $maxPoint = 0; ?>
                                                                    @foreach ($llo->criteria as $crit)
                                                                    <?php
                                                                        $maxPoint += $crit->max_point;
                                                                    ?>
                                                                    @foreach ($user->studentGrade as $stud)
                                                                    <?php
                                                                        if ($stud->criteriaLevel->criteria_id != $crit->id) {
                                                                            continue;
                                                                        }
                                                                        $point += $stud->criteriaLevel->point;
                                                                    ?>
                                                                    @endforeach
                                                                    @endforeach
                                                                    <td>{{ round($point / $maxPoint * 100, 2) }} %</td>
                                                                </tr>
                                                                <?php $j++; ?>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Jumlah SKS : </td>
                                        <td>{{ $totalCredit }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>


                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
