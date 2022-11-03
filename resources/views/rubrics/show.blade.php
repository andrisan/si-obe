<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="items-start">
                <h2 class="font-semibold   text-4xl text-gray-800 leading-tight">
                    {{ __('LK-01') }}
                </h2>
            </div>

            <div class="items-end">
                <img src="{{ asset('img/Vector(2).png') }}" alt="">
            </div>
        </div>

    </x-slot>

    <div class="py-5 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-2 border-blue-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <h1 class="text-[#2E65F3] font-extrabold items-start">N01-1</h1>
                        <div class="items-end">
                            <h1 class="font-extrabold text-black">/3</h1>
                        </div>
                    </div>
                    <div>

                    </div>
                    <div>
                        <div class="py-5">
                            <h1 class="text-black">Mampu memahami konsep dasar php</h1>
                        </div>

                        <div class="flex justify-between  text-black font-bold">
                            <div class="px-5 py-2 w-60 bg-[#AFC7F5] flex justify-between">
                                <h1 class="">Baik</h1>
                                <h1 class text-sm ">3 pts</h1>
                  </div>
                  <div class="px-5 py-2 w-60 bg-[#AFC7F5] flex justify-between">
                    <h1 class="">Cukup</h1>
                    <h1 class=" text-sm">2 pts</h1>
                  </div>
                  <div class="px-5 py-2 w-60 bg-[#AFC7F5] flex justify-between">
                    <h1 class="">Kurang</h1>
                    <h1 class=" text-sm">1 pts</h1>
                  </div>
                </div>

                <div class="py-10">
                  <textarea class="w-full placeholder:text-black bg-[#E0E2E7]" name="" id="" cols="30" rows="10"
                      placeholder="Deskripsi"></textarea>
                </div>
                    </div>
                   <div class="flex justify-between">
                  <h1 class="text-[#2E65F3] font-extrabold items-start">N02-2</h1>
                  <div class="items-end">
                    <h1 class="font-extrabold text-black">/3</h1>
                  </div>
                </div>

                <div class="py-5">
                  <h1 class="text-black">Mampu mengimplementasikan konsep dasar php</h1>
                </div>

                <div class="flex justify-between text-black font-bold">
                  <div class="px-5 py-2 w-60 bg-[#AFC7F5] flex justify-between">
                    <h1 class="">Baik</h1>
                    <h1 class="text-sm">3 pts</h1>
                  </div>
                  <div class="px-5 py-2 w-60 bg-[#AFC7F5] flex justify-between">
                    <h1 class="">Cukup</h1>
                    <h1 class=" text-sm">2 pts</h1>
                  </div>
                  <div class="px-5 py-2 w-60 bg-[#AFC7F5] flex justify-between">
                    <h1 class="">Kurang</h1>
                    <h1 class=" text-sm">1 pts</h1>
                  </div>
                </div>
                <div class="py-10">
                  <textarea class="w-full placeholder:text-black bg-[#E0E2E7]" name="" id="" cols="30" rows="10"
                      placeholder="Deskripsi"></textarea>
                </div>








                
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
