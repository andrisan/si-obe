<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Profile') }}
      </h2>
  </x-slot>

  <x-slot name="slot">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <div class="container mx-auto">

        
                    <div class="drawer drawer-mobile">
                        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
                        <div class="drawer-content flex flex-col">
                          <!-- Page content here -->
                          <div class="tabs">
                            <a class="tab">Home     ></a> 
                            <a class="tab-active">Profile     ></a> 
                          </div>
        
                        <div class="card w-100 bg-base-100 shadow-xl ml-4 mr-4 mt-5">
                          <div class="card-body">
                            <h2 class="card-title font-extrabold text-blue-600">User Details</h2>
                            <p><strong>Username</strong></p>
                            <p>{{ Auth::user()->name }}</p>
                            <p><strong>Email Address</strong></p>
                            <p><a class="hover:text-warning" href="https://mail.google.com/">{{ Auth::user()->email }}</a></p>
                            <div class="card-actions justify-end">
                              <button class="">Grade</button>
                            </div>
                          </div>
                        </div>
        
                        <!-- <div class="card w-100 bg-base-100 shadow-xl ml-4 mr-4 mt-5">
                          <div class="card-body">
                            <h2 class="card-title">Pengembangan Aplikasi Web - B</h2>
                            <p><strong>Teacher : </strong>Widhy Hayuhardhika Nugraha Putra</p>
                            <div class="card-actions justify-end">
                              <button class="">Insert Enrollment Key</button>
                            </div>
                          </div>
                        </div> -->
                          
                        </div> 
                        <div class="drawer-side">
                          <label for="my-drawer-2" class="drawer-overlay"></label> 
                          <ul class="menu p-4 overflow-y-auto w-80 text-primary-content font-semibold bg-black">
                            <!-- Sidebar content here -->
                            <li><a href="dashboard" class="mb-8 hover:bg-primary-content hover:text-blue-600">Home</a></li>
                            <li><a href="course-classes" class="mb-8 hover:bg-primary-content hover:text-blue-600">Course Class</a></li>
                            <li><a href="course-classes/new" class="mb-8 hover:bg-primary-content hover:text-blue-600">Add Course Class</a></li>
                            <li><a class="mb-8 hover:bg-primary-content hover:text-blue-600">Join Course Class</a></li>
                            <li><a href="profile" class="mb-8 hover:bg-primary-content hover:text-blue-600">Profile</a></li>
                          </ul>
                        
                        </div>
                      </div>
                </div>
                </div>
            </div>
        </div>
    </div>
  </x-slot>

</x-app-layout>