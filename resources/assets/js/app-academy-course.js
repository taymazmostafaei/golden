/**
 * app-academy-course Script
 */

'use strict';

Livewire.on('AlertUser', function (data) {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    }
  });
  Toast.fire({
    icon: data.type,
    title: data.title
  });
});

Livewire.on('UpdateCartCounter', function (data) {
  $("#cartcounter").html(data.quantity);
});

Livewire.on('SaveCartSwal', function (data) {
  Swal.fire({
    text: "سفارش شما در سامانه ثبت خواهد شد!",
    icon: "warning",
    showCancelButton: false,
    showDenyButton: false,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "لغو",
    DenyButtonText: 'خیر',
    confirmButtonText: "بله ثبت شود!"
  }).then((result) => {
    if (result.isConfirmed) {
      Livewire.dispatch('saveCart');
    }
  });
});

// When any select element with the class 'select2' is changed
$('.select2').change(function () {
  // Get the selected value
  var selectedSize = $(this).val();

  // Traverse to the parent element (div.mb-3), then move to the next sibling (.d-flex)
  // and find the button inside it
  var $button = $(this).closest('.mb-3').next('.d-flex').find('.add-to-cart');

  // Update the 'data-size' attribute of the button
  $button.attr('data-size', selectedSize);
});


$(".add-to-cart").on("click", function () {
  let clickedID = $(this).data('id');
  let selectedSize = $(this).attr('data-size');
  let SelectedQuantity = $(this).attr('data-quantity') ?? 1;

  Livewire.dispatch('addToCart', { retail: clickedID , size: selectedSize ?? false , quantity: SelectedQuantity });
});

// Datatable (jquery)

$(function () {
  // Select2
  var select2 = $('.select2');
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>').select2({
        dropdownParent: $this.parent(),
        placeholder: $this.data('placeholder'), // for dynamic placeholder
        dropdownCss: {
          minWidth: '150px' // set a minimum width for the dropdown
        }
      });
    });
    $('.select2-selection__rendered').addClass('w-px-150');
  }
});

//Media player

(function () {
  const videoPlayer = new Plyr('#guitar-video-player');

  const videoPlayer2 = new Plyr('#guitar-video-player-2');

  document.getElementsByClassName('plyr')[0].style.borderRadius = '4px';
  document.getElementsByClassName('plyr')[1].style.borderRadius = '4px';
  document.getElementsByClassName('plyr__poster')[0].style.display = 'none';
  document.getElementsByClassName('plyr__poster')[1].style.display = 'none';
})();
