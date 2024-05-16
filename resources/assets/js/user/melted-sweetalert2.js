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
      let pay = $('#sell_pay').html();
      let obtain = $('#sell_obtain').html();
      Swal.fire({
        title: '<p style="font-size:15px;">آیا از فروش خود با توجه به اطلاعات زیر مطمئن هستید؟</p>',
        html: ``,
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
        if (result.value) {
          Livewire.dispatch('saveSell');
        }
      });
    };
  }
  if (confirmSale) {
    confirmSale.onclick = function () {
      let pay = $('#buy_pay').html();
      let obtain = $('#buy_obtain').html();
      Swal.fire({
        title: '<p style="font-size:15px;">آیا از خرید خود با توجه به اطلاعات زیر مطمئن هستید؟</p>',
        html: ``,
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
        if (result.value) {
          Livewire.dispatch('saveBuy');
        }
      });
    };
  }
})();
