<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Assignment Kelas')}}
      </h2>
  </x-slot>
  <div class="pb-5">
      <div class="text-sm breadcrumbs pl-8 pt-5 font-bold text-gray-600">
          <ul>
            <li><a href="">Dashboard</a></li>
            <li><a href="">Course</a></li>
            <li><a href="">{{ $courseClass->id }}</a></li>
            <li class="text-blue-600">Assignment</li>
          </ul>
        </div>
  </div>

  <div class="py-2">

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <div class="overflow-x-auto">   
                  <table class="table table-compact w-full">
                    <thead>
                      <tr>
                        <th>No.</th> 
                        <th>Assignment</th> 
                        <th>Assigned Date</th> 
                        <th>Due Date</th> 
                        <th>Note</th> 
                        <th>Opsi</th>
                      </tr>
                    </thead> 
                    <tbody>
                      <?php $i = 1 ?>
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $assignment->assignmentPlan->title ??null }}</td>
                        <td>{{ $assignment->assigned_date??null }}</td>
                        <td>{{ $assignment->due_date??null }}</td>
                        <td>{{ $assignment->note }}</td>
                        <td>
                          <div class="flex items-strecth">
                            <form action="{{ route('course-classes.assignments.edit', [$courseClass, $assignment]) }}" method="get">
                              <button class="btn btn-warning btn-sm m-1" value="">Edit</button>
                            </form>
                            <form method="POST" action="{{ route('course-classes.assignments.destroy', [$courseClass, $assignment]) }}">
                              @csrf
                              @method('delete')

                              <button class="btn btn-error btn-sm m-1"
                                  onclick="event.preventDefault(); confirm('Yakin ingin menghapus data?') && this.closest('form').submit();">
                                  {{ __('Delete') }}
                              </button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    </tbody> 
                  </table>
                </div>
              </div>
          </div>
          <a class="btn btn-primary btn-sm m-4" href="{{ route('course-classes.assignments.index', [$courseClass, $assignment]) }}"> <- Back </a>
      </div>
  </div>
</x-app-layout>