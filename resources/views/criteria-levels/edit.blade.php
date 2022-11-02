<!DOCTYPE html>
<html data-theme="lofi">

</html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.28.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Edit Course Class</title>
</head>

<body>
    <div class="container mx-auto">
        <!-- Judul -->
        <div class="container text-start p-4 text-2xl border-primary border-b-2 text-primary mt-4">
            <h1 class="font-bold text-3xl">Edit Criteria Levels</h1>
        </div>
        <!-- Akhir judul -->

        <div class="drawer drawer-mobile">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content flex flex-col">
                <!-- Page content here -->
                <div class="tabs">
                    <a class="mr-10 tab">Home ></a>
                    <a class="mr-10 tab">Criteria Levels ></a>
                    <a class="mr-10 tab tab-active">Criteria Levels Edit</a>
                </div>
                <!-- Nama Mata Kuliah -->
                <div class="container text-start p-4 text-primary mt-2">
                    <form>
                        <label class="uppercase font-bold" for="fname">nama mata kuliah/indikator</label><br>
                        <input type="text" placeholder="Type here"
                            class="input input-bordered input-ghost input-sm w-full max-w-xs mb-4 mt-2" /><br>
                    </form>
                </div>
                <div class="mx-4 w-[600px] drop-shadow rounded-md">
                    <!-- Card 1 -->
                    <details class="bg-primary open:bg-white text-white open:text-black duration-300">
                        <summary class="bg-inherit px-5 py-3 text-lg cursor-pointer">Pengembangan Aplikasi Web N01-1</summary>
                        <div class="bg-white px-5 py-3 border border-gray-300 text-medium font-light text-black">
                            <p>Mampu melaksanakan konsep Pemrograman Basis Data dalam pengembangan aplikasi</p>
                            <p></p>
                            <br>
                                <div class="text-black">
                                    <label class="uppercase font-bold" for="forms-labelOverInputCode">Point</label>
                                    <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="ex : 2.5" id="forms-labelOverInputCode"/><br><br>
                                </div>
                        </div>
                    </details>
                </div>

                <br>

                <div class="mx-4 w-[600px] drop-shadow rounded-md">
                    <!-- Card 1 -->
                    <details class="bg-primary open:bg-white text-white open:text-black duration-300">
                        <summary class="bg-inherit px-5 py-3 text-lg cursor-pointer">Pengembangan Aplikasi Web N01-2</summary>
                        <div class="bg-white px-5 py-3 border border-gray-300 text-medium font-light text-black">
                            <p>Mampu merancang dan mempresentasikan ERD dalam rencana Project Akhir kelompok</p>
                            <p></p>
                            <br>
                                <div class="text-black">
                                    <label class="uppercase font-bold" for="forms-labelOverInputCode">Point</label>
                                    <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="ex : 2.5" id="forms-labelOverInputCode"/><br><br>
                                </div>
                        </div>
                    </details>
                </div>

                <br>

                <div class="mx-4 w-[600px] drop-shadow rounded-md">
                    <!-- Card 1 -->
                    <details class="bg-primary open:bg-white text-white open:text-black duration-300">
                        <summary class="bg-inherit px-5 py-3 text-lg cursor-pointer">Pengembangan Aplikasi Web N02-1</summary>
                        <div class="bg-white px-5 py-3 border border-gray-300 text-medium font-light text-black">
                            <p>Mampu menjelaskan Konsep Stored Procedure</p>
                            <p></p>
                            <br>
                                <div class="text-black">
                                    <label class="uppercase font-bold" for="forms-labelOverInputCode">Point</label>
                                    <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="ex : 2.5" id="forms-labelOverInputCode"/><br><br>
                                </div>
                        </div>
                    </details>
                </div>

                <br>
                
                <div class="mx-4 w-[600px] drop-shadow rounded-md">
                    <!-- Card 1 -->
                    <details class="bg-primary open:bg-white text-white open:text-black duration-300">
                        <summary class="bg-inherit px-5 py-3 text-lg cursor-pointer">Pengembangan Aplikasi Web N02-2</summary>
                        <div class="bg-white px-5 py-3 border border-gray-300 text-medium font-light text-black">
                            <p>Mampu Mengimplementasikan SQL Insert, Update dan Delete dalam Stored Procedure</p>
                            <p></p>
                            <br>
                                <div class="text-black">
                                    <label class="uppercase font-bold" for="forms-labelOverInputCode">Point</label>
                                    <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="ex : 2.5" id="forms-labelOverInputCode"/><br><br>
                                </div>
                        </div>
                    </details>
                </div>

                <br>

                <div class="mx-4 w-[600px] drop-shadow rounded-md">
                    <!-- Card 1 -->
                    <details class="bg-primary open:bg-white text-white open:text-black duration-300">
                        <summary class="bg-inherit px-5 py-3 text-lg cursor-pointer">Pengembangan Aplikasi Web N02-3</summary>
                        <div class="bg-white px-5 py-3 border border-gray-300 text-medium font-light text-black">
                            <p>Mampu Mengimplementasikan Studi Kasus Conditional Statement dalam Stored Procedure</p>
                            <p></p>
                            <br>
                                <div class="text-black">
                                    <label class="uppercase font-bold" for="forms-labelOverInputCode">Point</label>
                                    <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="ex : 2.5" id="forms-labelOverInputCode"/><br><br>
                                </div>
                        </div>
                    </details>
                </div>
                
                
                <br></br>
                <div class="ml-4">
                    <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-black hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                  </div>
            </div>
            <div class="drawer-side">
                <label for="my-drawer-2" class="drawer-overlay"></label>
                <ul
                    class="menu p-4 overflow-y-auto w-80 text-primary-content font-semibold border-primary border-r-2 bg-primary">
                    <!-- Sidebar content here -->
                    <li><a class="mb-8 hover:bg-primary-content hover:text-primary">Home</a></li>
                    <li><a class="mb-8 hover:bg-primary-content hover:text-primary">Course Class</a></li>
                    <li><a class="mb-8 hover:bg-primary-content hover:text-primary">Criteria</a></li>
                    <li><a class="mb-8 hover:bg-primary-content hover:text-primary">Learning Outcomes</a></li>
                    <li><a class="mb-8 hover:bg-primary-content hover:text-primary">Username</a></li>
                </ul>
            </div>

        </div>
    </div>
</body>

</html>