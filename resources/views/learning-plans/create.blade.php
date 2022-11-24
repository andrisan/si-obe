<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="items-start">
                <h2 class="font-semibold   text-4xl text-gray-800 leading-tight">
                    {{ __('Learning Plans Create') }}
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
                    <form action="{{ route('syllabi.learning-plans.store', [$syllabi]) }}" method="POST">
                        <div class="form-control w-full max-w-xs">
                            @csrf
                            <label for="week_number" class="label">
                                <span class="label-text">Study Material</span>
                            </label>
                            <input type="number" placeholder="Week Number" class="input input-bordered w-full max-w-xs" name="week_number" min="1" max="20" />
                            <label for="sudy_material" class="label">
                                <span class="label-text">Study Material</span>
                            </label>
                            <input type="text" placeholder="Study Material" class="input input-bordered w-full max-w-xs" name="study_material" />
                            <label for="learning_method" class="label">
                                <span class="label-text">Learning Method</span>
                            </label>
                            <input type="text" placeholder="Learning Method" class="input input-bordered w-full max-w-xs" name="learning_method" />
                            <label for="estimated_time" class="label">
                                <span class="label-text">Estimated Time</span>
                            </label>
                            <input type="text" placeholder="Estimated Time" class="input input-bordered w-full max-w-xs" name="estimated_time" />
                        </div>
                        <div class="card-actions justify-end mt-4">
                            <a href="{{ route('syllabi.learning-plans.index', [$syllabi]) }}" class="btn btn-eror m-2">Cancel</a>
                            <input type="submit" value="Create" class="btn btn-success m-2 " />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>