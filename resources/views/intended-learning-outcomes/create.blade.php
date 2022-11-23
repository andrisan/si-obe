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
                            <h2 class="font-semibold text-3xl text-center">Masukkan Capaian Pembelajaran Baru Anda</h2>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-left justify-left">
                        <form action="{{route('syllabi.ilos.store',[$syllabus])}}" method="post">
                            @csrf
                            <h3 class="font-semibold text-md lg:ml-14 pt-16 tracking-widest ml-4 lg:text-lg iloPosition">POSISI</h3>
                            <input type="text" name ="position" id="position" placeholder="Ketik di sini..." class="input input-bordered font-regular lg:ml-14 lg:w-[30vw] text-base w-[40vw] ml-4 border-[3px] border-solid bg-white mt-4" />
                            <h3 class="font-semibold text-md pt-4 tracking-widest ml-4 lg:ml-14 lg:text-lg iloDesc">DESKRIPSI</h3>
                            <input class="textarea textarea-bordered w-[70vw] ml-4 lg:ml-14 border-[3px] border-solid bg-white mt-4 h-[266px] resize-none font-regular text-base" name="description" id="description" placeholder="Ketik di sini...">
                            <br>
                            <button type="submit"  name="submit" id="submit" class="btn btn-primary lg:text-lg w-[150px] mt-9 text-capitalize bg-[#2E65F3] border-none transition-all duration-300 ml-4 hover:bg-sky-700 lg:ml-14">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
