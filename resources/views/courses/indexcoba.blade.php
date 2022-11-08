<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Course Class') }}
        </h2>
    </x-slot>
  
    <x-slot name="slot">
      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container mx-auto">
                      <!-- Judul -->
                      <div class="container text-start p-4 text-2xl border-gray-400 border-b-2 text-primary mt-4">
                          <h1 class="font-bold text-3xl text-blue-600">Search Course Class</h1>
                      </div>
                      <!-- Akhir judul -->
          
                      <div class="drawer drawer-mobile">
                          <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
                          <div class="drawer-content flex flex-col">
                            <!-- Page content here -->
                            <div class="tabs">
                              <a class="mr-10 tab text-blue-600"> <strong>Home ></strong></a> 
                              <a class="mr-10 tab text-gray-600"><strong>Course</strong></a> 
                            </div>
          
                          <div class="form-control ml-4 text-sm max-w-xl mb-0 mt-5 " id="kodekelas">
                            <label class="uppercase font-bold" for="fname">Nama kelas</label>
                            <div class="input-group mt-2">
                                <input type="text" placeholder="Enter text here" class="mr-2 input rounded-r-md border-gray-200 bg-gray-200 w-full" />
                                <select class="select select-bordered hover:bg-base text-gray-400 bg-gray-200">
                                    <option>Pengembangan Aplikasi Web</option>
                                    <option>Pemrograman Basis Data</option>
                                    <option>Statistika</option>
                                    <option>Algoritma dan Struktur Data</option>
                                </select>
                                <button class="btn btn-square">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                                </button>
                            </div>
                          </div>
          
                          <div class="card w-100  shadow-xl ml-4 mr-4 mt-5 ">
                            <div class="card-body">
                              <h2 class="card-title">Pemrograman Basis Data</h2>
                              <p>CD0970 - <strong>Elective</strong> - Panopto </p>
                              <div class="card-actions justify-end">
                                <button class="">Insert Enrollment Key</button>
                              </div>
                            </div>
                          </div>
          
                          <div class="card w-100  shadow-xl ml-4 mr-4 mt-5 ">
                            <div class="card-body">
                              <h2 class="card-title">Pengembangan Aplikasi Web</h2>
                              <p>CD0980 - <strong>Mandatory</strong> - Classrom/ELING </p>
                              <div class="card-actions justify-end">
                                <button class="">Insert Enrollment Key</button>
                              </div>
                            </div>
                          </div>
          
                          <div class="btn-group mx-auto mt-5">
                            <button class="btn">&lt</button>
                            <button class="btn">1</button>
                            <button class="btn">2</button>
                            <button class="btn btn-disabled">...</button>
                            <button class="btn">5</button>
                            <button class="btn">&gt</button>
                          </div>
                            
                          </div> 
                          <div class="drawer-side">
                            <label for="my-drawer-2" class="drawer-overlay"></label> 
                            <ul class="menu p-4 overflow-y-auto w-80 text-primary-content font-semibold border-gray-400 border-r-2 bg-white">
                              <!-- Sidebar content here -->
                              <li><a class="mb-8 hover:bg-primary-content text-blue-600">Home</a></li>
                              <li><a class="mb-8 hover:bg-primary-content text-blue-600">Course Class</a></li>
                              <li><a class="mb-8 hover:bg-primary-content text-blue-600">Add Course Class</a></li>
                              <li><a class="mb-8 hover:bg-primary-content text-blue-600">Join Course Class</a></li>
                              <li><a class="mb-8 hover:bg-primary-content text-blue-600">Username</a></li>
                            </ul>
                          
                          </div>
                        </div>
                  </div>
                  </div>
              </div>
          </div>
      </div>
    </x-slot>
  
  </x-app-layout>