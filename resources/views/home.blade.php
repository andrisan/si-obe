<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/b79c47ea42.js" crossorigin="anonymous"></script>

  

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
   
  </style>
</head>
<div class="lg:flex">

 
  <div class="navbar ml-28 mt-20  ">
    <div class="bg-[#AFC7F5] w-72 h-14 ml-5 pt-2 rounded-md cursor-pointer">
      <div class="flex ml-3">
        <img class="w-8 gb" src="{{ asset('img/Gambar Fakultas.png') }}">
        <h1 class="justify-center items-center text-center my-auto mt-1 ml-5 text-xl">All Faculties</h1>
      </div>
    </div>
    <div class="bg-[#AFC7F5]  w-72 h-14 ml-5 pt-2 rounded-md mt-5 cursor-pointer">
      <div class="flex ml-3">
        <img class="w-8 ml gb" src="{{ asset('img/Gambar Department.png') }}">
        <h1 class="justify-center items-center text-center my-auto ml-5 text-xl">All Departemens</h1>
      </div>
    </div>
    <div class="bg-[#AFC7F5]  w-72 h-14 ml-5 pt-2 rounded-md mt-5 cursor-pointer">
      <div class="flex ml-3">
        <img class="w-8 gb" src="{{ asset('img/Gambar Program Studi.png') }}">
        <h1 class="justify-center items-center text-center my-auto mt-1 ml-5 text-xl">All Study Program</h1>
      </div>
    </div>
    
    <div class="w-72">
      <div class="mt-5">
        <h1 class="text-xl pl-5">Academic Calender</h1>
      </div>
      <div class="bg-[#AFC7F5]  w-72 h-8 ml-5 pt-2 rounded-md mt-5 cursor-pointer">
        <div class="flex">
          <h1 class="ml-8 text-sm">Select date</h1>
          <i class="fa-solid fa-calendar-days  pl-36 "></i>
        </div>
        <div class="mt-1">
          
        </div>
        
      </div>
    </div>
  </div>
  
  
</div>
<body>
  
</body>

</html>