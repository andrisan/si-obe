<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignment Kelas '.$courseclass)}}
        </h2>
    </x-slot>
    
    <div class="pb-5">
        <div class="text-sm breadcrumbs pl-8 pt-5 font-bold text-gray-600">
            <ul>
              <li><a href="">Dashboard</a></li>
              <li><a href="">Course</a></li>
              <li><a href="">{{$courseclass}}</a></li>
              <li class="text-blue-600">Assignment</li>
            </ul>
          </div>

    </div>
    <div class="py-5">
        
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
              <td>Merangkum materi bab 1</td> 
              <td>05-12-2021</td> 
              <td>01-01-2022</td> 
              <td>Minimal 15 halaman dikumpulkan dengan format pdf</td>
             
            </tr>
            <tr>
              <th>2</th> 
              <td>Membuat review materi bab 2</td> 
              <td>09-02-2022</td> 
              <td>10-02-2022</td> 
              <td>Dikerjakan secara berkelompok</td>
             
            </tr>
            <tr>
              <th>3</th> 
              <td>Membuat laporan project akhir</td> 
              <td>04-03-2022</td> 
              <td>06-03-2022</td> 
              <td>Menggunakan template yang telah disediakan</td>
        
            </tr>

          </tbody> 
        </table>
      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>