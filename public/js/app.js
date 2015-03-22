$(function () {
    $('#sf-product-name').change(function () {
        $("#sf-product-name option:selected").each(function () {
            $price = $(this).data('price');
            $amount = $('#sf-amount').val();
            $.fn.calculated_amount( $price, $amount );
        });
    });
    $('#sf-amount').change(function () {
        $("#sf-product-name option:selected").each(function () {
            $price = $(this).data('price');
            $amount = $('#sf-amount').val();
            $.fn.calculated_amount( $price, $amount );
        });
    });
    
    
    
});

$.fn.calculated_amount = function (  $price,  $amount){
    
    $('#sf-total-due').val( $amount * $price );
};