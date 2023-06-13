
$(document).ready(function(){
  function updateBoxShadow(imgElement) {
    if (imgElement.attr('id') === 'bad') {
       $('#Firstsection').css('box-shadow', '-20px -20px 20px 10px red, 20px 20px 20px 10px red');
      
    } else if(imgElement.attr('id') === 'good') {
      $('#Firstsection').css('box-shadow', '-20px -20px 20px 10px blue, 20px 20px 20px 10px blue');
    }
  }
  updateBoxShadow($('.active'));
  $('#next').on('click', function(){
    var currentImg= $('.active');
    var nextImg=currentImg.next();
   
    if(nextImg.length){
      currentImg.removeClass('active').css('z-index', -10);
      nextImg.addClass('active').css('z-index', 10);
    }
    updateBoxShadow(nextImg);
  });
  $('#prev').on('click', function(){
    var currentImg= $('.active');
    var prevImg=currentImg.prev();


    if(prevImg.length){
      currentImg.removeClass('active').css('z-index', -10);
      prevImg.addClass('active').css('z-index', 10);
    }
    updateBoxShadow(prevImg);
  });
  
});
// $(document).ready(function() {
//   var imagePerSlide=getPropertyValue("--image-per-slide");
//   var blockSize = 3;

//   var curent3img = $('.bloc:nth-child(-n+4)').css('display', 'block');

//   $('.Next').on("click", function() {
//     currentIndex += blockSize;
//     if (currentIndex >= $('.bloc').length) {
//       currentIndex = 0;
//     }

//     var next3img = $('.bloc').slice(currentIndex, currentIndex + blockSize);
//     curent3img = $('.bloc:nth-child(-n+4)').css('display', 'none');
//     next3img.addClass('bloc:nth-child(-n+3)').css('display', 'block');
//   });

//   $('.Prev').on("click", function() {
//     currentIndex -= blockSize;
//     if (currentIndex < 0) {
//       currentIndex = $('.bloc').length - blockSize;
//     }

//     var prev3img = $('.bloc').slice(currentIndex, currentIndex + blockSize);
//     $('.bloc').css('display', 'none');
//     prev3img.css('display', 'block');
//   });
// });
let prev = document.getElementsByClassName("Prev")[0];
let next = document.getElementsByClassName("Next")[0];
let container = document.getElementsByClassName('containerprimarsecondsection')[0];

next.addEventListener("click", () => {
  container.style.scrollBehavior="smooth";
  container.scrollLeft += 900;
});
prev.addEventListener("click", () => {
    container.scrollLeft -= 900;
  });

document.addEventListener('click', e=>{
  let handle;
    if(e.target.matches(".handle")){
      handle=e.target;
    }else{
      handle=e.target.closest(".handle")
    }
    if(handle!= null)onHandleClick(handle)
})
window.addEventListener("resize", e=>{
  //Recalculate progress bar
})
document.querySelectorAll(".progress-bar").forEach(calculateProgressBar)
function calculateProgressBar(progressBar){
  progressBar.innerHTML="";
  const slider=progressBar.closest(".containerthirdsection").querySelector(".slider");
  const itemcount=slider.children.length;
  const itemsPerScreen=parseInt(getComputedStyle(slider).getPropertyValue("--items-per-screen"));
  const progressBarItemCount=Math.ceil(itemcount/itemsPerScreen)
  const sliderindex=parseInt(getComputedStyle(slider).getPropertyValue("--slider-index"))
  for(let i=0; i<progressBarItemCount; i++){
    const baritem=document.createElement("div");
    baritem.classList.add("progress-items")
    if(i===sliderindex){
      baritem.classList.add("active")
    }  
  progressBar.append(baritem)
  }
}
function onHandleClick(handle){
  const progressBar= handle.closest(".containerthirdsection").querySelector(".progress-bar");
  const slider=handle.closest(".containerthirdsection").querySelector(".slider");
    const sliderindex=parseInt(getComputedStyle(slider).getPropertyValue("--slider-index"));
    const progressBarItemCount= progressBar.children.length;
    if(handle.classList.contains("left-handle")){
      if(sliderindex -1 <0){
        slider.style.setProperty("--slider-index", progressBarItemCount - 1)
        progressBar.children[sliderindex].classList.remove("active")
        progressBar.children[progressBarItemCount - 1].classList.add("active")

      }else{
        slider.style.setProperty("--slider-index", sliderindex - 1)
        progressBar.children[sliderindex].classList.remove("active")
        progressBar.children[sliderindex - 1].classList.add("active")
      }

    }
    if(handle.classList.contains("right-handle")){
      if(sliderindex+1 >= progressBarItemCount){
        slider.style.setProperty("--slider-index", 0)
        progressBar.children[sliderindex].classList.remove("active")
        progressBar.children[0].classList.add("active")

      }else{
      slider.style.setProperty("--slider-index", sliderindex + 1)
      progressBar.children[sliderindex].classList.remove("active")
      progressBar.children[sliderindex + 1].classList.add("active")
      }
    }
}

document.addEventListener('DOMContentLoaded', function() {
 
  const inputFile = document.querySelector('input[type="file"]');
  
  inputFile.addEventListener('click', function() {
    inputFile.style.fontSize = 'initial';
  });
});
