function xselectFilterList(event)
{
    let val = event.target.value.toLowerCase(); // Перетворюємо введене значення до нижнього регістру для порівняння
    let list = event.target.closest('.x-select').querySelector('.x-select-list');
    let options = list.querySelectorAll('label');

    options.forEach(option => {
        let text = option.dataset.text.toLowerCase();
        if (text.includes(val)) {
            option.style.display = 'block';
        } else {
            option.style.display = 'none';
        }
    });
}

function xselectToogleList(event)
{
    var button = event.currentTarget;
    var select = button.closest('.x-select-select');
    var dropdown = select.querySelector('.x-select-dropdown');
    var searchInput = dropdown.querySelector('.x-select-search input');
    var expanded = button.getAttribute('aria-expanded');

    button.setAttribute('aria-expanded', expanded === 'true' ? 'false' : 'true');
    dropdown.classList.toggle('hidden');

    if(searchInput){
        searchInput.focus();
    }
}

// Додати обробник кліку для вікна
window.addEventListener('click', function(event) {
    var isSelectClick = event.target.closest('.x-select-select'); // Перевірка, чи клік відбувся на самому x-select-select або його дочірніх елементах

    if (isSelectClick) {
        return; // Якщо клік відбувся на x-select-select або його дочірніх елементах, вийти з обробника
    }

    // Закрити всі відкриті списки
    var buttons = document.querySelectorAll('.x-select-select button[aria-expanded="true"]'); // Отримати всі кнопки з aria-expanded="true"
    buttons.forEach(function(button) {
        var select = button.closest('.x-select-select'); // Отримати батьківський елемент x-select-select
        var dropdown = select.querySelector('.x-select-dropdown'); // Знайти dropdown всередині x-select-select

        // Закрити dropdown
        dropdown.classList.add('hidden');
        dropdown.classList.remove('block');

        // Змінити aria-expanded на кнопці
        button.setAttribute('aria-expanded', 'false');
    });
});
