<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="mx-10">
  <h1 class="font-sans text-2xl pb-4">Edit Syllabus ID {{$syllabus}}</h1>
  <div class="border-b rounded-lg bg-base-300 px-4 py-5">
    <div class="form-control w-full max-w-xs">
      <label class="label">
        <span class="label-text text-primary text-violet-400">Syllabus Name</span>
      </label>
      <input type="text" class="input text-white input-bordered input-primary bg-primary w-full max-w-xs" />
    </div>
    
    <div class="form-control w-full max-w-xs">
      <label class="label">
        <span class="label-text text-primary text-violet-400">Author</span>
      </label>
      <input type="text" class="input text-white input-bordered input-primary bg-primary w-full max-w-xs" />
    </div>
              
    <div class="form-control">
      <label class="label">
        <span class="label-text text-primary text-violet-400">Head of Study Program</span>
      </label> 
      <textarea class="textarea textarea-primary bg-primary text-white"></textarea>
    </div>
  </div>
            
  <div class="py-5" style="float:right">
    <button class="btn btn-outline justify-end">Simpan</button>
  </div>
</div>
</body>
</html>