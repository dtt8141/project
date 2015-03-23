$(function () {
    $('#sf-total-due').val($('#sf-amount').val() * $("#sf-product-name option:selected").data('price'));
    $('#sf-product-name').change(function () {
        $("#sf-product-name option:selected").each(function () {
            $price = $(this).data('price');
            $amount = $('#sf-amount').val();
            $.fn.calculated_amount($price, $amount);
        });
    });
    $('#sf-amount').change(function () {
        $("#sf-product-name option:selected").each(function () {
            $price = $(this).data('price');
            $amount = $('#sf-amount').val();
            $.fn.calculated_amount($price, $amount);
        });
    });
    $('.product-delete').click(function () {
        $.fn.del_product($(this).data('id'), $(this).data('token'));
    });
    $('#add-customer').click(function(){
        $customer_name = $('#customer_name').val();
        $customer_address = $('#customer_address').val();
        $customer_phone = $('#customer_phone').val();
        if($customer_name === "" || $customer_address === ""){
            alert("empty required fields");            
            return false;
        }
    });

});

$.fn.calculated_amount = function ($price, $amount) {
    $('#sf-total-due').val($amount * $price);
};

$.fn.del_product = function ($id, $token) {
    var data = '{"id": "' + $id + '", "_token" : ' + $token +'}';
    $.ajax({
        url: "del_products",
        type: "POST",
        dataType: 'json',
        data: JSON.stringify(data),
        processData: false,
        contentType: 'application/json',
        CrossDomain: true,
        async: false,
        success: function (data) {
            console.log(data);
        },
        error: function (xhr, ajaxOptions, thrownError) { //Add these parameters to display the required response
            alert(xhr.status);
            alert(xhr.responseText);
        }
    });
    
};
