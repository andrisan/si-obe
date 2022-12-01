@section('pageTitle', 'Edit Learning Plan')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ $plan->study_material }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('syllabi.learning-plans.update', [$syllabus, $plan]) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="hidden">
                            <label for="syllabus" class="label">
                                <span class="label-text">Kode Syllabus</span>
                            </label>
                            <input type="number" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="syllabus_id" value="{{ $plan->syllabus_id }}" />
                        </div>

                        <label for="llo" class="label">
                            <span class="label-text">Kode LLO</span>
                        </label>

                        <select class="select select-bordered w-full max-w-xs" placeholder="Masukkan input" name="llo_id">
                            @foreach ($llos as $llo)
                            <option value={{$llo->id}} @if($plan->llo_id == $llo->id)
                                selected
                                @endif >{{ $llo->description }}</option>
                            @endforeach
                        </select>

                        <label for=" week_number" class="label">
                            <span class="label-text">Week Number</span>
                        </label>
                        <input type="number" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="week_number" value="{{ $plan->week_number }}" />

                        <label for=" sudy_material" class="label">
                            <span class="label-text">Study Material</span>
                        </label>
                        <input type="text" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="study_material" value="{{ $plan->study_material }}" />

                        <label for=" learning_method" class="label">
                            <span class="label-text">Learning Method</span>
                        </label>
                        <input type="text" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="learning_method" value="{{ $plan->learning_method }}" />

                        <label for=" estimated_time" class="label">
                            <span class="label-text">Estimated Time</span>
                        </label>
                        <input type="text" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="estimated_time" value="{{ $plan->estimated_time }}" />
                        <div class="py-4">
                        <button type="submit" value="Save" class="btn btn-active btn-success rounded-md mr-4">Save</button>
                        <button class="btn btn-warning rounded-md">
                            <a href="{{ route('syllabi.learning-plans.index', [$syllabus]) }}">Cancel</a>
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
