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
                <div class="overflow-x-auto">
                  <table class="table table-compact w-full">
                    <thead>
                      <tr>
                        <th>id</th> 
                        <th>title</th> 
                        <th>description</th> 
                        <th>created_at</th> 
                        <th>updated_at</th> 
                        <th>assignment_style</th> 
                        <th>
                           
                        <div>
                        <a href="{{ route('assignment-plans.create') }}">
                              <button class="btn border-outline bg-blue-400 hover:bg-blue-700 hover:text-white 
                              text-white font-bold btn-outline">Create</button>
                              </a>
                        </div>

                        </th>
                      </tr>
                    </thead> 
                    <tbody>
                      @foreach($plans as $ap)
                      <tr>
                        <th>{{$ap['id']}}</th> 
                        <td>{{$ap['title']}}</td> 
                        <td>{{$ap['description']}}</td> 
                        <td>{{$ap['created_at']}}</td> 
                        <td>{{$ap['updated_at']}}</td> 
                        <td>{{$ap['assignment_style']}}</td> 
                        <td>

                        <form action="/assignment-plans/{{ $ap->id}}/edit" method="get">
                        <button class="btn bg-blue-300 hover:bg-blue-600 hover:text-white text-white font-bold btn-outline">Edit</button>
                        </form>

                        <form action="{{route('assignment-plans.destroy', $ap->id)}}" method="post">
                        @csrf
                        @method('delete')
                          <button class="btn btn-error hover:bg-red-600 hover:text-white text-white font-bold"  
                          onclick="return confirm('Yakin ingin menghapus data?');">Delete</button>
                          </form>
                          
                        </td>
                      </tr>
                      @endforeach
                    </tbody> 
                  </table>
                  <div class="btn-group mt-5">
                    <button class="btn btn-xs btn-info">1</button>
                    <button class="btn btn-xs">2</button>
                    <button class="btn btn-xs">3</button>
                  </div>


                </div>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>