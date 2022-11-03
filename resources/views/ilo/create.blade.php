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
                        <div class="card bg-white mx-auto formCard">
                            <div class="card-body items-left lg:items-center">
                                <h2 class="card-title text-center justify-center font-semibold text-2xl">Masukkan Capaian Pembelajaran Baru Anda</h2>
                                <form action="/syllabi/blabla/ilos">
                                    <h3 class="text-left lg:text-center font-semibold text-sm pt-16 iloPosition">POSISI</h3>
                                    <input type="text" placeholder="Ketik di sini..." class="input input-bordered w-full max-w-xs font-regular text-base" />
                                    <h3 class="text-left lg:text-center font-semibold text-sm pt-4 iloDesc">DESKRIPSI</h3>
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

<style>
            @media (min-width: 1024px) {
            .formCard{
                border: 3px solid #e0e2e7;
                width: 861px;
            }

            .iloPosition{
                padding-right: 30rem;
            }

            .iloDesc{
                padding-right: 28rem;
            }

            input[type=text]{
                margin-right: 16rem;
                margin-top: 1rem;
            }

            .textarea-bordered{
                margin-right: 8rem;
                width: 524px;
                height: 226px;
                resize: none;
            }

            .formCard{
            border: 3px solid #e0e2e7;
            }
        }

        body{
            font-family: 'Inter', sans-serif;
            color: black;
        }

        hr{
            border: 3px solid #e0e2e7;
        }

        .formIsi{
            position: absolute;
            width: 861px;
            height: 665px;
            left: 427px;
            top: 213px;
        }

        .iloPosition{
            letter-spacing: 0.1em;
            padding-left: 3.5rem;
        }

        .iloDesc{
            letter-spacing: 0.1em;
            padding-left: 3.5rem;
        }

        input[type=text]{
            width: fit-content;
            border: 3px solid #e0e2e7;
            background-color: white;
            margin-left: 56px;
            margin-top: 1rem;
        }

        .textarea-bordered{
            width: 75%;
            border: 3px solid #e0e2e7;
            background-color: white;
            margin-top: 1rem;
            margin-left: 56px;
            height: 266px;
            resize: none;
        }

        .btn.btn-primary{
            background-color: #2E65F3;
            border: none;
            transition: all .3s;
        }

        .btn.btn-primary:hover{
            opacity: 80%;
        }

        input[type=submit]{
            margin-top: 2.5rem;
            margin-left: 3.5rem;
            width: 117px;
            text-transform: capitalize;
        }
</style>