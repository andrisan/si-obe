<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Lesson Learning Outcome (LLO)') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('syllabi.ilos.clos.llos.store', [$syllabus, $ilo, $clo]) }}" method="post">
              <div class="pb-4">
                @csrf
                <h2 class="font-semibold text-3xl text-center">Masukkan Lesson Learning Outcome (LLO) baru</h2>
                <div class="pb-2">
                  <label for="position"><strong class="font-semibold text-gray-900 dark:text-white">Posisi</strong></label>
                </div>
                <input type="text" placeholder="Posisi LLO" class="input input-bordered w-full max-w-xs" name="position"/> <br>
              </div>
              <div class="pb-4">
                <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">Deskripsi</strong></label></div>
                <textarea class="textarea textarea-bordered w-full lg:w-3/4 h-64" placeholder="Deskripsi LLO" name="description" spellcheck="false"></textarea>
              </div>
              <input type="submit" value="Save" class="btn btn-active rounded-md " />
              <a href="{{ route('syllabi.ilos.clos.llos.index', [$syllabus, $ilo, $clo]) }}" class="btn btn-outline rounded-md">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>
  