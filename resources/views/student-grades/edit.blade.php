<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Edit: Student Grades
        </h2>
    </x-slot>

    <div class="py-12">
                <div>
                    <h3>Nama Mahasiswa</h3>
                    <p>Status</p>
                </div>
                       <!-- colapse -->
            <div tabindex="0" class="collapse collapse-arrow border border-base-300 bg-base-100 rounded-box" id="rubrik">
              <div class="collapse-title text-xl font-medium">
                <div class="grid md:grid-cols-10 gap-">
                  <div class="col-span-8">NO1-1</div>
                  <button class="btn btn-warning">Hapus</button>
                  <div><input type="text" placeholder="" value="../3" class="input w-full input-sm max-w-sm input-bordered" readonly /></div>
                </div>
              </div>
              <div class="collapse-content">
                <p>Mampu menjelaskan konsep pemrograman basis data dalam pengembangan aplikasi</p>
                <br />
                <div class="btn-group">
                  <input type="radio" name="options" data-title="baik (3 pts)" class="btn" />
                  <input type="radio" name="options" data-title="cukup (2 pts)" class="btn" checked />
                  <input type="radio" name="options" data-title="kurang (1 pts)" class="btn" />
                </div>
              </div>
            </div>
            <!-- end colapse -->
                <input type="submit" value="Save" class="btn btn-active rounded-md " />
                <button class="btn btn-outline rounded-md">Cancel</button>
    </div>
</x-app-layout>