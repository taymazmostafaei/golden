<div>
    @include('components.alert')
    <h1 class="form-label mb-3">می فروشم</h1>
    <div class="input-group mb-3">
        {{-- <span class="input-group-text"><i class="ti ti-currency-iranian-rial"></i></span> --}}
        <input type="number" class="form-control" wire:model.live="pay" aria-label="Amount (to the nearest dollar)">
        <span class="input-group-text"><i class="ti ti-droplet"></i></span>

    </div>
    <span class="badge mb-3 d-flex justify-content-between align-items-center text-muted">
        <span>گرم</span>
        <span id="sell_pay">{{ number_format($pay == '' ? 0 : $pay) }}</span>
    </span>
    <span class="alert alert-secondary mb-2 d-flex justify-content-between align-items-center">
        <span><i class="ti ti-live-photo"></i>قیمت هر یک گرم</span>
        <span>{{ number_format($price) }} ریال</span>
    </span>
    {{-- <span class="badge mb-3 d-flex justify-content-between align-items-center text-muted">
                <span>در دسترس</span>
                <span>863 <i class="ti ti-currency-iranian-rial"></i></span>
            </span> --}}

    <h1 class="form-label mb-3">دریافت میکنم</h1>
    <div class="input-group mb-4">
        {{-- <span class="input-group-text"><i class="ti ti-currency-iranian-rial"></i></span> --}}
        <input type="number" class="form-control" wire:model.live="obtain"
            aria-label="Amount (to the nearest dollar)">
        <span class="input-group-text"><i class="ti ti-currency-iranian-rial"></i></span>
    </div>
    <span class="badge mb-3 d-flex justify-content-between align-items-center text-muted">
        <span>ریال</span>
        <span id="sell_obtain">{{ number_format($obtain == '' ? 0 : $obtain) }}</span>
    </span>
    <div class="d-grid gap-2 col-lg-12 mx-auto">
        <button type="button" class="btn btn-danger" id="confirm-buy">
            فروش
        </button>
    </div>

</div>
