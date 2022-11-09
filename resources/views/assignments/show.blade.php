<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
              <th>No.</th> 
              <th>Assignment</th> 
              <th>Assigned Date</th> 
              <th>Due Date</th> 
              <th>Note</th> 
        
            </tr>
          </thead> 
          <tbody>
            <tr>
              <th>1</th> 
              <td>Lorem, ipsum.</td> 
              <td>05-12-2012</td> 
              <td>01-01-2013</td> 
              <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, at?</td>
             
            </tr>
            <tr>
              <th>2</th> 
              <td>Lorem, ipsum dolor.</td> 
              <td>09-02-2013</td> 
              <td>10-02-2013</td> 
              <td>Lorem ipsum dolor sit amet consectetur.</td>
             
            </tr>
            <tr>
              <th>3</th> 
              <td>Lorem ipsum dolor sit.</td> 
              <td>04-03-2013</td> 
              <td>06-03-2013</td> 
        
            </tr>

          </tbody> 
        </table>
      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
