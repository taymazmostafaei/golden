@extends('layouts/layoutMaster')

@section('title', 'Cards basic - UI elements')

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">بنکداری /</span> دسته بندی</h4>

    <!-- Horizontal -->
    <h5 class="pb-1 mb-4 ">دسته بندی محصولات</h5>
    <hr>
    <div class="row mb-5">
        <div class="col-md-3 col-sm-4">
            <a href="">
                <div class="card mb-3" style="border-left: 5px solid var(--bs-primary)">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4 col-4">
                            <img class="card-img card-img-left rounded" src="{{ asset('assets/img/elements/9.jpg') }}"
                                alt="Card image" />
                        </div>
                        <div class="col-md-8 col-8">
                            <div class="card-body">
                                <h5 class="card-title text-center">تک پوش</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-4">
            <a href="">
                <div class="card mb-3" style="border-left: 5px solid var(--bs-primary)">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4 col-4">
                            <img class="card-img card-img-left rounded" src="{{ asset('assets/img/elements/9.jpg') }}"
                                alt="Card image" />
                        </div>
                        <div class="col-md-8 col-8">
                            <div class="card-body">
                                <h5 class="card-title text-center">تک پوش</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-4">
            <a href="">
                <div class="card mb-3" style="border-left: 5px solid var(--bs-primary)">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4 col-4">
                            <img class="card-img card-img-left rounded" src="{{ asset('assets/img/elements/9.jpg') }}"
                                alt="Card image" />
                        </div>
                        <div class="col-md-8 col-8">
                            <div class="card-body">
                                <h5 class="card-title text-center">تک پوش</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-4">
            <a href="">
                <div class="card mb-3" style="border-left: 5px solid var(--bs-primary)">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4 col-4">
                            <img class="card-img card-img-left rounded" src="{{ asset('assets/img/elements/9.jpg') }}"
                                alt="Card image" />
                        </div>
                        <div class="col-md-8 col-8">
                            <div class="card-body">
                                <h5 class="card-title text-center">تک پوش</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-4">
            <a href="">
                <div class="card mb-3" style="border-left: 5px solid var(--bs-primary)">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4 col-4">
                            <img class="card-img card-img-left rounded" src="{{ asset('assets/img/elements/9.jpg') }}"
                                alt="Card image" />
                        </div>
                        <div class="col-md-8 col-8">
                            <div class="card-body">
                                <h5 class="card-title text-center">تک پوش</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-4">
            <a href="">
                <div class="card mb-3" style="border-left: 5px solid var(--bs-primary)">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4 col-4">
                            <img class="card-img card-img-left rounded" src="{{ asset('assets/img/elements/9.jpg') }}"
                                alt="Card image" />
                        </div>
                        <div class="col-md-8 col-8">
                            <div class="card-body">
                                <h5 class="card-title text-center">تک پوش</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!--/ Horizontal -->

@endsection
