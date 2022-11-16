<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        Edit: Learning Plans
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form action="foo/barr">
                <div class="pb-4">
                        <div class="pb-2"><label for="week_number"><strong class="font-semibold text-gray-900">Week Number</strong></label></div>
                        <input type="text" placeholder="Week Number" class="input input-bordered w-full max-w-xs" /> <br>
                    </div>
                    <div class="pb-4">
                    <div class="pb-2"><label for="study_material"><strong class="font-semibold text-gray-900">Study Material</strong></label></div>
                        <textarea class="textarea textarea-bordered w-full" placeholder="Study Material"></textarea>
                    </div>
                    <div class="pb-4">
                    <div class="pb-2"><label for="study_material"><strong class="font-semibold text-gray-900">Learning Method</strong></label></div>
                        <textarea class="textarea textarea-bordered w-full" placeholder="Study Material"></textarea>
                    </div>
                    <div class="pb-4">
                        <div class="pb-2"><label for="week_number"><strong class="font-semibold text-gray-900">Estimated Time</strong></label></div>
                        <input type="text" placeholder="Week Number" class="input input-bordered w-full max-w-xs" /> <br>
                    </div>   
                <input type="simpan" value="Simpan" class="btn btn-active rounded-md " />
                <button class="btn btn-outline rounded-md">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>