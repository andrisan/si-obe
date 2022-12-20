@section('pageTitle', 'My Grades')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Grades') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('profile.grade') }}
        <div class="pb-8">
            <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                    <table class="border-collapse table-auto w-full bg-white table-striped relative">
                        <thead>
                        <tr class="text-left">
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">No</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">Course Name</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">Credits</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">Grade</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">Letter</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-80">Grade Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; $totalCredit = 0?>
                        @foreach ($user->courseClass as $cc)
                        <?php $totalCredit += $cc->course->course_credit; ?>
                            <tr>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $cc->course->name }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $cc->course->course_credit }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $grade }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $gradeLetter }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                    <label for="my-modal-3" class="btn">Per assignment</label>
                                    <input type="checkbox" id="my-modal-3" class="modal-toggle m-2" />
                                    <div class="modal mx-auto">
                                        <div class="modal-overlay relative mx-auto">
                                            <div class="modal-box mx-auto w-[80rem]  ">
                                                <div class="modal-header">
                                                    <h3 class="text-2xl font-semibold">Grade detail per assignment</h3>
                                                </div>
                                                <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2 fixed">✕</label>
                                                <table class=" w-[100%]">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th class="text-lg font-bold" colspan="1"></th>
                                                        <th class="text-lg font-bold" colspan="1"></th>
                                                    </tr>
                                                    <tr class="">
                                                        <th>No</th>
                                                        <th class="w-80">Lembar Kerja</th>
                                                        <th>NILAI</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $j = 1; $ungraded_assignment = 0;?>
                                                    @foreach ($cc->assignments as $ass)
                                                        <tr>
                                                            <td>{{ $j }}</td>
                                                            <td>{{ $ass->assignmentPlan->title }}</td>
                                                            <?php $point = 0; $maxPoint = 0;
                                                            foreach ($ass->studentGrades as $stud) {
                                                                if ($stud->student_user_id != $user->id) {
                                                                    continue;
                                                                }
                                                                $point += $stud->criteriaLevel->point;
                                                                $maxPoint += $stud->criteriaLevel->criteria->max_point;
                                                            }
                                                            if ($maxPoint == 0) {
                                                                $ungraded_assignment++;
                                                            }
                                                            ?>
                                                            <td class="text-center">{{ $maxPoint == 0 ? $maxPoint : round($point / $maxPoint * 100, 2) }} %</td>
                                                        </tr>
                                                            <?php $j++; ?>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <label for="my-modal-2" class="btn">Per LLO</label>
                                    <input type="checkbox" id="my-modal-2" class="modal-toggle m-2" />
                                    <div class="modal">
                                        <div class="modal-overlay relative mx-auto ">
                                            <div class=" modal-box mx-auto">
                                                <div class="modal-header">
                                                    <h3 class="text-2xl font-semibold">Grade detail per LLO</h3>
                                                </div>
                                                <label for="my-modal-2" class="btn btn-sm btn-circle absolute right-2 top-2 fixed">✕</label>
                                                <table class="w-[100%]">
                                                    <thead>
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

                                    <p class="badge badge-ghost badge-outline py-3 px-6 my-2">Grading Progress : {{ ($cc->assignments->count()-$ungraded_assignment)/$cc->assignments->count() * 100 }}%</p>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</x-app-layout>
