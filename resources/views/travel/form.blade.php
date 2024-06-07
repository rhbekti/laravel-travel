@csrf
<div class="px-8 py-4 flex">
    <div class="w-full">
        <label class="mb-3 form-control w-full">
            <div class="label">
                <span class="label-text">Travel Number</span>
            </div>
            <input type="text" name="travel_number" placeholder="Type here" class="input w-full max-w-xs" />
            <div class="label">
                @error('travel_number')
                    {{ $message }}
                @enderror
            </div>
        </label>
        <label class="mb-3 form-control w-full">
            <div class="label">
                <span class="label-text">Travel Type</span>
            </div>
            <select name="travel_type" class="select w-full max-w-xs">
                <option disabled selected>Pick your favorite travel</option>
                <option class="car">Mobil</option>
                <option class="bus">Bis</option>
                <option class="shuttle">Shuttle</option>
            </select>
            <div class="label">
                @error('travel_type')
                    {{ $message }}
                @enderror
            </div>
        </label>
        <label class="mb-3 form-control w-full">
            <div class="label">
                <span class="label-text">Travel Capasity</span>
            </div>
            <input type="number" name="travel_capacity" placeholder="Type here" class="input w-full max-w-xs" />
            <div class="label">
                @error('travel_capacity')
                    {{ $message }}
                @enderror
            </div>
        </label>
    </div>
    <div class="w-full">
        <label class="mb-3 form-control w-full">
            <div class="label">
                <span class="label-text">Departure</span>
            </div>
            <input type="text" name="departure" placeholder="Type here" class="input w-full max-w-xs" />
            <div class="label">
                @error('departure')
                    {{ $message }}
                @enderror
            </div>
        </label>
        <label class="mb-3 form-control w-full">
            <div class="label">
                <span class="label-text">Destination</span>
            </div>
            <input type="text" name="destination" placeholder="Type here" class="input w-full max-w-xs" />
            <div class="label">
                @error('destination')
                    {{ $message }}
                @enderror
            </div>
        </label>
    </div>
    <div class="w-full">
        <label class="mb-3 form-control w-full">
            <div class="label">
                <span class="label-text">Departure Time</span>
            </div>
            <input type="time" name="departure_time" placeholder="Type here" class="input w-full max-w-xs" />
            <div class="label">
                @error('departure_time')
                    {{ $message }}
                @enderror
            </div>
        </label>
        <label class="mb-3 form-control w-full">
            <div class="label">
                <span class="label-text">Arrival Time</span>
            </div>
            <input type="time" name="arrival_time" placeholder="Type here" class="input w-full max-w-xs" />
            <div class="label">
                @error('arrival_time')
                    {{ $message }}
                @enderror
            </div>
        </label>
        <button type="submit" class="btn btn-primary px-6">Save</button>
    </div>
</div>
