<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Learning Outcome') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">No &emsp;&emsp;&emsp;: {{ $clo-> position }}</strong></label></div>
                <div class="pb-2"><label for="description"><strong class="font-semibold text-gray-900 dark:text-white">Deskripsi : {{ $clo->description }}</strong></label></div>
                <table class="table-fixed w-full">
                        <thead>
                            <tr class="border-2 h-10">
                            <th class="w-10">No</th>
                            <th class="w-[35rem]">Description</th>
                            </tr>
                        </thead>
                        <tbody class=" border-2 border-black text-center">
                            @foreach ($llos as $llo)
                            <tr class="border-2 h-14">
                            <td>{{$llo['position']}}</td>    
                            <td class="text-justify-center">{{$llo['description']}}</td>
                            <td class="flex space-x-8 justify-center mt-2">
                                <button class="px-4 mt-0 text-blue-800 border-blue-800 rounded-2xl border-2">Detail</button>
                                <a href="{{ route('syllabi.ilos.llos.edit', [$syllabus, $ilo, $llo['id']]) }}" class="mt-2"><i class="fa-solid fa-pen-to-square text-blue-800"></i></a>
                                <form method="POST" action="{{ route('syllabi.ilos.llos.destroy', [$syllabus, $ilo, $llo['id']]) }}">
                                    @csrf
                                    @method('delete')

                                    <button class="mt-2"
                                            onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                            <i class="fa-solid fa-trash-can text-red-600"></i>
                                    </button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>