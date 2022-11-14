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
                    <div class="flex items-center justify-center py-10">
                        <div class="card bg-white mx-auto">
                            <div class="card-body items-left lg:items-center">
                                <h2 class="card-title text-center justify-center font-semibold text-2xl">Masukkan Capaian Pembelajaran Baru Anda</h2>
                                <form action="/syllabi/blabla/ilos">
                                    <h3 class="text-left lg:text-center font-semibold text-sm pt-16">POSISI</h3>
                                    <input type="text" placeholder="Ketik di sini..." class="input input-bordered w-full max-w-xs font-regular text-base" />
                                    <h3 class="text-left lg:text-center font-semibold text-sm pt-4">DESKRIPSI</h3>
                                    <textarea class="textarea textarea-bordered sm:w-full max-w-md font-regular text-base" placeholder="Ketik di sini..."></textarea>
                                    <input type="submit" value="Kirim" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
