const hamburgerBtn = document.querySelector(".toggle-btn");
const mainHeader = document.querySelector(".row2");

const listGift = document.querySelector("#gift > .menu2");
const listCategory = document.querySelector("#category > .menu2");
const gift = document.getElementById("gift");
const category = document.getElementById("category");


const body = document.querySelector("body"),
      modeToggle = document.querySelector(".dark-light");



gift.addEventListener('click',(e)=>{
  e.stopPropagation();
  if(listGift.classList.contains('open')){
    listGift.classList.remove('open')
  }else{
    listGift.classList.toggle('open');
  }
  

})

category.addEventListener('click',(e)=>{
  e.stopPropagation();
  if(listCategory.classList.contains('open')){
    listCategory.classList.remove('open')
  }else{
    listCategory.classList.toggle('open');
  }
});



modeToggle.addEventListener("click",()=>{
  modeToggle.classList.toggle("active");
  body.classList.toggle("dark");
  
})



hamburgerBtn.addEventListener("click", function () {
  hamburgerBtn.classList.toggle("open");
  mainHeader.classList.toggle("open");
});
$(document).ready(function(){
  $('.carousel').slick({
  slidesToShow: 3,
  dots:true,
  centerMode: true,
  });
});
