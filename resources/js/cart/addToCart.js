import $ from 'jquery';

export function addToCart(productId) {
    $.ajax({
        url: '/product/' + productId + '/addToCart',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'), // CSRF-токен
        },
        success: function(response) {
            $('#buy-btn-' + productId).removeClass('btn-outline-primary').addClass('btn-outline-success').text('В корзине').prop('disabled', true);

            // Обновляем счётчик в корзине
            let $cartCounter = $('#cart-counter');
            $cartCounter.text(response.cartCount);
            $cartCounter.show(); // Показываем, если скрыт
        },
        error: function(xhr) {
            alert('Ошибка при добавлении товара');
        }
    });
}
