<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.0/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body>

<!-- navbar--> 
<div class="navbar bg-base-100">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost btn-circle">
        <img src="img/eks.png" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"/>
      </label>
    </div>
  </div>
  <div class="navbar-center">
    <a class="btn btn-ghost normal-case text-xl">Assignment Plans</a>
  </div>
  <div class="navbar-end">
  <button class="btn btn-secondary">Simpan</button>
  </div>
</div>
<div class="flex flex-col w-full">
  <div class="divider"></div> 
</div>
</div>


<!-- card title-->
  <div >
    <div class="card w-200 bg-base-100 shadow-xl ">
      <div class="card-body">
      <div class="form-control w-full max-w-xs">
      <input type="text" placeholder="Title" class="input input-bordered w-full max-w-xs mb-5" mx-20 my-20 />
      <div class="form-control">
      <textarea class="textarea textarea-bordered h-24" placeholder="Description"></textarea>
    </div>
    </div>
        </div>
      </div>
  </div>

  <!-- card output-->
  <div class="card w-96 bg-base-100 shadow-xl mt-5">
  <div class="card-body">
    <h2 class="card-title">Output</h2>
    <textarea class="textarea textarea-bordered" placeholder="Text"></textarea>
  </div>
</div>

<!---Assignment style-->
<select class="select select-secondary w-full max-w-xs mb-5">
  <option disabled selected>Assignment style</option>
  <option>Multiple choice</option>
  <option>Essay</option>
  <option>Simple question</option>
</select>

<!--deadline -->
<div class="form-control">
  <label class="input-group input-group-md">
    <span><img src="img/Vector.png" /></span>
    <input type="text" placeholder="DD/MM/YYYY" class="input input-bordered input-md mb-5" />
  </label>
</div>

 

</div>

</body>
</html>