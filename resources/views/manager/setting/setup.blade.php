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
    <script>
        // Function to format number as string with commas
        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        // Function to unformat number by removing commas
        function unformatNumber(numStr) {
            return numStr.replace(/,/g, '');
        }

        // Event listener to handle input formatting
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('.number-input').forEach(input => {
                input.addEventListener('input', (e) => {
                    const rawValue = unformatNumber(e.target.value);
                    const formattedValue = formatNumber(rawValue);
                    e.target.value = formattedValue;

                    const hiddenInput = document.getElementById(e.target.dataset.hiddenInputId);
                    if (hiddenInput) {
                        hiddenInput.value = rawValue;
                    }
                });
            });
        });
    </script>
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
                            <form action="{{ route('setting.setup.save') }}" method="post">
                                @csrf

                                @foreach ($setups as $setup)
                                    <div class="col-12 mb-3">
                                        <label class="m-2" for="fee">{{ $setup->translate }}</label>
                                        <input dir="ltr" class="form-control number-input" type="text"
                                            data-hidden-input-id="{{ $setup->key }}_hidden"
                                            value="{{ number_format($setup->value, 0, '', ',') }}">
                                        <input type="hidden" name="{{ $setup->key }}" value="{{ $setup->value }}"
                                            id="{{ $setup->key }}_hidden">
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
