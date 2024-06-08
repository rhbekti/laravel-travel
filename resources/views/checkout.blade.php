<x-public-layout>
    <div class="container mx-auto max-w-screen-xl px-4">
        <div class="grid gap-y-2 py-0 lg:grid-cols-2 lg:gap-16 lg:py-10">
            <div class="-mx-4 -mt-4 md:mx-0 lg:mt-0">
                <figure>
                    <img class="size-full h-96 rounded-none object-cover object-center md:rounded-lg lg:rounded-2xl"
                        src="{{ url($booking->tourist->photo) }}" alt="{{ $booking->tourist->name }}" />
                </figure>
            </div>
            <div class="mt-6 flex flex-col md:mt-0">
                <div class="flex-1 space-y-4">
                    <div>
                        <h1 class="text-3xl font-semibold leading-none tracking-tight lg:text-4xl mt-0">
                            {{ $booking->tourist->name }}
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
                        <span class="my-auto">{{ $booking->tourist->location }}</span>
                    </div>
                    <div class="p-6 border border-slate-600 rounded-xl">
                        <div class="mb-2 flex justify-between">
                            <span>Travel Number</span>
                            <span>{{ $booking->travels->travel_number }}</span>
                        </div>
                        <div class="mb-2 flex justify-between">
                            <span>Travel Type</span>
                            <div class="flex">
                                @if ($booking->travels->travel_type == 'car')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-car">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path
                                            d="M5 17h-2v-6l2 -5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" />
                                    </svg>
                                    <span
                                        class="ms-2 my-auto font-semibold capitalize">{{ $booking->travels->travel_type }}</span>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
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
                                    <span
                                        class="ms-2 my-auto font-semibold capitalize">{{ $booking->travels->travel_type }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-2 flex justify-between">
                            <span>Travel Capacity</span>
                            <span>{{ $booking->travels->travel_capacity }}</span>
                        </div>
                        <div class="mb-2 flex justify-between">
                            <span>Lane</span>
                            <span>{{ $booking->travels->departure . ' - ' . $booking->travels->destination }}</span>
                        </div>
                        <div class="mb-2 flex justify-between">
                            <span>Time</span>
                            <span>{{ $booking->travels->departure_time . ' - ' . $booking->travels->arrival_time }}</span>
                        </div>
                        <div class="flex justify-between pt-2">
                            <span>Total Amount</span>
                            <span class="font-bold">{{ 'Rp ' . Number::format($booking->totalAmount) }}</span>
                        </div>
                    </div>
                    <div>
                        <form action="{{ route('checkout.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="bookingId" value="{{ $booking->id }}">
                            <h5 class="mb-4">Payment Method</h5>
                            <div class="form-control">
                                <select name="paymentMethod" class="select select-bordered w-full">
                                    <option disabled selected>Pick payment method</option>
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                            </div>
                            <div class="mt-4 flex justify-end">
                                <button type="submit" class="btn btn-primary px-6">Checkout</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
