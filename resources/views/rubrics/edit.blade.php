<x-app-layout>
  <x-slot name="header">
    <div class="border-b-2 flex  justify-between border-blue-600">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-4xl">
            {{ __('LK-01') }}
        </h2>
        <div class="mb-5 w-14">
            <img src="{{ asset('img/Default.png') }}" alt="">

        </div>
        <style></style>
    </div>
    <div class="flex mt-5">
        <p class="text-black mt-3 justify-start mr-20">Add the criteria you’ll use to evaluate student work as any performance levels or descriptions you want to include. Students will receive a copy of this rubric with their assignment. </p>
        <img class="w-10 h-10 justify-end" src="{{ asset('img/titik.png') }}" alt="">
    </div>
    <div class="flex">
        <h1 class="mt-2 text-black">Sort the order point bg: </h1>
        <select class="ml-2  h-10 rounded-lg" name="" id="">
            <option value="" >Desceding</option>
        </select>
    </div>
     
  </x-slot>

  <div class="py-5">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-10 bg-white rounded-md border-2 border-black  ">
                <div class="w-72 p-2 border-2 border-black rounded-lg bg-[#E0E2E7]">
                    <h1 class=" text-black">
                        Criterion tittle (required) 
                        <input placeholder="PAW-01" type="text" class="w-full rounded-md mt-2 bg-[#E0E2E7]">
                    </h1>
                </div>
                <div class="">
                    <textarea placeholder="Criterion description " class="w-full border-2 border-black rounded-lg mt-5" name="" id="" cols="" rows="10"></textarea>
                </div>
               <div>
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
               </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
