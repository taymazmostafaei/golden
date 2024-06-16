<div>
    <div class="modal-content p-3 p-md-5">
        @if ($type == 'create')
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">ساخت دسته بندی</h3>
                    @include('components.alert')
                    {{-- <p class="text-muted">Updating user details will receive a privacy audit.</p> --}}
                </div>
                <form class="row g-3" wire:submit.prevent="create({{ $id }})">
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="ecommerce-category-title">نام دسته بندی</label>
                        <input type="text" class="form-control" wire:model="name" aria-label="category title">
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label">توضیح کوتاه</label>
                        <input type="text" class="form-control" wire:model="desc" aria-label="category title">

                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">ذخیره</button>
                        <button type="reset" class="btn btn-label-secondary" id="close-edit-cat-model"
                            data-bs-dismiss="modal" aria-label="Close">لغو</button>
                    </div>
                </form>
            </div>
        @else
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">ویرایش دسته بندی</h3>
                    @include('components.alert')
                    {{-- <p class="text-muted">Updating user details will receive a privacy audit.</p> --}}
                </div>
                <form class="row g-3" wire:submit.prevent="update({{ $id }})">
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="ecommerce-category-title">نام دسته بندی</label>
                        <input type="text" class="form-control" wire:model="name" aria-label="category title">
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label">توضیح کوتاه</label>
                        <input type="text" class="form-control" wire:model="desc" aria-label="category title">

                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">ذخیره</button>
                        <button type="reset" class="btn btn-label-secondary" id="close-edit-cat-model"
                            data-bs-dismiss="modal" aria-label="Close">لغو</button>
                    </div>
                </form>
            </div>
        @endif

    </div>
</div>
