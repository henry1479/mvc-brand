function addToCart(id) {
   
    $.get(document.location.href,
    {addCart: id},
    function(data){
        // console.log(data.substr(22,5));
        let count = data.substr(22,4);
        $('.header__cart-link-counter').html(count);
        alert("ok " + id);
    }
);

}