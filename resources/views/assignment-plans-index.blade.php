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
<body style="background-color: #292929">

<!-- navbar--> 
<div class="navbar" style="background-color: #292929">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost btn-circle">
        <img src="img/eks.png" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"/>
      </label>
    </div>
  </div>

  <div class="navbar-center" >
    <a class="normal-case text-xl" style="color: #BB86FC; font-size: 30px;">Assignment Plans</a>
  </div>
  <div class="navbar-end">
    <button class="btn" style="background-color: #BB86FC; text-shadow: 0px 0px 4px white; color: white;">Simpan</button>
  </div>
</div>
  <div class="flex flex-col w-full">
    <div class="divider"></div> 
  </div>
</div>

<main style="padding: 25px; overflow: auto; color: white;">
<aside style= "float: right; width: 25%; padding-left: 20px;">

<!--deadline -->
<div class="form-control">
  <label class="input-group input-group-md" >
    <span><img src="img/Vector.png"/></span>
    <input type="text" placeholder="DD/MM/YYYY" class="input input-bordered input-md mb-0" style="border-color: #BB86FC; background-color: #292929" />
  </label>
</div>

<!-- instruction-->
<div class="form-control mt-9">
  <label class="label">
    <span class="label-text">Submission Instruction</span>
  </label> 
  <textarea class="textarea textarea-bordered h-24 mb-5" placeholder="Text here" style="background-color: #121212; height: 250px;"></textarea>
</div>

<!---Assignment style-->
<select class="select w-full max-w-xs mb-5 mt-5" style="border-color: #BB86FC; background-color: #292929">
  <option disabled selected>Assignment style</option>
  <option>Multiple choice</option>
  <option>Essay</option>
  <option>Simple question</option>
</select>

</aside>
<!-- card title-->
  <div>
    <div class="card w-96 shadow-xl mb-10" style="float: left; width:75%; background-color: #35303A;" >
      <div class="card-body" style="padding: 5px 40px;border-radius: 5px; margin-top: 20px;">
        <div class="form-control w-full">
          <input type="text" placeholder="Title" class="input input-bordered w-full mb-5" style="background-color: #121212;"/>
          <div class="form-control mb-5">
            <textarea class="textarea textarea-bordered h-24" placeholder="Description" style="background-color: #121212; height: 250px;"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- card output-->
  <!--<div class="card w-96 bg-base-100 shadow-xl mt-5">
  <div class="card-body" style="padding: 5px 40px;border-radius: 5px; margin-top: 20px;">
    <h2 class="card-title">Output</h2>
    <textarea class="textarea textarea-bordered" placeholder="Text"></textarea>
  </div>
</div> -->
<div>
    <div class="card w-96 bg-base-100 shadow-xl mb-10" style="float: left; width:75%; background-color: #35303A;">
      <div class="card-body" style="padding: 5px 40px;border-radius: 5px; margin-top: 20px;">
      <h2 class="card-title">Output</h2>
        <div class="form-control w-full">
          <div class="form-control mb-5">
            <textarea class="textarea textarea-bordered h-24" placeholder="Text here" style="background-color: #121212;"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</main>
</body>
</html>