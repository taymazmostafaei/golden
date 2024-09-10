<div>
    <div class="offcanvas-header border-bottom">
        <h5 id="offcanvasScrollLabel" class="offcanvas-title"><i class="ti ti-shopping-cart"></i>سبد خرید شما</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body my-auto mx-0">
        <div class="col-md-12 col-xl-12">
            @if (!count($cart))
                سبد خرید شما خالی هست.
                <a href="{{route('orders.index')}}">مشاهده سفارشات</a>
            @endif

            @foreach ($cart as $item)
                <div class="card shadow-none bg-transparent border border-secondary mb-3">
                    <div class="p-2 d-flex align-items-start">
                        <div class="text-center col-3 d-flex ">
                            <img class="card-img card-img-left rounded object-fit-cover" style="margin-bottom: 0;"
                                @isset($item->associatedModel->media[0])
                                    src="{{ asset('storage/retail-media/' . $item->associatedModel->media[0]->path) }}"
                                @endisset
                                alt="tutor image 1" />
                        </div>
                        <div class="col-9">
                            <div class="position-absolute float-left" style="left: 20px; cursor: pointer;"
                                title="حذف">
                                <button wire:click="remove({{ $item->id }})" class="btn waves-effect" style="padding: 5px"><i class="ti ti-trash text-danger"
                                        style="font-size:25px;"></i></button>

                            </div>

                            <h5 class="card-title ms-3">{{ $item->name }}</h5>
                            {{-- <p class="d-block text-muted mb-0 ms-3" style="font-size:15px;">
                                {{ $item->associatedModel->priceFormated() }} ریال</p> --}}


                            <div class="input-number d-flex gap-2 text-nowrap ms-3 mt-2">
                                <button wire:click="increment({{ $item->id }})"
                                    class="btn btn-primary btn-icon input-number__plus" type="button"
                                    style="height:20px; width:20px;"><i class="ti ti-plus"></i></button>
                                <input class="form-control text-center form__input input-number__input" min="0"
                                    max="1000000" type="number" id="html5-number-input"
                                    style="width: 30%; height:20px;" disabled value="{{ $item->quantity }}" />
                                <button wire:click="decrement({{ $item->id }})"
                                    class="btn btn-primary btn-icon input-number__minus" type="button"
                                    style="height:20px; width:20px;"><i class="ti ti-minus"></i></button>
                            </div>
                            <div class="mt-4">
                                <textarea class="form-control" wire:model="descriptions.{{ $item->id }}" rows="3" placeholder="توضیحات"></textarea>
                              </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    @if (count($cart))
        <div class="offcanas-footer border-top p-3">
            <div class="col-12 d-flex justify-content-between">
                {{-- <span class="">مبلغ سبد خرید:</span><span
                    class="text-primary fw-bold">{{ number_format($cartTotal) }}
                    ریال</span> --}}
            </div>
            <div class="d-grid gap-2 col-12 mx-auto mt-4">
                <button wire:click="cartSubmit" class="savecart btn btn-primary waves-effect waves-light" type="button">
                    ثبت سفارش
                </button>
            </div>
        </div>
    @endif
</div>