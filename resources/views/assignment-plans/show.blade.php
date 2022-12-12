@section('pageTitle', "$plan-> Assignment Plans Detail")

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="items-start">
                <h2 class="font-semibold   text-4xl text-gray-800 leading-tight">
                  
                </h2>
            </div>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="drawer-content flex flex-col px-10 pt-5 border-l border-slate-500">
            <div class="pb-10">
                <div class="border-b rounded-lg shadow-xl bg-white px-5 py-5">
                    <div class="ml-5 mt-5 px-5 mb-5">
                        <h2 class="card-title pb-5">Assignment Class Detail</h2>
                        <div class="grid grid-cols-3 grid-flow-row gap-4">
                            <p class="py-3">Title</p>
                            <div class="py-3 col-span-2">: {{ $plan->title }}</div>
                            <p class="py-3">Description</p>
                            <div class="py-3 col-span-2">: {{$plan->description}}</div>
                            <p class="py-3">Created At</p>
                            <div class="py-3 col-span-2">: {{$plan->created_at}}</div>
                            <p class="py-3">Updated At</p>
                            <div class="py-3 col-span-2">: {{$plan->updated_at }}</div>
                            <p class="py-3">Assignment Style</p>
                            <div class="py-3 col-span-2">: {{ $plan->assignment_style }}</div>
                            <p class="py-3">Output Instruction</p>
                            <div class="py-3 col-span-2">: {{ $plan->output_instruction }}</div>
                            <p class="py-3">Submission Instruction</p>
                            <div class="py-3 col-span-2">: {{ $plan->submission_instruction }}</div>
                            <p class="py-3">Deadline Instruction</p>
                            <div class="py-3 col-span-2">: {{ $plan->deadline_instruction }}</div>
                            <p class="py-3">Is Group Assignment</p>
                            <div class="py-3 col-span-2">: {{ $plan->is_group_assignment }}</div>

                        </div>

                        <div class="flex card-actions justify-center pt-5">
                            <form action="{{ route('syllabi.assignment-plans.edit', [$syllabus, $plan->id]) }}" method="get">
                              <button class="btn btn-warning btn-sm" value="{{ $plan->id }}"><strong>Edit</strong></button>
                            </form>
                            <form action="{{ route('syllabi.assignment-plans.destroy', [$syllabus, $plan->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-error btn-sm" value="{{ $plan->id }}" onclick="return confirm('Yakin ingin menghapus data?');"><strong>Delete</strong></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>