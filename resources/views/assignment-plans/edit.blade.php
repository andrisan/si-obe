<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Assignment Plans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div data-theme="light" class="p-6 bg-white border-b border-gray-200">
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
              <input type="text" placeholder="Pemrograman Basis Data" class="input input-bordered w-full mb-5"/>
              <div class="form-control mb-5">
                <textarea class="textarea textarea-bordered h-24" placeholder="Merupakan kumpulan informasi yang disimpan didalam komputer secara sistematik."></textarea>
              </div>
              <div class="form-control w-52">
                <label class="cursor-pointer label">
                  <span class="label-text">Group Assignment</span> 
                  <input type="checkbox" class="toggle toggle-info" checked/>
                </label>
              </div>
            </div>
          </div>
        </div>
        <!--output-->
        <div>
          <div class="card w-96 bg-base-100 shadow-xl mt-10 mb-10 mx-10">
            <div class="card-body bg-stone-300">
            <p>Output</p>
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
    <button class="btn btn-info">Edit</button>
</div>
    <!--end button-->
        <!--end instruction-->

      

    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>