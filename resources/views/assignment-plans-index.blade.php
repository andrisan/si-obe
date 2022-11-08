<!DOCTYPE html>
<html lang="en" data-theme="light">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.0/dist/full.css" rel="stylesheet" type="text/css" />
      <script src="https://cdn.tailwindcss.com"></script>

      <title>Assignments Plans</title>
  </head>
  <body>
    <!-- navbar--> 
    <div class="navbar">
      <div class="navbar-start">
        <div class="dropdown">
          <label tabindex="0" class="btn btn-ghost btn-circle mx-10 mt-5">
            <button class="btn btn-circle btn-outline btn-info">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
          </label>
        </div>
      </div>

      <div class="navbar-center" >
        <a class="normal-case text-xl">Assignment Plans</a>
      </div>
    
    </div>
    <!--divider-->
      <div class="flex flex-col w-full">
        <div class="divider"></div> 
      </div>
    <!--end divider-->
    </div>
<!--end navbar-->

    <!---Assignment style-->
    <select class="select select-bordered border-info w-full max-w-xs mx-10 mb-10 mt-5">
      <option disabled selected>Assignment Style</option>
      <option>Multiple choice</option>
      <option>Essay</option>
      <option>Simple question</option>
    </select>
    <!--end Assignment style-->

    <!--deadline -->
    <div class="form-control float-right mx-10 mt-5">
      <label class="input-group input-group-md" >
        <span><img src="img/Vector.png"/></span>
        <input type="text" placeholder="DD/MM/YYYY" class="input input-bordered input-md mb-0"/>
      </label>
    </div>
    <!--end deadline-->

    <!-- card title-->
    <div class="card float-left shadow-xl mx-10">
        <div class="card w-96 shadow-xl mt-10 mx-10  bg-stone-300">
          <div class="card-body card-bordered">
            <div class="form-control w-full">
              <input type="text" placeholder="Title" class="input input-bordered w-full mb-5"/>
              <div class="form-control mb-5">
                <textarea class="textarea textarea-bordered h-24" placeholder="Description"></textarea>
              </div>
              <div class="form-control w-52">
                <label class="cursor-pointer label">
                  <span class="label-text">Group Assignment</span> 
                  <input type="checkbox" class="toggle toggle-info" checked />
                </label>
              </div>
            </div>
          </div>
        </div>
        <!--output-->
        <div>
          <div class="card w-96 bg-base-100 shadow-xl mt-10 mb-10 mx-10">
            <div class="card-body bg-stone-300">
            <h2 class="card-title">Output</h2>
              <div class="form-control w-full">
                <div class="form-control mb-5">
                  <textarea class="textarea textarea-bordered h-24" placeholder="Text here"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!--end output-->
    </div>
    <!--end card -->

    <!--  submissioninstruction-->
    <div class="form-control mx-10">
          <label class="label">
            <span class="label-text">Submission Instruction</span>
          </label> 
          <textarea class="textarea textarea-bordered mt-5 mb-5 h-24" placeholder="Text here"></textarea>
        </div>
<!--button-->
<div class="navbar-end mx-10 mt-5">
        <button class="btn btn-info">Simpan</button>
      </div>
    <!--end button-->
        <!--end instruction-->

      

    </div>
  </body>
</html>