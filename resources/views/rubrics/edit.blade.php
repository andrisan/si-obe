<title>Edit Rubrics</title>
<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-4xl">
                Edit Rubric : {{ $rubric->title }}
            </h2>
        </div>

    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 bg-white rounded-md border-2">
                    <div class="">
                        <h1 class=" text-black text-3xl">
                            Masukkan Judul Baru
                            <form action="{{ route('rubrics.update', $rubric) }}" method="POST">
                                @csrf
                                @method('patch')
                                <input placeholder="{{ $rubric->title }}" name="title" type="text" class="w-full rounded-md mt-2 bg-[#f8f8f8]" value="{{ old('title', $rubric->title)  }}">
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </h1>
                    </div>

                    {{-- <div>
                        <div class="flex mt-2 space-x-11">
                            <div class="block pb-5 space-y-3 rounded-md border-2 border-black">
                                <div class="px-3 py-1 mt-5">
                                    <h1>Point</h1>
                                    <input class="w-80 bg-[#E5E5E5] rounded-md" type="text" placeholder="">
                                </div>
                                <div class="px-3 py-1 mt-5">
                                    <h1>Level</h1>
                                    <input class="w-80 bg-[#E5E5E5] rounded-md" type="text" placeholder="">
                                </div>
                                <div class="px-3 py-1 mt-5">
                                    <h1>Description</h1>
                                    <input class="w-80 bg-[#E5E5E5] rounded-md" type="text" placeholder="">
                                </div>


                            </div>
                            <div class="block pb-5 space-y-3 rounded-md border-2 border-black">
                                <div class="px-3 py-1 mt-5">
                                    <h1>Point</h1>
                                    <input class="w-80 bg-[#E5E5E5] rounded-md" type="text" placeholder="">
                                </div>
                                <div class="px-3 py-1 mt-5">
                                    <h1>Level</h1>
                                    <input class="w-80 bg-[#E5E5E5] rounded-md" type="text" placeholder="">
                                </div>
                                <div class="px-3 py-1 mt-5">
                                    <h1>Description</h1>
                                    <input class="w-80 bg-[#E5E5E5] rounded-md" type="text" placeholder="">
                                </div>


                            </div>
                            <div class="block pb-5 space-y-3 rounded-md border-2 border-black">
                                <div class="px-3 py-1 mt-5">
                                    <h1>Point</h1>
                                    <input class="w-80 bg-[#E5E5E5] rounded-md" type="text" placeholder="">
                                </div>
                                <div class="px-3 py-1 mt-5">
                                    <h1>Level</h1>
                                    <input class="w-80 bg-[#E5E5E5] rounded-md" type="text" placeholder="">
                                </div>
                                <div class="px-3 py-1 mt-5">
                                    <h1>Description</h1>
                                    <input class="w-80 bg-[#E5E5E5] rounded-md" type="text" placeholder="">
                                </div>


                            </div>
                        </div>
                    </div>--}}
                    <div>
                        <div class="flex">
                            <button class="btn btn-outline mt-2 hover:bg-slate-50 hover:text-black"><a href="{{ route('rubrics.index') }}">Cancel</a></button>
                            <input type="submit" value="Simpan" class="btn btn-primary mt-2 ml-3"></div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>