<html>
    <head>
        @vite('resources/css/app.css')
    </head>
    <body>
         <div class="flex h-screen justify-center items-center bg-indigo-100">
            <div class="m-auto bg-white p-8 rounded-2xl">
                <h1 class="mb-4 text-4xl font-bold tracking-tight leading-none text-indigo-400 md:text-5xl lg:text-6xl dark:text-white pb-14">
                Criterias<span class="bg-blue-100 text-blue-800 text-3xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-2">EDIT</span>
                </h1>
                <form action="foo/barr">
                    <div class="pb-4">
                        <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">Title</strong></label></div>
                        <input type="text" placeholder="Judul kriteria" class="input input-bordered w-full max-w-xs" /> <br>
                    </div>
                    <div class="pb-4">
                    <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">Description</strong></label></div>
                        <textarea class="textarea textarea-bordered w-full" placeholder="Deskripsi kriteria"></textarea>
                    </div>
                    <div class="pb-4">
                        <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">Max Point</strong></label></div>
                        <input type="text" placeholder="Poin max kriteria" class="input input-bordered w-full max-w-xs" /> <br>
                    </div>
                </form>
                <input type="submit" value="Edit" class="btn btn-active rounded-md " />
                <button class="btn btn-outline rounded-md">Cancel</button>
            </div>
         </div> 
    </body>
</html>