<!DOCTYPE html>
<html data-theme="dark" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.38.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Program Study</title>

</head>
<body>
    <div class="hero min-h-screen bg-base-300">
        <div class="hero-content text-center">
          <div class="max-w-xl">
            <div class="card w-96 bg-base-100 text-neutral-content">
                <div class="card-body items-center text-center">
                  <h2 class="card-title">Edit Program Study</h2>
                  <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">ID Program Study</span> 
                      </label>
                      <input type="text" class="input input-bordered w-full max-w-xs" value="123"/>
                    <label class="label">
                      <span class="label-text">Nama Program Study</span>
                    </label>
                    <input type="text" class="input input-bordered w-full max-w-xs" value="Program Study A"/>
                  </div>
                  <div class="card-actions justify-end mt-4">
                      <button class="btn btn-error m-2">Cancel</button>
                      <button class="btn btn-success m-2">Save</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>