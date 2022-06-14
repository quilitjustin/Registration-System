<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
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
        <div class="max-w-6xl mx-auto px-2 py-10 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('admin.users.create') }}" class="mr-1 bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded">Add Staff</a>
                <form class="inline-block" method="GET" action="{{ route('admin.users.index') }}" style="width:10rem">
                    @if(isset($_GET['search']) && !empty($_GET['search']))
                        <input type="hidden" name="search" value="{{ $_GET['search'] }}">
                    @endif
                    <select onchange="this.form.submit()" id="sort" name="sort" class="px-2 form-input rounded-md py-2 shadow-sm mt-1 block w-full">
                        <option class="bg-muted text-muted" value="null" selected disabled>Sort By</option>
                        <option value="id-desc" 
                            @isset ($_GET['sort'])
                                @if($_GET['sort'] == "id-desc")
                                    selected
                                @endif
                            @endisset
                        >ID (DESC)</option>
                        <option value="id-asc"
                            @isset ($_GET['sort'])
                                @if($_GET['sort'] == "id-asc")
                                    selected
                                @endif
                            @endisset
                        >ID (ASC)</option>
                        <option value="n-desc"
                            @isset ($_GET['sort'])
                                @if($_GET['sort'] == "n-desc")
                                    selected
                                @endif
                            @endisset
                        >Name (DESC)</option>
                        <option value="n-asc"
                            @isset ($_GET['sort'])
                                @if($_GET['sort'] == "n-asc")
                                    selected
                                @endif
                            @endisset
                        >Name (ASC)</option>
                        <option value="e-desc"
                            @isset ($_GET['sort'])
                                @if($_GET['sort'] == "e-desc")
                                    selected
                                @endif
                            @endisset
                        >Email (DESC)</option>
                        <option value="e-asc"
                            @isset ($_GET['sort'])
                                @if($_GET['sort'] == "e-asc")
                                    selected
                                @endif
                            @endisset
                        >Email (ASC)</option>
                        <option value="d-desc"
                            @isset ($_GET['sort'])
                                @if($_GET['sort'] == "d-desc")
                                    selected
                                @endif
                            @endisset
                        >Date (DESC)</option>
                        <option value="d-asc"
                            @isset ($_GET['sort'])
                                @if($_GET['sort'] == "d-asc")
                                    selected
                                @endif
                            @endisset
                        >Date (ASC)</option>
                        <option value="t-desc"
                            @isset ($_GET['sort'])
                                @if($_GET['sort'] == "t-desc")
                                    selected
                                @endif
                            @endisset
                        >Type (DESC)</option>
                        <option value="t-asc"
                            @isset ($_GET['sort'])
                                @if($_GET['sort'] == "t-asc")
                                    selected
                                @endif
                            @endisset
                        >Type (ASC)</option>
                    </select>
                </form>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50">
                                        <form action="{{ route('admin.users.index') }}" method="GET">
                                            <input type="text" name="search" id="search" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="search">
                                        </form>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($users as $record)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $record['id'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $record['l_name'] . ", " . $record['f_name'] . " " . $record['m_name']}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $record['email'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $record['role'] }}
                                            </td>

                                            <td class="flex items-center justify-end px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('admin.users.show', $record['id']) }} " class="text-blue-600 hover:text-indigo-900 mb-2 mr-2"><i class="bi bi-eye"></i>View</a>
                                                <a href="{{ route('admin.users.edit', $record['id']) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2"><i class="bi bi-pencil-square"></i>Edit</a>
                                                <form class="inline-block" action="{{ route('admin.users.destroy', $record['id']) }}" method="POST" 
                                                    onsubmit="return confirm('You are about to delete User ID: {{ $record['id'] }}s record. \n Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="mb-2 mr-2 text-red-600 hover:text-red-900" style="cursor: pointer"><i class="bi bi-trash-fill" style="margin-right:-5px"></i> Delete</button> 
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <div class="text-center font-semibold text-xl text-white bg-indigo-800 p-1 rounded">
                                            <p>No Information Avaiilable.</p>
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            @if (isset($users))
                                {{ $users->onEachSide(5)->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>