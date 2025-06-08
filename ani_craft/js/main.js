// document.querySelectorAll('a.smooth-scroll').forEach(link => {
//     link.addEventListener('click', function(e) {
//         e.preventDefault();
        
//         const href = this.getAttribute('href');
//         document.querySelector(href).scrollIntoView({
//             behavior: 'smooth'
//         });
//     });
// });


document.addEventListener('DOMContentLoaded', () => {
    const image = document.getElementById('shrink-image');
    const imageHeight = image.clientHeight;
    const halfImageHeight = imageHeight / 10;

    function handleScroll() {
        const rect = image.getBoundingClientRect();
        const topOfImage = rect.top;
        const bottomOfImage = rect.bottom;
        const viewportMiddle = window.innerHeight / 12;

        if (bottomOfImage > viewportMiddle && topOfImage < viewportMiddle) {
            // Изображение пересекло середину экрана
            const distanceFromTop = Math.min(Math.abs(viewportMiddle - topOfImage), halfImageHeight);
            const scaleFactor = 1 - (distanceFromTop / halfImageHeight) * 0.44;
            image.style.transform = `scale(${scaleFactor})`;
            image.style.borderRadius = `${Math.max(scaleFactor * 60, 0)}px`; // Увеличение скругления
        } else if (topOfImage > viewportMiddle) {
            // Изображение полностью ушло за верхний край экрана
            image.style.transform = 'scale(1)';
            image.style.borderRadius = '0px'; // Возвращаемся к острым углам
        }
    }

    window.addEventListener('scroll', handleScroll);
    window.addEventListener('resize', handleScroll); // Обновляем позицию при изменении размера окна
    handleScroll(); // Выполняем сразу после загрузки страницы
});