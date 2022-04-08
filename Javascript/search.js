
const clicktk  = document.getElementById("tk");
console.log(clicktk);
const popuptk  = document.querySelector(".popuptk");

const click1  = document.querySelectorAll(".h1 li");
const click2  = document.querySelectorAll(".h2 li");
const click3  = document.querySelectorAll(".h3 li");
const click4  = document.querySelectorAll(".h4 li");
const nenden  = document.querySelector(".nenden");
clicktk.addEventListener("click",function(){

    popuptk.classList.add("active1");
    
});
nenden.addEventListener("click",function(){
  popuptk.classList.remove("active1");
  
});


click1.forEach((e)=>{
  e.addEventListener('click',function () {
    for (let i = 0; i < click1.length; i++) {
      click1[i].classList.remove('active');
     }
     
      e.classList.add('active');
     
  })
})
click2.forEach((e)=>{
  e.addEventListener('click',function () {
    for (let i = 0; i < click2.length; i++) {
      click2[i].classList.remove('active');
     }
     
      e.classList.add('active');
     
  })
})
click3.forEach((e)=>{
  e.addEventListener('click',function () {
    for (let i = 0; i < click3.length; i++) {
      click3[i].classList.remove('active');
     }
     
      e.classList.add('active');
     
  })
})
click4.forEach((e)=>{
  e.addEventListener('click',function () {
    for (let i = 0; i < click4.length; i++) {
      click4[i].classList.remove('active');
     }
     
      e.classList.add('active');
     
  })
})



