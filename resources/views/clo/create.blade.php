<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="max-w-full">
        <h1 class="text-4xl font-extrabold sm:pt-16 sm:pl-14 pt-16 text-center sm:text-left">Create a New CLO</h1><hr class="sm:ml-14 mt-3">
    </div>

    <div class="flex items-center justify-center py-10">
        <div class="card bg-white mx-auto formCard">
            <div class="card-body items-left lg:items-center">
              <h2 class="card-title text-center justify-center font-semibold text-2xl">Input Your New Course Learning OutcomesData</h2>
              <form action="/clo/bla" method="get">
                <h3 class="text-left lg:text-center font-semibold text-sm pt-16 cloLocaton">CLO LOCATION</h3>
                <input type="text" placeholder="Enter Text Here..." class="input input-bordered w-full max-w-xs font-regular font-base" />
                <h3 class="text-left lg:text-center font-semibold text-sm pt-4 cloDesc">CLO DESCRIPTION</h3>
                <textarea class="textarea textarea-bordered w-full max-w-md font-regular text-base" placeholder="Enter Text Here..."></textarea>
                <input type="submit" class="btn btn-primary">
              </form>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
        @media (min-width: 1024px) {
            .formCard{
                border: 3px solid #e0e2e7;
                width: 861px;
            }

            .cloLocation{
                padding-right: 29rem;
            }

            .cloDesc{
                padding-right: 27rem;
            }

            input[type=text]{
                margin-right: 16rem;
                margin-top: 1rem;
            }

            .textarea-bordered{
                margin-right: 8rem;
                width: 524px;
                height: 226px;
                resize: none;
            }
        }

        body{
            font-family: 'Inter', sans-serif;
            color: black;
            background-color: white;
        }

        hr{
            width: full;
            height: 0px;
            border: 3px solid #e0e2e7;
            flex: none;
            order: 1;
            align-self: stretch;
            flex-grow: 0;
        }

        .formIsi{
            position: absolute;
            width: 861px;
            height: 665px;
            left: 427px;
            top: 213px;
        }

        .formCard{
            border: 3px solid #e0e2e7;
        }

        .iloPosition{
            letter-spacing: 0.1em;
            padding-left: 3.5rem;
        }

        .iloDesc{
            letter-spacing: 0.1em;
            padding-left: 3.5rem;
        }

        input[type=text]{
            border: 3px solid #e0e2e7;
            background-color: white;
            margin-left: 56px;
            margin-top: 1rem;
        }

        .textarea-bordered{
            border: 3px solid #e0e2e7;
            background-color: white;
            margin-top: 1rem;
            margin-left: 56px;
            height: 266px;
            resize: none;
        }

        .btn.btn-primary{
            background-color: #2E65F3;
            border: none;
        }

        input[type=submit]{
            margin-top: 2.5rem;
            margin-left: 3.5rem;
            width: 117px;
        }

    </style>
