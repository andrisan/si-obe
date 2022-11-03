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
     <p class="text-black mt-3">Add the criteria you’ll use to evaluate student work as any performance levels or descriptions you want to include. Students will receive a copy of this rubric with their assignment. </p>
     
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
