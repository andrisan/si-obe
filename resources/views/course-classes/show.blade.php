<?php
use Carbon\Carbon;
?>
@section('pageTitle', $courseClass->name)
<x-app-layout>
    <div class="hero min-h-64 bg-blue-900 text-white" >
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md p-5">
                <h1 class="mb-5 text-5xl font-bold">{{ $courseClass->name }}</h1>
                <p class="mb-5">{{ $courseClass->course->name }}</p>
            </div>
            @canany(['is-teacher', 'is-admin'])
            <div class="flex flex-row justify-end mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
                <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                    <x-button-link href="{{ route('classes.edit', $courseClass) }}">
                        <i class="fa fa-edit"></i> {{ __('Edit') }}
                    </x-button-link>
                </div>
            </div>
            @endcanany
        </div>
    </div>
    <div class="max-w-7xl mx-auto py-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <div class="bg-white p-5 overflow-hidden shadow-sm sm:rounded-lg">
                    <h2>Class Information</h2>
                    <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>{{ __('Class code') }}</span>
                            <span class="ml-auto">{{ $courseClass->class_code }}</span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>{{ __('Syllabus') }}</span>
                            <span class="ml-auto">
                                @if($courseClass->syllabus)
                                    <a href="{{ route('syllabi.show', $courseClass->syllabus) }}" class="text-blue-700 hover:text-blue-600">{{ $courseClass->syllabus->title }}</a>
                                @else
                                    <span class="text-gray-400">Not set</span>
                                @endif
                            </span>
                        </li>
                    </ul>
                    @canany(['is-teacher', 'is-admin'])
                    <div class="flex flex-col gap-2 mt-3">
                        <a href="{{ route('classes.members.show', $courseClass) }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="pr-1">
                                    <i class="fa-solid fa-users-rectangle"></i> Members
                                </span>
                        </a>
                    </div>
                    @endcanany
                </div>
                @canany(['is-teacher', 'is-admin'])
                    <div class="bg-white p-5 mt-5 overflow-hidden shadow-sm sm:rounded-lg">
                        <h2>Portofolio</h2>
                        <div class="flex flex-col gap-2 mt-3">
                            <a href="{{ route('class-portofolio.index', $courseClass) }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="pr-1">
                                    <i class="fa-solid fa-bullseye"></i> LLO Portofolio
                                </span>
                            </a>
                            <a href="{{ route('class-portofolio.student', $courseClass) }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="pr-1">
                                    <i class="fa-solid fa-graduation-cap"></i> Students Portofolio
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="bg-white p-5 mt-5 overflow-hidden shadow-sm sm:rounded-lg">
                        <h2>Class Setting</h2>
                        <div class="flex flex-col gap-2 mt-3">
                            <a href="{{ route('classes.setting.edit', $courseClass) }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="pr-1">
                                <i class="fa-solid fa-gear"></i> Setting
                            </span>
                            </a>
                        </div>
                    </div>
                @endcanany
                <!-- End of profile card -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-full overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex w-full grid-flow-row grid-cols-12 items-start gap-4">
                    <div class="bg-base-100 rounded-box col-span-3 row-span-3 mx-2 flex w-72 flex-shrink-0 flex-col justify-center gap-4 p-4 shadow-xl xl:mx-0 xl:w-full">
                        <div class="flex flex-row justify-between mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
                            <h2 class="text-xl font-extrabold py-2">
                                {{ __('Assignments') }}
                            </h2>
                            @canany(['is-teacher', 'is-admin'])
                            <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                                <x-button-link href="{{ route('classes.assignments.create', $courseClass) }}">
                                    <i class="fa fa-plus"></i> {{ __('Create New Assignment') }}
                                </x-button-link>
                            </div>
                            @endcanany
                        </div>
                        @if(Session::has('error'))
                        <div class="alert alert-warning shadow-lg">
                           <div>
                               <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                               <span>{{ Session::get('error') }}. Create one <a href="{{ route('syllabi.assignment-plans.create', $courseClass->syllabus) }}" class="font-bold text-gray-800">here</a></span>
                            </span>
                           </div>
                        </div>
                        @endif
                        @if($assignments->count() > 0)
                        <div class="grid grid-cols-1 gap-2 text-base-content">
                            @foreach($assignments as $assignment)
                                    <div class="p-3 w-full border border-gray-200 rounded-2xl hover:bg-red-50">
                                        <a href="{{ route('classes.assignments.show', [$courseClass, $assignment]) }}">
                                            <div class="text-left text-neutral-content py-3 px-5">
                                                <div class="flex flex-row gap-5">
                                                    <div class="logo">
                                                        <button class="btn btn-circle  ">
                                                            <img src="https://cdn-icons-png.flaticon.com/512/207/207470.png?w=740&t=st=1669015753~exp=1669016353~hmac=2991b15d942ead62d75ed6ccc0e0eb7836618254cd37e0112ac7b3e943abed75"
                                                                 alt="" class="w-6">

                                                        </button>
                                                    </div>
                                                    <div class="truncate">
                                                        <h1 class="truncate text-[16px] font-bold text-black ">
                                                            {{ $assignment->assignmentPlan->title??null }}</h1>
                                                        <p class="  text-black">
                                                            {{ Carbon::parse( $assignment->assigned_date)->format("M d, Y") }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                        </div>
                        @else
                            <div class="p-3 text-center">
                                <p class="text-gray-500">{{ __('No assignments found.') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
