<script src="https://kit.fontawesome.com/01f732cd61.js" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Classes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-20">
                    <div class="flex justify-between border-b-2 pb-4 ">
                        <div class="judul text-black  ">
                            <h1 class="text-2xl font-extrabold" style="font-weight: 900;">Course Classes</h1>
                        </div>
                    </div>
            
                    <nav class="">
                        <ul class="flex space-x-2 font-extrabold">
                            <li class="text-[#2E65F3]">Course Classes <span class="mx-2">/</span> </li>
                            <li class="text-black"> Join <span class="mx-2"></span> </li>
                        </ul>
                    </nav>
                    
                    <div class="matkul py-10">
                        <h1 class=""><i class="fa-solid fa-book-open text-black"></i> <span class="mt-2 text-black text-3xl ml-5 font-extrabold">Pengembangan Aplikasi Web</span></h1>
                        <h1 class="mt-5 ml-16">Teacher : <span class="text-black font-bold">Andri Santoso, S.Kom, M.Sc</span></h1>
                    </div>

                    <div class="student border-b-2 w-fit text-black">
                        <h1 class=""><i class="fa-solid fa-chevron-down"></i> <span class="text-3xl ml-5">Self Enrolment (Student)</span> </h1>
                        <div class="flex"><h1 class=""><i class="fa-solid fa-key"></i> <span class="ml-5">Enrolment Key</span></h1>
                        <form action="block">
                            <input class="border-[#2E65F3] ml-72 rounded-md " type="text" name="" id="">
                            <button class="btn bg-[#2E65F3] text-white font-semibold border-none mt-5 ml-72 block">Enrol Me</button>
                        </form>
                        </div>
                        
                    </div>
                    <div class="student border-b-2 w-fit text-black mt-16">
                        <h1 class=""><i class="fa-solid fa-chevron-down"></i> <span class="text-3xl ml-5">Self Enrolment (Teacher)</span> </h1>
                        <div class="flex"><h1 class=""><i class="fa-solid fa-key"></i> <span class="ml-5">Enrolment Key</span></h1>
                        <form action="block">
                            <input class="border-[#2E65F3] ml-72 rounded-md " type="text" name="" id="">
                            <button class="btn bg-[#2E65F3] text-white font-semibold border-none mt-5 ml-72 block">Enrol Me</button>
                        </form>
                        </div>
                        
                    </div>
                    
            
                    
                    
    </div>
</x-app-layout>