<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Rubrik Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-center py-10">
                    <div class="card border rounded-lg shadow-xl w-5/12 h-96 mx-auto">
                        <div class="card-body items-center text-center justify-items-center">
                            <div class="my-auto mx-auto">
                                <h2 class="card-title text-2xl mb-4">Masukkan Rubrik Baru</h2>
                                <form action="/rubrics/blabla" method="GET">
                                    <div class="form-control w-full max-w-xs">
                                        <label class="label">
                                            <span class="label-text text-sm">JUDUL</span>

                                        </label>
                                        <input type="text" placeholder="Ketik Disini"
                                            class="input input-bordered w-full max-w-xs" style="background-color: white" />
                                    </div>
                                    <input type="submit" class="btn btn-primary mt-7 flex justify-self-start">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>