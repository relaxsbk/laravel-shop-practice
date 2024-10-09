
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-id');

            // Получаем CSRF токен из скрытой формы
            const form = document.getElementById('add-to-cart-form');
            const csrfToken = form.querySelector('[name="_token"]').value;

            // Отправляем AJAX-запрос
            fetch(`/product/${productId}/addToCart`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: productId })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Изменяем интерфейс кнопки
                        const cartLink = document.createElement('a')
                        cartLink.href = '/cart';
                        cartLink.className = 'btn btn-success flex-grow-1 me-2';
                        cartLink.innerHTML = 'В корзине';

                        button.replaceWith(cartLink)


                        // button.classList.remove('btn-outline-primary');
                        // button.classList.add('btn-success');
                        // button.textContent = 'В корзине';

                        // Обновляем или показываем счетчик товаров в корзине
                        const cartCountElement = document.getElementById('cart-count');
                        if (cartCountElement) {
                            cartCountElement.textContent = data.cartItemCount; // Обновляем счетчик
                            cartCountElement.style.display = 'inline'; // Делаем счетчик видимым
                        }
                    } else {
                        console.error('Ошибка:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Ошибка:', error);
                });
        });
    });
});


