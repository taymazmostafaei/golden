<div>
    @include('components.alert')
    <div class="d-flex justify-content-around">
        <h4>14.<span style="font-size: 30px">960</span><span style="font-size: 12px">000</span></h4>
        <h4>14.<span style="font-size: 30px">960</span><span style="font-size: 12px">000</span></h4>

    </div>
    <div class="d-flex gap-2 col-lg-12 mx-auto justify-content-around mb-4">

        <button type="button" class="btn btn-success col-lg-3 col-5" id="confirm-sale">
            خرید
            <br><br>
            29.03
            <br><br>
            گرم
        </button>
        <button type="button" class="btn btn-danger col-lg-3 col-5" id="confirm-buy">
            فروش
            <br><br>
            29.03
            <br><br>
            گرم
        </button>
    </div>
    <div class="d-flex">
        <div class="col-lg-3 col-3 col-md-3">
            <span>وزن:</span>
        </div>
        <div class="input-group mb-4 col-5 col-lg-5 col-md-5">
            <button class="btn btn-outline-primary" type="button">50+</button>
            <div class="col-3 col-lg-4">
                <input type="text" class="form-control text-center" placeholder=""
                    aria-label="Example text with two button addons">
            </div>
            <button class="btn btn-outline-primary" type="button">50-</button>
        </div>
    </div>
    <div class="d-flex">
        <div class="col-lg-3 col-3 col-md-3">
            <span>مبلغ:</span>
        </div>
        <div class="input-group mb-4 col-5 col-lg-5 col-md-5">
            <button class="btn btn-outline-primary" type="button">50+</button>
            <div class="col-3  col-lg-4">
                <input type="text" class="form-control text-center" placeholder=""
                    aria-label="Example text with two button addons">
            </div>
            <button class="btn btn-outline-primary" type="button">50-</button>
        </div>
    </div>
    <span class="alert alert-secondary mb-4 d-flex justify-content-between align-items-center">
        <span><i class="ti ti-live-photo"></i>معادل با</span>
        <span>{{ number_format($price) }} ریال</span>
    </span>

    {{-- <div class="d-flex gap-2 col-lg-6 mx-auto">
        <button type="button" class="btn btn-success" id="confirm-sale">
            خرید
        </button>
    </div> --}}

</div>
