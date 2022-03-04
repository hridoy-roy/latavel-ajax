var a = ['', 'one ', 'two ', 'three ', 'four ', 'five ', 'six ', 'seven ', 'eight ', 'nine ', 'ten ', 'eleven ', 'twelve ', 'thirteen ', 'fourteen ', 'fifteen ', 'sixteen ', 'seventeen ', 'eighteen ', 'nineteen '];
var b = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];



function inWords(num) {
  if ((num = num.toString()).length > 9) return 'overflow';
  n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
  if (!n) return;
  var str = '';
  str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
  str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
  str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
  str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
  str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
  $('#totalInwords').text(str)
}



const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
const okButton = Swal.mixin({
  toast: false,
  position: 'cnter',
  showConfirmButton: true,
  timerProgressBar: true,
})

function completeInvoice(){
  var complete = 'complete';
 
  // console.log([complete,total]);
}
// currency Symble
function currency1(){
  var currencysmb =  document.getElementById("currencyList").value;
  $('[id="currency"]').text(currencysmb);
}



      // add new Product ajax request
      function addData(){

        // Invoice data
        var id = $('#id').val();
        // Product data
        var product_name = $('#product_name').val();
        var product_quantity = $('#product_quantity').val();
        var product_rate = $('#product_rate').val();
        console.log(product_name);
        console.log(product_quantity);
        console.log(product_rate);
        if((product_name != '') && (product_quantity != '') && (product_rate != '')){
          $.ajax({
            url: '/product/store',
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {product_name:product_name, product_quantity:product_quantity, product_rate:product_rate,id:id},
            dataType: 'json',
            success: function(response) {
                $('#id').val(response[1]);
                clearData();
                allData();
                document.getElementById("completeInvoice").disabled = false;
            },
            error: function (error) {
              // console.log(error);
                if (error.responseJSON.errors.product_name != null)
                {
                    $('#product_name').addClass("is-invalid");
                    $('#name_error').text(error.responseJSON.errors.product_name);
                } else
                {
                    $('#product_name').removeClass("is-invalid");
                    $('#product_name').addClass("is-valid");
                }

                if (error.responseJSON.errors.product_quantity != null)
                {
                    $('#product_quantity').addClass("is-invalid");
                    $('#quantity_error').text(error.responseJSON.errors.product_quantity);
                } else
                {
                    $('#product_quantity').removeClass("is-invalid");
                    $('#product_quantity').addClass("is-valid");
                }
                
                if (error.responseJSON.errors.product_rate != null)
                {
                    $('#product_rate').addClass("is-invalid");
                    $('#product_rate_error').text(error.responseJSON.errors.product_rate);
                } else
                {
                    $('#product_rate').removeClass("is-invalid");
                    $('#product_rate').addClass("is-valid");
                }
                
            }
          });
        }
      }

      $("#invoiceForm").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);

        $.ajax({
          url: '/invoices/store',
          method: 'post',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            console.log(response);
            if (response['message'] != null) {
              okButton.fire({
                icon: 'error',
                title: response['message'],
              })
            }else{
              $("#downlodeInvoice").attr("href", "/invoice/download/"+response);
              button = 
              Toast.fire({
                icon: 'success',
                title: 'Invoice Created',
              })
            }
            $('#downlodeInvoice').removeClass("disabled");
          },
          error: function(error) {
            okButton.fire({
                icon: 'error',
                title: 'Fill UP Invoice Form Properly',
              })
            // Invoice Validation 
            if (error.responseJSON.errors.invoice_form != null)
              {
                  $('#invoice_form').addClass("is-invalid");
                  $('#invoice_form_error').text(error.responseJSON.errors.invoice_form);
              } else
              {
                  $('#invoice_form').removeClass("is-invalid");
                  $('#invoice_form').addClass("is-valid");
              }
              
              if (error.responseJSON.errors.invoice_to != null)
              {
                  $('#invoice_to').addClass("is-invalid");
                  $('#invoice_to_error').text(error.responseJSON.errors.invoice_to);
              } else
              {
                  $('#invoice_to').removeClass("is-invalid");
                  $('#invoice_to').addClass("is-valid");
              }

              if (error.responseJSON.errors.invoice_id != null)
              {
                  $('#invoice_id').addClass("is-invalid");
                  $('#invoice_id_error').text(error.responseJSON.errors.invoice_id);
              } else
              {
                  $('#invoice_id').removeClass("is-invalid");
                  $('#invoice_id').addClass("is-valid");
              }

              if (error.responseJSON.errors.invoice_date != null)
              {
                  $('#invoice_date').addClass("is-invalid");
                  $('#invoice_date_error').text(error.responseJSON.errors.invoice_date);
              } else
              {
                  $('#invoice_date').removeClass("is-invalid");
                  $('#invoice_date').addClass("is-valid");
              }

              if (error.responseJSON.errors.invoice_dou_date != null)
              {
                  $('#invoice_dou_date').addClass("is-invalid");
                  $('#invoice_dou_date_error').text(error.responseJSON.errors.invoice_dou_date);
              } else
              {
                  $('#invoice_dou_date').removeClass("is-invalid");
                  $('#invoice_dou_date').addClass("is-valid");
              }

              if (error.responseJSON.errors.invoice_tax != null)
              {
                  $('#invoice_tax').addClass("is-invalid");
                  $('#invoice_tax_error').text(error.responseJSON.errors.invoice_tax);
              } else
              {
                  $('#invoice_tax').removeClass("is-invalid");
                  $('#invoice_tax').addClass("is-valid");
              }

              if (error.responseJSON.errors.invoice_amu_paid != null)
              {
                  $('#invoice_amu_paid').addClass("is-invalid");
                  $('#invoice_amu_paid_error').text(error.responseJSON.errors.invoice_amu_paid);
              } else
              {
                  $('#invoice_amu_paid').removeClass("is-invalid");
                  $('#invoice_amu_paid').addClass("is-valid");
              }
          }
        });
      });

      function allData() {
        var id = $('#id').val();
        // console.log(id);

        $.ajax({
            type: "POST",
            dataType: 'json',
            data: { id: id },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/products/create',
            success: function (responce) {
                var data = '';
                var totalamount = 0;
                $.each(responce, function (key, value) {
                    totalamount = totalamount + value.product_amount
                    data = data + "<tr>"
                    data = data + "<th scope='row'>" + ++key + "</th>"
                    data = data + "<td>" + value.product_name + "</td>"
                    data = data + "<td>" + value.product_quantity + "</td>"
                    data = data + "<td>" + value.product_rate + "</td>"
                    data = data + "<td>" + value.product_amount + "</td>"
                    data = data + "<td class='text-center'>"
                    data = data + "<button type='button' onClick='deleteData(" + value.id + ")' class='btn btn-sm btn-danger fw-bolder'><i class='bi bi-trash'></i></button>"
                    data = data + "</td>"
                    data = data + "</tr>"
                })
                $('#tableBody').html(data);
                total(totalamount);

            }
        })
      }



      function clearData() {
        $('#product_name').val('');
        $('#product_quantity').val('');
        $('#product_rate').val('');
        $('#product_amount').text('');

        $('#product_name').removeClass("is-valid");
        $('#product_quantity').removeClass("is-valid");
        $('#product_rate').removeClass("is-valid");
        $('#invoice_form').removeClass("is-valid");
        $('#invoice_to').removeClass("is-valid");
        $('#invoice_id').removeClass("is-valid");
        $('#invoice_date').removeClass("is-valid");
        $('#invoice_dou_date').removeClass("is-valid");
        $('#invoice_tax').removeClass("is-valid");
        $('#invoice_amu_paid').removeClass("is-valid");

        $('#product_name').removeClass("is-invalid");
        $('#product_quantity').removeClass("is-invalid");
        $('#product_rate').removeClass("is-invalid");
        $('#invoice_form').removeClass("is-invalid");
        $('#invoice_to').removeClass("is-invalid");
        $('#invoice_id').removeClass("is-invalid");
        $('#invoice_date').removeClass("is-invalid");
        $('#invoice_dou_date').removeClass("is-invalid");
        $('#invoice_tax').removeClass("is-invalid");
        $('#invoice_amu_paid').removeClass("is-invalid");

    }


    function ptotal() {
        var product_quantity = $('#product_quantity').val();
        var product_rate = $('#product_rate').val();

        var ptotal = product_quantity * product_rate;

        $('#product_amount').text(ptotal);
    }

    function pclear() {
        $('#product_name').val("");
        $('#product_quantity').val("");
        $('#product_rate').val("");
        $('#product_amount').text("");

        $('#product_name').removeClass("is-valid");
        $('#product_quantity').removeClass("is-valid");
        $('#product_rate').removeClass("is-valid");
        $('#product_name').removeClass("is-invalid");
        $('#product_quantity').removeClass("is-invalid");
        $('#product_rate').removeClass("is-invalid");

    }

    // Sub total 
    function total(itemAmount) {
        $('#subtotal').text(itemAmount);
    }

    // Tax 
    function total(itemAmount) {
        $('#subtotal').text(itemAmount);
        var itemAmount = $('#subtotal').text() * 1;
        var tax = $('#invoice_tax').val() * 1;

        var persent = (itemAmount * tax) / 100

        var total = itemAmount + persent;
        $('#total').text(total);
        inWords(total);
        var advance = $('#advance_amount').val() * 1;
        if(advance > 0){
          var paid = (total * advance )/100;
          $('#invoice_amu_paid').val(paid);
        }else{     
          var paid = $('#invoice_amu_paid').val() * 1;
        }
        var balanceDue = total - paid;
        $('#balanceDue').text(balanceDue);
    }


  function deleteData(id) {

      var id = id;

      $.ajax({
          type: "delete",
          dataType: "json",
          data: { id: id },
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url: "/products/delete/" + id,
          success: function (data) {
            $('#product_amount').text("");
              allData();
          },
          error: function (error) {
          }
      });
      }




  // <!-- Image Upload Start-->
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
        $('#imagePreview').hide();
        $('#imagePreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload").change(function() {
    readURL(this);
  });
  // <!-- Image Upload End-->
