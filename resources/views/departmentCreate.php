<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Departement</title>
</head>

<body>
    <!-- navbar -->
    <div class="navbar bg-neutral">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Homepage</a></li>
                    <li><a>Portfolio</a></li>
                    <li><a>About</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar-center">
            <a class="btn btn-ghost normal-case text-slate-50 text-xl">CREATE NEW DEPARTEMENT</a>
        </div>
        <div class="navbar-end">


        </div>
    </div>

    <!-- card-->
    <div class="container px-10 py-20">
        <div class="card w-96 bg-primary text-primary-content m-auto shadow-xl justify-items-center">
            <div class="card-body">
                <h2 class="card-title mb-3">Departement</h2>
                <input type="text" placeholder="Pilih Fakultas" class="input input-bordered w-full max-w-xs" />
                <input type="text" placeholder="Nama Departement" class="input input-bordered w-full max-w-xs" />
                <div class="card-actions justify-end">
                </div>
            </div>
        </div>
        <button class="btn btn-primary text-slate-50 mt-3">Create</button>
    </div>
</body>

</html>