<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="items-center" style="background-color: white;">
                    <h1 class="text-4xl font-extrabold sm:pt-16 sm:pl-14 pt-16 text-center sm:text-left">Membuat Kriteria Baru</h1><hr class="sm:ml-14 mt-3">
                </div>
            
                <div class="flex items-center justify-center py-10" style="background-color: white;">
                    <div class="card bg-white mx-auto formCard">
                        <div class="card-body items-left lg:items-center">
                          <form action="">
                            <h2 class="card-title text-left justify-center font-bold text-2xl">Masukkan Kriteria Baru Anda</h2>
            
                            <h3 class="text-left lg:text-left font-semibold text-sm pt-16 iloPosition ">Judul</h3>
            
                            <input type="text" placeholder="Masukkan Judul disini..." class="input input-bordered w-full max-w-xs font-regular font-base" />
                            <h3 class="text-left lg:text-left font-semibold text-sm pt-6 iloPosition">Maksimal Point</h3>
            
                            <input type="text" placeholder="Masukkan Maksimal Point disini..." class="input input-bordered w-full max-w-xs font-regular font-base" />
            
                            <h3 class="text-left lg:text-left font-semibold text-sm pt-4 iloDesc">Deskripsi</h3>
                            
                            <textarea class="textarea textarea-bordered sm:w-full max-w-md font-regular text-base" placeholder="Masukkan Deskripsi disini..."></textarea>
                            <input type="submit" value="Submit" class="btn btn-primary">
                          </form>
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
            padding-right: 29rem;
        }

        .iloDesc{
            padding-right: 27rem;
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
    }

    input[type=submit]{
        margin-top: 2.5rem;
        margin-left: 3.5rem;
        width: 117px;
        text-transform: capitalize;
    }

</style>
