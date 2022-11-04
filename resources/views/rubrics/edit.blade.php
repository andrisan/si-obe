<x-app-layout>
  <x-slot name="header">
    <div class="border-b-2 flex  justify-between border-blue-600">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-4xl">
            {{ __('LK-01') }}
        </h2>
        <div class="mb-5 w-14">
            <img src="{{ asset('img/Default.png') }}" alt="">

        </div>
        
    </div>
    <div class="flex mt-5">
        <p class="text-black mt-3 justify-start mr-20">Add the criteria you’ll use to evaluate student work as any performance levels or descriptions you want to include. Students will receive a copy of this rubric with their assignment. </p>
        <img class="w-10 h-10 justify-end" src="{{ asset('img/titik.png') }}" alt="">
    </div>
    <div class="flex">
        <h1>Sort the order point bg: </h1>
        <select class="ml-2  h-10 rounded-lg" name="" id="">
            <option value="" >Desceding</option>
        </select>
    </div>
     
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-10 bg-white rounded-md border-2 border-black  ">
                <div class="w-72 p-2 border-2 border-black rounded-lg bg-[#E0E2E7]">
                    <h1 class="border-b-2 border-black">
                        Criterion tittle (required) <br> PAW-01
                    </h1>
                </div>
                <div class="">
                    <textarea class="w-full border-2 border-black rounded-lg mt-5" name="" id="" cols="" rows="10">Criterion description </textarea>
                </div>
               <div>
                <div class="flex mt-2 ">
                    <div class="block pb-5 space-y-3 rounded-md border-2 border-black">
                    <div class="px-3 py-1 mt-5">
                        <input class="w-80 bg-[#E5E5E5]" type="text" placeholder="Points">
                    </div>
                    <div class="px-3 py-1">
                        <input class="w-80 bg-[#E5E5E5]" type="text" placeholder="Level">
                    </div>
                    <div class="px-3 py-1 ">
                        <input class="w-80 bg-[#E5E5E5]" type="text" placeholder="Description">
                    </div>
                    </div>
                    <div class="block pb-5 space-y-3 rounded-md border-2 border-black">
                    <div class="px-3 py-1 mt-5">
                        <input class="w-80 bg-[#E5E5E5]" type="text" placeholder="Points">
                    </div>
                    <div class="px-3 py-1">
                        <input class="w-80 bg-[#E5E5E5]" type="text" placeholder="Level">
                    </div>
                    <div class="px-3 py-1 ">
                        <input class="w-80 bg-[#E5E5E5]" type="text" placeholder="Description">
                    </div>
                    </div>
                   
                </div>
               </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
