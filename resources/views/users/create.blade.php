@section('pageTitle', 'Create New User')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="grid md:grid-cols-2">
                            <div>
                                <div class="form-control w-full max-w-xs p-3">
                                    <label class="label">
                                        <span class="label-text">Fullname</span>
                                    </label>
                                    <input type="text" name="name" placeholder="Fullname of the user" class="input input-bordered w-full max-w-xs" value="{{ old('name') }}"/>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="form-control w-full max-w-xs p-3">
                                    <label class="label">
                                        <span class="label-text">Email</span>
                                    </label>
                                    <input type="text" name="email" placeholder="User's email" class="input input-bordered w-full max-w-xs" value="{{ old('email') }}"/>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="form-control w-full max-w-xs p-3">
                                    <label class="label">
                                        <span class="label-text">Role</span>
                                    </label>
                                    <select name="role" class="select select-bordered w-full max-w-xs">
                                        <option value="admin">Admin</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="student">Student</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                </div>
                            </div>
                            <div>
                                <div class="form-control w-full max-w-xs p-3">
                                    <label class="label">
                                        <span class="label-text">Password</span>
                                    </label>
                                    <input type="password" name="password" placeholder="Password" class="input input-bordered w-full max-w-xs" value="{{ old('password') }}"/>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="form-control w-full max-w-xs p-3">
                                    <label class="label">
                                        <span class="label-text">Password Confirmation</span>
                                    </label>
                                    <input type="password" name="password_confirmation" placeholder="Password Confirmation" class="input input-bordered w-full max-w-xs" value="{{ old('password_confirmation') }}"/>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 p-4 space-x-2">
                            <button type="submit" class="btn btn-sm px-7">
                                Save
                            </button>
                            <a href="{{ route('users.index') }}">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
