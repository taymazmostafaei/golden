@extends('layouts/layoutMaster')

@section('title', 'تنظیمات فی')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-ecommerce-settings.js') }}"></script>
@endsection

@section('content')

    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">مدیریت /</span> تنظیمات
    </h4>

    <div class="row g-4">

        @include('components.setting-navigation')

        <!-- Options -->
        <div class="col-12 col-lg-8 pt-4 pt-lg-0">@include('components.alert')
            <div class="tab-content p-0">
                <!-- Locations Tab -->
                <div class="tab-pane fade show active" id="locations" role="tabpanel">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title m-0">تنظیم فی</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('setting.setup.save')}}" method="post">
                              @csrf

                                @foreach ($setups as $setup)
                                    <div class="col-12 mb-3">
                                        <label class="m-2" for="fee">{{$setup->translate}}</label>
                                        <input class="form-control" type="number" name="{{$setup->key}}" value="{{$setup->value}}">
                                    </div>
                                @endforeach

                                <div class="d-flex justify-content-start mt-4 gap-3">
                                    <button type="submit" class="btn btn-primary">ذخیره</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Options-->
        </div>
    </div>
@endsection
