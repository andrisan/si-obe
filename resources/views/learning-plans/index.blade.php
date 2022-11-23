<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">

      {{ 'Syllaby : '}}
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto p-8">
    <div class="flex flex-row sm:justify-end mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
      <div class="order-5 sm:order-6 mr-2 sm:mr-3">
        <a href="{{ route('syllabi.learning-plans.create', [$syllabi]) }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="pr-1">New Learning Plan</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612.001 612.001" style="enable-background:new 0 0 612.001 612.001;" xml:space="preserve">
          </svg>
        </a>
      </div>
    </div>
    <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
      <table class="border-collapse table-auto w-full bg-white table-striped relative">
        <thead>
          <tr class="text-left">
            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">No</th>
            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-64">Week Number</th>
            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-16">LLO</th>
            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">Study Material</th>
            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">Learning Method</th>
            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">Estimated Time</th>
            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-48">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($learningPlans as $learningPlan)
          <tr>
            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + $learningPlans->firstItem() }}</td>
            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $learningPlan->week_number }}</td>
            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $learningPlan->llo_id }}</td>
            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $learningPlan->study_material }}</td>
            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $learningPlan->learning_method }}</td>
            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $learningPlan->estimated_time }}</td>
            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
              <div class="flex flex-wrap space-x-4">
                <a href="{{ route('syllabi.learning-plans.edit', [$syllabi, $learningPlans]) }}" class="text-blue-500">Edit</a>
                <form method="POST" action="{{ route('syllabi.learning-plans.destroy', [$syllabi, $learningPlans]) }}">
                  @csrf
                  @method('delete')

                  <button class="text-red-500" onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                    {{ __('Delete') }}
                  </button>
                </form>

              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $learningPlans->links() }}
  </div>
  <!-- <table class="table-fixed w-full">
    @if($learningPlans->isNotEmpty())
    <thead>
      <tr class="bg-[#F7F7F9] border-2 h-10">
        <th class="w-auto">Learning Plan ID</th>
        <th class="w-auto">Syllabus ID</th>
        <th class="w-auto">Week Number</th>
        <th class="w-auto">LLO's ID</th>
        <th class="w-auto">Study Material</th>
        <th class="w-auto">Learning Method</th>
        <th class="w-auto">Est. Time</th>
        <th class="w-auto">Created at</th>
        <th class="w-auto">Updated at</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody class="text-center border-2 border-black text-black">
      @foreach($learningPlans as $learningPlan)
      <tr class="border-2 h-14">
        <td>{{ $learningPlan->id }}</td>
        <td>{{ $learningPlan->syllabus_id }}</td>
        <td>{{ $learningPlan->week_number }}</td>
        <td>{{ $learningPlan->llo_id }}</td>
        <td>{{ $learningPlan->study_material }}</td>
        <td>{{ $learningPlan->learning_method }}</td>
        <td>{{ $learningPlan->estimated_time }}</td>
        <td>{{ $learningPlan->created_at }}</td>
        <td>{{ $learningPlan->updated_at }}</td>
        <td>
          <button href="`learning-plans/${row.id}/edit`" class="btn btn-warning btn-sm">Edit</button>
          <button class="btn btn-error btn-sm" @click="confirm('Are you sure?') ? console.log('asdasd') : false">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <br>
  <h1 class="text-2xl font-extrabold text-center" style="font-weight: 900;">Data tidak ditemukan</h1>
  <br>
  @endif -->

</x-app-layout>