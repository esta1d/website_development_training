// let coll = document.getElementsByClassName('collapse');
// for(let i = 0; i < coll.length; i++) {
//   coll[i].addEventListener('click', function() {
//     this.classList.toggle('active');
//     let content = this.nextElementSibling;
//     if (content.style.maxHeight) 
//     {content.style.maxHeight = null;
//     } else {
//         content.style.maxHeight = content.scrollHeight + 'px'
//     }
//   })
// }


// Получаем все блоки ".myeducation-content"
const blocks = document.querySelectorAll('.myeducation-content');

blocks.forEach(block => {
  block.addEventListener('click', function() {
    // Находим соседний контент
    const content = this.parentNode.querySelector('.content');
    
    // Переключение классов
    this.classList.toggle('active');
    content.classList.toggle('active');

    // Изменяем максимальную высоту контента
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + 'px';
    }

    // Меняем направление стрелочки
    const arrow = this.querySelector('.arrow');
    arrow.classList.toggle('arrowactive');
  });
});