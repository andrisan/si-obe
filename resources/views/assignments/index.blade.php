@php use Carbon\Carbon; @endphp
<x-app-layout>
    <x-slot name="header">

        <div class="flex flex-row gap-4">
            <div class="ke-1 mt-0">
                <button class="btn btn-circle btn-outline btn-sm">
                    <img src="https://cdn-icons-png.flaticon.com/512/190/190238.png?w=740&t=st=1668970333~exp=1668970933~hmac=be329b3d7ed69e55649200287d39a96f6c1d5dd035b7c530dbfadc51480a1754"
                        alt="" class="w-4">

                </button>

            </div>

            <div class="ke-2 mt-[4px]">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __(' Assignment Class')}}
                </h2>
            </div>
        </div>

    </x-slot>
    <!--     
    <div class="pb-5">
        <div class="text-sm breadcrumbs pl-8 pt-5 font-bold text-gray-600">
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="">Course</a></li>
                {{-- <li><a href="">{{ $assignment->find(1)->course_class_id }}</a></li> --}}
                <li><a href="">{{ $courseClass->name }}</a></li>
                <li class="text-blue-600">Assignment</li>
            </ul>
        </div>

    </div> -->
    <div class="py-5">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">
                        <div class=" bg-no-repeat rounded-xl bg-right"
                            style="background-image: url(https://c4.wallpaperflare.com/wallpaper/98/544/886/flash-drive-wallpaper-preview.jpg); background-color: red;">

                            <div class="hero-overlay bg-opacity-60"></div>
                            <div class="text-left text-neutral-content py-28 px-5">
                                <div class="">
                                    <h1 class="mt-20 text-5xl font-bold mb-3 ">{{ $courseClass->name }}</h1>
                                    <p class="mb-[-50px]"> TI - A | Jumat, 07:00 </p>


                                </div>
                            </div>
                        </div>


                    </div>

                    <div class=" mt-10 border-2 border-gray-200 shadow-md rounded-2xl bg-gray-100	 ">

                        <div class="hero-overlay bg-opacity-60">



                        </div>
                        <div class="text-left text-neutral-content py-6 px-6 hover:bg-gray-200">

                            <div class="flex flex-row gap-6">
                                <div class="flexke1 ">
                                    <a href="/course-classes/{course-class}/assignments/create
">
                                        <button class="btn btn-circle btn-outline hover:-translate hover:scale-125">
                                            <img src="https://cdn-icons-png.flaticon.com/512/1089/1089316.png?w=740&t=st=1668966431~exp=1668967031~hmac=24ef8490194d8710c68796314f0efdef3096981619966e5a9afb9b4cf2abfd04"
                                                alt="" class="w-6">

                                        </button>
                                    </a>
                                </div>

                                <div class="flexke2 pt-3 ">

                                    <div class="truncate">
                                        <h1 class="truncate text-xl font-bold text-black hover:text-orange-600">Tambah
                                            Assignment
                                        </h1>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $i = 1 ?>
                    @foreach($courseClass->assignments as $as)
                    <div
                        class=" mt-6 border-2 border-gray-200  rounded-2xl  hover:bg-red-50 hover:scale-[1.03]   duration-100  ">

                        <div class="hero-overlay bg-opacity-60">



                        </div>
                        <a href="assignments/{{ $as->id }}">
                            <div class="text-left text-neutral-content py-7 px-5">
                                <div class="flex flex-row gap-5">
                                    <div class="logo">
                                        <button class="btn btn-circle  ">
                                            <img src="https://cdn-icons-png.flaticon.com/512/207/207470.png?w=740&t=st=1669015753~exp=1669016353~hmac=2991b15d942ead62d75ed6ccc0e0eb7836618254cd37e0112ac7b3e943abed75"
                                                alt="" class="w-6">

                                        </button>

                                    </div>

                                    <div class="truncate">
                                        <h1 class="truncate text-[16px] font-bold text-black ">
                                            {{ $as->assignmentPlan->title??null }}</h1>
                                        <p class="  text-black">
                                            {{ Carbon::parse( $as->assigned_date)->format("M d, Y") }}</p>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>


                    <?php $i++ ?>
                    @endforeach

                </div>



            </div>
        </div>



    </div>
    </div>
    </div>


</x-app-layout>