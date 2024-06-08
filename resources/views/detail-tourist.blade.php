<x-public-layout>
    <div class="container mx-auto max-w-screen-xl px-4">
        <div class="grid gap-y-2 py-0 lg:grid-cols-2 lg:gap-16 lg:py-10">
            <div class="-mx-4 -mt-4 md:mx-0 lg:mt-0">
                <figure>
                    <img class="size-full rounded-none object-cover object-center md:rounded-lg lg:rounded-2xl"
                        src="{{ url($tourist->photo) }}" alt="{{ $tourist->name }}" />
                </figure>
            </div>
            <div class="mt-6 flex flex-col md:mt-0">
                <div class="flex-1 space-y-4">
                    <div>
                        <h1 class="text-3xl font-semibold leading-none tracking-tight lg:text-4xl mt-0">
                            {{ $tourist->name }}
                        </h1>
                    </div>
                    <div class="flex space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                            <path
                                d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                        </svg>
                        <span class="my-auto">{{ $tourist->location }}</span>
                    </div>

                    @forelse ($bookings as $booking)
                        <div class="card w-full bg-base-100 shadow-xl">
                            <div class="card-body">
                                <h2 class="card-title">{{ 'Rp ' . Number::format($booking->totalAmount) }}</h2>
                                <ul>
                                    <li class="flex">
                                        @if ($booking->travels->travel_type == 'car')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-car">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path
                                                    d="M5 17h-2v-6l2 -5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" />
                                            </svg>
                                            <span class="ms-2 capitalize">{{ $booking->travels->travel_type }}</span>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-bus">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M6 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M18 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M4 17h-2v-11a1 1 0 0 1 1 -1h14a5 7 0 0 1 5 7v5h-2m-4 0h-8" />
                                                <path d="M16 5l1.5 7l4.5 0" />
                                                <path d="M2 10l15 0" />
                                                <path d="M7 5l0 5" />
                                                <path d="M12 5l0 5" />
                                            </svg>
                                            <span class="ms-2 capitalize">{{ $booking->travels->travel_type }}</span>
                                        @endif
                                    </li>
                                    <li class="flex mt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                        </svg>
                                        <span class="ms-2">{{ $booking->travels->travel_capacity }}</span>
                                    </li>
                                </ul>
                                <div class="card-actions justify-between">
                                    <span class="my-auto bg-indigo-800 px-2 py-1 rounded-lg">
                                        {{ Carbon\Carbon::parse($booking->bookingDate)->format('d F Y H:i') }}</span>
                                    <button class="btn btn-primary">Buy Ticket</button>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
