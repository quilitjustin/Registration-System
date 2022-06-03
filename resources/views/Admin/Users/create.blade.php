<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('admin.users.index') }}">
                &Larr;Go Back
            </a>
        </h2>
    </x-slot>
    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2 p-3">
                <div class="flex items-center font-semibold py-3 px-3 m:px-4 bg-gray-50 shadow overflow-hidden rounded-md">
                    <p>Create New User</p>
                </div>
                <form class="bg-white mx-auto p-5" method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    <div class="md:grid grid-cols-4 gap-4">
                        <p class="mt-2 md:mt-0 col-span-4 font-semibold text-xl text-indigo-800">Profile</p>
                        <div class="mt-2 md:mt-0">
                            <label for="f-name" class="block font-medium text-sm text-gray-700">First Name</label>
                            <input type="text" name="f-name" id="f-name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('f-name', '') }}" />
                            @error('f-name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="l-name" class="block font-medium text-sm text-gray-700">Last Name</label>
                            <input type="text" name="l-name" id="l-name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('l-name', '') }}" />
                            @error('l-name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="m-name" class="block font-medium text-sm text-gray-700">Middle Name</label>
                            <input type="text" name="m-name" id="m-name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('m-name', '') }}" />
                            @error('m-name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="contact-no" class="block font-medium text-sm text-gray-700">Contact#</label>
                            <input type="text" name="contact-no" id="contact-no" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('contact-no', '') }}" />
                            @error('contact-no')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mt-2 md:mt-0">
                            <label for="gender" class="block font-medium text-sm text-gray-700">Gender</label>
                            <select id="gender" name="gender" class="form-input rounded-md py-2 shadow-sm mt-1 block w-full">
                                <option value="null" selected disabled></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="text" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('email', '') }}" />
                            @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                            <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('password')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('password_confirmation')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2 md:mt-0 col-span-4 flex items-center justify-end px-4 py-3 text-right sm:px-6 overflow-hidden">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>