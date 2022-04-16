const hamburgerBtn = document.querySelector(".toggle-btn");
const mainHeader = document.querySelector(".row2");

hamburgerBtn.addEventListener("click", function () {
  hamburgerBtn.classList.toggle("open");
  mainHeader.classList.toggle("open");
});


const chooseFile = document.getElementById("choose-file");
const lists = document.getElementById("imagesUp");
chooseFile.addEventListener("change", function () {
    getImgData();
  });
  function getImgData() {
    const files = chooseFile.files[0];
    
    var reader  = new FileReader();
    reader.onload = function(e)  {
        var image = document.createElement("img");
        image.src = e.target.result;
        lists.appendChild(image);
        image.classList.add('imgUp');
     }
     
     reader.readAsDataURL(files);
  }