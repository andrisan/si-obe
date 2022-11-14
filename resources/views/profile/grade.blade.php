<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile Grade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="col-span-3 p-10 shadow-xl justify-items-auto overflow-y-auto">
                        <!--"text-4xl font-semibold text-primary-content">Student Grade - Assignment 1</h1>-->
                        <div class="grid grid-cols-8 gap-4 py-4">
                            <button class="btn btn-accent col-end-1">Cetak</button>
                        </div>
            <div class="overflow-x-auto py-4">
                <table class="table table-zebra w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>NAMA MATA KULIAH</th>
                            <th>SKS</th>
                            <th>NILAI</th>
                            <th>KET</th>
                            <th>Detail Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>CIT161007</td>
                            <td>Algoritma dan Struktur Data</td>
                            <td>3</td>
                            <td>A</td>
                            <td></td>
                            <td>
                                <!--<button class="btn btn-success btn-sm">Tampilkan</button>-->
                    <!-- The button to open modal -->
                        <label for="my-modal-3" class="btn">Tampilkan</label>

                           <!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
    <div class="modal-box relative">
    <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Detail Nilai Mata Kuliah</h3>
    <div class="table">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>TIPE NILAI</th>
                    <th>NILAI KE</th>
                    <th>NILAI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Absensi</td>
                    <td>1</td>
                    <td>20</td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>    
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>CIT61088</td>
                            <td>Analisis dan Desain Sistem Informasi</td>
                            <td>4</td>
                            <td>A</td>
                            <td></td>
                            <td>
                                <!--<button class="btn btn-success btn-sm">Tampilkan</button>-->
                    <!-- The button to open modal -->
                        <label for="my-modal-3" class="btn">Tampilkan</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
    <div class="modal-box relative">
    <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Detail Nilai Mata Kuliah</h3>
    <div class="table">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>TIPE NILAI</th>
                    <th>NILAI KE</th>
                    <th>NILAI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Absensi</td>
                    <td>1</td>
                    <td>20</td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>

                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>CIT61009</td>
                            <td>Jaringan Komputer Dasar</td>
                            <td>3</td>
                            <td>A</td>
                            <td></td>
                            <td>
                                 <!--<button class="btn btn-success btn-sm">Tampilkan</button>-->
                    <!-- The button to open modal -->
                        <label for="my-modal-3" class="btn">Tampilkan</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
    <div class="modal-box relative">
    <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Detail Nilai Mata Kuliah</h3>
    <div class="table">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>TIPE NILAI</th>
                    <th>NILAI KE</th>
                    <th>NILAI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Absensi</td>
                    <td>1</td>
                    <td>30</td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>UBU60003</td>
                            <td>Kewirausahaan</td>
                            <td>2</td>
                            <td>B+</td>
                            <td></td>
                            <td>
                                 <!--<button class="btn btn-success btn-sm">Tampilkan</button>-->
                    <!-- The button to open modal -->
                        <label for="my-modal-3" class="btn">Tampilkan</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
    <div class="modal-box relative">
    <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Detail Nilai Mata Kuliah</h3>
    <div class="table">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>TIPE NILAI</th>
                    <th>NILAI KE</th>
                    <th>NILAI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Absensi</td>
                    <td>1</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>
                   
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>CSD60001</td>
                            <td>Pemrogramman Basis Data</td>
                            <td>3</td>
                            <td>A</td>
                            <td></td>
                            <td>
                                <!--<button class="btn btn-success btn-sm">Tampilkan</button>-->
                    <!-- The button to open modal -->
                        <label for="my-modal-3" class="btn">Tampilkan</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
    <div class="modal-box relative">
    <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Detail Nilai Mata Kuliah</h3>
    <div class="table">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>TIPE NILAI</th>
                    <th>NILAI KE</th>
                    <th>NILAI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Absensi</td>
                    <td>1</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>
    
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>CIT61006</td>
                            <td>Pengembangan Aplikasi Web</td>
                            <td>4</td>
                            <td>A</td>
                            <td></td>
                            <td>
                                 <!--<button class="btn btn-success btn-sm">Tampilkan</button>-->
                    <!-- The button to open modal -->
                        <label for="my-modal-3" class="btn">Tampilkan</label>
<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
    <div class="modal-box relative">
    <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Detail Nilai Mata Kuliah</h3>
    <div class="table">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>TIPE NILAI</th>
                    <th>NILAI KE</th>
                    <th>NILAI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Absensi</td>
                    <td>1</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</div>

                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>CIT61011</td>
                            <td>Statistika</td>
                            <td>3</td>
                            <td>A</td>
                            <td></td>
                            <td>
                                <!--<button class="btn btn-success btn-sm">Tampilkan</button>-->
                    <!-- The button to open modal -->
                        <label for="my-modal-3" class="btn">Tampilkan</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
    <div class="modal-box relative">
    <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Detail Nilai Mata Kuliah</h3>
    <p class="py-4">You've been selected for a chance to get one year of subscription to use Wikipedia for free!</p>
</div>
</div>
    
                              
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Jumlah SKS : </td>
                            <td>22</td>
                            <td></td>
                            <td></td>
                            <td>
                                
                            
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
   
            
                     </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>