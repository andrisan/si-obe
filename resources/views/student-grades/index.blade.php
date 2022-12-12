<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Grade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-span-3 p-10 shadow-xl justify-items-auto overflow-y-auto">
                        <h1 class="text-4xl font-semibold text-primary-content">Student Grade - Assignment 1</h1>
                        <div class="grid grid-cols-8 gap-4 py-4">
                            <button class="btn btn-accent col-end-1">Tambah</button>
                        </div>
            <div class="overflow-x-auto py-4">
                <table class="table table-zebra w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Mahasiswa</th>
                            <th>NIM</th>
                            <th>Kelas</th>
                            <th>Assignments</th>
                            <th>Nilai</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Farhan</td>
                            <td>123000111</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>80</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kurniawan</td>
                            <td>123000112</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>82</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Suci</td>
                            <td>123000212</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>78</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ahmad</td>
                            <td>123100102</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>85</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Agung</td>
                            <td>123100112</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>82</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Bayu</td>
                            <td>123101105</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>66</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Rizky</td>
                            <td>123101108</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>78</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Faiz</td>
                            <td>123101110</td>
                            <td>A</td>
                            <td>Assignment 1</td>
                            <td>84</td>
                            <td>
                                <button class="btn btn-success btn-sm">Edit</button>
                                <button class="btn btn-error btn-sm">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
   
            <form>
                    <div class="flex justify-center p-4">
                        <div>
                            <input class="btn btn-outline btn-active m-1" type="button" value="Prev">
                         </div>
                        <div>
                            <input class="btn btn-outline btn-active m-1" type="button" value="1">
                        </div>
                        <div>
                            <input class="btn btn-outline btn-active m-1" type="button" value="2">
                        </div>
                        <div>
                            <input class="btn btn-outline btn-active m-1" type="button" value="3">
                        </div>
                        <div>
                             <input class="btn btn-outline btn-active m-1" type="button" value="Next">
                         </div>
                    </div>
            </form>
                     </div>
                </div>
             </div>
        </div>
    </div>
</x-app-layout>