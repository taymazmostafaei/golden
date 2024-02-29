<div>
    <!-- Offcanvas Header -->
    <div class="offcanvas-header py-4">
        <h5 id="offcanvasEcommerceCategoryListLabel" class="offcanvas-title">اضافه کردن دسته بندی</h5>
        <button type="button" class="btn-close bg-label-secondary text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <!-- Offcanvas Body -->
    <div class="offcanvas-body border-top">
        @include('components.alert')
        <form class="pt-0" wire:submit.prevent="save">
            <!-- Title -->
            <div class="mb-3">
                <label class="form-label" for="ecommerce-category-title">نام دسته بندی</label>
                <input type="text" wire:model="name" class="form-control" id="ecommerce-category-title"
                    placeholder="زیورآلات" aria-label="category title">
            </div>
            <!-- Description -->
            <div class="mb-3">
                <label class="form-label">توضیح کوتاه</label>
                <textarea wire:model="desc" class="form-control" rows="3"></textarea>

            </div>
            <!-- Submit and reset -->
            <div class="mb-3">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">ذخیره</button>
                <button id="close-model-im" type="reset" class="btn btn-label-secondary waves-effect"
                    data-bs-dismiss="offcanvas">لغو</button>
            </div>
        </form>
    </div>
</div>
