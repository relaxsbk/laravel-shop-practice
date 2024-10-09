document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.add-to-favorite-btn').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-id');

            // Получаем CSRF токен
            const form = document.getElementById('add-to-favorite-btn');
            const csrfToken = form.querySelector('[name="_token"]').value;

            // Отправляем AJAX-запрос
            fetch(`/product/${productId}/addToFavorites`, {
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
                        // Создаем новую ссылку на избранное
                        const favoriteLink = document.createElement('a');
                        favoriteLink.href = `/favorites`;  // Ссылка на страницу избранного
                        favoriteLink.className = 'btn btn-danger me-2';
                        favoriteLink.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path d="M8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                        </svg>`;

                        // Заменяем кнопку на ссылку
                        button.replaceWith(favoriteLink);

                        // Обновляем счетчик избранных товаров
                        const favoriteCountElement = document.getElementById('favorite-count');
                        if (favoriteCountElement) {
                            favoriteCountElement.textContent = data.favoriteItemCount; // Обновляем счетчик
                            favoriteCountElement.style.display = 'inline'; // Показываем счетчик
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
