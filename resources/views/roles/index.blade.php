<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (flash()->message)
                        <div class="{{ flash()->class }}">
                            <div class="toast toast-top toast-end">
                                <div class="alert alert-info">
                                    <span> {{ flash()->message }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="mb-3">
                        <form action="{{ route('roles.store') }}" method="post">
                            @csrf
                            <input type="text" name="role_name" id="role-name"
                                class="rounded-xl mx-3 dark:text-slate-800" placeholder="Enter role name">
                            <button type="submit" class="bg-yellow-500 py-2 px-4 rounded-xl">Add</button>
                        </form>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <th>No</th>
                                <th>Role Name</th>
                                <th>Action</th>
                            </thead>
                            @forelse ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-500 p-1 rounded-md transition duration-200 hover:bg-red-700"
                                                onclick="return confirm('Are you sure?')"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7l16 0" />
                                                    <path d="M10 11l0 6" />
                                                    <path d="M14 11l0 6" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                </svg></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Empty</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
