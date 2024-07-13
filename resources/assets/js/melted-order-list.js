/**
 * app-ecommerce-order-list Script
 */

'use strict';

// Datatable (jquery)
  // Custom filtering function which will search data in the date column
  // $.fn.dataTable.ext.search.push(
  //   function(settings, data, dataIndex) {
  //     var min = $('#fromDate').val();
  //     var max = $('#toDate').val();
  //     var date = data[8]; // Assuming the date column is the 9th column (index 8)

  //     if (min == "" && max == "") {
  //       return true;
  //     }

  //     min = min.replace(/\//g, '-');
  //     max = max.replace(/\//g, '-');
  //     date = date.replace(/\//g, '-');

  //     if ((min == "" || moment(date).isSameOrAfter(moment(min, 'YYYY-MM-DD'))) &&
  //         (max == "" || moment(date).isSameOrBefore(moment(max, 'YYYY-MM-DD')))) {
  //       return true;
  //     }
  //     return false;
  //   }
  // );

$(function () {
  let borderColor, bodyBg, headingColor;

  if (isDarkStyle) {
    borderColor = config.colors_dark.borderColor;
    bodyBg = config.colors_dark.bodyBg;
    headingColor = config.colors_dark.headingColor;
  } else {
    borderColor = config.colors.borderColor;
    bodyBg = config.colors.bodyBg;
    headingColor = config.colors.headingColor;
  }

  // Variable declaration for table

  var dt_order_table = $('.datatables-order'),
    statusObj = {
      1: { title: 'در انتظار', class: 'bg-label-warning' },
      2: { title: 'تکمیل شده', class: 'bg-label-success' },
    },
    orderObj = {
      1: { title: 'خرید', class: 'bg-label-success' },
      2: { title: 'فروش', class: 'bg-label-danger' }
    };
    // paymentObj = {
    //   1: { title: 'Paid', class: 'text-success' },
    //   2: { title: 'Pending', class: 'text-warning' },
    //   3: { title: 'Failed', class: 'text-danger' },
    //   4: { title: 'Cancelled', class: 'text-secondary' }
    // };

  // E-commerce Products datatable

  if (dt_order_table.length) {
    var dt_products = dt_order_table.DataTable({
      ajax: meltedJsonUrl,
      columns: [
        // columns according to JSON
        { data: 'id' },
        { data: 'id' },
        { data: 'id' },
        { data: 'type' },
        { data: 'price' },
        { data: 'grams' },
        { data: 'amount' },
        { data: 'completed' },
        { data: 'created_at' }, 
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          searchable: false,
          orderable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          // For Checkboxes
          targets: 1,
          orderable: false,
          checkboxes: {
            selectAllRender: '<input type="checkbox" class="form-check-input">'
          },
          render: function () {
            return '<input type="checkbox" class="dt-checkboxes form-check-input" >';
          },
          searchable: false
        },
        {
          // // Order ID
          targets: 3,
          render: function (data, type, full, meta) {
            var type = full['type'];

            if (type == 'buy') {
              return (
                `<span class="badge px-2 bg-label-success" text-capitalized="">خرید</span>`
              );
            }
            return (
              `<span class="badge px-2 bg-label-danger" text-capitalized="">فروش</span>`
            );

          }
          
        },
        // {
        //   // Date and Time
        //   targets: 3,
        //   render: function (data, type, full, meta) {
        //     var date = new Date(full.date); // convert the date string to a Date object
        //     var timeX = full['time'].substring(0, 5);
        //     var formattedDate = date.toLocaleDateString('en-US', {
        //       month: 'short',
        //       day: 'numeric',
        //       year: 'numeric',
        //       time: 'numeric'
        //     });
        //     return '<span class="text-nowrap">' + formattedDate + ', ' + timeX + '</span>';
        //   }
        // },
        // {
        //   // Customers
        //   targets: 4,
        //   responsivePriority: 1,
        //   render: function (data, type, full, meta) {
        //     var $name = full['customer'],
        //       $email = full['email'],
        //       $avatar = full['avatar'];
        //     if ($avatar) {
        //       // For Avatar image
        //       var $output =
        //         '<img src="' + assetsPath + 'img/avatars/' + $avatar + '" alt="Avatar" class="rounded-circle">';
        //     } else {
        //       // For Avatar badge
        //       var stateNum = Math.floor(Math.random() * 6);
        //       var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
        //       var $state = states[stateNum],
        //         $name = full['customer'],
        //         $initials = $name.match(/\b\w/g) || [];
        //       $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
        //       $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
        //     }
        //     // Creates full output for row
        //     var $row_output =
        //       '<div class="d-flex justify-content-start align-items-center order-name text-nowrap">' +
        //       '<div class="avatar-wrapper">' +
        //       '<div class="avatar me-2">' +
        //       $output +
        //       '</div>' +
        //       '</div>' +
        //       '<div class="d-flex flex-column">' +
        //       '<h6 class="m-0"><a href="' +
        //       baseUrl +
        //       'pages/profile-user" class="text-body">' +
        //       $name +
        //       '</a></h6>' +
        //       '<small class="text-muted">' +
        //       $email +
        //       '</small>' +
        //       '</div>' +
        //       '</div>';
        //     return $row_output;
        //   }
        // },
        // {
        //   targets: 5,
        //   render: function (data, type, full, meta) {
        //     var $payment = full['payment'],
        //       $paymentObj = paymentObj[$payment];
        //     if ($paymentObj) {
        //       return (
        //         '<h6 class="mb-0 align-items-center d-flex w-px-100 ' +
        //         $paymentObj.class +
        //         '">' +
        //         '<i class="ti ti-circle-filled fs-tiny me-2"></i>' +
        //         $paymentObj.title +
        //         '</h6>'
        //       );
        //     }
        //     return data;
        //   }
        // },
        {
          // Status
          targets: 7,
          render: function (data, type, full, meta) {
            var completed = full['completed'];

            if (completed) {
              return (
                `<span class="badge px-2 bg-label-secondary" text-capitalized="">تکمیل شده</span>`
              );
            }

            return (
              `<span class="badge px-2 bg-label-warning" text-capitalized="">در انتظار</span>`
            );
          }
        },
        {
          targets: [4,6], // Target the second column (index starts from 0)
          render: function(data, type, full, meta) {
              // Convert the price to Iranian Rial format
              return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' ریال';
          }
        },
        // {
        //   // Payment Method
        //   targets: -2,
        //   render: function (data, type, full, meta) {
        //     var $method = full['method'];
        //     var $method_number = full['method_number'];

        //     if ($method == 'paypal_logo') {
        //       $method_number = '@gmail.com';
        //     }
        //     return (
        //       '<div class="d-flex align-items-center text-nowrap">' +
        //       '<img src="' +
        //       assetsPath +
        //       'img/icons/payments/' +
        //       $method +
        //       '.png" alt="' +
        //       $method +
        //       '"class="me-2" width="16">' +
        //       '<span><i class="ti ti-dots me-1 mt-n1"></i>' +
        //       $method_number +
        //       '</span>' +
        //       '</div>'
        //     );
        //   }
        // },
      
      ],
      order: [2, 'desc'], //set any columns order asc/desc
      dom:
        '<"card-header pb-md-2 d-flex flex-column flex-md-row align-items-start align-items-md-center"<f><"d-flex align-items-md-center justify-content-md-end mt-2 mt-md-0 gap-2"l<"dt-action-buttons"B>>' +
        '>t' +
        '<"row mx-2"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      lengthMenu: [10, 40, 60, 80, 100], //for length of menu
      language: {
        sLengthMenu: '_MENU_',
        search: '',
        searchPlaceholder: 'جست و جوی سفارش',
        info: 'Displaying _START_ to _END_ of _TOTAL_ entries'
      },
      // Buttons with Dropdown
      // Buttons with Dropdown
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-label-secondary dropdown-toggle mx-3 waves-effect waves-light',
          text: '<i class="ti ti-screen-share me-1 ti-xs"></i>خروجی',
          buttons: [
            {
              extend: 'print',
              text: '<i class="ti ti-printer me-2" ></i>چاپ',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be print
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              },
              customize: function (win) {
                //customize print view for dark
                $(win.document.body)
                  .css('color', headingColor)
                  .css('border-color', borderColor)
                  .css('background-color', bodyBg);
                $(win.document.body)
                  .find('table')
                  .addClass('compact')
                  .css('color', 'inherit')
                  .css('border-color', 'inherit')
                  .css('background-color', 'inherit');
              }
            },
            {
              extend: 'csv',
              text: '<i class="ti ti-file-text me-2" ></i>Csv',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'excel',
              text: '<i class="ti ti-file-spreadsheet me-2"></i>اکسل',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'pdf',
              text: '<i class="ti ti-file-code-2 me-2"></i>پی دی اف',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'copy',
              text: '<i class="ti ti-copy me-2" ></i>کپی',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            }
          ]
        }
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['customer'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });

    $('.dataTables_length').addClass('mt-0 mt-md-3 ms-n2');
    $('.dt-action-buttons').addClass('pt-0');
    $('.dataTables_filter').addClass('ms-n3');

    Livewire.on('ReloadDataTable', function () {
      dt_products.ajax.reload();
    });
    // $('#fromDate, #toDate').on('change', function() {
    //   console.log('ef');
    //   dt_products.draw();
    // });

  }


  // Delete Record
  $('.datatables-order tbody').on('click', '.delete-record', function () {
    dt_products.row($(this).parents('tr')).remove().draw();
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});
