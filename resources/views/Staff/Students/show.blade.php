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
                <div class="grid grid-cols-3 gap-4 bg-white p-5">
                    <p class="col-span-4 font-semibold">Details</p>
                     <div>
                        <p class="block font-medium text-sm text-gray-700">Student ID: <span class="font-semibold">{{ $record[0]['student_id'] }}</span></p>
                    </div>

                    <div>
                        <p class="block font-medium text-sm text-gray-700">
                           First Name: <span class="font-semibold"><span class="font-semibold">{{ $record[0]['f_name'] }}</span>
                        </p>
                    </div>
                
                    <div>
                        <p class="block font-medium text-sm text-gray-700">Last Name: <span class="font-semibold">{{ $record[0]['l_name'] }}</span></p>
                    </div>

                    <div>
                        <p class="block font-medium text-sm text-gray-700">Middle Name: <span class="font-semibold">{{ $record[0]['m_name'] }}</span></p>
                    </div>

                    <div>
                        <p class="block font-medium text-sm text-gray-700">Contact#: <span class="font-semibold">{{ $record[0]['contact_no'] }}</span></p>
                    </div>
                    
                    <div>
                        <p class="block font-medium text-sm text-gray-700">Gender: <span class="font-semibold">{{ $record[0]['gender'] }}</span></p>
                    </div>

                    <div>
                        <p class="block font-medium text-sm text-gray-700">Birthdate: <span class="font-semibold">{{ $record[0]['birthdate'] }}</span></p>
                    </div>

                    <div>
                        <p class="block font-medium text-sm text-gray-700">Birthplace: <span class="font-semibold">{{ $record[0]['birthplace'] }}</span></p>
                    </div>

                    <div>
                        <p class="block font-medium text-sm text-gray-700">Guardian: <span class="font-semibold">{{ $record[0]['contact_no'] }}</span></p>
                    </div>

                    <div>
                        <p class="block font-medium text-sm text-gray-700">Relationship to guardian: <span class="font-semibold">{{ $record[0]['relationship_to_guardian'] }}</span></p>
                    </div>

                    <div>
                        <p class="block font-medium text-sm text-gray-700">Guardian Contact#: <span class="font-semibold">{{ $record[0]['guardian_contact'] }}</span></p>
                    </div>

                    <p class="col-span-4 font-semibold">Address</p>

                    <div>
                        <p class="block font-medium text-sm text-gray-700">Block: <span class="font-semibold">{{ $record[0]['block'] }}</span></p>
                    </div>

                    <div>
                        <p class="block font-medium text-sm text-gray-700">House#: <span class="font-semibold">{{ $record[0]['house_no'] }}</span></p>
                    </div>

                    <div>
                        <p class="block font-medium text-sm text-gray-700">Street: <span class="font-semibold">{{ $record[0]['street'] }}</span></p>
                    </div>

                    <div>
                        <p class="block font-medium text-sm text-gray-700">Barangay: <span class="font-semibold">{{ $record[0]['barangay'] }}</span></p>
                    </div>

                    <div>
                        <p class="block font-medium text-sm text-gray-700">Municipality: <span class="font-semibold">{{ $record[0]['municipality'] }}</span></p>
                    </div>

                    <div>
                        <p class="block font-medium text-sm text-gray-700">Province: <span class="font-semibold">{{ $record[0]['province'] }}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-span-4 flex items-center justify-end px-4 py-3 text-right sm:px-6 overflow-hidden">
                <a href="{{ route('staff.students.edit', $record[0]['st_id']) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Go to Update
                </a>
            </div>
        </div>
    </div>
</x-app-layout>