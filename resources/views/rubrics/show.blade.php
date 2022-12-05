<title>Rubrics {{ $rubric->title }}</title>
<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <div class="items-start">
        <h2 class="font-semibold   text-4xl text-gray-800 leading-tight">
          {{ $rubric->title }}
        </h2>
      </div>
    </div>

  </x-slot>

  <div class="py-2 ">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white border-2 border-blue-500 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <hr class="border-solid border-black rounded-md mb-2">
          
          {{-- loop start --}}
          @foreach ($rubric->criterias as $criterias)
          <div class="flex justify-between">
            <h1 class="text-[#2E65F3] font-extrabold items-start">{{ $criterias->title }}</h1>
            <div class="items-end">
              <h1 class="font-extrabold text-black">/{{ $criterias->max_point }}</h1>
            </div>
          </div>

          <div>
            <div class="py-5">
              <h1 class="text-black text-lg font-bold">{{ $criterias->description }}</h1>
            </div>

            <!-- <div class="flex space-x-40 justify-center text-black underline-offset-2"> -->
              <div class="grid grid-cols-3 gap-y-8 pb-10">
              @foreach ($criterias->criteriaLevels as $cl)
              <div class="px-5 py-2 w-60 bg-[#AFC7F5] cursor-pointer rounded-md">
                <div class="flex justify-between font-bold">
                  <h1 class="">{{ $cl->title }}</h1>
                  <h1 class="text-sm">{{ $cl->point }} pts</h1>
                </div>
                <hr class="border-black">
                <p class="font-regular py-2">{{ $cl->description }}</p>
              </div>
              @endforeach
            </div>
            <hr class="border-solid border-black rounded-md mb-2"> 
          @endforeach
          </div>
        </div>
      </div>
    </div>
</x-app-layout>