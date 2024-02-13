/**
 * Sweet Alerts
 */

'use strict';

(function () {
  const confirmBuy = document.querySelector('#confirm-buy'),
    confirmSale = document.querySelector('#confirm-sale');

  // Alert With Functional Confirm Button
  if (confirmBuy) {
    confirmBuy.onclick = function () {
      Swal.fire({
        title: '<p style="font-size:15px;">آیا از فروش خود با توجه به اطلاعات زیر مطمئن هستید؟</p>',
        html: `
        <span class="badge mb-3 d-flex justify-content-around align-items-center text-muted">
        <span>می فروشم:</span>
        <span>800,145 $</span>
    </span>
    <span class="badge mb-3 d-flex justify-content-around align-items-center text-muted">
    <span>دریافت میکنم:</span>
    <span>150,000 $</span>
</span>
        `,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'بله',
        cancelButtonText: 'خیر',
        customClass: {
          confirmButton: 'btn btn-danger me-3 waves-effect waves-light',
          cancelButton: 'btn btn-label-secondary waves-effect waves-light'
        },
        buttonsStyling: false
      }).then(function (result) {
        // if (result.value) {
        //   Swal.fire({
        //     icon: 'success',
        //     title: '',
        //     text: 'Your file has been deleted.',
        //     customClass: {
        //       confirmButton: 'btn btn-success waves-effect waves-light'
        //     }
        //   });
        // }
      });
    };
  }
  if (confirmSale) {
    confirmSale.onclick = function () {
      Swal.fire({
        title: '<p style="font-size:15px;">آیا از خرید خود با توجه به اطلاعات زیر مطمئن هستید؟</p>',
        html: `
          <span class="badge mb-3 d-flex justify-content-around align-items-center text-muted">
          <span>پرداخت میکنم:</span>
          <span>800,145 $</span>
      </span>
      <span class="badge mb-3 d-flex justify-content-around align-items-center text-muted">
      <span>دریافت میکنم:</span>
      <span>150,000 $</span>
  </span>
          `,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'بله',
        cancelButtonText: 'خیر',
        customClass: {
          confirmButton: 'btn btn-success me-3 waves-effect waves-light',
          cancelButton: 'btn btn-label-secondary waves-effect waves-light'
        },
        buttonsStyling: false
      }).then(function (result) {
        // if (result.value) {
        //   Swal.fire({
        //     icon: 'success',
        //     title: '',
        //     text: 'Your file has been deleted.',
        //     customClass: {
        //       confirmButton: 'btn btn-success waves-effect waves-light'
        //     }
        //   });
        // }
      });
    };
  }
})();
