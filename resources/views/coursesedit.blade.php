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

        <div class="col-span-4 p-10 shadow-xl justify-items-auto overflow-y-auto h-screen">
            <form action="" method="">
                <div class="text-xl font-bold p-4 pb-8">
                    <input class="bg-inherit" type="label" name="course" value="Edit Course A" disabled>
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