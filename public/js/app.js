var addToCartButtons, cartInHeader, cartItems;

addToCartButtons = $('.js-add-to-cart');
cartInHeader = $('#cart-in-header');
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

// обработчик с фильтрацией, сработает если нажали на элемент класса js-remove-item
$('body').on('click', '.js-remove-item', function (event) {
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


$('body').on('input', '.js-item-quantity', function (event) {
    var target = $(event.currentTarget);

    $.post(
        target.data('href'),
        {'quantity': target.val()},
        function (data) {
            cartItems.html(data);
            cartInHeader.load(cartInHeader.data('refresh-url'));

        }

    )
});


function mask() {
    $('body').append('<div class="lmask"></div>');
}

function unmask() {
    $('.lmask').remove();
}