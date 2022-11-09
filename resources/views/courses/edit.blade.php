<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="items-start">
                <h2 class="font-semibold   text-4xl text-gray-800 leading-tight">
                    {{ __('Edit Course') }}
                </h2>
            </div>

            <div class="items-end">
                <img src="{{ asset('img/Vector(2).png') }}" alt="">
            </div>
        </div>
    </x-slot>

            <form>
                <div class="grid grid-rows-6 grid-flow-col px-10">
                    <div class="font-bold label">
                        <label for="s_program">Study Program</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-200 text-slate-800 list w-11/12" type="text" name="s_program" value="Study Program" disabled>
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Course</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list w-11/12" type="text" name="c_name" value="Course A">
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Course Code</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list w-11/12" type="text" name="c_name" value="c6Nxy8">
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Course Credit</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list w-5/6" type="number" value="1" name="c_name" min="1" max="4">
                        <label>SKS</label>
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Lab Credit</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list w-5/6" type="number" value="0" name="c_name" min="0" max="2">
                        <label>SKS</label>
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Type Course</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list w-11/12" type="text" name="c_name" value="Lorem ipsum...">
                    </div>
                </div>
                <div class="grid grid-rows-4 grid-flow-col px-10">
                    <div class="font-bold label">
                        <label for="c_name">Descrpition</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list w-11/12" type="text" name="c_name" value="Lorem ipsum...">
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Minimal Requiretment</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list w-11/12" type="text" name="c_name" value="Lorem ipsum...">
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Study Material Summary</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list w-11/12" type="text" name="c_name" value="Lorem ipsum...">
                    </div>
                    <div class="font-bold label">
                        <label for="c_name">Learning Media</label>
                    </div>
                    <div class="pb-4 rounded-l">
                        <input class="bg-slate-100 text-slate-900 list w-11/12" type="text" name="c_name" value="Lorem ipsum...">
                    </div>
                </div>
                <div class="flex justify-end p-5 px-20">
                    <div>
                        <input class="btn btn-active btn-error mx-2" type="button" value="Cancel">
                    </div>
                    <div>
                        <input class="btn btn-active btn-success mx-2" type="submit" name="save" value="Save">
                    </div>

                </div>
            </form>


</x-app-layout>