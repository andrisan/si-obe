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
                    <form action="{{ route('syllabi.learning-plans.update', [$syllabus, $plan]) }}" method="post">
                        @csrf
                        @method('patch')
                        <label for="week_number" class="label">
                                <span class="label-text">Kode Syllabus</span>
                            </label>
                            <input type="number" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="syllabus_id"/>

                            <label for="week_number" class="label">
                                <span class="label-text">Kode LLO</span>
                            </label>
                            <input type="number" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="llo_id"/>

                            <label for="week_number" class="label">
                                <span class="label-text">Week Number</span>
                            </label>
                            <input type="number" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="week_number"/>

                            <label for="sudy_material" class="label">
                                <span class="label-text">Study Material</span>
                            </label>
                            <input type="text" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="study_material" />
                            
                            <label for="learning_method" class="label">
                                <span class="label-text">Learning Method</span>
                            </label>
                            <input type="text" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="learning_method" />

                            <label for="estimated_time" class="label">
                                <span class="label-text">Estimated Time</span>
                            </label>
                            <input type="text" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="estimated_time" />
                        <input type="submit" value="Save" class="btn btn-active rounded-md " />
                        <a href="{{ route('syllabi.learning-plans.index', [$syllabus]) }}" class="btn btn-outline rounded-md">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>