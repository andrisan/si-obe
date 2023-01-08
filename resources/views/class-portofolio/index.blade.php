@section('pageTitle', 'LLO Portofolio'. ' - ' . $courseClass->name)
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-start gap-4">
            <x-back-link />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Class Portofolio') }} - {{ $courseClass->name }}
            </h2>
        </div>
    </x-slot>

    @if(empty($lloThreshold))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center py-6">
                <h1 class="text-xl font-semibold p-2">LLO Portofolio Threshold is not set</h1>
                <p class="text-gray-500">Please set the LLO Portofolio Threshold in <a href="{{ route('classes.setting.edit', $courseClass) }}" class="text-blue-600">Class Settings</a></p>
            </div>
        </div>
    @else
        <div class="max-w-7xl mx-auto pb-16 sm:px-6 lg:px-8">
            {{ Breadcrumbs::render('class-portofolio.index', $courseClass) }}
            <div>
                @if($lloAchievements->count() > 0)
                    <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full bg-white table-striped relative">
                            <thead>
                            <tr class="text-left">
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">No</th>
                                <th colspan="2" class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">Lesson Learning Outcome (LLO)</th>
                                <th colspan="2" class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">Passing student*</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($lloAchievements as $llo)
                                <tr>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100 w-24">[{{ $llo->code }}]</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $llo->description }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100 w-32">
                                        <span class="font-semibold">{{ $llo->n_passed_student ?? 0 }}</span><span class="text-gray-400"> / {{ $totalStudentsCount }}</span>
                                    </td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100 font-semibold w-32">{{ round($llo->llo_accomplishment, 2) }} %</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex items-start gap-2 pl-2">
                            <p>* </p>
                            <p class="text-gray-500">
                                Passing student is a student who has LLO achievement greater than or equal to <span class="font-bold">LLO threshold of {{ $lloThreshold }}%</span><br>
                                <a href="{{ route('classes.setting.edit', $courseClass) }}" class="text-sm text-blue-500 hover:text-blue-600">change threshold</a>
                            </p>

                        </div>
                        <a href="{{ route('class-portofolio.student', $courseClass) }}" class="text-blue-500 pr-2">
                            <i class="fa-solid fa-graduation-cap"></i> Students Portofolio
                        </a>
                    </div>
                @else
                    <div class="text-center p-8 text-gray-500">
                        No Lesson Learning Outcome (LLO) has been set for the syllabus of this class.
                        Set it <a href="{{ route('syllabi.show', $courseClass->syllabus) }}" class="text-blue-500 hover:text-blue-600">here</a>.
                    </div>
                @endif
            </div>
        </div>
    @endif
</x-app-layout>
