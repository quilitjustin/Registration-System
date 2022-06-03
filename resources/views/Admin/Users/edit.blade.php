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
                <div class="flex items-center font-semibold px-3 md:px-4 py-3 bg-gray-50 sm:px-6 shadow overflow-hidden rounded-md">
                    <p>Update User</p>
                </div>
                <form class="bg-white mx-auto p-5" method="POST" action="{{ route('admin.users.update', $user['id']) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $user['id'] }}">
                    <input type="text" value="details" name="action" hidden>
                    <div class="md:grid grid-cols-3 gap-3">
                        <p class="col-span-3 font-semibold text-xl text-indigo-800">Profile</p>
                        <div class="mt-2 md:mt-0">
                            <label for="f-name" class="block font-medium text-sm text-gray-700">First Name</label>
                            <input type="text" name="f-name" id="f-name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $user['f_name'] }}" />
                            @error('f-name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="l-name" class="block font-medium text-sm text-gray-700">Last Name</label>
                            <input type="text" name="l-name" id="l-name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $user['l_name'] }}" />
                            @error('l-name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="m-name" class="block font-medium text-sm text-gray-700">Middle Name</label>
                            <input type="text" name="m-name" id="m-name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $user['m_name'] }}" />
                            @error('m-name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="contact-no" class="block font-medium text-sm text-gray-700">Contact#</label>
                            <input type="text" name="contact-no" id="contact-no" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $user['contact_no'] }}" />
                            @error('contact-no')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mt-2 md:mt-0">
                            <label for="gender" class="block font-medium text-sm text-gray-700">Gender</label>
                            <select id="gender" name="gender" class="form-input rounded-md py-2 shadow-sm mt-1 block w-full">
                                <option value="null" selected disabled></option>
                                @if($user['gender'] == 'Male')
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                @else
                                    <option value="Male">Male</option>
                                    <option value="Female" selected>Female</option>
                                @endif
                            </select>
                            @error('gender')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="text" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $user['email'] }}" />
                            @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
           
                        {{-- <div>
                            <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                            <input type="text" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('password', '') }}" />
                            @error('password')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div> --}}
                    </div>
                    <div class="col-span-4 flex items-center justify-end px-4 py-3 text-right sm:px-6 overflow-hidden mt-5">
                        <button class="mt-2 md:mt-0 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Update
                        </button>
                    </div>
                </form>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2 p-3">
                <div class="flex items-center font-semibold px-3 py-3 bg-gray-50 sm:px-6 shadow overflow-hidden rounded-md">
                    <p>Change Password</p>
                </div>
                <form class="bg-white mx-auto p-5" method="POST" action="{{ route('admin.users.update', $user['id']) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $user['id'] }}">
                    <input type="text" value="password" name="action" hidden>
                    <div class="md:grid grid-cols-3 gap-3">
                        <p class="col-span-3 font-semibold text-xl text-indigo-800">Reset Password</p>
                    
                        <div class="mt-2 md:mt-0">
                            <label for="password" class="block font-medium text-sm text-gray-700">New Password</label>
                            <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('password', '') }}" />
                            @error('password')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('password_confirmation', '') }}" />
                            @error('password_confirmation')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-4 flex items-center justify-end px-4 py-3 text-right sm:px-6 overflow-hidden mt-5">
                        <button class="mt-2 md:mt-0 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>