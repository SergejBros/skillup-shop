var addToCartButtons;

addToCartButtons = $('.js-add-to-cart');
cartInHeader = $('#cart-in-header');
addToCartButtons.on('click', function (event) {
    event.preventDefault(); /// отключили перезагрузку страницы

    $.get(
        event.target.href,
        function (data) {
           cartInHeader.html(data);
    });
});