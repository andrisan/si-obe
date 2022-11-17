<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignment Kelas')}}
        </h2>
    </x-slot>
    <div class="pb-5">
        <div class="text-sm breadcrumbs pl-8 pt-5 font-bold text-gray-600">
            <ul>
              <li><a href="">Dashboard</a></li>
              <li><a href="">Course</a></li>
              <li><a href="">cek</a></li>
              <li class="text-blue-600">Assignment</li>
            </ul>
          </div>
    </div>

    <div class="py-2">
          <div class="grid">
            <form action="" class="col-end-9 pb-4 flex ">
              <button class="btn btn-accent font-bold text-black ">Tambah</button>
            </form>
          </div>

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
              <th>Opsi</th>
            </tr>
          </thead> 
          <tbody>
            <?php $i = 1 ?>
            @foreach($assignments as $as)
            <tr>
              <th>{{$i}}</th>
              <td>{{$as->title}}</td>
              <td>{{$as->assigned_date}}</td>
              <td>{{$as->due_date}}</td>
              <td>{{$as->note}}</td>
              <td>
                <div class="flex items-strecth">
                  <form action="" method="get">
                    <button class="btn btn-warning btn-sm m-1" value="">Edit</button>
                  </form>
                  <form action="" method="get">
                    <button class="btn btn-error btn-sm m-1" value=""
                      onclick="return confirm('Yakin ingin menghapus data ?');">Delete</button>
                  </form>
                </div>
              </td>
            </tr>
            <?php $i++ ?>
            @endforeach
          </tbody> 
        </table>
      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>