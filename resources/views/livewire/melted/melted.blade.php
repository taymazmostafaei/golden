<div>
    @include('components.alert')
    <div class="d-flex justify-content-around">
        @php
            $formattedPrice = number_format($bprice);
            $bparts = explode(',', $formattedPrice);

            $formattedPrice = number_format($sprice);
            $sparts = explode(',', $formattedPrice);
        @endphp
        <h4>{{ $bparts[0] }}.<span style="font-size: 30px">{{ $bparts[1] }}</span><span style="font-size: 12px">{{ $bparts[2] }}</span></h4>
        <h4>{{ $sparts[0] }}.<span style="font-size: 30px">{{ $sparts[1] }}</span><span style="font-size: 12px">{{ $sparts[2] }}</span></h4>

    </div>
    <div class="d-flex gap-2 col-lg-12 mx-auto justify-content-around mb-4">

        <button type="button" class="btn btn-success col-lg-3 col-5" id="confirm-sale">
            خرید
            @if ($grams != 0)
                <br><br>
                {{number_format($buyPrice)}}
                <br><br>
                تومان
            @else
                <br><br>
                {{number_format($buyGrams)}}
                <br><br>
                گرم
            @endif
        </button>
        <button type="button" class="btn btn-danger col-lg-3 col-5" id="confirm-buy">
            فروش
            @if ($grams != 0)
                <br><br>
                {{number_format($sellPrice)}}
                <br><br>
                تومان
            @else
                <br><br>
                {{number_format($sellGrams)}}
                <br><br>
                گرم
            @endif
        </button>
    </div>
    <div class="d-flex">
        <div class="col-lg-3 col-3 col-md-3">
            <span>وزن:</span>
        </div>
        <div class="input-group mb-4 col-5 col-lg-5 col-md-5">
            <button class="btn btn-outline-primary" wire:click="increaseGrams" type="button">50+</button>
            <div class="col-3 col-lg-4">
                <input type="number" class="form-control text-center" wire:model.live="grams" placeholder=""
                    aria-label="Example text with two button addons">
            </div>
            <button class="btn btn-outline-primary" wire:click="decreaseGrams" type="button">50-</button>
        </div>
    </div>
    <div class="d-flex">
        <div class="col-lg-3 col-3 col-md-3">
            <span>مبلغ:</span>
        </div>
        <div class="input-group mb-4 col-5 col-lg-5 col-md-5">
            <button class="btn btn-outline-primary" wire:click="increaseAmount" type="button">100+</button>
            <div class="col-3  col-lg-4">
                <input type="number" class="form-control text-center" wire:model.live="amount" placeholder=""
                    aria-label="Example text with two button addons">
            </div>
            <button class="btn btn-outline-primary" wire:click="decreaseAmount" type="button">100-</button>
        </div>
    </div>
    @if ($amount != 0)
    <span class="alert alert-secondary mb-4 d-flex justify-content-between align-items-center">
        <span><i class="ti ti-live-photo"></i>معادل با</span>
        <span>
            معادل با
            {{$amount}} 
            میلیون تومان
        </span>
    </span>
    @endif


    {{-- <div class="d-flex gap-2 col-lg-6 mx-auto">
        <button type="button" class="btn btn-success" id="confirm-sale">
            خرید
        </button>
    </div> --}}

</div>
