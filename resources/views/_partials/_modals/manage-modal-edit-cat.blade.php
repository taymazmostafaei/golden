<!-- Edit User Modal -->
<div class="modal fade" id="edit_cat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">ویرایش دسته بندی</h3>
            {{-- <p class="text-muted">Updating user details will receive a privacy audit.</p> --}}
          </div>
          <form id="editUserForm" class="row g-3" onsubmit="return false">
            <div class="col-12 col-md-12">
              <label class="form-label" for="ecommerce-category-title">نام دسته بندی</label>
              <input type="text" class="form-control" id="ecommerce-category-title" placeholder="زیورآلات" name="categoryTitle" aria-label="category title">
            </div>
            <div class="col-12 col-md-12">
              <label class="form-label">توضیح کوتاه</label>
              <input type="text" class="form-control" id="ecommerce-category-title" placeholder="از میان طیف گسترده ای از زیورآلات از برندهای محبوب انتخاب کنید" name="categoryTitle" aria-label="category title">

              </div>
        

            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">ذخیره</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">لغو</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Edit User Modal -->
  