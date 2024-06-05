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
                    <div class="flex justify-end mt-1 mb-4">
                        <a href="{{ route('travels.create') }}" class="btn btn-primary">Add Travel</a>
                    </div>
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Travel Number</th>
                            <th>Type</th>
                            <th>Capacity</th>
                            <th>Lane</th>
                            <th>Destination</th>
                        </thead>
                        <tbody>
                            @forelse ($travels as $travel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $travel->travel_number }}</td>
                                    <td>{{ $travel->travel_type }}</td>
                                    <td>{{ $travel->travel_capacity }}</td>
                                    <td>
                                        <div class="flex gap-x-2">
                                            <span class="my-auto">{{ $travel->departure }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l14 0" />
                                                <path d="M15 16l4 -4" />
                                                <path d="M15 8l4 4" />
                                            </svg>
                                            <span class="my-auto"> {{ $travel->destination }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $travel->departure_time . ' - ' . $travel->arrival_time }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Data kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
