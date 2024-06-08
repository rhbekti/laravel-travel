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
                    <table class="table mt-2">
                        <thead>
                            <th>No</th>
                            <th>Booking Date</th>
                            <th>Booking ID</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ Carbon\Carbon::parse($payment->created_at)->format('d F Y - H:i:s') }}</td>
                                    <td>{{ $payment->bookingId }}</td>
                                    <td>{{ $payment->user->name }}</td>
                                    <td>{{ 'Rp ' . Number::format($payment->amount) }}</td>
                                    <td>
                                        @if ($payment->status == 0)
                                            <div class="badge badge-secondary">PENDING</div>
                                        @elseif ($payment->status == 1)
                                            <div class="badge badge-accent">COMPLETED</div>
                                        @else
                                            <div class="badge badge-neutral">CANCEL</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($payment->status == 0)
                                            <form action="{{ route('payment.update', $payment->id) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <button class="btn btn-success btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                        <path d="M9 12l2 2l4 -4" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @elseif($payment->status == 1)
                                            <form action="{{ route('payment.destroy', $payment->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-error btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                        <path d="M10 10l4 4m0 -4l-4 4" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
