<!DOCTYPE html>
<html data-themes="dark" lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.0/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Edit Departemen</title>
</head>

<body>
  <div class="hero min-h-screen bg-base-100">
    <div class="hero-content text-center">
      <div class="max-w-xl">
        <div class="card w-96 bg-base-300 text-neutral-content">
          <div class="card-body items-center text-center">
            <h2 class="card-title">Edit Departemen</h2>
            <div class="form-control w-full max-w-xs">
              <label class="label">
                <span class="label-text">Fakultas</span>
              </label>
              <select class="select select-bordered w-full max-w-xs">
                <option>Ilmu Komputer</option>
                <option>Ekonomi Bisnis</option>
              </select>
              <label class="label mt-4">
                <span class="label-text">Departemen</span>
              </label>
              <input type="text" class="input input-bordered w-full max-w-xs" value="Sistem Informasi" />
            </div>
            <div class="card-actions justify-end mt-4">
              <button class="btn btn-outline btn-error">Cancel</button>
              <button class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>