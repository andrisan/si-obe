<title>Create Rubrics</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Rubrik Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-center py-10">
                <div class="card border rounded-lg shadow-xl w-5/12 h-96 mx-auto bg-white">
                    <div class="card-body items-center text-center justify-items-center">
                        <div class="my-auto mx-auto">
                            <h2 class="card-title text-2xl mb-4">Masukkan Rubrik Baru</h2>
                            <form action={{ route('rubrics.store') }} method="POST">
                                @csrf
                                <div class="form-control w-full max-w-xs">
                                    <label class="label">
                                        <span class="label-text text-sm">Judul LEMBAR KERJA</span>
                                    </label>
                                    <select name="assignment_plan_title" class="select input-bordered w-full max-w-xs"
                                        style="background-color: white">
                                        <option disabled selected>Masukkan Judul LK</option>
                                        @foreach ($assignmentPlan as $assignmentPlan)
                                            <option>{{ $assignmentPlan->title }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('assignment_plan_title')" class="mt-2" />
                                    <label class="label">
                                        <span class="label-text text-sm">JUDUL</span>
                                    </label>
                                    <input type="text" placeholder="Ketik Disini" name="title"
                                        class="input input-bordered w-full max-w-xs" style="background-color: white" />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                                <div class="flex">
                                    <button class="btn btn-outline mt-7 hover:bg-slate-50 hover:text-black"><a href="{{ route('rubrics.index') }}">Cancel</a></button>
                                    <input type="submit" class="btn btn-primary mt-7 ml-3">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
