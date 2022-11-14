<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Sub CPMK') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <form class="p-5">
                    <div class="mb-5">
                      <label for="exampleInputEmail1" class="form-label font-bold" >ID</label>
                      <select class="h-10" id="exampleInputEmail1" name="exampleInputEmail1">
                        <option value="L1">L1</option>
                        <option value="L2">L2</option>
                        <option value="L3">L3</option>
                        <option value="L4">L4</option>
                      </select>
                    </div>
                    <div class="mb-5">
                      <label for="exampleInputEmail1" class="form-label font-bold">Deskripsi</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <button type="submit" class=" p-2 bg-blue-600 rounded-lg text-slate-100 hover:bg-blue-400 hover:text-slate-700 font-sans">Tambah</button>
                    <button type="submit" class="w-auto p-2 rounded-lg text-black hover:text-slate-700 font-sans">Batal</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>
  