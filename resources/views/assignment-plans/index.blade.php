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
                        <th><button class="btn bg-blue-600">Create</button></th>
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
                          <button class="btn btn-warning">Edit</button>
                          <button class="btn btn-error">Delete</button>
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
