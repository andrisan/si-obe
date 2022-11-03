<!DOCTYPE html>
<html lang="en" data-theme="night">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>PHP Basics</title>

    <style>
        .label {
            margin: 0 3%;
            padding: 0.25rem 0.5rem;
            box-sizing: border-box;
        }

        .list {
            margin: 0 3%;
            padding: 0.25rem 0.5rem;
            box-sizing: border-box;
            width: 94%;
        }
    </style>
</head>

<body>
    <div class="divide-y">

    </div>
    <div class="grid grid-cols-4 divide-y w-full h-full">
        <div class="col-span-4 flex flex-wrap items-center px-4">
            <div class="p-4">
                <img class="w-8 h-8" src="img/avatar.png">
            </div>
            <div>
                Anonymous
            </div>
        </div>
        <div class="col-span-1 grid grid-flow-row grid-rows-none auto-rows-max divide-y overflow-y-auto h-screen">
            <div class="text-xl font-bold p-5">
                <label>My Course</label>
            </div>
            <div class="grid grid-flow-row grid-rows-none p-5">
                <table class="table table-zebra w-full">
                    <tbody>
                        <!-- row 1 -->
                        <tr>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </td>
                            <td>
                                <label class="px-4">Course 1</label>
                            </td>
                        </tr>
                        <!-- row 2 -->
                        <tr>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </td>
                            <td>
                                <label class="px-4">Course 2</label>
                            </td>
                        </tr>
                        <!-- row 3 -->
                        <tr>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </td>
                            <td>
                                <label class="px-4">Course 3</label>
                            </td>
                        </tr>
                        <!-- row 4 -->
                        <tr>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </td>
                            <td>
                                <label class="px-4">Course 4</label>
                            </td>
                        </tr>
                        <!-- row 5 -->
                        <tr>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </td>
                            <td>
                                <label class="px-4">Course 5</label>
                            </td>
                        </tr>
                        <!-- row 6 -->
                        <tr>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </td>
                            <td>
                                <label class="px-4">Course 6</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="grid justify-end row-end-auto p-5 ">
                <form>
                    <input class="btn btn-active btn-error m-1" type="button" value="Logout">
                </form>
            </div>
        </div>

        <div class="col-span-3 p-10 shadow-xl justify-items-auto overflow-y-auto h-screen">
            <form action="" method="">
                <div class="text-xl font-bold p-4 pb-8">
                    <input class="bg-inherit" type="label" name="course" value="Edit course" disabled>
                </div>


                <div class="grid grid-rows-6 grid-flow-col">
                    <div class="font-bold label">
                        <label for="s_program">Study Program</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-300 text-slate-800  list" type="text" name="s_program"
                            value="Study Program" disabled>
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Course</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list" type="text" name="c_name" value="Course A">
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Course Code</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list" type="text" name="c_name" value="c6Nxy8">
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Course Credit</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list w-5/6" type="number" value="1" name="c_name"
                            min="1" max="4">
                        <label>SKS</label>
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Lab Credit</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list w-5/6" type="number" value="0" name="c_name"
                            min="0" max="2">
                        <label>SKS</label>
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Type Course</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list" type="text" name="c_name"
                            value="Lorem ipsum...">
                    </div>
                </div>
                <div class="grid grid-rows-4 grid-flow-col">
                    <div class="font-bold label">
                        <label for="c_name">Descrpition</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list" type="text" name="c_name"
                            value="Lorem ipsum...">
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Minimal Requiretment</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list" type="text" name="c_name"
                            value="Lorem ipsum...">
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Study Material Summary</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list" type="text" name="c_name"
                            value="Lorem ipsum...">
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Learning Media</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list" type="text" name="c_name"
                            value="Lorem ipsum...">
                    </div>
                </div>
                <div class="flex justify-end p-4">
                    <div>
                        <input class="btn btn-active btn-error m-1" type="button" value="Cancel">
                    </div>
                    <div>
                        <input class="btn btn-active btn-warning m-1" type="reset">
                    </div>
                    <div>
                        <input class="btn btn-active btn-success m-1" type="submit" name="save" value="Save">
                    </div>

                </div>
            </form>
        </div>
    </div>

</body>