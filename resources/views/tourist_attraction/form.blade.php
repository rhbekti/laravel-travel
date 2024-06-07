@csrf
<div class="px-8 py-4 flex justify-center">
    <div class="w-full max-w-md">
        <div class="mb-3">
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Name</span>
                </div>
                <input type="text" name="name" id="name" class="input w-full"
                    value="{{ $tourist->name ?? old('name') }}" />
                <div class="label">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </label>
        </div>
        <div class="mb-3">
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Location</span>
                </div>
                <input type="text" name="location" id="location" class="input w-full"
                    value="{{ $tourist->location ?? old('location') }}" />
                <div class="label">
                    @error('location')
                        {{ $message }}
                    @enderror
                </div>
            </label>
        </div>
        <div class="mb-3">
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Photo</span>
                </div>
                <input type="file" name="photo" id="photo" class="file-input w-full" />
                <div class="label">
                    @error('photo')
                        {{ $message }}
                    @enderror
                </div>
            </label>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="btn btn-primary px-6">Save</button>
        </div>
    </div>
</div>
