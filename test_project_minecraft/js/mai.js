// СКРОЛИНГ БЛОКА
window.addEventListener('scroll', function() {
    const titleBlock = document.querySelector('.title_block');
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    const blockHeight = titleBlock.clientHeight;
    const maxScroll = window.innerHeight + blockHeight;
    let progress = Math.min(scrollTop / (maxScroll/4), 1);

    // Изменяем формулу для получения правильных значений радиусов
    titleBlock.style.borderBottomLeftRadius = `${(1 - progress) * 50}% ${(1 - progress) * 70}%`;
    titleBlock.style.borderBottomRightRadius = `${(1 - progress) * 50}% ${(1 - progress) * 70}%`;

    // При максимальном значении прокрутки делаем углы полностью квадратными
    if (progress === 1) {
        titleBlock.style.borderBottomLeftRadius = '0 0 0 0';
        titleBlock.style.borderBottomRightRadius = '0 0 0 0';
    }
});


// ДЛЯ РАЗРАБОТКИ
window.onscroll = function() {
    console.log(window.scrollY);
};

// МЕНЮ САЙТА

document.addEventListener('scroll', function() {
    const nav = document.getElementById('sticky-nav');
    if (window.scrollY >= 1100) {
        // Показываем меню, когда пользователь прокручивает страницу вниз до 1100px
        nav.classList.remove('hidden');
        nav.classList.add('visible');
    } else {
        // Скрываем меню, когда пользователь возвращается к началу страницы
        nav.classList.remove('visible');
        nav.classList.add('hidden');
    }
});




