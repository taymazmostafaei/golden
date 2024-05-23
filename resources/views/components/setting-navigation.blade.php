<!-- Navigation -->
<div class="col-12 col-lg-4">
    <div class="d-flex justify-content-between flex-column mb-3 mb-md-0">
        <ul class="nav nav-align-left nav-pills flex-column">
            <li class="nav-item mb-1">
                <a class="nav-link py-2 {{ Route::currentRouteName() == 'setting.setup' ? 'active' : '' }}" href="{{route('setting.setup')}}">
                    <i class="ti ti-table-options me-2"></i>
                    <span class="align-middle">تنظیم فی</span>
                </a>
            </li>
            <li class="nav-item mb-1">
                <a class="nav-link py-2 {{ Route::currentRouteName() == 'setting.index' ? 'active' : '' }}" href="{{ route('setting.index') }}">
                    <i class="ti ti-adjustments-horizontal me-2"></i>
                    <span class="align-middle">امکانات</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- /Navigation -->