@section('pageTitle', "Home")

<x-app-layout>
    <div class="max-w-7xl mx-auto pt-8">
        <div
            class="flex w-full grid-flow-row grid-cols-12 items-start gap-4 overflow-y-hidden overflow-x-scroll px-10 pt-1 pb-10 xl:grid xl:overflow-x-auto xl:px-4">
            <div
                class="bg-base-100 rounded-box col-span-3 row-span-3 mx-2 grid w-72 flex-shrink-0 place-items-center items-center gap-4 p-4 py-8 shadow-xl xl:mx-0 xl:w-full">
                <div>
                    <div class="avatar">
                        <div class="mask mask-squircle bg-base-content h-24 w-24 bg-opacity-10 p-px">
                            <img src="https://avatars.dicebear.com/api/initials/{{ $user->name }}.svg" width="94"
                                 height="94"
                                 alt="{{ $user->name }}" class="mask mask-squircle">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="w-full">
                        <div class="text-center">
                            <div class="text-lg font-extrabold">{{ $user->name }}</div>
                            <div class="text-base-content/70 my-3 text-sm">
                                {{ $user->email }}
                                @can('is-student')
                                    @if(!empty($user->studentData->student_id_number))
                                        <br>
                                        {{ $user->studentData->student_id_number }}
                                    @else
                                        <div class="text-red-500">No student number</div>
                                    @endif
                                @endcan
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <div class="badge badge-ghost">{{ $user->role }}</div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('profile.index') }}" class="btn btn-accent btn-sm">
                    Go to profile
                </a>
            </div>

            @canany(['is-teacher', 'is-student'])
                <div
                    class="bg-base-100 rounded-box col-span-3 row-span-3 mx-2 flex w-72 flex-shrink-0 flex-col justify-center gap-4 p-4 shadow-xl xl:mx-0 xl:w-full">
                    <div class="px-1 pt-3">
                        <div class="text-xl font-extrabold pb-2">
                            <a href="{{ route('classes.index') }}">
                                {{ __('Your Classes') }}
                            </a>
                        </div>
                        <div class="text-base-content">
                            <ul class="menu overflow-visible p-0">
                                @if($classes->count() > 0)
                                    @foreach($classes as $class)
                                        <li>
                                            <a href="{{ route('classes.show', $class->id) }}">
                                                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                                     fill="none"
                                                     viewBox="0 0 24 24"
                                                     class="mr-2 inline-block h-5 w-5 stroke-current">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                                                </svg>

                                                {{ $class->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="p-3 text-red-400">
                                        @can('is-teacher')
                                            Anda belum mengajar di kelas manapun
                                        @else
                                            Anda belum terdaftar di kelas manapun
                                        @endcan
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @php($btnText = $user->role == "teacher" ? __('Create Class'): __('Join Class'))
                    @php($btnLink = $user->role == "teacher" ? route('classes.create'): route('classes.join'))
                    <a href="{{ $btnLink }}" class="btn btn-secondary btn-block space-x-2">
                    <span>{{ $btnText }}</span>
                    </a>
                </div>
            @endcanany

            @can('is-admin')
                <div class="col-span-3 row-span-1 mx-2 grid w-72 flex-shrink-0 gap-4 xl:mx-0 xl:w-auto svelte-1n6ue57">
                    <div class="bg-slate-300 text-accent-content rounded-box p-4 shadow-xl">
                        <div class="flex items-center">
                            <div class="flex-1 px-2">
                                <h2 class="text-3xl font-extrabold">{{ $facultiesCount }}</h2>
                                <p class="text-sm text-opacity-80">Fakultas</p>
                            </div>
                            <div class="flex-0">
                                <div class="flex space-x-1">
                                    <a href="{{ route('faculties.index') }}" aria-label="button component" class="btn btn-ghost btn-square">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             class="inline-block h-6 w-6 stroke-current">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 px-2 pt-4">
                            <h2 class="text-3xl font-extrabold">{{ $departmentsCount }}</h2>
                            <p class="text-sm text-opacity-80">Departemen</p>
                        </div>
                        <div class="flex-1 px-2 pt-4">
                            <h2 class="text-3xl font-extrabold">{{ $studyProgramsCount }}</h2>
                            <p class="text-sm text-opacity-80">Program Studi</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-base-100 rounded-box col-span-3 row-span-3 mx-2 flex w-72 flex-shrink-0 flex-col justify-center gap-4 p-4 shadow-xl xl:mx-0 xl:w-full">
                    <div class="px-1 pt-3">
                        <div class="text-xl font-extrabold pb-2">
                            Mata Kuliah
                        </div>
                        <div class="text-base-content">
                            <ul class="menu overflow-visible p-0">
                                @if(!empty($courses))
                                    @foreach($courses as $course)
                                        <li>
                                            <a href="{{ route('courses.show', $course) }}">
                                                {{ $course->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="p-3 text-red-400">
                                        Belum ada kelas yang dibuat
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary btn-block space-x-2">
                        <span>Selengkapnya</span>
                    </a>
                </div>
            @endcan
        </div>
    </div>
</x-app-layout>
