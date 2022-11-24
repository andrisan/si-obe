<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        {{ __('Edit Learning Plan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('syllabi.learning-plans.update', [$syllabi, $learningPlan]) }}" method="post">
                @csrf
                @method('patch')
                <div class="pb-4">
                        <div class="pb-2"><label for="weekNumber"><strong class="font-semibold text-gray-900">Week Number</strong></label></div>
                        <input type="text" placeholder="Week Number" class="input input-bordered w-full max-w-xs" value="{{ old('week_number', $learningPlan->week_number) }}"/> <br>
                    </div>
                    <div class="pb-4">
                    <div class="pb-2"><label for="study_material"><strong class="font-semibold text-gray-900">Study Material</strong></label></div>
                        <textarea class="textarea textarea-bordered w-full" placeholder="Study Material" name="Study Material" > {{ old('study_material', $learningPlan->study_material) }} </textarea>
                    </div>
                    <div class="pb-4">
                    <div class="pb-2"><label for="study_material"><strong class="font-semibold text-gray-900">Learning Method</strong></label></div>
                        <textarea class="textarea textarea-bordered w-full" placeholder="Learning Method" name="Study Material" > {{ old('learning_method', $learningPlan->learning_method) }} </textarea>
                    </div>
                    <div class="pb-4">
                        <div class="pb-2"><label for="week_number"><strong class="font-semibold text-gray-900">Estimated Time</strong></label></div>
                        <input type="text" placeholder="Estimated Time" class="input input-bordered w-full max-w-xs" value="{{ old('estimated_time', $learningPlan->estimated_time) }}"/> <br> /> <br>
                    </div>   
                <input type="submit" value="Save" class="btn btn-active rounded-md " />
                <a href="{{ route('syllabi.learning-plans.index', [$syllabi, $learningPlan->id]) }}" class="btn btn-outline rounded-md">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>