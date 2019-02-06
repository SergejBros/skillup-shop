var addToCartButtons, cartInHeader, removeFromCartButtons;

addToCartButtons = $('.js-add-to-cart');
cartInHeader = $('#cart-in-header');
removeFromCartButtons = $('.js-remove-item');
cartItems = $('#cartItems');
addToCartButtons.on('click', function (event) {
    event.preventDefault(); /// отключили перезагрузку страницы
    mask();

    $.get(
        event.target.href,
        function (data) {
           cartInHeader.html(data);
           unmask();
    });
});

removeFromCartButtons.on('click', function (event) {
    event.preventDefault(); /// отключили перезагрузку страницы

    if(confirm('Действительно удалить?')){
        // location.assign(event.currentTarget.href);
        mask();

        $.get(
            event.currentTarget.href,
            function (data) {
                cartItems.html(data);
                unmask();
            });
    }
});


function mask() {
    $('body').append('<div class="lmask"></div>');
}

function unmask() {
    $('.lmask').remove();
}