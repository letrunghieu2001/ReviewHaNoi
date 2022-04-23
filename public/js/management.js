var subMenus = document.querySelectorAll('.three__dots > .subMenu');
console.log(subMenus);
var three_dots = document.querySelectorAll('.three__dots');
console.log(three_dots);
var active = document.getElementsByClassName('active');
console.log(active)

function showSubMenu(){
  three_dots.forEach(e=>{
  e.addEventListener('click',(event)=>{
    console.log(1);
    e.classList.toggle('active'); 
    event.stopPropagation();
    
  });
})
}
function checkOpen(){
  
  console.log(active);
  window.onclick = (event)=>{
    if(event.target ==active){
      active.classList.remove="active";
    }
  }
}

showSubMenu();
checkOpen();
