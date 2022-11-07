<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Fakultas') }}
    </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-10">
                <h1 class="text-4xl font-semibold">Daftar Fakultas</h1>
                <h1 class="text-xl mt-4">Cari Nama Fakultas</h1>
                
                <div class="grid">
                    <form action="" method="" class="col-start-1 col-span-3">
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                        <button class="btn btn-info font-bold ml-2">Cari</button>
                    </form>
                    <button class="btn btn-accent font-bold col-end-9 text-black">Tambah</button>
                </div>

                <div class="overflow-x-auto py-4">
                    <table class="table table-zebra w-full">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th>Id Fakultas</th>
                          <th>Nama Fakultas</th>
                          <th>Jumlah Program Studi</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1 ?>
                        @foreach ($faculties as $faculty)
                          <tr>
                            <th>{{ $i }}</th>
                            <td>{{ $faculty->name }}</td>
                            <td>{{ $faculty->jumlahProdi }}</td>
                            <td>
                              <button class="btn btn-warning btn-sm">Edit</button>
                              <button class="btn btn-error btn-sm">Delete</button>
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