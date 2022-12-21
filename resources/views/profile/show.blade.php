@php use Carbon\Carbon; @endphp
@section('pageTitle', 'Detail User - ' . $user->name)

<x-app-layout>
    <div class="max-w-7xl mx-auto px-8 py-2">
        <div class="flex flex-row sm:justify-end my-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
            <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                <a href="{{ route('profile.edit') }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="pr-1"><i class="fa fa-edit"></i> Edit Profile</span>
                </a>
            </div>
            @can('is-student')
            <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                <a href="{{ route('profile.grade') }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="pr-1"><i class="fa-solid fa-user-graduate"></i> My Grades</span>
                </a>
            </div>
            @endcan
        </div>

        <div class="container mx-auto my-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-5 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="m-2 text-center">
                            <div class="avatar">
                                <div class="w-36 mask mask-squircle">
                                    <img src="https://avatars.dicebear.com/api/initials/{{ $user->name }}.svg"/>
                                </div>
                            </div>
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $user->name }}</h1>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">Organization Lorem</h3>

                        <ul
                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Role</span>
                                <span class="ml-auto"><span
                                        class="bg-green-500 py-1 px-2 rounded text-white text-sm">{{ $user->role }}</span></span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Member since</span>
                                <span class="ml-auto">{{ Carbon::parse($user->created_at)->format("M d, Y") }}</span>
                            </li>
                        </ul>
                    </div>
                    <!-- End of profile card -->
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-full overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-white p-5 shadow-sm rounded-sm">
                        <div class="flex items-center pb-2 space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </span>
                            <span class="tracking-wide">About</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Fullname</div>
                                    <div class="px-4 py-2">{{ $user->name }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Member since</div>
                                    <div class="px-4 py-2">{{ Carbon::parse($user->created_at)->toDayDateTimeString() }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Role</div>
                                    <div class="px-4 py-2">{{ $user->role }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of about section -->
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
