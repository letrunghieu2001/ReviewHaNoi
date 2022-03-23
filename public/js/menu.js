const hamburgerBtn = document.querySelector(".toggle-btn");
const mainHeader = document.querySelector(".row2");

hamburgerBtn.addEventListener("click", function () {
  hamburgerBtn.classList.toggle("open");
  mainHeader.classList.toggle("open");
});
$(document).ready(function(){
  $('.carousel').click({
  slidesToShow: 3,
  dots:true,
  centerMode: true,
  });
});