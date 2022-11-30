@section('pageTitle', "Detail Course Learning Outcome")

<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DETAIL: Course Learning Outcome') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">No &emsp;&emsp;&emsp;&nbsp;: {{ $clo-> position }}</strong></label></div>
                <div class="pb-2"><label for="description"><strong class="font-semibold text-gray-900 dark:text-white">Deskripsi &nbsp;: {{ $clo->description }}</strong></label></div>
                <br>
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
                            <td>{{ $llo['position'] }}</td>    
                            <td class="text-justify-center">{{ $llo['description' ]}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>