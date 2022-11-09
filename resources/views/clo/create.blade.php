<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="items-center">
        <h1 class="text-4xl font-extrabold sm:pt-16 sm:pl-14 pt-16 text-center sm:text-left">Create a New CLO</h1><hr class="sm:ml-14 mt-3">
    </div>

    <div class="flex items-center justify-center pt-10">
        <div class="bg-white mx-auto formCard">
            <div class="items-left">
              <h2 class="font-semibold text-3xl text-center">Input Your New Course Learning Outcomes</h2>
            </div>
        </div>
    </div>  

    <div class="flex items-left justify-left">
        <form action="">
            <h3 class="font-semibold text-md lg:ml-14 pt-16 cloPosition">CLO POSITION</h3>
            <input type="text" placeholder="Enter Text Here..." class="input input-bordered font-regular text-base" />
            <h3 class="font-semibold text-md pt-4 lg:ml-14 cloDesc">CLO DESCRIPTION</h3>
            <textarea class="textarea textarea-bordered lg:ml-14 font-regular text-base" placeholder="Enter Text Here..."></textarea>
            <br>
            <input type="submit" value="Submit" class="btn btn-primary ml-4 lg:ml-14">
        </form>
    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
