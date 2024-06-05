@csrf
<div class="p-4">
    <div class="mb-3">
        <label for="travel_number">Travel Number</label>
        <input type="text" name="travel_number" placeholder="Type here" class="input w-full max-w-xs mt-2" />
        @error('travel_number')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label for="travel_type">Travel Type</label>
        <select name="travel_type" class="select w-full max-w-xs mt-2">
            <option disabled selected>Pick your favorite travel</option>
            <option class="car">Mobil</option>
            <option class="bus">Bis</option>
            <option class="shuttle">Shuttle</option>
        </select>
        @error('travel_type')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label for="travel_capacity">Travel Capasity</label>
        <input type="number" name="travel_capacity" placeholder="Type here" class="input w-full max-w-xs mt-2" />
        @error('travel_capacity')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label for="departure">Departure</label>
        <input type="text" name="departure" placeholder="Type here" class="input w-full max-w-xs mt-2" />
        @error('departure')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label for="destination">Destination</label>
        <input type="text" name="destination" placeholder="Type here" class="input w-full max-w-xs mt-2" />
        @error('destination')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label for="departure_time">Departure Time</label>
        <input type="text" name="departure_time" placeholder="Type here" class="input w-full max-w-xs mt-2" />
        @error('departure_time')
            {{ $message }}
        @enderror
    </div>
    <div class="mb-3">
        <label for="arrival_time">Arrival Time</label>
        <input type="text" name="arrival_time" placeholder="Type here" class="input w-full max-w-xs mt-2" />
        @error('arrival_time')
            {{ $message }}
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</div>
