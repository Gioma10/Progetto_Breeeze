
const carousel= document.querySelector('.infinite-carousel');
const carouselInner= document.querySelector('.infinite-carousel>div');
const carouselContent= Array.from(carouselInner.children);
carouselContent.forEach((item) => {
    const cloneItem= item.cloneNode(true);
    carouselInner.appendChild(cloneItem);
    // carouselInner.style.animation= "move 12s"
});
