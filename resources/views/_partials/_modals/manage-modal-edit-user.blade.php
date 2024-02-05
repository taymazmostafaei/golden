<!-- Edit User Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">ویرایش اطلاعات کاربری</h3>
            {{-- <p class="text-muted">Updating user details will receive a privacy audit.</p> --}}
          </div>
          <form id="editUserForm" class="row g-3" onsubmit="return false">
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserFirstName">نام و نام خانوادگی</label>
              <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName" class="form-control" placeholder="حسین غفوری" />
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label" for="modalEditUserFirstName">کدملی</label>
                <input type="number" id="modalEditUserFirstName" name="modalEditUserFirstName" class="form-control" placeholder="1366987745" />
              </div>
        
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserStatus">تغییر وضعیت</label>
              <select id="modalEditUserStatus" name="modalEditUserStatus" class="select2 form-select" aria-label="Default select example">
                <option value="1">تایید شده</option>
                <option value="2">در انتظار</option>
                <option value="3">رد شده</option>
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserPhone">شماره موبایل</label>
              <div class="input-group">
                <span class="input-group-text">IR (+98)</span>
                <input style="direction: ltr" type="text" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask" placeholder="202 555 0111" />
              
            </div>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label" for="modalEditUserPhone">شماره ثابت</label>
                <div class="input-group">
                  <span class="input-group-text">IR (+98)</span>
                  <input type="text" style="direction: ltr" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask" placeholder="202 555 0111" />
                
              </div>
              </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">ثبت تغییرات</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">لغو</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Edit User Modal -->
  