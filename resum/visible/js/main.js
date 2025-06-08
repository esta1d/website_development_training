$('.menu-btn-left').on('click', function(e) {
  e.preventDefault();
  $(this).toggleClass('menu-btn-left_active');
});
$('.menu-btn-left2').on('click', function(e) {
  e.preventDefault();
  $(this).toggleClass('menu-btn-left2_active');
});


$('.menu-btn-left').on('click', function(e) {
  e.preventDefault();
  $('.menu-left').toggleClass('menu-left_active');
  // $('.allview').toggleClass('allview_active');
})
$('.menu-btn-left2').on('click', function(e) {
  e.preventDefault();
  $('.mnu-top').toggleClass('mnu-top_active');
  // $('.allview').toggleClass('allview_active');
})




const openPopUp = document.querySelector('.target-open-popup');
const popUp = document.querySelector('.pop_up')
const popUpBody = document.querySelector('.pop_up-body')
const closePopUp = document.querySelector('.target-up_close');
openPopUp.addEventListener('click', function(e){
  e.preventDefault();
  popUp.classList.add('pop_up_active');
  popUpBody.classList.add('pop_up-body_active');
})
closePopUp.addEventListener('click', function(e){
  e.preventDefault();
  popUp.classList.remove('pop_up_active');
  popUpBody.classList.remove('pop_up-body_active');
})



const progress = document.querySelector('.progress');
window.addEventListener('scroll', progressBar);

function progressBar(e) {
  let windowScroll = document.body.scrollTop || document.documentElement.scrollTop;
  let windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  console.log (windowScroll);
  console.log (windowHeight);
  let per = windowScroll / windowHeight * 100;

  progress.style.width = per + '%';
}



