@php use Carbon\Carbon; @endphp

@section('pageTitle', "$courseClass->name Assigment")

<x-app-layout>
    <x-slot name="header">

        <div class="flex flex-row gap-4">
            <div class="ke-1 mt-0">
                <button class="btn btn-circle btn-outline btn-sm">
                    <a href="{{ route('classes.index') }}">
                        <img src="https://cdn-icons-png.flaticon.com/512/190/190238.png?w=740&t=st=1668970333~exp=1668970933~hmac=be329b3d7ed69e55649200287d39a96f6c1d5dd035b7c530dbfadc51480a1754"
                            alt="" class="w-4">
                    </a>
                </button>
            </div>
            <div class="ke-2 mt-[4px]">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __(' Assignment Class')}}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-center bg-no-repeat bg-cover rounded-xl "
                        style="background-image: url({{ $courseClass->thumbnail_img}}); position:relative; ">
                        <div class="py-32 px-5 text-neutral-content align-text-center">
                            <div class="max-w-md ">
                                <h1 class=" text-5xl font-bold" style="position:absolute; bottom:12px; left:15px;">
                                    {{ $courseClass->name }}</h1>

                            </div>
                        </div>
                    </div>

                    <div class=" mt-10 border-2 border-gray-200 shadow-md rounded-2xl bg-gray-100	 ">
                        <a href="{{ route('course-classes.assignments.create', [$courseClass]) }}">
                            <div class="text-left text-neutral-content py-3 px-5 hover:bg-gray-200">
                                <div class="flex flex-row gap-5">
                                    <div class="flexke1 ">
                                        <button class="btn btn-circle btn-outline hover:-translate hover:scale-125">
                                            <img src="https://cdn-icons-png.flaticon.com/512/1089/1089316.png?w=740&t=st=1668966431~exp=1668967031~hmac=24ef8490194d8710c68796314f0efdef3096981619966e5a9afb9b4cf2abfd04" 
                                                alt="" class="w-6">
                                        </button>
                                    </div>
                                    <div class="flexke2 pt-3 ">
                                        <div class="truncate">
                                            <h1 class="truncate text-lg font-bold text-black hover:text-orange-600">
                                                Tambah Assignment
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php $i = 1 ?>
                    @foreach($assignments as $assignment)
                        <div class=" mt-6 border-2 border-gray-200  rounded-2xl  hover:bg-red-50 hover:scale-[1.03] duration-100">
                            <a href="assignments/{{ $assignment->id }}">
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
                        <?php $i++ ?>
                    @endforeach

                </div>
            </div>
            <div class="mt-5">
                {{ $assignments->links() }}
            </div>
        </div>
    </div>
</x-app-layout>