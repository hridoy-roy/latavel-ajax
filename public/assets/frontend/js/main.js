const { Collapse } = require("bootstrap");

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function allData(){

    var id = $('#id').val();
    $.ajax({
        type:"POST",
        dataType: 'json',
        data: {id:id},
        url: '/products/create',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function(responce){
            var data = '';
            var totalamount =  0;
            $.each(responce, function(key, value){
                totalamount = totalamount + value.amount
                data = data + "<tr>"
                data = data + "<th scope='row'>"+ ++key +"</th>"
                data = data + "<td>"+ value.product_name +"</td>"
                data = data + "<td>"+ value.quantity +"</td>"
                data = data + "<td>"+ value.rate +"</td>"
                data = data + "<td>"+ value.amount +"</td>"
                data = data + "<td>"
                data = data + "<button type='button' onClick='deleteData("+value.id+")' class='btn btn-sm btn-danger fw-bolder'>Delete</button>"
                data = data + "</td>"
                data = data + "</tr>"
            })
            $('#tableBody').html(data);
            total(totalamount);

        }
    })
}
allData();
function clearData(){
    $('#produc_name').val('');
    $('#produc_quantity').val('');
    $('#produc_rate').val('');

    $('#produc_name').removeClass("is-valid");
    $('#produc_quantity').removeClass("is-valid");
    $('#produc_rate').removeClass("is-valid");

    $('#produc_name').removeClass("is-invalid");
    $('#produc_quantity').removeClass("is-invalid");
    $('#produc_rate').removeClass("is-invalid");

}


function addData(){
    // Invoice data
    var invoiceid = $('#invoiceid').val();
    var id = $('#id').val();
    // Product data
    var produc_name = $('#produc_name').val();
    var produc_quantity = $('#produc_quantity').val();
    var produc_rate = $('#produc_rate').val();

    $.ajax({
        type: "POST",
        dataType: "json",
        data: {name:produc_name, quantity:produc_quantity, rate:produc_rate,invoiceid:invoiceid,id:id},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/products/store",
        success: function(data){
            $('#id').val(data[1]);
            clearData();
            allData();
        },
        error: function(error){
            if (error.responseJSON.errors.name != null) {
                $('#produc_name').addClass("is-invalid");
                $('#name_error').text(error.responseJSON.errors.name);
            }else{
                $('#produc_name').removeClass("is-invalid");
                $('#produc_name').addClass("is-valid");
            }

            if (error.responseJSON.errors.quantity != null) {
                $('#produc_quantity').addClass("is-invalid");
                $('#quantity_error').text(error.responseJSON.errors.quantity);
            }else{
                $('#produc_quantity').removeClass("is-invalid");
                $('#produc_quantity').addClass("is-valid");
            }

            if (error.responseJSON.errors.rate != null) {
                $('#produc_rate').addClass("is-invalid");
                $('#rate_error').text(error.responseJSON.errors.rate);
            }else{
                $('#produc_rate').removeClass("is-invalid");
                $('#produc_rate').addClass("is-valid");
            }
 
            console.log(error.responseJSON.errors);
        }
    });
}

function deleteData(id){

    var id = id;
 
    $.ajax({
        type: "delete",
        dataType: "json",
        data: {id:id},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/products/delete/"+id,
        success: function(data){
            allData();
        },
        error: function(error){
        }
    });
}



// invoice add
// function addinvoice(){

//     var invoiceid = $('#invoiceid').val();
//     var id = $('#id').val();

    
//     $.ajax({
//         type:"POST",
//         dataType: 'json',
//         data:{invoiceid:invoiceid,id:id},
//         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//         url: '/invoices',
//         success: function(responce){
//             $('#id').val(responce);
//         },
//         error: function(error){
//             Collapse.log(error);
//         }

//     });
// }

// function getInvoiceId(id){
//     $.ajax({
//         type: "GET",
//         url: "/invoices"
//     });
// }

// function addInvoiceData(){
//     var po_number = $('#po_number').val();
//     $.ajax({
//         type: "POST",
//         dataType: "json",
//         data: {poNumber:po_number},
//         url: "/invoicemaster/store",
//         success: function(data){
//             console.log(data);
//         },
//         error: function(error){
//             console.log(error);
//         }
//     });
// }


// function deleteData(id){
//     $.ajax({
//         type:
//     });
// }

// Sub total 
function total(itemAmount){
     $('#subtotal').text(itemAmount);
}

// Tax 
function total(itemAmount){
        $('#subtotal').text(itemAmount);
        var itemAmount = $('#subtotal').text()*1;
        var tax = $('#inputTax').val()*1;

        var total = itemAmount+tax;

        $('#total').text(total);

        var paid = $('#inputPaid').val()*1;

        var balanceDue = total - paid; 

        $('#balanceDue').text(balanceDue);

        console.log(balanceDue);
}

