<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('admin.students.index') }}">
                &Larr;Go Back
            </a>
        </h2>
    </x-slot>
    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2 p-3">
                <div class="flex items-center font-semibold px-3 md:px-4 py-3 bg-gray-50 sm:px-6 shadow overflow-hidden rounded-md">
                    <p>Create New Record</p>
                </div>
                {{-- 
                    Validation: \app\Http\Requests\StudentFormRequest.php
                    Controller: \app\Http\Controllers\Admin\ManageStudentRecord.php
                 --}}
                <form class="bg-white mx-auto p-5" method="POST" action="{{ route('admin.students.store') }}">
                    @csrf
                    <div class="md:grid grid-cols-4 gap-4">
                        <p class="mt-2 md:mt-0 col-span-4 font-semibold text-xl text-indigo-800">Details</p>
                        <div class="mt-2 md:mt-0">
                            <label for="f-name" class="block font-medium text-sm text-gray-700">First Name</label>
                            <input type="text" name="f-name" id="f-name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('f-name', '') }}" placeholder="ex. Jun" required/>
                            @error('f-name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="l-name" class="block font-medium text-sm text-gray-700">Last Name</label>
                            <input type="text" name="l-name" id="l-name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('l-name', '') }}" placeholder="ex. Dela Cruz" required/>
                            @error('l-name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="m-name" class="block font-medium text-sm text-gray-700">Middle Name</label>
                            <input type="text" name="m-name" id="m-name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('m-name', '') }}" placeholder="ex. De Luna" required/>
                            @error('m-name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="student-id" class="block font-medium text-sm text-gray-700">Student ID</label>
                            <input type="text" name="student-id" id="student-id" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $student_id }}" placeholder="ex. 22-0001" required/>
                            @error('student-id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="contact-no" class="block font-medium text-sm text-gray-700">Contact#</label>
                            <input type="text" name="contact-no" id="contact-no" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('contact-no', '') }}" placeholder="ex. 09123456789" 
                                   pattern="[09]{2}[0-9]{9}" required/>
                            @error('contact-no')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mt-2 md:mt-0">
                            <label for="gender" class="block font-medium text-sm text-gray-700">Gender</label>
                            <select id="gender" name="gender" class="form-input rounded-md py-2 shadow-sm mt-1 block w-full" required>
                                <option value="" selected disabled>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="birthdate" class="block font-medium text-sm text-gray-700">Birthdate</label>
                            <input type="date" name="birthdate" id="birthdate" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('birthdate', '') }}" required/>
                            @error('birthdate')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="birthplace" class="block font-medium text-sm text-gray-700">Birthplace</label>
                            <input type="text" name="birthplace" id="birthplace" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('birthplace', '') }}" placeholder="ex. Balanga" required/>
                            @error('birthplace')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="guardian" class="block font-medium text-sm text-gray-700">Guardian</label>
                            <input type="text" name="guardian" id="guardian" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('guardian', '') }}" placeholder="ex. Jun Dela Rosa" required/>
                            @error('guardian')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="relation" class="block font-medium text-sm text-gray-700">Relationship to guardian</label>
                            <input type="text" name="relation" id="relation" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('relation', '') }}" placeholder="ex. Mother" required/>
                            @error('relation')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="guardian-contact" class="block font-medium text-sm text-gray-700">Guardian Contact#</label>
                            <input type="text" name="guardian-contact" id="guardian-contact" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('guardian-contact', '') }}" placeholder="ex. 09123456789" 
                                   pattern="[09]{2}[0-9]{9}" required/>
                            @error('guardian-contact')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <p class="mt-5 md:mt-0 col-span-4 font-semibold text-xl text-indigo-800">Address</p>
                        
                        <div class="mt-2 md:mt-0">
                            <label for="block" class="block font-medium text-sm text-gray-700">Block</label>
                            <input type="text" name="block" id="block" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('block', '') }}" placeholder="ex. Block A" required/>
                            @error('block')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="house-no" class="block font-medium text-sm text-gray-700">House#</label>
                            <input type="number" name="house-no" id="house-no" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('house-no', '') }}" placeholder="ex. 77" required/>
                            @error('house-no')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="street" class="block font-medium text-sm text-gray-700">Street</label>
                            <input type="text" name="street" id="street" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('street', '') }}" placeholder="ex. Aguinaldo St." required/>
                            @error('street')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="barangay" class="block font-medium text-sm text-gray-700">Barangay</label>
                            <input type="text" name="barangay" id="barangay" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('barangay', '') }}" placeholder="ex. Rizal" required/>
                            @error('barangay')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="municipality" class="block font-medium text-sm text-gray-700">Municipality</label>
                            <input type="text" name="municipality" id="municipality" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('municipality', '') }}" placeholder="ex. Mariveles" required/>
                            @error('municipality')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2 md:mt-0">
                            <label for="province" class="block font-medium text-sm text-gray-700">Province</label>
                            <input type="text" name="province" id="province" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('province', '') }}" placeholder="ex. Bataan" required/>
                            @error('province')
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