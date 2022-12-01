<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="items-start">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    {{ $syllabus->title }}
                </h2>
            </div>

            <div class="items-end">
                <img src="{{ asset('img/Vector(2).png') }}" alt="">
            </div>
        </div>
    </x-slot>

    <div class="hero min-h-screen bg-base-300">
        <div class="hero-content text-center max-w-xl">
            <div class="card w-96 bg-base-100">
                <div class="card-body items-center text-center">
                    <form action="{{ route('syllabi.learning-plans.store', [$syllabus]) }}" method="POST">
                        <div class="form-control w-full max-w-xs">
                            @csrf
                            <div class="hidden">
                                <label for="syllabus" class="label">
                                    <span class="label-text">Kode Syllabus</span>
                                </label>
                                <input type="number" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="syllabus_id" value="{{ $syllabus->id }}" />
                            </div>
                            <label for="llo" class="label">
                                <span class="label-text">LLO</span>
                            </label>
                            <select class="select select-bordered w-full max-w-xs" placeholder="Masukkan input" name="llo_id">
                                @foreach ($llos as $llo)
                                    <option>{{ $llo->id }}</option>
                                @endforeach
                            </select>

                            <label for="week_number" class="label">
                                <span class="label-text">Week Number</span>
                            </label>
                            <input type="number" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="week_number" />

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
                        </div>
                        <div class="card-actions justify-end mt-4">
                            <a href="{{ route('syllabi.learning-plans.index', [$syllabus]) }}" class="btn btn-error m-2">Cancel</a>
                            <input type="submit" value="Create" class="btn btn-success m-2 " />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
