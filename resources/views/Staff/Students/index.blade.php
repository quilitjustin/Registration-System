<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('staff.students.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Record</a>
                <form class="inline-block" method="GET" action="{{ route('staff.students.index') }}" style="width:8rem">
                    @if(isset($_GET['search']) && !empty($_GET['search']))
                        <input type="hidden" name="search" value="{{ $_GET['search'] }}">
                    @endif
                    <label for="sort">Sort By:</label>
                    <select onchange="this.form.submit()" id="sort" name="sort" class="form-input rounded-md py-2 shadow-sm mt-1 block w-full">
                        <option value="null" selected disabled></option>
                        <option value="id-desc"
                            @isset ($_GET['sort'])
                                @if($_GET['sort'] == "id-desc")
                                    selected
                                @endif
                            @endisset
                        >Student ID (DESC)</option>
                        <option value="id-asc"
                            @isset ($_GET['sort'])
                                @if($_GET['sort'] == "id-asc")
                                    selected
                                @endif
                            @endisset
                        >Student ID (ASC)</option>
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
                                    <th scope="col" width="125" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Student ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Gender
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date Created
                                    </th>
                                    <th scope="col" width="250" class="px-6 py-3 bg-gray-50">
                                        <form action="{{ route('staff.students.index') }}" method="GET">
                                            @if(isset($_GET['sort']))
                                                <input type="hidden" name="rule" id="rule" value="s-reset">
                                            @endif
                                            <input type="text" name="search" id="search" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="search">
                                        </form>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @if (isset($records))
                                        @foreach ($records as $record)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $record['student_id'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ "$record->l_name, $record->f_name $record->m_name" }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $record['gender'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $record['created_at'] }}
                                                </td>

                                                <td class="flex items-center justify-end px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="{{ route('staff.students.show', $record->id) }}" class="text-blue-600 hover:text-indigo-900 mb-2 mr-2">View</a>
                                                    <a href="{{ route('staff.students.edit', $record->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if (isset($records))
                                {{ $records->onEachSide(2)->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>