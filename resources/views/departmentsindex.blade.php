<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=H, initial-scale=1.0" />
        <title>Si-OBE</title>
        <link
            href="https://cdn.jsdelivr.net/npm/daisyui@2.38.0/dist/full.css"
            rel="stylesheet"
            type="text/css"
        />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <div class="p-10">
            <!-- breadcrumbs-->
            <div class="flex justify-between">
                <div class="flex flex-col justify-center">
                    <div class="text-sm breadcrumbs">
                        <ul>
                            <li><a>Home</a></li>
                            <li><a>Faculty</a></li>
                            <li>Department</li>
                        </ul>
                    </div>
                </div>

                <!-- user-->
                <div
                    class="h-auto w-auto px-1 py-1 rounded-full bg-gradient-to-r from-sky-500 to-indigo-500"
                >
                    <div class="flex gap-3 justify-between">
                        <div class="flex flex-col pl-5 justify-center">
                            <p class="text-black">Hello, User!</p>
                        </div>
                        <div class="avatar placeholder">
                            <div
                                class="bg-neutral-focus text-neutral-content rounded-full w-10"
                            >
                                <span class="text-xl">US</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown">
                <label tabindex="0" class="btn m-1"
                    >Fakultas Ilmu Komputer</label
                >
                <ul
                    tabindex="0"
                    class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52"
                >
                    <li><a>Fakultas Ilmu Komputer</a></li>
                    <li><a>Fakultas Ekonomi dan Bisnis</a></li>
                    <li><a>Fakultas Kedokteran</a></li>
                </ul>
            </div>
            <div class="flex justify-center pb-5">
                <p class="text-4xl font-bold">Departments</p>
            </div>

            <div class="flex justify-center">
                <div class="overflow-x-auto">
                    <table class="table w-[40rem] text-center">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Department</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row 1 -->
                            <tr class="hover">
                                <th>1</th>
                                <td>Teknik Informatika</td>
                            </tr>
                            <!-- row 2 -->
                            <tr class="hover">
                                <th>2</th>
                                <td>Sistem Informasi</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <footer class="footer footer-center p-4 bg-base-300 text-base-content">
            <div>
                <p>Copyright © 2022</p>
            </div>
        </footer>
    </body>
</html>
