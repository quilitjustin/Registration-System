<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Export') }}
        </h2>
    </x-slot>
    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2 p-3">
                <div class="flex items-center font-semibold px-3 md:px-4 py-3 bg-gray-50 sm:px-6 shadow overflow-hidden rounded-md">
                    <p>Export Your Tables</p>
                </div>
                <div class="md:grid grid-cols-4 gap-4 bg-white p-5">
                    <a href="{{ route('admin.export_users') }}" class="block mt-4 md:inline-block md:mt-0 text-center bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded">Export Users</a>
                    <a href="{{ route('admin.export_students') }}" class="block mt-4 md:inline-block md:mt-0 text-center bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded">Export Students</a>
                    <a href="{{ route('admin.export_address') }}" class="block mt-4 md:inline-block md:mt-0 text-center bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded">Export Address</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>