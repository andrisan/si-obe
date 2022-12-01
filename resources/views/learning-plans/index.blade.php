@section('pageTitle', 'Learning Plan Index')

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ $syllabus->title }}
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto p-8">
    <div class="flex flex-row sm:justify-end mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
      <div class="order-5 sm:order-6 mr-2 sm:mr-3">
        <a href="{{ route('syllabi.learning-plans.create', [$syllabus]) }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="pr-1">New Learning Plan</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612.001 612.001" style="enable-background:new 0 0 612.001 612.001;" xml:space="preserve">
            viewBox="0 0 612.001 612.001" style="enable-background:new 0 0 612.001 612.001;" xml:space="preserve">
            <g>
              <g>
                <g>
                  <path d="M567.734,57.47c-28.593-28.593-66.607-44.338-107.044-44.338c-40.435,0-78.451,15.745-107.041,44.338
                  c-28.593,28.593-44.34,66.606-44.34,107.044c0,40.435,15.747,78.449,44.34,107.041c28.592,28.593,66.606,44.341,107.041,44.341
                  c40.436,0,78.452-15.748,107.044-44.341C626.757,212.532,626.757,116.494,567.734,57.47z M543.697,247.519
                  c-22.171,22.174-51.652,34.384-83.007,34.384c-31.356,0-60.833-12.21-83.004-34.384c-22.173-22.171-34.383-51.649-34.383-83.004
                  s12.21-60.836,34.383-83.007c22.171-22.171,51.65-34.382,83.004-34.382c31.356,0,60.836,12.21,83.007,34.382
                  C589.466,127.275,589.466,201.75,543.697,247.519z" />
                  <path d="M508.379,146.853h-32.682v-32.681c0-9.387-7.61-16.996-16.996-16.996s-16.996,7.609-16.996,16.996v32.681h-32.682
                  c-9.386,0-16.996,7.61-16.996,16.996c0,9.389,7.61,16.996,16.996,16.996h32.682v32.683c0,9.389,7.61,16.996,16.996,16.996
                  s16.996-7.607,16.996-16.996v-32.683h32.682c9.386,0,16.996-7.607,16.996-16.996
                  C525.375,154.463,517.766,146.853,508.379,146.853z" />
                  <path d="M361.408,470.254c-23.202-16.36-50.76-28.432-80.75-35.675c27.815-24.092,45.865-62.632,45.865-105.984
                  c0-72.819-50.922-132.062-113.514-132.062c-62.589,0-113.512,59.242-113.512,132.062c0,43.353,18.05,81.893,45.865,105.987
                  c-29.988,7.239-57.546,19.312-80.748,35.672C22.947,499.633,0,539.273,0,581.874c0,9.386,7.61,16.996,16.996,16.996h392.027
                  c9.387,0,16.996-7.61,16.996-16.996C426.02,539.273,403.073,499.633,361.408,470.254z M326.523,564.878v-30.355
                  c0-9.386-7.61-16.996-16.996-16.996s-16.996,7.61-16.996,16.996v30.355H133.49v-30.355c0-9.386-7.61-16.996-16.996-16.996
                  s-16.996,7.61-16.996,16.996v30.355H35.77c5.249-24.922,21.989-48.196,48.432-66.841c34.183-24.102,79.929-37.376,128.81-37.376
                  s94.627,13.272,128.807,37.376c26.443,18.645,43.183,41.918,48.43,66.841H326.523z M133.49,328.596
                  c0-54.076,35.673-98.07,79.52-98.07c43.848,0,79.522,43.996,79.522,98.07c0,54.079-35.673,98.073-79.52,98.073
                  S133.49,382.673,133.49,328.596z" />
                </g>
              </g>
            </g>
          </svg>
        </a>
      </div>
    </div>
    <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
      
      <table class="border-collapse table-auto w-full bg-white table-striped relative">
        <thead>
          <tr class="text-left">
            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-16">Kode</th>
            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-16">LLO</th>
            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-16">Week</th>
            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-256">Study Material</th>
            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">Learning Method</th>
            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">Estimated Time</th>
            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-52">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($plans as $plan)
          <tr>
            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->id }}</td>
            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->lessonLearningOutcome->description }}</td>
            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->week_number }}</td>
            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->study_material }}</td>
            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->learning_method }}</td>
            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->estimated_time }}</td>
            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
              <div class="flex flex-wrap space-x-4">
                <form action="{{ route('syllabi.learning-plans.edit', [$syllabus, $plan->id]) }}" method="GET">
                  <button class="btn btn-warning btn-sm" value="{{ $plan->id }}">Edit</button>
                </form>

                <form action="{{ route('syllabi.learning-plans.destroy', [$syllabus, $plan->id]) }}" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-error btn-sm" value="{{ $plan->id }}" onclick="return confirm('Are you sure?')">Delete
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $plans->links() }}
  </div>
</x-app-layout>
