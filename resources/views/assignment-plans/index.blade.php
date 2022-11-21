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
                  <div class= "grid grid-cols-2 gap-4">
                    <!-- card title-->
                      <div class="card mx-20 mt-10">
                        <div class="card w-100 bg-base-300 shadow-xl">
                          <div class="card-body">
                            <h2 class="card-title">Pemrograman Basis Data</h2>
                            <p>Pertemuan 1</p>
                            <div class="card-actions justify-end">
                              <button class="btn btn-info">Pilih</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!--end card -->
                    <!-- card title-->
                    <div class="card mx-20 mt-10">
                        <div class="card w-100 bg-base-300 shadow-xl">
                          <div class="card-body">
                            <h2 class="card-title">Pemrograman Basis Data</h2>
                            <p>Pertemuan 2</p>
                            <div class="card-actions justify-end">
                              <button class="btn btn-info">Pilih</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!--end card -->
                    <!-- card title-->
                    <div class="card mx-20 mt-10 mb-10">
                        <div class="card w-100 bg-base-300 shadow-xl">
                          <div class="card-body">
                            <h2 class="card-title">Pemrograman Basis Data</h2>
                            <p>Pertemuan 3</p>
                            <div class="card-actions justify-end">
                              <button class="btn btn-info">Pilih</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!--end card -->
                    <!-- card title-->
                    <div class="card mx-20 mt-10 mb-10">
                        <div class="card w-100 bg-base-300 shadow-xl">
                          <div class="card-body">
                            <h2 class="card-title">Pemrograman Basis Data</h2>
                            <p>Pertemuan 4</p>
                            <div class="card-actions justify-end">
                              <button class="btn btn-info">Pilih</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!--end card -->
                    </div>
                    <!--pagination-->
                    <div class="btn-group justify-end">
                      <button class="btn btn-info">Page 1</button>
                      <button class="btn btn-info">»</button>
                    </div>
                    <!--end pagination-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
