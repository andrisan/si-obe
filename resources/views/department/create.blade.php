<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Department') }}
        </h2>
    </x-slot>
    <html data-theme="light" lang="en">

    </html>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/a73fac8683.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Create New Department</title>

    <div class="p-10">
        <!--awal header title-->
        <div class="flex justify-center">
            <p class="text-3xl pb-4 p-2 px-4 font-bold rounded-lg mb-4 w-fit">
                Create New Department
            </p>
        </div>

        <!--awal form create-->
        <div class="flex flex-row justify-center">
            <div class="block p-6 rounded-lg shadow-2xl bg-white max-w-md basis-1/2">
                <form>
                    <div class="form-group mb-6">
                        <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">
                            Faculty
                        </label>
                        <input type="text"
                            class="form-control block w-full px-3 py-1.5 text-gray-700 bg-white border border-solid border-gray-400 rounded"
                            id="DeptName" placeholder="Name">
                    </div>
                    <div class="form-group mb-6">
                        <label for="exampleInputPassword1" class="form-label inline-block mb-2 text-gray-700">
                            Department
                        </label>
                        <input type="text"
                            class="form-control block w-full px-3 py-1.5 text-gray-700 bg-white border border-solid border-gray-400 rounded"
                            id="SPName" placeholder="Name">
                    </div>

                    <button type="submit" class="btn px-6 py-2.5 text-white font-medium text-xs rounded shadow-md">
                        CREATE
                    </button>
                    <button type="submit" class="btn px-6 py-2.5 text-white font-medium text-xs rounded shadow-md">
                        CANCEL
                    </button>
                </form>
            </div>
        </div>
        <!--akhir form create-->
    </div>
</x-app-layout>