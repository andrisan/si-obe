<title></title>
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="items-start">
                <h2 class="font-semibold   text-4xl text-gray-800 leading-tight">
                    Nama Syllabi :
                    @foreach ($syllabus as $item)
                        {{ $item->title }}
                    @endforeach

                </h2>
            </div>
        </div>

    </x-slot>

    <div class="py-2 ">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-2 border-blue-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <hr class="border-solid border-black rounded-md mb-2">


                    <h1 class="text-black hover:text-blue-600 font-bold text-3xl"><a
                            href="/syllabi/
                      @foreach ($syllabus as $item)
                      {{ $item->id }} @endforeach
                      /ilos">
                            Capaian Pembelajaran Lulusan</a></h1>

                    {{-- loop start --}}
                    <div>
                        <div class="py-5">


                            <ol type="1">

                                @foreach ($ilos as $ilo)
                                    <div class="flex space-x-4">

                                        <li>
                                            {{ $ilo->id }}
                                        </li>
                                        <li>
                                            {{ $ilo->description }}
                                        </li>
                                    </div>
                                @endforeach

                            </ol>
                        </div>

                        <!-- <div class="flex space-x-40 justify-center text-black underline-offset-2"> -->
                        <div class="grid grid-cols-3 gap-y-8 pb-10">

                            {{-- <div class="px-5 py-2 w-60 bg-[#AFC7F5] cursor-pointer rounded-md">
                <div class="flex justify-between font-bold">
                  <h1 class=""></h1>
                  <h1 class="text-sm"> pts</h1>
                </div>
                <hr class="border-black">
                <p class="font-regular py-2"></p>
              </div> --}}

                        </div>
                        <hr class="border-solid border-black rounded-md mb-2">

                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <hr class="border-solid border-black rounded-md mb-2">
                    <h1 class="text-black hover:text-blue-600 font-bold text-3xl">
                        @foreach ($ilos as $ilo)
                        @foreach ($syllabus as $item)
                            
                            <a href='{{ route('syllabi.ilos.clos.index', [$item->id,$ilo->id]) }}'>
                        @endforeach
                        @endforeach
                        
                        Capaian Pembelajaran </a>
                    </h1>
                    {{-- loop start --}}
                    <div>
                        <div class="py-5">


                            <ol type="1">

                                @foreach ($clos as $clo)
                                    <div class="flex space-x-4">

                                        <li>
                                            {{ $clo->id }}
                                        </li>
                                        <li>
                                            {{ $clo->description }}
                                        </li>
                                    </div>
                                @endforeach

                            </ol>
                        </div>

                        <!-- <div class="flex space-x-40 justify-center text-black underline-offset-2"> -->
                        <div class="grid grid-cols-3 gap-y-8 pb-10">

                            {{-- <div class="px-5 py-2 w-60 bg-[#AFC7F5] cursor-pointer rounded-md">
                <div class="flex justify-between font-bold">
                  <h1 class=""></h1>
                  <h1 class="text-sm"> pts</h1>
                </div>
                <hr class="border-black">
                <p class="font-regular py-2"></p>
              </div> --}}

                        </div>
                        <hr class="border-solid border-black rounded-md mb-2">

                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <hr class="border-solid border-black rounded-md mb-2">
                    <h1 class="text-black font-bold text-3xl hover:text-blue-600">
                      @foreach ($ilos as $ilo)
                      @foreach ($syllabus as $item)
                      @foreach ($clos as $clo) 
                          <a href='{{ route('syllabi.ilos.clos.llos.index', [$item->id,$ilo->id,$clo->id]) }}'>
                      @endforeach
                      @endforeach
                      @endforeach
                      Hasil Pembelajaran</h1>
                    {{-- loop start --}}
                    <div>
                        <div class="py-5">


                            <ol type="1">

                                @foreach ($llos as $llo)
                                    <div class="flex space-x-4">

                                        <li>
                                            {{ $llo->id }}
                                        </li>
                                        <li>
                                            {{ $llo->description }}
                                        </li>
                                    </div>
                                @endforeach

                            </ol>
                        </div>

                        <!-- <div class="flex space-x-40 justify-center text-black underline-offset-2"> -->
                        <div class="grid grid-cols-3 gap-y-8 pb-10">

                            {{-- <div class="px-5 py-2 w-60 bg-[#AFC7F5] cursor-pointer rounded-md">
                <div class="flex justify-between font-bold">
                  <h1 class=""></h1>
                  <h1 class="text-sm"> pts</h1>
                </div>
                <hr class="border-black">
                <p class="font-regular py-2"></p>
              </div> --}}

                        </div>
                        <hr class="border-solid border-black rounded-md mb-2">

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
