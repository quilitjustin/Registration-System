<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('staff.students.index') }}">
                &Larr;Go Back
            </a>
        </h2>
    </x-slot>
    @if(session()->has('msg'))
        <div class="flex items-center justify-center bg-green-600 py-2
            @if (session()->get('msg') == 'Deleted Successfully')
                {{ 'bg-red-600' }}
            @endif">
            <p class="text-semibold text-xl text-white">{{ session()->get('msg') }}</p>
        </div>
    @endif
    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2 p-3">
                <div class="flex items-center font-semibold px-3 md:px-4 py-3 bg-gray-50 sm:px-6 shadow overflow-hidden rounded-md">
                    <p>{{ $record[0]['name'] }}</p>
                </div>
                <div class="grid grid-cols-4 gap-4 bg-white p-5">
                    <p class="col-span-4 font-semibold text-xl text-indigo-800">Details</p>

                     <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Student ID: </p>
                        <p class="font-semibold">{{ $record[0]['student_id'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">First Name: </p>
                        <p class="font-semibold">{{ $record[0]['f_name'] }}</p>
                    </div>
                
                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Last Name: </p>
                        <p class="font-semibold">{{ $record[0]['l_name'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Middle Name: </p>
                        <p class="font-semibold">{{ $record[0]['m_name'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Contact#: </p>
                        <p class="font-semibold">{{ $record[0]['contact_no'] }}</p>
                    </div>
                    
                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Gender: </p>
                        <p class="font-semibold">{{ $record[0]['gender'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Birthdate: </p>
                        <p class="font-semibold">{{ $record[0]['birthdate'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Birthplace: </p>
                        <p class="font-semibold">{{ $record[0]['birthplace'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Guardian: </p>
                        <p class="font-semibold">{{ $record[0]['guardian'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Relationship to guardian: </p>
                        <p class="font-semibold">{{ $record[0]['relationship_to_guardian'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Guardian Contact#: </p>
                        <p class="font-semibold">{{ $record[0]['guardian_contact'] }}</p>
                    </div>

                    <p class="col-span-4 font-semibold text-xl text-indigo-800">Address</p>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Block: </p>
                        <p class="font-semibold">{{ $record[0]['block'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">House#: </p>
                        <p class="font-semibold">{{ $record[0]['house_no'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Street: </p>
                        <p class="font-semibold">{{ $record[0]['street'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Barangay: </p>
                        <p class="font-semibold">{{ $record[0]['barangay'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Municipality: </p>
                        <p class="font-semibold">{{ $record[0]['municipality'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Province: </p>
                        <p class="font-semibold">{{ $record[0]['province'] }}</p>
                    </div>

                    <p class="col-span-4 font-semibold text-xl text-indigo-800">Status</p>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">
                            Created By: </p>
                        <p
                             class="font-semibold">{{ $created_by['l_name'] . ", " . $created_by['f_name'] . " " . $created_by['m_name'] }}
                        </p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Created At: </p>
                        <p class="font-semibold">{{ $record[0]['created_at'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">
                            Updated By: </p>
                        <p
                             class="font-semibold">{{ $updated_by['l_name'] . ", " . $updated_by['f_name'] . " " . $updated_by['m_name'] }}
                        </p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Updated At: </p>
                        <p class="font-semibold">{{ $record[0]['updated_at'] }}</p>
                    </div>
                </div>
            </div>
            <div class="mt-2 md:mt-0 col-span-4 flex items-center justify-end px-4 py-3 text-right sm:px-6 overflow-hidden">
                <a href="{{ route('staff.students.edit', $record[0]['st_id']) }}" 
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Go to Update
                </a>
            </div>
        </div>
    </div>
</x-app-layout>