@section('pageTitle', "Home")

<x-app-layout>
    <div class="max-w-7xl mx-auto pt-8">
        <div class="flex w-full grid-flow-row grid-cols-12 items-center gap-4 overflow-y-hidden overflow-x-scroll px-10 pt-1 pb-10 xl:grid xl:overflow-x-auto xl:px-4">
            <div class="bg-base-100 rounded-box col-span-3 row-span-3 mx-2 grid w-72 flex-shrink-0 place-items-center items-center gap-4 p-4 py-8 shadow-xl xl:mx-0 xl:w-full">
                <div>
                    <div tabindex="0">
                        <div class="online avatar">
                            <div class="mask mask-squircle bg-base-content h-24 w-24 bg-opacity-10 p-px">
                                <img src="https://avatars.dicebear.com/api/initials/{{ $user->name }}.svg" width="94" height="94"
                                    alt="{{ $user->name }}" class="mask mask-squircle"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="w-full">
                        <div class="text-center">
                            <div class="text-lg font-extrabold">{{ $user->name }}</div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('profile.index') }}" class="btn btn-accent btn-sm">Profile</a>
            </div>
        </div>
    </div>
</x-app-layout>
