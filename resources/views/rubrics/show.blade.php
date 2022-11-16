<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <div class="items-start">
        <h2 class="font-semibold   text-4xl text-gray-800 leading-tight">
          {{ $rubric->title }}
          <form action="{{ route('rubrics.destroy', $rubric) }}" method="POST">
          <a href="{{ route('rubrics.create') }}" class="btn btn-primary btn-sm floatright">Create</a>
          <a href="{{ route('rubrics.edit', $rubric) }}" class="btn btn-primary btn-sm floatright">Edit</a>
          @csrf
          @method('DELETE')
          <input type="submit" class="btn btn-primary btn-sm floatright" value="Delete">
        </form>
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
          @foreach ($rubric->criteria as $criteria)
          <div class="flex justify-between">
            <h1 class="text-[#2E65F3] font-extrabold items-start">{{ $criteria->title }}</h1>
            <div class="items-end">
              <h1 class="font-extrabold text-black">/{{ $criteria->max_point }}</h1>
            </div>
          </div>

          <div>
            <div class="py-5">
              <h1 class="text-black text-lg font-bold">{{ $criteria->description }}</h1>
            </div>

            <!-- <div class="flex space-x-40 justify-center text-black underline-offset-2"> -->
              <div class="grid grid-cols-3 gap-y-8 pb-10">
              @foreach ($criteria->criteriaLevels as $cl)
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