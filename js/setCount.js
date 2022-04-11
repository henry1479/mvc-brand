// function setCount(id,e) {
//     let count = $(this).val();
//     $.ajax({
//         type: 'POST',
//         url: './php/controlers/basket.php',
//         data: {id: id, count: count},
//         success: function () {console.log(count)}
//     });
// }


$('.cart-content__quantity').on('change', function() {
    let count = $(this).val();
    let id = $(this).attr('id');
    $.ajax({
        type: 'POST',
        url: './php/controlers/basket.php',
        data: {id: id, count: count},
        success: function () {console.log(count)}
    });

});
    