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
                <h1 class="text-xl mt-2">Cari Nama Fakultas</h1>
                
                <div class="grid">
                    <form action="" method="" class="col-start-1 col-span-3">
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                        <button class="btn btn-primary ml-2">Cari</button>
                    </form>
                    <button class="btn btn-accent col-end-9 text-black">Tambah</button>
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
                        <!-- row 1 -->
                        <tr>
                          <th>1</th>
                          <td>Fakultas Ilmu Komputer</td>
                          <td>5</td>
                          <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-error btn-sm">Delete</button>
                          </td>
                        </tr>
                        <!-- row 2 -->
                        <tr>
                          <th>2</th>
                          <td>Fakultas Kedokteran</td>
                          <td>3</td>
                          <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-error btn-sm">Delete</button>
                          </td>
                        </tr>
                        <!-- row 3 -->
                        <tr>
                          <th>3</th>
                          <td>Fakultas Perikanan</td>
                          <td>2</td>
                          <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-error btn-sm">Delete</button>
                          </td>
                        </tr>
                        <!-- row 4 -->
                        <tr>
                          <th>4</th>
                          <td>Fakultas Ilmu Budaya</td>
                          <td>3</td>
                          <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-error btn-sm">Delete</button>
                          </td>
                        </tr>
                        <!-- row 5 -->
                        <tr>
                          <th>5</th>
                          <td>Fakultas Ilmu Administrasi</td>
                          <td>6</td>
                          <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-error btn-sm">Delete</button>
                          </td>
                        </tr>
                        <!-- row 6 -->
                        <tr>
                          <th>6</th>
                          <td>Fakultas Hukum</td>
                          <td>1</td>
                          <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-error btn-sm">Delete</button>
                          </td>
                        </tr>
                        <!-- row 7 -->
                        <tr>
                          <th>7</th>
                          <td>Fakultas Teknik Pertanian</td>
                          <td>3</td>
                          <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-error btn-sm">Delete</button>
                          </td>
                        </tr>
                        <!-- row 8 -->
                        <tr>
                          <th>8</th>
                          <td>Fakultas ABC</td>
                          <td>3</td>
                          <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-error btn-sm">Delete</button>
                          </td>
                        </tr>
                        <!-- row 9 -->
                        <tr>
                          <th>9</th>
                          <td>Fakultas DEF</td>
                          <td>6</td>
                          <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-error btn-sm">Delete</button>
                          </td>
                        </tr>
                        <!-- row 9 -->
                        <tr>
                          <th>10</th>
                          <td>Fakultas GHI</td>
                          <td>7</td>
                          <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-error btn-sm">Delete</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>