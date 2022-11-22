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
                        <th></th> 
                        <th>Title</th> 
                        <th>Description</th> 
                        <th>Created at</th> 
                        <th>Deadline</th> 
                        <th>Assignment Style</th> 
                        <th>Create</th>
                      </tr>
                    </thead> 
                    <tbody>
                      <tr>
                        <th>1</th> 
                        <td>PBD</td> 
                        <td>Membuat trigger</td> 
                        <td>08/07/2022</td> 
                        <td>10/11/2022</td> 
                        <td>Essai</td> 
                        <td>
                          <button class="btn btn-info">Edit</button>
                          <button class="btn btn-info">Delete</button>
                        </td>
                      </tr>
                      <tr>
                        <th>2</th> 
                        <td>PAW</td> 
                        <td>Code JS</td> 
                        <td>08/07/2022</td> 
                        <td>10/11/2022</td> 
                        <td>Essai</td> 
                        <td>
                          <button class="btn btn-info">Edit</button>
                          <button class="btn btn-info">Delete</button>
                        </td>
                      </tr>
                      <tr>
                        <th>3</th> 
                        <td>JKD</td> 
                        <td>Menjekaskan TCP/IP</td> 
                        <td>08/07/2022</td> 
                        <td>10/11/2022</td> 
                        <td>Essai</td> 
                        <td>
                          <button class="btn btn-info">Edit</button>
                          <button class="btn btn-info">Delete</button>
                        </td>
                      </tr>
                      <tr>
                        <th>4</th> 
                        <td>ASD</td> 
                        <td>Sorting</td> 
                        <td>08/07/2022</td> 
                        <td>10/11/2022</td> 
                        <td>Pilgan</td> 
                        <td>
                          <button class="btn btn-info">Edit</button>
                          <button class="btn btn-info">Delete</button>
                        </td>
                      </tr>
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
