<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Grade Show</title>
</head>

<body>
    <div class="grid grid-cols-4 divide-y w-full h-full">
        <div class="col-span-4 flex flex-wrap items-center px-4">
            <div class="p-4">
                <img class="w-8 h-8" src="img/avatar.png">
            </div>
            <div>
                Anonymous
            </div>
        </div>
        <div class="col-span-1 grid grid-flow-row grid-rows-none auto-rows-max divide-y overflow-y-scroll h-full">
            <div class="text-xl font-bold p-5">
                <label>Assignments</label>
            </div>
            <div class="grid grid-flow-row grid-rows-none p-5">
                <div class="flex flex-wrap py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>
                    <label class="px-4">Assignment 1</label>
                </div>
                <div class="flex flex-wrap py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>
                    <label class="px-4">Assignment 2</label>
                </div>
                <div class="flex flex-wrap py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>
                    <label class="px-4">Assignment 3</label>
                </div>
                <div class="flex flex-wrap py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>
                    <label class="px-4">Assignment 4</label>
                </div>
                <div class="flex flex-wrap py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>
                    <label class="px-4">Assignment 5</label>
                </div>
            </div>
            <div class="grid justify-end row-end-auto p-5 ">
                <form>
                    <input class="btn btn-active btn-error m-1" type="button" value="Logout">
                </form>
            </div>

        </div>
        <div class="col-span-3 p-10 shadow-xl justify-items-auto overflow-y-auto">
            <h1 class="text-4xl font-semibold text-primary-content">Student Grade - Assignment 1</h1>
            <div class="grid grid-cols-8 gap-4 py-4">
                <button class="btn btn-accent col-end-1">Tambah</button>
            </div>
            <div class="overflow-x-auto py-4">
                <table class="table table-zebra w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>Kelas</th>
                            <th>Assignments</th>
                            <th>Nilai</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Farhan</td>
                            <td>123000111</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>80</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kurniawan</td>
                            <td>123000112</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>82</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Suci</td>
                            <td>123000212</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>78</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ahmad</td>
                            <td>123100102</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>85</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Agung</td>
                            <td>123100112</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>82</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Bayu</td>
                            <td>123101105</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>66</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Rizky</td>
                            <td>123101108</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>78</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Faiz</td>
                            <td>123101110</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>84</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form>
                <div class="flex justify-end p-4">
                    <div>
                        <input class="btn btn-outline btn-active m-1" type="button" value="Prev">
                    </div>
                    <div>
                        <input class="btn btn-outline btn-active m-1" type="button" value="1">
                    </div>
                    <div>
                        <input class="btn btn-outline btn-active m-1" type="button" value="2">
                    </div>
                    <div>
                        <input class="btn btn-outline btn-active m-1" type="button" value="3">
                    </div>
                    <div>
                        <input class="btn btn-outline btn-active m-1" type="button" value="Next">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>