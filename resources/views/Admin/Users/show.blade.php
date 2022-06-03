<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('admin.users.index') }}">
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
                    <p>{{ $user['l_name'] . ", " . $user['f_name'] . " " .  $user['m_name'] }}</p>
                </div>
                <div class="md:grid grid-cols-4 gap-4 bg-white p-5">
                    <p class="col-span-4 font-semibold text-xl text-indigo-800">Details</p>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">ID: </p>
                        <p class="font-semibold">{{ $user['id'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">First Name: </p>
                        <p class="font-semibold">{{ $user['f_name'] }}</p>
                    </div>
                
                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Last Name: </p>
                        <p class="font-semibold">{{ $user['l_name'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Middle Name: </p>
                        <p class="font-semibold">{{ $user['m_name'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Contact#: </p>
                        <p class="font-semibold">{{ $user['contact_no'] }}</p>
                    </div>
                    
                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Gender: </p>
                        <p class="font-semibold">{{ $user['gender'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Email: </p>
                        <p class="font-semibold">{{ $user['email'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Type of Account: </p>
                        <p class="font-semibold">{{ $user['role'] }}</p>
                    </div>

                    <p class="mt-5 md:mt-0 col-span-4 font-semibold text-xl text-indigo-800">Status</p>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">
                            Created By: </p>
                        @if(!empty($created_by))
                        <a href="{{ route('admin.users.show', $created_by['id']) }}"
                             class="font-semibold text-blue-600 hover:text-blue-800">{{ $created_by['l_name'] . ", " . $created_by['f_name'] . " " . $created_by['m_name'] }}
                        </a>
                        @endif
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Created At: </p>
                        <p class="font-semibold">{{ $user['created_at'] }}</p>
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">
                            Updated By: </p>
                        @if(!empty($updated_by))
                        <a href="{{ route('admin.users.show', $updated_by['id']) }}"
                             class="font-semibold text-blue-600 hover:text-blue-800">{{ $updated_by['l_name'] . ", " . $updated_by['f_name'] . " " . $updated_by['m_name'] }}
                        </a>
                        @endif
                    </div>

                    <div class="mt-2 md:mt-0">
                        <p class="block font-medium text-sm text-gray-700">Updated At: </p>
                        <p class="font-semibold">{{ $user['updated_at'] }}</p>
                    </div>
                </div>
            </div>
            <div class="mt-2 md:mt-0 col-span-4 flex items-center justify-end px-4 py-3 text-right sm:px-6 overflow-hidden">
                <form class="inline-block" action="{{ route('admin.users.destroy', $user['id']) }}" method="POST" 
                    onsubmit="return confirm('You are about to delete User ID: {{ $user['id'] }}s record. \n Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <div class="mr-2 inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-red disabled:opacity-25 transition ease-in-out duration-150">
                        <input type="submit" value="Delete" style="cursor: pointer">
                    </div>   
                </form>
                <a href="{{ route('admin.users.edit', $user['id']) }}" 
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Go to Update
                </a>
            </div>
        </div>
    </div>
</x-app-layout>