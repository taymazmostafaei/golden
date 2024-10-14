<div class="mb-3 d-flex justify-content-between align-items-center">
    <!-- Province Selection -->
    <label class="form-label" for="multicol-country">انتخاب استان</label>
    <select id="multicol-country" name="region" class="select2 form-select" wire:model.live="selectedProvince">
        <option value="">انتخاب کنید</option>
        @foreach ($provinces as $province)
            <option value="{{ $province }}">{{ $province }}</option>
        @endforeach
    </select>


    <!-- County Selection (only visible for specific provinces) -->
    @if (!empty($counties))

        <label class="form-label" for="county">انتخاب شهر</label>
        <select id="multicol-country" name="city" class="select2 form-select" wire:model="selectedCounty">
            <option value="">انتخاب کنید</option>
            @foreach ($counties as $county)
                <option value="{{ $county }}">{{ $county }}</option>
            @endforeach
        </select>

    @endif

    <!-- Debugging: Display the selected values -->
    {{-- <div>
        <p>استان انتخاب‌شده: {{ $selectedProvince }}</p>
        @if ($selectedCounty)
            <p>شهرستان انتخاب‌شده: {{ $selectedCounty }}</p>
        @endif
    </div> --}}
</div>
