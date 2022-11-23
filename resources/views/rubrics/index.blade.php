<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="items-start">
                <h2 class="font-semibold   text-4xl text-gray-800 leading-tight">Rubrics</h2>
            </div>
        </div>

    </x-slot>

    <div class="max-w-7xl mx-auto p-8">
        <div class="flex flex-row sm:justify-end px-3 sm:px-16 -mr-2 sm:-mr-3">
            <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                <div class="relative">
                    <a href="{{ route('rubrics.create') }}"
                        class="bg-blue-500 border-2 border-blue-300 rounded-md shadow-sm px-2.5 sm:px-5 py-2 inline-flex justify-center text-lg font-semibold text-white hover:bg-blue-400 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">+
                        Rubric Baru</a>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-2 overflow-hidden shadow-sm sm:rounded-lg mb-5">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="table mx-auto w-full">
                            <thead class="text-black">
                                <tr class="h-10 bg-slate-400">
                                    <th class="w-16 text-base text-current">No.</th>
                                    <th class="w-[45rem] text-base text-current">Judul</th>
                                    <th class="text-center text-base text-current">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-left text-regular">
                                <?php $i = 1 ?>
                                @foreach ($rubric as $rub)
                                <tr class="h-10">
                                    <td>{{ $i }}</td>
                                    <td>
                                        <a href="{{ route('rubrics.show', $rub) }}">{{ $rub->title }}</a>
                                    </td>
                                    <td class="items-center">
                                        <div class="flex items-center justify-center">
                                            <a href="{{ route('rubrics.edit', $rub) }}"
                                                class="text-blue-700 font-semibold mx-auto text-lg">Edit</a>
                                            <form action="{{ route('rubrics.destroy', $rub) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button href=""
                                                    class="text-red-600 font-semibold mx-auto text-lg cursor-pointer"
                                                    onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <?php $i += 1 ?>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            {{ $rubric->links() }}
        </div>
    </div>
</x-app-layout>