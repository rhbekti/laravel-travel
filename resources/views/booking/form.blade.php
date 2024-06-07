@csrf
<div class="py-6 flex space-x-4 justify-center">
    <div class="flex space-x-4">
        <div class="form-control">
            <div class="label">
                <span class="label-text">Date Booking</span>
            </div>
            <input type="date" name="bookingDate" id="bookingDate" class="input max-w-md"
                value="{{ $booking->bookingDate ?? old('bookingDate') }}">
            @error('bookingDate')
                <div class="label">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-control">
            <div class="label">
                <span class="label-text">Tourist Place</span>
            </div>
            <select name="attractionId" class="select w-full max-w-xs">
                <option disabled selected>Pick your tourist place</option>
                @foreach ($tourists as $tourist)
                    <option value="{{ $tourist->id }}"{{ $booking->attractionId == $tourist->id ?? ' selected' }}>
                        {{ $tourist->name }}
                    </option>
                @endforeach
            </select>
            @error('attractionId')
                <div class="label">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-control">
            <div class="label">
                <span class="label-text">Travel Number</span>
            </div>
            <select name="travelId" class="select w-full max-w-xs">
                <option disabled selected>Pick your travel</option>
                @foreach ($travels as $travel)
                    <option value="{{ $travel->id }}"{{ $booking->travelId == $travel->id ?? ' selected' }}>
                        {{ $travel->travel_number . ' - ' . $travel->travel_type }}
                    </option>
                @endforeach
            </select>
            @error('travelId')
                <div class="label">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-control">
            <div class="label">
                <span class="label-text">Total Amount</span>
            </div>
            <input type="number" name="totalAmount" id="totalAmount" class="input max-w-xs"
                value="{{ $booking->totalAmount ?? old('totalAmount') }}">
        </div>
    </div>
    <div class="mt-auto">
        <button type="submit" class="btn btn-primary px-6">Save</button>
    </div>
</div>
