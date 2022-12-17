@php($title = Auth::user()->role == 'admin' ? __('All classes') : __('Your classes'))
@section('pageTitle', $title)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('classes.index') }}
        <div class="container pb-8">
            <div class="flex flex-row sm:justify-between mb-3 p-4 sm:px-0 -mr-2 sm:-mr-3">
                <form action="{{ route('classes.index') }}" method="get" class="w-1/3">
                    <div class="">
                        <div class="form-control">
                            <div class="input-group">
                                <input type="text" name="search" placeholder="Search…" class="w-full input input-bordered" value="{{ request('search') }}"/>
                                <button class="btn btn-square">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                    @if(Auth::user()->role == 'student')
                        <x-button-link href="{{route('classes.show_join')}}">
                            <i class="fa fa-plus"></i> {{ __('Join Class') }}
                        </x-button-link>
                    @else
                        <x-button-link href="{{ route('classes.create') }}">
                            <i class="fa fa-plus"></i> {{ __('Create Class') }}
                        </x-button-link>
                    @endif
                </div>
            </div>
            @if($classes->count() > 0)
                <ul class="grid md:grid-cols-3 text-white mb-4 gap-x-6 gap-y-4 md:gap-y-12">
                    @foreach ($classes as $class)
                        <li class="flex flex-col p-2 overflow-hidden bg-gray-700 border-t border-gray-600 shadow-2xl shadow-primary-800/10 rounded-xl">
                            <a href="{{ route('classes.show', $class) }}" class="block">
                                <img src="{{ $class->thumbnail_img ? url('storage/'.substr($class->thumbnail_img, 6)) : "https://via.placeholder.com/374x210/000000/FFFFFF?text=$class->name" }}" class="aspect-[16/9] bg-gray-800 rounded-lg">
                            </a>

                            <header class="flex flex-col grow justify-between px-2 py-4 mt-2">
                                <h2 class="text-xl font-bold">
                                    <a href="{{ route('classes.show', $class) }}">{{ $class->name }}</a>
                                </h2>

                                <ul class="flex flex-wrap items-center gap-4 mt-6 text-sm">
                                    <li class="flex items-center gap-2">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                        <span>{{ $class->course->name }}</span>
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <i class="fa-solid fa-users-rectangle"></i>
                                        <span>{{ $class->students->count()." students" }}</span>
                                    </li>

                                </ul>
                            </header>
                        </li>
                    @endforeach
                </ul>
                {{ $classes->links() }}
            @else
                <div class="text-center">
                    <p class="text-gray-500">{{ __('No classes found.') }}</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
