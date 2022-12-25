<?php
    use App\Models\AssignmentPlan;
?>

@section('pageTitle', "Edit $courseClass->name Assigment")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Class')." : $courseClass->name" }}
        </h2>
    </x-slot>

    <div class="pb-10">
        <div class="max-w-7xl mx-auto px-8">
            {{ Breadcrumbs::render('assignments.edit', $courseClass, $assignment) }}
            @if(Session::has('error'))
                <div class="alert alert-warning shadow-lg my-4">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ Session::get('error') }}. Create one <a href="{{ route('syllabi.assignment-plans.create', $courseClass->syllabus) }}" class="font-bold text-gray-800">here</a></span>
                        </span>
                    </div>
                </div>
            @endif
            <form method="POST" action="{{ route('classes.assignments.update', [$courseClass, $assignment]) }}">
                @csrf
                @method('patch')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex ">
                        <div class="text-2xl font-bold ">
                            <h1>Assignments Edit</h1>
                        </div>
                    </div>

                    <div class="flex flex-row flex-wrap justify-between px-10 pt-10 ">
                        <div class=" ">
                            <div class="pt-1">
                                <div>
                                    <h1 class="font-bold">Assignment Plan</h1>
                                    <p class="text-gray-400 text-sm pb-2">Assignment plan can only be used once per class</p>
                                    <div class="form-control w-full lg:w-[28.5rem] ">
                                        <select name="assignment_plan_id" class="select select-bordered">
                                            <option disabled selected>Choose the assignment plan</option>
                                            @foreach ($availableAssignmentPlans as $ap)
                                                <option
                                                    value="{{ $ap->id }}" {{ (old("assignment_plan_id", $assignment->assignment_plan_id) == $ap->id ? "selected":"") }}>{{$ap->title }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('assignment_plan_id')" class="mt-2"/>
                                    </div>
                                </div>

                                <div class="tenggat">
                                    <h1 class="font-bold py-2">Deadline</h1>
                                    <div class="flex-row flex gap-10">
                                        <div class="1">
                                            <input type="datetime-local" placeholder="Type here" name="due_date"
                                                   class="input input-bordered w-full max-w-xs" value="{{  old('due_date', $assignment->due_date) }}">
                                            <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <div class="judul font-bold pt-2">
                                <h1>Note</h1>
                            </div>
                            <div class="py-2">
                                <div>
                                <textarea class="textarea textarea-bordered lg:w-[40rem] sm:w-[44rem] w-[28.5rem]
                                    h-64" placeholder="Note" name="note">{{  old('note', $assignment->note) }}</textarea>
                                    <x-input-error :messages="$errors->get('note')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 p-4 space-x-2">
                        <button type="submit" class="btn btn-sm px-7">
                            Save
                        </button>
                        <x-back-link>{{ __('Cancel') }}</x-back-link>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
