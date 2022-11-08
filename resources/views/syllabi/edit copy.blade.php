<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Syllabus Edit of '.$syllabus) }}
    </h2>
  </x-slot>

  <div class="drawer drawer-mobile">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col items-center justify-center">
      <!-- Page content here -->
      <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>

    </div>
    <div class="drawer-side">
      <label for="my-drawer-2" class="drawer-overlay"></label>
      <ul class="menu p-4 w-30 bg-base-100 text-base-content">
        <!-- Sidebar content here -->
        <ul class="menu bg-neutral-content p-2 rounded-box">
          <li>
            <a href="" class="justify-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
              DASHBOARD
            </a>
          </li>
          <li>
            <a href="" class="justify-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              SYLLABUS
            </a>
          </li>
          <li>
            <a>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
              </svg>
              CREATE SYLLABUS
            </a>
          </li>
          <li>
            <a href="" class="justify-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              EDIT SYLLABUS
            </a>
          </li>
        </ul>
      </ul>

    </div>
  </div>

  <div class="text-sm breadcrumbs pl-10 pt-5 font-bold text-primary">
    <ul>
      <li><a>Dashboard</a></li>
      <li><a>Syllabi</a></li>
      <li>Syllabi Edit</li>
    </ul>
  </div>

  <div class="mx-10 my-5">
    <div class="border-b rounded-lg bg-primary-content shadow-xl px-4 py-5">
      <div class="form-control w-full max-w-xs">
        <label class="label">
          <span class="label-text text-neutral font-bold">Syllabus Name</span>
        </label>
        <input type="text" class="input text-neutral input-bordered input-primary bg-white w-full max-w-xs" />
      </div>

      <div class="form-control w-full max-w-xs">
        <label class="label">
          <span class="label-text text-neutral font-bold">Author</span>
        </label>
        <input type="text" class=" input text-neutral input-bordered input-primary bg-white w-full max-w-xs" />
      </div>

      <div class="form-control">
        <label class="label">
          <span class="label-text text-neutral font-bold">Head of Study Program</span>
        </label>
        <textarea class="textarea text-neutral input-bordered input-primary bg-white w-full h-24"></textarea>
      </div>
    </div>

    <div class="py-5" style="float:right">
      <button class="btn btn-outline btn-primary" href="/syllabi">Save</button>
    </div>
  </div>
</x-app-layout>