<x-public-layout>
    <section class="hero min-h-screen"
        style="background-image: url(https://salsawisata.com/wp-content/uploads/2022/10/wisata-pantai-kebumen.jpg);">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Dolan Bae</h1>
                <p class="mb-5">Embark on an Unforgettable Adventure: Discover the Untamed Charm of Kebumen</p>
            </div>
        </div>
    </section>

    <section class="p-16">
        <div class="text-center mb-6">
            <h5 class="text-3xl font-semibold">Populer Tourist</h5>
        </div>
        <div class="carousel rounded-box space-x-4 w-full">
            @forelse ($tourists as $tourist)
                <div class="carousel-item">
                    <div class="card card-compact w-96 bg-base-100 shadow-xl">
                        <figure>
                            <img src="{{ url($tourist->photo) }}" alt="{{ $tourist->name }}" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $tourist->name }}</h2>
                            <p>{{ $tourist->location }}</p>
                            <div class="card-actions justify-between">
                                <div class="rating">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="currentColor"
                                        class="icon icon-tabler icons-tabler-filled icon-tabler-star">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
                                    </svg>
                                </div>
                                <a href="{{ route('tourist.show', $tourist->id) }}" class="btn btn-primary">Booking
                                    Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </section>

    <section class="p-16">
        <h3 class="text-2xl mb-6 font-semibold">Have an exciting holiday using the Holideals promo 🏖️</h3>
        <div class="flex space-x-6">
            <figure>
                <img src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/auto_optimize_webp/mobile-modules/2024/06/04/b16785a4-0979-42a6-8eb9-d8007238f387-1717469209490-6281052ef5c255cf5565d07622058d45.jpg"
                    alt="tiket" class="h-48 rounded-lg">
            </figure>
            <figure>
                <img src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/auto_optimize_webp/mobile-modules/2024/06/04/712b9fe3-69e8-4963-9f20-ebb427fa0fb5-1717469274649-415f2a84b7045c8a4617242b29510fc8.jpg"
                    alt="tiket" class="h-48 rounded-lg">
            </figure>
            <figure>
                <img src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/auto_optimize_webp/mobile-modules/2024/06/04/e504e6c2-55fe-4103-97a1-5d39d6084622-1717469322617-f02b77e2d85d0a493ff62877da0101ec.jpg"
                    alt="tiket" class="h-48 rounded-lg">
            </figure>
        </div>
    </section>
</x-public-layout>
