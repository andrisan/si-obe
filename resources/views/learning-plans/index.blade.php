<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <div class="items-start">
        <h2 class="font-semibold   text-4xl text-gray-800 leading-tight">
          {{ __('Learning Plans') }}
        </h2>
      </div>

      <div class="items-end">
        <img src="{{ asset('img/Vector(2).png') }}" alt="">
      </div>
    </div>
  </x-slot>

  <table class="table-fixed w-full">
    @if($learningPlans->isNotEmpty())
    <thead>
      <tr class="bg-[#F7F7F9] border-2 h-10">
        <th class="w-auto">Learning Plan ID</th>
        <th class="w-auto">Syllabus ID</th>
        <th class="w-auto">Week Number</th>
        <th class="w-auto">LLO's ID</th>
        <th class="w-auto">Study Material</th>
        <th class="w-auto">Learning Methode</th>
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
  @endif

</x-app-layout>