<div>
    @if (!$order)
        بارگیری سفارش...
    @else
        <div class="text-center mb-4">
            <h3 class="mb-3">جزئیات سفارش</h3>
            <p class="text-muted">
                <span>کد سفارش:</span>{{ $order->id }}
            </p>
        </div>

        @foreach ($order->details as $item)
            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                <div class="d-flex gap-2 align-items-center">

                    @foreach ($item->retail->media as $media)
                        <img src="{{ asset('storage/retail-media/' . $media->path) }}" class="img-fluid w-px-50 h-px-30" />
                        @break
                    @endforeach

                    <h6 class="m-0">{{ $item->retail->name }}</h6>
                    <span class="text-muted">x</span><span class="text-muted">{{ $item->quantity }}</span>
                </div>
                <h6 class="m-0 d-none d-sm-block">{{ $item->priceFormated() }} ریال</h6>
            </div>
        @endforeach

        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
            <div class="d-flex gap-2 align-items-center">
                <h6 class="m-0">قیمت کل</h6>
            </div>
            <h6 class="m-0 d-none d-sm-block">{{ $order->fullPriceFormated() }} ریال</h6>
        </div>
        @if (!$order->completed)
            <button wire:click="deleteOrder({{$order->id}})" type="button" class="btn btn-label-danger waves-effect">
                <span class="ti-xs ti ti-trash me-1"></span>لغو سفارش
            </button>
        @endif
    @endif
</div>
