@section('pageTitle', "Edit LLO $llo->id")

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Lesson Learning Outcome (LLO)') }}
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="{{ route('syllabi.ilos.clos.llos.update', [$syllabus, $ilo, $clo, $llo]) }}" method="post">
            @csrf
            @method('patch')
            <div>
              <div class="pb-4">
                <h1>Posisi LLO</h1>
                <input type="text" name="position" placeholder="Position" class="input input-bordered w-full max-w-xs" value="{{ old('position', $llo->position) }}"/> <br>
                <x-input-error :messages="$errors->get('position')" class="mt-2" />
              </div>
              
              <div class="pb-4">
                <h1>Deskripsi LLO</h1>
                <textarea class="textarea textarea-bordered w-full" placeholder="Description" name="description" >{{ old('description', $llo->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
              </div>
              <input type="submit" value="Save" class="btn btn-active rounded-md " />
            <a href="{{ route('syllabi.ilos.clos.llos.index', [$syllabus, $ilo,$clo]) }}" class="btn btn-outline rounded-md">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
