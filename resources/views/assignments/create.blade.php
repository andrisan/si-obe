<?php
    use App\Models\AssignmentPlan;
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{ route('course-classes.assignments.store', [$courseClass, $assignment]) }}">
                @csrf
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex ">
                        
                        <div class="text-2xl font-bold ">
                            <h1>Assignments Create</h1>
                        </div>
                    </div>
    
                    <div class="flex flex-row flex-wrap justify-between px-10 pt-10 ">
                        <div class=" ">
                            <div class="pt-1">
    
                                <div class=" ">
                                    <h1 class="font-bold py-2 ">Assignment Plan</h1>
                                    <div class="form-control w-full lg:w-[28.5rem] ">
                                    <select name="assignment_plan_id" class="select select-bordered"> 
                                            @foreach (AssignmentPlan::all() as $ap)
                                                <option value="{{ old('assignment_plan-id',(int)$ap->id)}}">{{$ap->title }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('assignment_plan_id')" class="mt-2" />
                                    </div>
                                </div>
    
                                <div class="tenggat">
                                    <h1 class="font-bold py-2">Deadline</h1>
    
                                    <div class="flex-row flex gap-10">
                                        <div class="1">
                                            <input type="datetime-local" placeholder="Type here"
                                                name="assigned_date" class="input input-bordered w-full max-w-xs ">
                                            <x-input-error :messages="$errors->get('assigned_date')" class="mt-2" />
                                        </div>
    
                                        <h1 class="font-bold text-3xl" style="margin-right:-1.5rem; margin-left:-1.25rem;">-
                                        </h1>
                                        <div class="2">
                                            <input type="datetime-local" placeholder="Type here"
                                                name="due_date" class="input input-bordered w-full max-w-xs ">
                                            <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
                                        </div>
    
                                    </div>
                                </div>
    
                            </div>
    
    
                        </div>
    
                        <!-- Batas Flex-row -->
    
                        <!-- bawahan -->
                        <div class="flex flex-col">
                            <div class="judul font-bold pt-2">
                                <h1>Note</h1>
                            </div>
                            <div class="py-2">
                                <div><textarea class=" textarea textarea-bordered lg:w-[40rem] sm:w-[39rem] w-[25.5rem]
                                h-64" name="note" placeholder="Note"></textarea>
                                <x-input-error :messages="$errors->get('note')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tombol justify-end flex flex-row gap-2 py-5 px-10">
                        <a href="/course-classes/{course-class}/assignments"><button class="btn btn-outline btn-error w-24">Cancel</button></a>
                        <button class="btn btn-active btn-primary w-24">Save</button>
                    </div>
                </div>
            </form>

        </div>
</x-app-layout>