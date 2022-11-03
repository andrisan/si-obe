<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Rubric') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white h-screen shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <div class="mx-28 pt-14">
                </div>
                <div class="">
                  <div class="flex justify-between border-b-2 border-blue-300 pb-4 ">
                    <div class="judul  ">
                      <h1 class="text-3xl  font-extrabold" style="font-weight: 900;">Pemrograman Aplikasi Web</h1>
                    </div>
                  </div>
                  <div class="flex  mt-5 space-x-5 relative">
              
              <div class="right-0 float-right absolute">
                
              <div class="mt-20 border- border-[#2E65F3]">
                    <table  class="table-fixed border- border-[#2E65F3] w-full" border="2">
                      <thead>
                        <tr class="bg-[#F7F7F9] border-2 h-10">
                          <th class="w-10 ">No</th>
                          <th class="w-48 ">NIM</th>
                          <th class="w-[30rem] border-collapse ">Nama</th>
                          <th class="">Submission</th>
                          <th class="">ABS</th>
                          <th class="">UTS</th>
                          <th class="">UAS</th>
                          <th class="pr-5 ">Nilai Akhir</th>
                        </tr>
                      </thead>
                      <tbody class="text-center border-2 border-black">
                        <tr class="border-2 h-14 ">
                          <td>1</td>
                          <td>215150701111002</td>
                          <td>Ferdinand Pratama Putra</td>
                          <td><button class="bg-[#678CD3] hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                              Lihat
                            </button></td>
                          <td>80</td>
                          <td>80</td>
                          <td>80</td>
                          <td class="pr-5">B</td>
              
                        </tr>
                        <tr class="border-2 h-14">
                          <td>2</td>
              
                        </tr>
                        <tr class="border-2 h-14">
                          <td>3</td>
              
                        </tr>
                        <tr class="border-2 h-14">
                          <td>4</td>
              
                        </tr>
                        <tr class="border-2 h-14">
                          <td>5</td>
              
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="bg-[#F7F7F9] mt-10 px-2 py-2 right-0 absolute border-2 border-black rounded-md text-black">
                    <select name="" id="">
                        <option value="">10 more pages</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
              </div>
              
              </div>
              
              </div>
          </div>
      </div>
  </div>
</x-app-layout>


<!DOCTYPE html>
<html lang="en">

