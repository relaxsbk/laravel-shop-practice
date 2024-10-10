console.log('compare loaded')

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.add-to-compare-btn').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-id');

            // Получаем CSRF токен
            const form = document.getElementById('add-to-compare-form');
            const csrfToken = form.querySelector('[name="_token"]').value;

            // Отправляем AJAX-запрос
            fetch(`/product/${productId}/addToCompare`, {
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
                        const compareLink = document.createElement('a');
                        compareLink.href = `/compare`;  // Ссылка на страницу
                        compareLink.className = 'btn btn-primary me-2';
                        compareLink.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-bar-chart" viewBox="0 0 16 16">
                                        <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
                        </svg>`;

                        // Заменяем кнопку на ссылку
                        button.replaceWith(compareLink);

                        // Обновляем счетчик избранных товаров
                        const compareCountElement = document.getElementById('compare-count');
                        if (compareCountElement) {
                            compareCountElement.textContent = data.compareItemCount; // Обновляем счетчик
                            compareCountElement.style.display = 'inline'; // Показываем счетчик
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
