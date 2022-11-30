<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Course Class') }}
      </h2>
  </x-slot>

  <x-slot name="slot">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <div class="container mx-auto">
                    <!-- Judul -->
                    <div class="container text-start p-4 text-2xl border-black border-b-2 text-black mt-4">
                        <h1 class="font-bold text-3xl">Edit Course Class</h1>
                    </div>
                    <!-- Akhir judul -->
        
                    <div class="drawer drawer-mobile">
                        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
                        <div class="drawer-content flex flex-col">
                          <!-- Page content here -->
                          <div class="tabs">
                            <a class="mr-10 tab">Home ></a> 
                            <a class="mr-10 tab">Course Class ></a> 
                            <a class="mr-10 tab tab-active">Edit Course Class</a>
                          </div>
                        <br>
                          <p class="ml-5 uppercase font-bold text-sm">Nama Kelas</p>
                          <div class="ml-5">
                            <form>
                                <input type="text" placeholder="Enter text here" class="input input-bordered input-ghost input-sm w-full max-w-xs mb-4 mt-1" />
                            </form>
                          </div>
                          <p class="ml-5 uppercase font-bold text-sm mt-1">Kode Kelas</p>
                          <div class="ml-5">
                            <form>
                                <input type="text" placeholder="Enter text here" class="input input-bordered input-ghost input-sm w-full max-w-xs mb-4 mt-1" />
                            </form>
                          </div>
                          <p class="ml-5 uppercase font-bold text-sm mt-1">Mata Kuliah</p>
                          <div class="ml-5">
                            <form>
                                <input type="text" placeholder="Enter text here" class="input input-bordered input-ghost input-sm w-full max-w-xs mb-4 mt-1" />
                            </form>
                          </div>
                          <p class="ml-5 uppercase font-bold text-sm mt-1"> Kode Mata Kuliah</p>
                          <div class="ml-5">
                            <form>
                                <input type="text" placeholder="Enter text here" class="input input-bordered input-ghost input-sm w-full max-w-xs mb-4 mt-1" />
                            </form>
                          </div>
                          <p class="ml-5 uppercase font-bold text-sm mt-1">Jenis</p>
                          <div class="ml-5">
                            <form>
                                <input type="text" placeholder="Enter text here" class="input input-bordered input-ghost input-sm w-full max-w-xs mb-4 mt-1" />
                            </form>
                          </div>
                          <div class="max-w-xl mt-1 ml-5">
                            <label class="uppercase font-bold text-sm" for="fname">Edit Thumbnail </label>
                            <label
                                class="flex mt-1 justify-center w-full h-32 px-4 transition bg-white border-2 border-gray-300 border-dashed rounded-md appearance-none cursor-pointer hover:border-gray-400 focus:outline-none">
                                <span class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <span class="font-medium text-gray-600">
                                        Drop files to Attach, or
                                        <span class="text-blue-600 underline">browse</span>
                                    </span>
                                </span>
                                <input type="file" name="file_upload" class="hidden">
                            </label>
                            <button class="bg-none hover:bg-blue-500 hover:text-white text-blue-500 font-bold py-2 px-4 rounded mt-4 border-blue-500 border-2">
                                Simpan
                            </button>
                        </div>
                        </div> 
                        <div class="drawer-side">
                          <label for="my-drawer-2" class="drawer-overlay"></label> 
                          <ul class="menu p-4 overflow-y-auto w-80 text-white font-semibold border-black border-r-2 bg-black">
                            <!-- Sidebar content here -->
                            <li><a href="{{route('classes.index')}}" class="mb-8 hover:bg-white hover:text-black">Course Class</a></li>
                            <li><a href="{{route('classes.create')}}" class="mb-8 hover:bg-white hover:text-black">Add Course Class</a></li>
                            <li><a class="mb-8 hover:bg-white hover:text-black">Join Course Class</a></li>
                            <li><a class="mb-8 hover:bg-white hover:text-black">Username</a></li>
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