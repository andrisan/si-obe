@section('pageTitle', "Tambah CPL")
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Membuat Capaian Pembelajaran Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-center pt-10">
                        <div class="bg-white mx-auto formCard">
                            <div class="items-left">
                                <h2 class="font-semibold text-3xl text-center">Masukkan Capaian Pembelajaran Baru Anda
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-left justify-left">
                        <form action="{{route('syllabi.ilos.store',[$syllabus])}}" method="post">
                            @csrf
                            <h3 class="font-semibold text-md pt-4 tracking-widest ml-4 lg:ml-14 lg:text-lg  text-black">
                                POSISI</h3>
                            <input type="text" name="position" id="position" placeholder="Ketik di sini..."
                                class="input input-bordered font-regular lg:ml-14 lg:w-[30vw] text-base w-[40vw] ml-4 border-[3px] border-solid bg-white mt-4" />
                            @error('position')
                            <div class=" text-red-600 ml-14">{{$message}}</div>
                            @enderror
                            <h3 class="font-semibold text-md pt-4 tracking-widest ml-4 lg:ml-14 lg:text-lg  text-black">
                                DESKRIPSI</h3>
                            <textarea
                                class="textarea textarea-bordered w-[70vw] ml-4 lg:ml-14 border-[3px] border-solid bg-white mt-4 h-[266px] resize-none font-regular text-base"
                                name="description" id="description" placeholder="Ketik di sini..."></textarea>
                            @error('description')
                            <div class=" text-red-600 ml-14">{{$message}}</div>
                            @enderror
                            <br>
                            <div class="mt-5 ml-10 pl-2">
                                <button type="submit" name="submit" id="submit"
                                    class="mr-4 btn rounded-md hover:bg-slate-200 hover:text-black">Save</button>
                                <a href="{{route ('syllabi.ilos.index',[$syllabus])}}"
                                    class="btn btn-outline rounded-md "> Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
