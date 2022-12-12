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
        
                        <div class="card w-100 bg-base-100 shadow-xl ml-4 mr-4 mt-5 h-max">
                          <div class="card-body h-200 flex flex-col lg:flex-row">
                            <div class="grid flex-grow place-items-start">
                              <h2 class="card-title font-extrabold text-blue-600">User Details</h2>
                              <p class="mt-2"><strong>Username</strong></p>
                              <p>{{ $user->name }}</p>
                              <p class="mt-2"><strong>NIM</strong></p>
                              <p>{{ $user->studentData->student_id_number ?? "Belum memiliki NIM"}}</p>
                              <p class="mt-2"><strong>Role</strong></p>
                              <p>{{ $user->role }}</p>
                              <p class="mt-2"><strong>Email Address</strong></p>
                              <p><a class="hover:text-warning" href="https://mail.google.com/">{{ $user->email }}</a></p>
                              <br>
                              <div class="card-actions">
                                <button class="bg-blue-600 hover:bg-white hover:text-blue-600 text-white font-bold py-2 px-4 rounded border-blue-600 border-2">
                                  <a href="{{ route('profile.grade') }}">
                                    Grade
                                  </a>
                                </button>
                              </div>
                            </div>
                            <div class="grid flex-grow card place-items-center mt-8">
                              <img class="rounded-full overflow-hidden shadow-lg w-60 h-60 mb-20" src="img/Default.png" alt="">
                            </div>
                          </div>
                        </div>
                          
                        </div>
                      </div>
                </div>
                </div>
            </div>
        </div>
    </div>
  </x-slot>

</x-app-layout>