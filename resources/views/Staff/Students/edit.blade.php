<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('staff.students.index') }}">
                &Larr;Go Back
            </a>
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2 p-3">
                <div class="flex items-center font-semibold x-4 py-3 bg-gray-50 sm:px-6 shadow overflow-hidden sm:rounded-md">
                    <p>{{ $record[0]['name'] }}</p>
                </div>
                <form class="bg-white mx-auto p-5" method="post" action="{{ route('staff.students.update', $record[0]['st_id']) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $record[0]['st_id'] }}">
                    <div class="grid grid-cols-4 gap-4">
                        <p class="col-span-4 font-semibold">Details</p>
                        <div>
                            <label for="f-name" class="block font-medium text-sm text-gray-700">First Name</label>
                            <input type="text" name="f-name" id="f-name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['f_name'] }}" />
                            @error('f-name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="l-name" class="block font-medium text-sm text-gray-700">Last Name</label>
                            <input type="text" name="l-name" id="l-name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['l_name'] }}" />
                            @error('l-name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="m-name" class="block font-medium text-sm text-gray-700">Middle Name</label>
                            <input type="text" name="m-name" id="m-name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['m_name'] }}" />
                            @error('m-name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="student-id" class="block font-medium text-sm text-gray-700">Student ID</label>
                            <input type="text" name="student-id" id="student-id" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['student_id'] }}" />
                            @error('student-id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact-no" class="block font-medium text-sm text-gray-700">Contact#</label>
                            <input type="text" name="contact-no" id="contact-no" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['contact_no'] }}" />
                            @error('contact-no')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="gender" class="block font-medium text-sm text-gray-700">Gender</label>
                            <select id="gender" name="gender" class="form-input rounded-md py-2 shadow-sm mt-1 block w-full">
                                 @if($record[0]['gender'] == 'Male')
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

                        <div>
                            <label for="birthdate" class="block font-medium text-sm text-gray-700">Birthdate</label>
                            <input type="date" name="birthdate" id="birthdate" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['birthdate'] }}" />
                            @error('birthdate')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="birthplace" class="block font-medium text-sm text-gray-700">Birthplace</label>
                            <input type="text" name="birthplace" id="birthplace" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['birthplace'] }}" />
                            @error('birthplace')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="guardian" class="block font-medium text-sm text-gray-700">Guardian</label>
                            <input type="text" name="guardian" id="guardian" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['guardian'] }}" />
                            @error('guardian')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="relation" class="block font-medium text-sm text-gray-700">Relationship to guardian</label>
                            <input type="text" name="relation" id="relation" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['relationship_to_guardian'] }}" />
                            @error('relation')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="guardian-contact" class="block font-medium text-sm text-gray-700">Guardian Contact#</label>
                            <input type="text" name="guardian-contact" id="guardian-contact" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['guardian_contact'] }}" />
                            @error('guardian-contact')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <p class="col-span-4 font-semibold">Address</p>
                        <div>
                            <label for="block" class="block font-medium text-sm text-gray-700">Block</label>
                            <input type="text" name="block" id="block" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['block'] }}" />
                            @error('block')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="house-no" class="block font-medium text-sm text-gray-700">House#</label>
                            <input type="text" name="house-no" id="house-no" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['house_no'] }}" />
                            @error('house-no')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="street" class="block font-medium text-sm text-gray-700">Street</label>
                            <input type="text" name="street" id="street" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['street'] }}" />
                            @error('street')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="barangay" class="block font-medium text-sm text-gray-700">Barangay</label>
                            <input type="text" name="barangay" id="barangay" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['barangay'] }}" />
                            @error('barangay')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="municipality" class="block font-medium text-sm text-gray-700">Municipality</label>
                            <input type="text" name="municipality" id="municipality" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['municipality'] }}" />
                            @error('municipality')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="province" class="block font-medium text-sm text-gray-700">Province</label>
                            <input type="text" name="province" id="province" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ $record[0]['province'] }}" />
                            @error('province')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-4 flex items-center justify-end px-4 py-3 text-right sm:px-6 overflow-hidden">
                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>