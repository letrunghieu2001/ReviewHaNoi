const btnPrev = document.querySelector('.btn-prev');
const btnNext = document.querySelector('.btn-next');
const slides = document.querySelectorAll('.slide');
const firstSlide = document.querySelector('.slide');
const slideHeight = firstSlide.clientHeight;
index = 0 ;

btnPrev.addEventListener('click', () => changeSlide('up'));
btnNext.addEventListener('click', () => changeSlide('down'));

btnPrev.style.display= "none" ;

const changeSlide = (direction) => {
  
  if(direction === 'up'){
    if(index > 0){
      index--;
    }
    console.log(index);
  }
  else if(direction === 'down'){
   
    if(index >= 0){
      index++;
    }
    
  }

  if(index == 0){
    btnPrev.style.display= "none" ;
  } 
  else if(index > 0){
    btnPrev.style.display= "block" ;
  }
  
  if(index == (slides.length - 3)){
    btnNext.style.display="none";
  }
  else {
    btnNext.style.display="block";
  }

  for (let j = 0; j < slides.length; j++) {
    slides[j].style.transform = `translateY(-${index * slideHeight}px)`;
  }
  
}