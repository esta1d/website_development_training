let coll = document.getElementsByClassName('collapse');
for(let i = 0; i < coll.length; i++) {
  coll[i].addEventListener('click', function() {
    this.classList.toggle('active');
    let popupHonkai = this.nextElementSibling;
    if (popupHonkai.style.maxHeight) 
    {popupHonkai.style.maxHeight = null;
    } else {
      popupHonkai.style.maxHeight = popupHonkai.scrollHeight + 700 + 'px'
    }
  })
}

let collbtn = document.getElementsByClassName('activebtn');
for(let i = 0; i < collbtn.length; i++) {
  collbtn[i].addEventListener('click', function() {
    this.classList.toggle('active_btn');
  })
}

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




// const active = document.querySelector('.activebtn');
// const popUp = document.querySelector('.activebtn');
// // const closePopUp = document.querySelector('.target-close-popup');
// active.addEventListener('click', function(e){
//   e.preventDefault();
//   popUp.classList.add('active_btn');
// })
// closePopUp.addEventListener('click', function(e){ scrollHeight
//   e.preventDefault();
//   popUp.classList.remove('active_btn');
// })

const items = document.querySelectorAll('.item2')

const expand = (item, i) => {
  items.forEach((it, ind) => {
    if (i === ind) return
    it.clicked = false
  })
  gsap.to(items, {
    width: item.clicked ? '15vw' : '8vw',
    duration: 2,
    ease: 'elastic(1, .6)'
  })
  
  item.clicked = !item.clicked
  gsap.to(item, {
    width: item.clicked ? '42vw' : '15vw',
    duration: 2.5,
    ease: 'elastic(1, .3)'
  })
}

items.forEach((item, i) => {
  item.clicked = false
  item.addEventListener('click', () => expand(item, i))
})



const panels = document.querySelectorAll('.panel');

panels.forEach(panel => panel.addEventListener('click',()=>{
    removeActiveClasses()
    panel.classList.add('active');
}))

function removeActiveClasses(){
    panels.forEach(panel => panel.classList.remove('active'))
}