@section('pageTitle', 'LLO Portofolio'. ' - ' . $cc->name)
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-start gap-4">
            <x-back-link />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Class Portofolio') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto pb-16 sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('class-portofolio.index', $cc) }}
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
            <div class="flex justify-between">
                <p class="text-gray-500">* passing rate is counted using {{ $threshold }}% achievement of LLO performance per student</p>
                <a href="{{ route('class-portofolio.student', $cc) }}" class="text-blue-500">
                    <i class="fa-solid fa-graduation-cap"></i> Student portofolio
                </a>
            </div>
        </div>
        <div>
            <h1 class="text-2xl font-bold p-3 mt-5 text-gray-700">Summary</h1>
            <table class="table-fixed mx-auto">
                <tbody class="text-center text-black">
                <tr class="h-10">
                    <th class="w-[24rem] border border-gray-500">Number of Graduated Students</th>
                    <th class="w-[24rem] border border-gray-500">Number of Failed Students</th>
                    <th class="w-[24rem] border border-gray-500">Graduation Percentage (%)</th>
                    <th class="w-[24rem] border border-gray-500">Failure Percentage(%)</th>
                </tr>
                <tr class="border border-gray-500 h-14">
                    <td class="border border-gray-500">{{ $lulus }}</td>
                    <td class="border border-gray-500">{{ $gagal }}</td>
                    <td class="border border-gray-500">{{ round(($lulus / $studentSum) * 100, 2) }}%</td>
                    <td class="border border-gray-500">{{ round(($gagal / $studentSum) * 100, 2) }}%
                    </td>
                </tr>
                <tr class="border border-gray-500 h-14">
                    <td class="border border-gray-500 font-bold">Total Number of Students</td>
                    <td colspan="3" class="border border-gray-500">{{ $cc->students->count() }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
