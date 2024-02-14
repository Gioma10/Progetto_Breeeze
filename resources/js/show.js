const slider = document.querySelector('.container-image-detail');
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener('mousedown', (e) => {
  isDown = true;
  slider.classList.add('active');
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener('mouseleave', () => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mouseup', () => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mousemove', (e) => {
  if(!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const walk = (x - startX) * 3; //scroll-fast
  slider.scrollLeft = scrollLeft - walk;
  console.log(walk);
});

//! aggiunta dell'evento doppio click
const images= document.querySelectorAll('.image-detail');
const wrapperItems= document.querySelector('#wrapperItems');

images.forEach((item)=>{
  // console.dir(item);
  item.addEventListener('dblclick', ()=>{
    var div= document.createElement('div');
    div.classList.add('pop-up');
    div.innerHTML=`
        <img class="pop-up-img" src="${item.src}">
        <button class="pop-up-btn"><i class="fa-solid fa-x text-white"></i></button>
        ` 
        wrapperItems.appendChild(div);
        let  buttonCiao= document.querySelector('.pop-up-btn');
        buttonCiao.addEventListener('click',()=>{
        div.remove();
      })
      })
    })