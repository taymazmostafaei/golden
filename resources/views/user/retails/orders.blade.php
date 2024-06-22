@extends('layouts/layoutMaster')

@section('title', 'سفارشات ثبت شده بنک داری')

@section('vendor-script')
    @livewireScripts
    <script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection
@section('vendor-style')
    @livewireStyles
@endsection
@section('page-script')
    <script>
        $('#paymentMethods').on('show.bs.modal', function(e) {

            let clickedID = $(e.relatedTarget).attr('data-id') * 1;
            Livewire.dispatch('UpdateOrderDetailModal', {RetailOrder: clickedID});
        });
    </script>
@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">بنکداری /</span>سفارشات</h4>
    @include('components.alert')
    <!-- Horizontal -->
    <h5 class="pb-1 mb-4 ">سفارشات ثبت شده</h5>
    <hr>
    <div class="row mb-5">
        <div class="col-lg-12 mb-4" bis_skin_checked="1">
            <div class="card h-100" bis_skin_checked="1">
                <div class="card-header d-flex justify-content-between" bis_skin_checked="1">
                    <h5 class="card-title m-0 me-2">سفارشات</h5>
                    <div class="dropdown" bis_skin_checked="1">
                        <button class="btn p-0" type="button" id="teamMemberList" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList" bis_skin_checked="1">
                            <a class="dropdown-item" href="{{ route('panel.user.retails.categories') }}">ثبت سفارش جدید</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" bis_skin_checked="1">
                    <table class="table table-borderless border-top">
                        <thead class="border-bottom">
                            <tr>
                                <th>شناسه</th>
                                <th>تاریخ</th>
                                <th>وضیعت</th>
                                <th> - </th>
                                <th>مشاهده جزئیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center" bis_skin_checked="1">
                                            <div class="avatar flex-shrink-0 me-3" bis_skin_checked="1">
                                                <span class="avatar-initial rounded bg-label-primary"><i
                                                        class="ti ti-shopping-cart"></i></span>
                                            </div>
                                            <div class="d-flex flex-column" bis_skin_checked="1">
                                                <p class="mb-0 fw-medium">#{{ $order->id }}</p><small
                                                    class="text-muted">کد سفارش</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column" bis_skin_checked="1">
                                            <p class="mb-0 fw-medium"></p>
                                            <small class="text-muted text-nowrap">{{ $order->created_at }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($order->completed)
                                            <span class="badge bg-label-success">تکمیل شده</span>
                                        @else
                                            <span class="badge bg-label-secondary">در انتظار</span>
                                        @endif

                                    </td>
                                    <td>
                                        <p class="mb-0 fw-medium"> - </p>
                                    </td>
                                    <td>
                                        <div class="col-3 text-end">
                                            <button data-bs-toggle="modal" data-id="{{ $order->id }}"
                                                data-bs-target="#paymentMethods"
                                                class="btn btn-sm btn-icon btn-label-secondary waves-effect orderdetail">
                                                <i class="ti ti-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $orders->links('pagination::bootstrap-4') }}
    </div>

    <!--/ Horizontal -->

    <!-- Modal -->
    <div class="modal fade" id="paymentMethods" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-enable-otp modal-dialog-centered">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <livewire:retail.orders-detail />
                </div>
            </div>
        </div>
    </div>

@endsection
