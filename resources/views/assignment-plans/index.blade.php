<title>Index Assignment Plans</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignment Plans') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div>
                  <table class="w-full">
                    <thead>
                      <tr>
                        <th>id</th> 
                        <th class="w-[45rem] px-32">title</th> 
                        <th class="w-[45rem] px-32">description</th> 
                        <th class="w-[20rem]">created_at</th> 
                        <th class="w-[20rem]">updated_at</th> 
                        <th class="w-[20rem]">assignment_style</th> 
                        <th class="w-36 p-10">
                           
                        <div>
                        <form action="{{ route('syllabi.assignment-plans.create', $syllabus) }}" method= "get">
                              <button class="btn border-outline bg-blue-400 hover:bg-blue-700 hover:text-white 
                              text-white font-bold btn-outline"><strong>Create</strong></button>
                        </form>
                        </div>

                        </th>
                      </tr>
                    </thead> 
                    <tbody>
                      @foreach($plans as $plan)
                      <tr>
                        <td>{{ $plan->id }}</td> 
                        <td class="px-5">{{ $plan->title }}</td> 
                        <td class="px-5">{{ $plan->description }}</td> 
                        <td class="px-5">{{ $plan->created_at }}</td> 
                        <td class="px-5">{{ $plan->updated_at }}</td> 
                        <td class="px-5">{{ $plan->assignment_style }}</td> 
                        <td class="w-36">
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
                        </td>
                      </tr>
                      @endforeach
                    </tbody> 
                  </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>