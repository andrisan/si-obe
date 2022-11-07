<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>


  <!-- component -->
<div class="flex items-center justify-center  px-1">
  <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
  
              <div class="max-w-sm w-72 shadow-lg border-black border-2 mt-5">
                  <div class="md:p-8 p-5  bg-white rounded-t">
                      <div class="px-4 flex items-center justify-between">
                          <span  tabindex="0" class="focus:outline-none  text-base font-bold  text-black">October 2020</span>
                          <div class="flex items-center">
                              <button aria-label="calendar backward" class="focus:text-gray-400 hover:text-gray-400 text-black ">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                  <polyline points="15 6 9 12 15 18" />
                              </svg>
                          </button>
                          <button aria-label="calendar forward" class="focus:text-gray-400 hover:text-gray-400 ml-3 text-black "> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler  icon-tabler-chevron-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                  <polyline points="9 6 15 12 9 18" />
                              </svg>
                          </button>
  
                          </div>
                      </div>
                      <div class="flex items-center justify-between  overflow-x-auto  ">
                          <table class="w-full ">
                              <thead>
                                  <tr>
                                      <th>
                                          <div class="w-full flex justify-center">
                                              <p class="text-base font-medium text-center text-black ">Mo</p>
                                          </div>
                                      </th>
                                      <th>
                                          <div class="w-full flex justify-center">
                                              <p class="text-base font-medium text-center text-black ">Tu</p>
                                          </div>
                                      </th>
                                      <th>
                                          <div class="w-full flex justify-center">
                                              <p class="text-base font-medium text-center text-black ">We</p>
                                          </div>
                                      </th>
                                      <th>
                                          <div class="w-full flex justify-center">
                                              <p class="text-base font-medium text-center text-black ">Th</p>
                                          </div>
                                      </th>
                                      <th>
                                          <div class="w-full flex justify-center">
                                              <p class="text-base font-medium text-center text-black ">Fr</p>
                                          </div>
                                      </th>
                                      <th>
                                          <div class="w-full flex justify-center">
                                              <p class="text-base font-medium text-center text-black ">Sa</p>
                                          </div>
                                      </th>
                                      <th>
                                          <div class="w-full flex justify-center">
                                              <p class="text-base font-medium text-center text-black ">Su</p>
                                          </div>
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td class="pt-6">
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center"></div>
                                      </td>
                                      <td class="pt-6">
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center"></div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center"></div>
                                      </td>
                                      <td class="pt-6">
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">1</p>
                                          </div>
                                      </td>
                                      <td class="pt-6">
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">2</p>
                                          </div>
                                      </td>
                                      <td class="pt-6">
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black ">3</p>
                                          </div>
                                      </td>
                                      <td class="pt-6">
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black ">4</p>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">5</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">6</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">7</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="w-full h-full">
                                              <div class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                                  <a  role="link" tabindex="0" class="focus:outline-none  focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:bg-indigo-500 hover:bg-indigo-500 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-indigo-700 rounded-full">8</a>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">9</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black ">10</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black ">11</p>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">12</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">13</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">14</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">15</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">16</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black ">17</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black ">18</p>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">19</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">20</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">21</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">22</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">23</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black ">24</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black ">25</p>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">26</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">27</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">28</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">29</p>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                              <p class="text-base text-black  font-medium">30</p>
                                          </div>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
                  
              </div>
          </div>


</body>

</html>
