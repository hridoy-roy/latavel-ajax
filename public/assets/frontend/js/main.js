const { Collapse } = require("bootstrap");

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function allData() {

    var id = $('#id').val();
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: { id: id },
        url: '/products/create',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function (responce) {
            var data = '';
            var totalamount = 0;
            $.each(responce, function (key, value) {
                totalamount = totalamount + value.amount
                data = data + "<tr>"
                data = data + "<th scope='row'>" + ++key + "</th>"
                data = data + "<td>" + value.product_name + "</td>"
                data = data + "<td>" + value.quantity + "</td>"
                data = data + "<td>" + value.rate + "</td>"
                data = data + "<td>" + value.amount + "</td>"
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
allData();
function clearData() {
    $('#produc_name').val('');
    $('#produc_quantity').val('');
    $('#produc_rate').val('');
    $('#inputTax').val('');
    $('#inputPaid').val('');

    $('#produc_name').removeClass("is-valid");
    $('#produc_quantity').removeClass("is-valid");
    $('#produc_rate').removeClass("is-valid");

    $('#produc_name').removeClass("is-invalid");
    $('#produc_quantity').removeClass("is-invalid");
    $('#produc_rate').removeClass("is-invalid");

}


function addData() {
    // Invoice data
    var id = $('#id').val();
    var invoice_logo = document.getElementById("imageUpload").files[0].name; 
    // var invoice_logo = $('#imageUpload').val();
    var invoice_form = $('#invoice_form').val();
    var invoice_to = $('#invoice_to').val();
    var invoice_id = $('#invoice_id').val();
    var invoice_date = $('#invoice_date').val();
    var invoice_payment_term = $('#invoice_payment_term').val();
    var invoice_dou_date = $('#invoice_dou_date').val();
    var invoice_po_number = $('#invoice_po_number').val();
    var invoice_notes = $('#invoice_notes').val();
    var invoice_terms = $('#invoice_terms').val();


    // Product data
    var produc_name = $('#produc_name').val();
    var produc_quantity = $('#produc_quantity').val();
    var produc_rate = $('#produc_rate').val();

    


    $.ajax({
        type: "POST",
        dataType: "json",
        data: {
            name: produc_name,
            quantity: produc_quantity,
            rate: produc_rate,

            // invoice data
            id: id,
            invoice_logo: invoice_logo,
            invoice_form: invoice_form,
            invoice_to: invoice_to,
            invoice_id: invoice_id,
            invoice_date: invoice_date,
            invoice_payment_term: invoice_payment_term,
            invoice_dou_date: invoice_dou_date,
            invoice_po_number: invoice_po_number,
            invoice_notes: invoice_notes,
            invoice_terms: invoice_terms,
        },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "/products/store",
        success: function (data) {
            $('#id').val(data[1]);
            clearData();
            allData();
        },
        error: function (error) {
            if (error.responseJSON.errors.name != null)
            {
                $('#produc_name').addClass("is-invalid");
                $('#name_error').text(error.responseJSON.errors.name);
            } else
            {
                $('#produc_name').removeClass("is-invalid");
                $('#produc_name').addClass("is-valid");
            }

            if (error.responseJSON.errors.quantity != null)
            {
                $('#produc_quantity').addClass("is-invalid");
                $('#quantity_error').text(error.responseJSON.errors.quantity);
            } else
            {
                $('#produc_quantity').removeClass("is-invalid");
                $('#produc_quantity').addClass("is-valid");
            }

            if (error.responseJSON.errors.rate != null)
            {
                $('#produc_rate').addClass("is-invalid");
                $('#rate_error').text(error.responseJSON.errors.rate);
            } else
            {
                $('#produc_rate').removeClass("is-invalid");
                $('#produc_rate').addClass("is-valid");
            }
        }
    });
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
            allData();
        },
        error: function (error) {
        }
    });
}

function ptotal() {
    var produc_quantity = $('#produc_quantity').val();
    var produc_rate = $('#produc_rate').val();

    var ptotal = produc_quantity * produc_rate;

    $('#product_amount').text(ptotal);
}

function pclear() {
    $('#produc_name').val("");
    $('#produc_quantity').val("");
    $('#produc_rate').val("");
    $('#product_amount').text("");
}

// Sub total 
function total(itemAmount) {
    $('#subtotal').text(itemAmount);
}

// Tax 
function total(itemAmount) {
    $('#subtotal').text(itemAmount);
    var itemAmount = $('#subtotal').text() * 1;
    var tax = $('#inputTax').val() * 1;

    var persent = (itemAmount * tax) / 100

    console.log(persent);

    var total = itemAmount + persent;
    $('#total').text(total);
    var paid = $('#inputPaid').val() * 1;
    var balanceDue = total - paid;
    $('#balanceDue').text(balanceDue);
}

