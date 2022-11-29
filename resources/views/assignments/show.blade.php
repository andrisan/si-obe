@php use Carbon\Carbon; @endphp

@section('pageTitle', "$courseClass->name Assigment Detail")

<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-row gap-4">
      <div class="ke-1 mt-0">
          <button class="btn btn-circle btn-outline btn-sm">
              <a href="{{ route('course-classes.assignments.index', [$courseClass, $assignment]) }}">
                  <img src="https://cdn-icons-png.flaticon.com/512/190/190238.png?w=740&t=st=1668970333~exp=1668970933~hmac=be329b3d7ed69e55649200287d39a96f6c1d5dd035b7c530dbfadc51480a1754"
                      alt="" class="w-4">
              </a>
          </button>
      </div>
      <div class="ke-2 mt-[4px]">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __(' Assignment Class Detail')}}
          </h2>
      </div>
  </div>
  </x-slot>
  <br>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200 flex ">
              <div class="flex flex-row gap-5">
                <div class="grid place-content-center">
                  <div class="grid bg-neutral w-14 h-14 rounded-full place-content-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/207/207470.png?w=740&t=st=1669015753~exp=1669016353~hmac=2991b15d942ead62d75ed6ccc0e0eb7836618254cd37e0112ac7b3e943abed75"
                        alt="" class="w-7">
                  </div>
                </div>
                <div>
                  <h1 class="text-2xl font-bold mb-2">{{ $assignment->assignmentPlan->title ??null }}</h1>
                  <p>Due Date : {{ Carbon::parse( $assignment->due_date)->format("M d, Y") }}</p>
              </div>

              </div>
          </div>

          <div class="p-6 bg-white border-b border-gray-200 flex ">
              <div class="text-base">
                  <h1>{{ $assignment->note }}</h1>
              </div>
          </div>

              <div class="tombol justify-end flex flex-row gap-2 py-5 px-10">
                <form action="{{ route('course-classes.assignments.edit', [$courseClass, $assignment]) }}" method="get">
                  <button class="btn btn-active btn-warning w-24" value="">Edit</button>
                </form>
                <form method="POST" action="{{ route('course-classes.assignments.destroy', [$courseClass, $assignment]) }}">
                  @csrf
                  @method('delete')

                  <button class="btn btn-active btn-error w-24"
                      onclick="event.preventDefault(); confirm('Yakin ingin menghapus data?') && this.closest('form').submit();">
                      {{ __('Delete') }}
                  </button>
                </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
