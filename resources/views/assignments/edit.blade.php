<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex ">
                    <div class="text-2xl font-bold ">

                        <h1>Assignments Edit</h1>
                    </div>
                </div>

                <div class="flex flex-row flex-wrap justify-between px-10 pt-10 ">
                    <!--  -->

                    <!--  -->
                    <div class=" ">
                        <div class="pt-1">

                            <div class=" ">
                                <h1 class="font-bold py-2 ">Assignments Plan</h1>
                                <div class="form-control w-full lg:w-[28.5rem]">

                                    <select class="select select-bordered">
                                        <option>Assignment Plan 1</option>
                                        <option>Assignment Plan 2</option>
                                        <option>Assignment Plan 3</option>
                                        <option>Assignment Plan 4</option>
                                        <option>Assignment Plan 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="py-4 ">
                                <div class=" ">
                                    <h1 class="font-bold py-2">Course Class</h1>
                                    <div class="form-control w-full lg:w-[28.5rem]">
                                        <select class="select select-bordered">
                                            <option>Pengembangan Aplikasi Website - A</option>
                                            <option>Pengembangan Aplikasi Website - B</option>
                                            <option>Pengembangan Aplikasi Website - C</option>
                                            <option>Pemrograman Basis Data - A</option>
                                            <option>Pemrograman Basis Data - B</option>
                                            <option>Pemrograman Basis Data - C</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="tenggat">
                                <h1 class="font-bold py-2">Deadline</h1>
                                <div class="flex-row flex gap-10">
                                    <div class="1">
                                        <input type="datetime-local" placeholder="Type here"
                                            class="input input-bordered w-full max-w-xs ">
                                    </div>
                                    <h1 class="font-bold text-3xl" style="margin-right:-1.5rem; margin-left:-1.25rem;">-
                                    </h1>
                                    <div class="2">
                                        <input type="datetime-local" placeholder="Type here"
                                            class="input input-bordered w-full max-w-xs ">
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
                            <div><textarea class=" textarea textarea-bordered lg:w-[40rem] sm:w-[44rem] w-[28.5rem]
                            h-64" placeholder="Note">Harus melakukan tugas ini</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tombol justify-end flex flex-row gap-2 py-5 px-10">
                    <button class="btn btn-outline btn-error w-24">Cancel</button>
                    <button class="btn btn-info  w-24">Save</button>
                </div>
            </div>
        </div>

</x-app-layout>