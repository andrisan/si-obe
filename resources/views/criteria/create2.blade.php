<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Membuat Kriteria Baru
        </h2>
    </x-slot>

    <div class="px-20 py-10">
        <div class="w-full mx-auto sm:px-6 lg:px-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="card bg-white">
                        <div class="card-body">
                            <h2 class="card-title font-bold text-2xl mx-auto ">Masukkan Kriteria Baru Anda</h2>
                          <form action="">
            
                            <h3 class="text-left lg:text-left font-semibold text-sm pt-5 iloPosition ">Judul</h3>
            
                            <input type="text" placeholder="Masukkan Judul disini..." class="input input-bordered w-full max-w-xs font-regular font-base" />
                            <h3 class="text-left lg:text-left font-semibold text-sm pt-4 iloPosition">Maksimal Point</h3>
            
                            <input type="text" placeholder="Masukkan Maksimal Point disini..." class="input input-bordered w-full max-w-xs font-regular font-base" />
            
                            <h3 class="text-left lg:text-left font-semibold text-sm pt-4 iloDesc">Deskripsi</h3>
                            
                            <textarea class="textarea textarea-bordered w-full  font-regular text-base mb-5" placeholder="Masukkan Deskripsi disini..."></textarea>
                            <input type="submit" value="Submit" class="btn btn-primary block">
                          </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>