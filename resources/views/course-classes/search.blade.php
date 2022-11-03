<!DOCTYPE html>
<html data-theme="lofi"></html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/daisyui@2.28.0/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <title>Search Course Class</title>
    </head>
    <body>

        <div class="container mx-auto">
            <!-- Judul -->
            <div class="container text-start p-4 text-2xl border-primary border-b-2 text-primary mt-4">
                <h1 class="font-bold text-3xl">Search Course Class</h1>
            </div>
            <!-- Akhir judul -->

            <div class="drawer drawer-mobile">
                <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content flex flex-col">
                  <!-- Page content here -->
                  <div class="tabs">
                    <a class="mr-10 tab">Home ></a> 
                    <a class="mr-10 tab">Course Class ></a> 
                    <a class="mr-10 tab tab-active">Pengembangan Aplikasi Web</a>
                  </div>

                <div class="form-control ml-4 text-sm max-w-xl mb-0 mt-5" id="kodekelas">
                  <label class="uppercase font-bold" for="fname">Nama kelas</label>
                  <div class="input-group mt-2">
                      <input type="text" placeholder="Enter text here" class="input input-bordered w-full" />
                      <select class="select select-bordered hover:bg-base">
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

                <div class="card w-100 bg-base-100 shadow-xl ml-4 mr-4 mt-5">
                  <div class="card-body">
                    <h2 class="card-title">Pengembangan Aplikasi Web - A</h2>
                    <p><strong>Teacher : </strong>Andri Santoso, S.Kom., M.Sc.</p>
                    <div class="card-actions justify-end">
                      <button class="">Insert Enrollment Key</button>
                    </div>
                  </div>
                </div>

                <div class="card w-100 bg-base-100 shadow-xl ml-4 mr-4 mt-5">
                  <div class="card-body">
                    <h2 class="card-title">Pengembangan Aplikasi Web - B</h2>
                    <p><strong>Teacher : </strong>Widhy Hayuhardhika Nugraha Putra</p>
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
                  <ul class="menu p-4 overflow-y-auto w-80 text-primary-content font-semibold border-primary border-r-2 bg-primary">
                    <!-- Sidebar content here -->
                    <li><a class="mb-8 hover:bg-primary-content hover:text-primary">Home</a></li>
                    <li><a class="mb-8 hover:bg-primary-content hover:text-primary">Course Class</a></li>
                    <li><a class="mb-8 hover:bg-primary-content hover:text-primary">Add Course Class</a></li>
                    <li><a class="mb-8 hover:bg-primary-content hover:text-primary">Join Course Class</a></li>
                    <li><a class="mb-8 hover:bg-primary-content hover:text-primary">Username</a></li>
                  </ul>
                
                </div>
              </div>

        </div>
    </body>
</html>