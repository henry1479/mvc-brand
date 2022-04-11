$(document).ready(function(){
    $('.cart-content__quantity').change( 
        function (){
            let id = $(this).attr('id');
            let count = $(this).val();
            console.log(`${id} + ${count}`);
            $.get(document.location.href,
            {cartId: id,  cartCount: count},
        );
    
}
    )
})


