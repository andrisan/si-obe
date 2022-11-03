<!DOCTYPE html>
<html data-theme="dark" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/a73fac8683.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Course Create</title>
</head>

<body>
    <!--NAVBAR-->
    <div class="navbar text-neutral-content">
        <div class="dropdown dropdown-bottom">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img src="image/ava.jpg" />
                </div>
            </label>
            <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                <li>
                    <a class="justify-between">
                        Profile
                        <span class="badge">New</span>
                    </a>
                </li>
                <li><a>Settings</a></li>
                <li><a>Logout</a></li>
            </ul>
        </div>
        <div class="flex-1">
            <a class="pl-5">
                <p class="text-m">Fairuz Nandhita Putri</p>
                <p class="text-xs">Semester 3</p>
            </a>
        </div>
    </div>
    <div class="border-b border-slate-500"></div>
    <!--END NAVBAR-->

    <!--SIDEBAR-->
    <div class="drawer drawer-mobile">
        <!-- <div class="border-r-2 border-indigo-500"> -->
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col px-10 pt-5 border-primary-content border-l border-slate-500">
            <!-- Page content here -->
            <div class="">
                <h1 class="text-xl p-2 px-4 bg-violet-600 rounded-lg mb-4 text-neutral flex-auto w-fit">RECENTLY COURSE</h1>
                <div class="grid grid-cols-2 gap-4 justify-items-center">
                    <div class="card w-full h-48 bg-neutral shadow-xl">
                        <div class="card-body">
                            <div class="grid grid-flow-col auto-cols-max justify-items-center card-body p-0">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 rounded-full">
                                        <img src="image/ava.jpg" />
                                    </div>
                                </label>
                                <div class="flex">
                                    <a class="pl-2">
                                        <p class="text-m">Pengembangan Basis Data - C</p>
                                        <p class="text-xs">Mr. Andri Santoso</p>
                                    </a>
                                </div>

                            </div>
                            <div class="card-actions justify-end gap-4">
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">OPEN</div>
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">MORE DETAILS</div>
                            </div>
                        </div>
                    </div>

                    <div class="card w-full h-48 bg-neutral shadow-xl">
                        <div class="card-body">
                            <div class="grid grid-flow-col auto-cols-max justify-items-center card-body p-0">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 rounded-full">
                                        <img src="image/ava.jpg" />
                                    </div>
                                </label>
                                <div class="flex">
                                    <a class="pl-2">
                                        <p class="text-m">Pengembangan Aplikasi Web - A</p>
                                        <p class="text-xs">Mr. Andri Santoso</p>
                                    </a>
                                </div>

                            </div>
                            <div class="card-actions justify-end gap-4">
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">OPEN</div>
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">MORE DETAILS</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="">
                <h1 class="text-xl p-2 px-4 bg-violet-600 rounded-lg mb-4 text-neutral flex-auto w-fit">MY COURSE</h1>
                <div class="grid grid-cols-2 gap-4 justify-items-center">

                    <div class="card w-full h-48 bg-neutral shadow-xl">
                        <div class="card-body">
                            <div class="grid grid-flow-col auto-cols-max justify-items-center card-body p-0">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 rounded-full">
                                        <img src="image/ava.jpg" />
                                    </div>
                                </label>
                                <div class="flex">
                                    <a class="pl-2">
                                        <p class="text-m">Pengembangan Basis Data - A</p>
                                        <p class="text-xs">Mr. Andri Santoso</p>
                                    </a>
                                </div>

                            </div>
                            <div class="card-actions justify-end gap-4">
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">OPEN</div>
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">MORE DETAILS</div>
                            </div>
                        </div>
                    </div>

                    <div class="card w-full h-48 bg-neutral shadow-xl">
                        <div class="card-body">
                            <div class="grid grid-flow-col auto-cols-max justify-items-center card-body p-0">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 rounded-full">
                                        <img src="image/ava.jpg" />
                                    </div>
                                </label>
                                <div class="flex">
                                    <a class="pl-2">
                                        <p class="text-m">Pengembangan Basis Data - B</p>
                                        <p class="text-xs">Mr. Andri Santoso</p>
                                    </a>
                                </div>

                            </div>
                            <div class="card-actions justify-end gap-4">
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">OPEN</div>
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">MORE DETAILS</div>
                            </div>
                        </div>
                    </div>

                    <div class="card w-full h-48 bg-neutral shadow-xl">
                        <div class="card-body">
                            <div class="grid grid-flow-col auto-cols-max justify-items-center card-body p-0">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 rounded-full">
                                        <img src="image/ava.jpg" />
                                    </div>
                                </label>
                                <div class="flex">
                                    <a class="pl-2">
                                        <p class="text-m">Pengembangan Basis Data - C</p>
                                        <p class="text-xs">Mr. Dwija Wisnu Brata</p>
                                    </a>
                                </div>

                            </div>
                            <div class="card-actions justify-end gap-4">
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">OPEN</div>
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">MORE DETAILS</div>
                            </div>
                        </div>
                    </div>

                    <div class="card w-full h-48 bg-neutral shadow-xl">
                        <div class="card-body">
                            <div class="grid grid-flow-col auto-cols-max justify-items-center card-body p-0">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 rounded-full">
                                        <img src="image/ava.jpg" />
                                    </div>
                                </label>
                                <div class="flex">
                                    <a class="pl-2">
                                        <p class="text-m">Pengembangan Aplikasi Web - A</p>
                                        <p class="text-xs">Mr. Buce Trias Hanggara</p>
                                    </a>
                                </div>

                            </div>
                            <div class="card-actions justify-end gap-4">
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">OPEN</div>
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">MORE DETAILS</div>
                            </div>
                        </div>
                    </div>

                    <div class="card w-full h-48 bg-neutral shadow-xl">
                        <div class="card-body">
                            <div class="grid grid-flow-col auto-cols-max justify-items-center card-body p-0">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 rounded-full">
                                        <img src="image/ava.jpg" />
                                    </div>
                                </label>
                                <div class="flex">
                                    <a class="pl-2">
                                        <p class="text-m">Pengembangan Aplikasi Web - B</p>
                                        <p class="text-xs">Mr. Fajar Pradana</p>
                                    </a>
                                </div>

                            </div>
                            <div class="card-actions justify-end gap-4">
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">OPEN</div>
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">MORE DETAILS</div>
                            </div>
                        </div>
                    </div>

                    <div class="card w-full h-48 bg-neutral shadow-xl">
                        <div class="card-body">
                            <div class="grid grid-flow-col auto-cols-max justify-items-center card-body p-0">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 rounded-full">
                                        <img src="image/ava.jpg" />
                                    </div>
                                </label>
                                <div class="flex">
                                    <a class="pl-2">
                                        <p class="text-m">Pengembangan Aplikasi Web - C</p>
                                        <p class="text-xs">Mr. Tibyani</p>
                                    </a>
                                </div>

                            </div>
                            <div class="card-actions justify-end gap-4">
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">OPEN</div>
                                <div class="text-violet-400 text-m hover:bg-violet-800 border-transparent rounded-lg p-2">MORE DETAILS</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <!-- End content -->
            <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>

        </div>
        <div class="drawer-side">
            <label for="my-drawer-2" class="drawer-overlay"></label>
            <ul class="menu p-4 overflow-y-auto w-80 bg-base-100 text-base-content">
                <!-- Sidebar content here -->
                <div class="bg-violet-600 rounded-lg mb-2">
                    <li><a><i class="fa-solid fa-house"></i>Dashboard</a></li>
                </div>
                <div class="border-b border-slate-500"></div>
                <li><a>My Classes</a></li>
                <li><a><i class="fa-solid fa-heart"></i>Pengembangan Aplikasi Web</a></li>
                <li><a><i class="fa-solid fa-heart"></i>Pemrograman Basis Data</a></li>
                <li><a><i class="fa-solid fa-heart"></i>Jaringan Komputer Dasar</a></li>
                <li><a><i class="fa-solid fa-heart"></i>Algoritma dan Struktur Data</a></li>
                <li><a><i class="fa-solid fa-heart"></i>Analisis dan Desain Sistem Informasi</a></li>
                <li><a><i class="fa-solid fa-heart"></i>Kewirausahaan</a></li>
                <li><a><i class="fa-solid fa-heart"></i>Etika Profesi</a></li>
            </ul>
        </div>
    </div>
    <!-- </div> -->
    <!--END SIDEBAR-->
</body>

</html>