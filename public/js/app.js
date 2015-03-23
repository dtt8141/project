$(function () {
    $.ajaxPrefilter(function(options, originalOptions, xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-XSRF-TOKEN', token);
            }
      });
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
        $.fn.del_product($(this).data('id'));
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
      $('#add-product').click(function(){
        $product_name = $('#product_name').val();
        $product_description = $('#product_description').val();
        $product_price = $('#product_price').val();
        $product_stocks = $('#product_stocks').val();
        $product_distributor = $('#product_distributor').val();
        if($product_name === "" || $product_description === "" || $product_price === "" || $product_stocks === "" || $product_distributor === ""){
            alert("empty required fields");            
            return false;
        }
    });
      $('#add-product').click(function(){
        $product_name = $('#product_name').val();
        $product_description = $('#product_description').val();
        $product_price = $('#product_price').val();
        $product_stocks = $('#product_stocks').val();
        $product_distributor = $('#product_distributor').val();
        if($product_name === "" || $product_description === "" || $product_price === "" || $product_stocks === "" || $product_distributor === ""){
            alert("empty required fields");            
            return false;
        }
    });  $('#add-distributor').click(function(){
        $name = $('#name').val();
        $address = $('#address').val();
        $phone = $('#phone').val();
        if($name === "" || $address === "" || $phone === "" ){
            alert("empty required fields");            
            return false;
        }
    });
    
    $('.product-edit').click(function(){
        $('#edit-products-modal').data('id', $(this).data('id'));        
        $('#edit-products-modal').modal();
    });
    $('#edit-product-save').click(function(){        
        $.fn.edit_product($('#edit-products-modal').data('id'));
    });

});

$.fn.calculated_amount = function ($price, $amount) {
    $('#sf-total-due').val($amount * $price);
};

$.fn.del_product = function ($id) {
    url = $('#products-container').data('delete-url');
    token = $('#products-container').data('token');
    $.ajax({
        url: url,
        data: {id: $id, _token: token},
        success:function(data) {
            window.location.href = 'home';
         }
    });    
};

$.fn.edit_product = function ($id) {
    url = $('#products-container').data('edit-url');
    token = $('#products-container').data('token');
    name = $('#edit-product-name').val();
    description = $('#edit-product-description').val();
    stocks = $('#edit-product-stocks').val();
    price = $('#edit-product-price').val();
    distributor = $('#edit-product-distributor').val();    
    $.ajax({
        url: url,
        data: {id: $id, name: name, description: description, stocks: stocks, price: price, distributor: distributor, _token: true},
        success:function(data) {
            window.location.href = 'home';
            //console.log(data);  
         }
    });
}
