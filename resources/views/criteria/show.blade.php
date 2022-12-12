@section('pageTitle', 'Criterias Show')

<script src="https://kit.fontawesome.com/b79c47ea42.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/61cc44f0a1.js" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criteria') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-row mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
             <div class="p-20 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between border-b-2 pb-4 ">
                    <h1 class="text-2xl font-extrabold" style="font-weight: 900;">Criterias Details</h1>
                </div>

                    <tbody class="border-2 border-black text-black">
                         <tr class="border-2 h-14">
                            <div class="grid grid-cols-3 grid-flow-row gap-4">
                                <p class="py-3">ID</p>
                                <div class="py-3 col-span-2">: {{$criterias->id }}</div>
                                <p class="py-3">Title</p>
                                <div class="py-3 col-span-2">: {{$criterias->title }}</div>
                                <p class="py-3">LLO</p>
                                <div class="py-3 col-span-2">: {{ $criterias->LessonLearningOutcome->description}}</div>
                                <p class="py-3">Max Point</p>
                                <div class="py-3 col-span-2">: {{ $criterias->max_point }}</div>
                                <p class="py-3">Description</p>
                                <div class="py-3 col-span-2">: {{$criterias->description}}</div>
                                <p class="py-3">Criteria Levels</p>
                                <div class="py-3 col-span-2">:
                                @foreach($criterias->criteriaLevels as $cl)
                                    {{ $loop->index+1 }}. {{$cl->title}} <br> 
                                @endforeach
                                </div>
                                <p class="py-3">Created At</p>
                                <div class="py-3 col-span-2">: {{$criterias->created_at->format('D, d M Y h:i A')}}</div>
                                <p class="py-3">Updated At</p>
                                <div class="py-3 col-span-2">: {{$criterias->updated_at->format('D, d M Y h:i A')}}</div>                                
                            </div>
                        </tr>
                    </tbody>
                            <div class="flex card-actions justify-center pt-5">
                                <form action="{{ route('rubrics.criterias.edit', [$rubric, $criterias->id]) }}" method="GET">
                                    <button class="basis-full px-4 py-1 m-1 bg-yellow-600 rounded-xl text-white text-sm font-bold">Edit</button>
                                </form>

                                <form action="{{ route('rubrics.criterias.destroy', [$rubric, $criterias->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="basis-full px-4 py-1 m-1 bg-red-600 rounded-xl text-white text-sm font-bold " value="{{ $criterias->id }}" onclick="return confirm('Are you sure?')">Delete</button>

                                    <a href="{{ route('rubrics.criterias.index', [$rubric]) }}" class="basis-full px-4 py-1 m-1 bg-blue-600 rounded-xl text-white text-sm font-bold">Back</a>
                                </form>
                                 
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
