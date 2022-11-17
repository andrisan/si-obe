<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <div class="items-start">
        <h2 class="font-semibold   text-4xl text-gray-800 leading-tight">
          {{ __('Learning Plans') }}
        </h2>
      </div>

      <div class="items-end">
        <img src="{{ asset('img/Vector(2).png') }}" alt="">
      </div>
    </div>
  </x-slot>

  <div class="grid grid-cols-4 divide-y w-full h-full">
    <div class="col-span-1 grid grid-flow-row grid-rows-none auto-rows-max divide-y overflow-y-scroll h-full">
      <div class="text-xl font-bold p-5">
        <label>Teknologi Informasi</label>
      </div>
      <div class="grid grid-flow-row grid-rows-none p-5">
        <div class="flex flex-wrap py-2">
          <label class="px-4">Analisis dan Desain Sistem Informasi</label>
        </div>
        <div class="flex flex-wrap py-2">
          <label class="px-4">Algoritma dan Struktur Data</label>
        </div>
        <div class="flex flex-wrap py-2">
          <label class="px-4">Jaringan Komputer Dasar</label>
        </div>
        <div class="flex flex-wrap py-2">
          <label class="px-4">Pemrograman Aplikasi Web</label>
        </div>
        <div class="flex flex-wrap py-2">
          <label class="px-4">Pemrograman Basis Data</label>
        </div>
      </div>
    </div>
    <div class="col-span-3 p-10 shadow-xl justify-items-auto overflow-y-auto">
      <div class="overflow-x-auto py-4">
        <table class="table table-zebra w-full">
          <!-- head -->
          <thead>
            <tr>
              <th>ID.</th>
              <th>Syllabus ID</th>
              <th>Week Number</th>
              <th>LLO ID</th>
              <th>Study Material</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Introduction</td>
              <td>Synchronus</td>
              <td>100 minutes</td>
              <td>
                <button class="btn btn-success btn-sm">Edit</button>
                <button class="btn btn-error btn-sm">Delete</button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>MVC</td>
              <td>Synchronus</td>
              <td>120 minutes</td>
              <td>
                <button class="btn btn-success btn-sm">Edit</button>
                <button class="btn btn-error btn-sm">Delete</button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>PHP</td>
              <td>Asynchronus</td>
              <td>120 minutes</td>
              <td>
                <button class="btn btn-success btn-sm">Edit</button>
                <button class="btn btn-error btn-sm">Delete</button>
              </td>
            </tr>
            <tr>
              <td>4</td>
              <td>PBD</td>
              <td>Asynchronus</td>
              <td>45 minutes</td>
              <td>
                <button class="btn btn-success btn-sm">Edit</button>
                <button class="btn btn-error btn-sm">Delete</button>
              </td>
            </tr>
            <tr>
              <td>5</td>
              <td>PHP Basics</td>
              <td>Synchronus</td>
              <td>100 minutes</td>
              <td>
                <button class="btn btn-success btn-sm">Edit</button>
                <button class="btn btn-error btn-sm">Delete</button>
              </td>
            </tr>
            <tr>
              <td>6</td>
              <td>Laravel</td>
              <td>Asynchronus</td>
              <td>45 minutes</td>
              <td>
                <button class="btn btn-success btn-sm">Edit</button>
                <button class="btn btn-error btn-sm">Delete</button>
              </td>
            </tr>
            <tr>
              <td>7</td>
              <td>Linked List</td>
              <td>Synchronus</td>
              <td>200 minutes</td>
              <td>
                <button class="btn btn-success btn-sm">Edit</button>
                <button class="btn btn-error btn-sm">Delete</button>
              </td>
            </tr>
            <tr>
              <td>8</td>
              <td>HTML</td>
              <td>Asynchronus</td>
              <td>100 minutes</td>
              <td>
                <button class="btn btn-success btn-sm">Edit</button>
                <button class="btn btn-error btn-sm">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="grid grid-cols-8 gap-4 py-4">
        <button class="btn btn-accent col-end-1">Tambah</button>
      </div>
      <form>
        <div class="flex justify-end p-4">
          <div>
            <input class="btn btn-outline btn-active m-1" type="button" value="Prev">
          </div>
          <div>
            <input class="btn btn-outline btn-active m-1" type="button" value="1">
          </div>
          <div>
            <input class="btn btn-outline btn-active m-1" type="button" value="2">
          </div>
          <div>
            <input class="btn btn-outline btn-active m-1" type="button" value="3">
          </div>
          <div>
            <input class="btn btn-outline btn-active m-1" type="button" value="Next">
          </div>
        </div>
      </form>
    </div>
  </div>

</x-app-layout>