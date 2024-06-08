<x-public-layout>
    <div class="p-16">
        <h1 class="text-2xl font-semibold mb-4">Order History</h1>
        <div class="grid grid-cols-2 space-x-4">
            <div>
                @forelse ($carts as $cart)
                    <div class="card w-full bg-base-100 shadow-xl mb-6">
                        <div class="card-body">
                            <div class="flex justify-between">
                                <h5 class="text-xl">{{ $cart->booking->tourist->name }}</h5>
                                <div>
                                    @if ($cart->status == 0)
                                        <div class="badge badge-secondary">PENDING</div>
                                    @elseif ($cart->status == 1)
                                        <div class="badge badge-accent">COMPLETED</div>
                                    @else
                                        <div class="badge badge-neutral">CANCEL</div>
                                    @endif
                                </div>
                            </div>
                            <p>{{ $cart->booking->travels->travel_number }}</p>
                            <p>{{ $cart->booking->travels->departure . ' - ' . $cart->booking->travels->destination }}
                            </p>
                            <p>{{ 'Rp ' . Number::format($cart->amount) }}</p>
                            <div class="flex justify-end">
                                {{ Carbon\Carbon::parse($cart->created_at)->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            <div>
                <figure>
                    <img src="{{ url('images/cart.png') }}" alt="" class="w-full rounded-xl">
                </figure>
            </div>
        </div>
    </div>
</x-public-layout>
