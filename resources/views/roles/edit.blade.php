<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="capitalize text-2xl font-semibold mb-3">{{ $role->name }}</h1>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5>Permission</h5>
                    <br>
                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                        @foreach ($permissions as $permission)
                            <input type="checkbox" name="permission_name[]"
                                {{ $role->permissions->contains('name', $permission->name) ? 'checked' : '' }}
                                class="checkbox mx-2" value="{{ $permission->name }}" />{{ $permission->name }}
                        @endforeach
                        <div class="mt-4 flex justify-end">
                            <button type="submit" class="bg-indigo-500 py-2 px-4 rounded-md">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
