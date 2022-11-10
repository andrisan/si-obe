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
                    <form>
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class="label-text">Study Material</span>
                            </label>
                            <input type="text" class="input input-bordered w-full max-w-xs" value="" />
                            <label class="label">
                                <span class="label-text">Learning Methode</span>
                            </label>
                            <input type="text" class="input input-bordered w-full max-w-xs" value="" />
                            <label class="label">
                                <span class="label-text">Estimated Time</span>
                            </label>
                            <input type="number" class="input input-bordered w-full max-w-xs" value="" min="0" max="300" />
                        </div>
                        <div class="card-actions justify-end mt-4">
                            <button class="btn btn-error m-2">Cancel</button>
                            <button class="btn btn-success m-2">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>