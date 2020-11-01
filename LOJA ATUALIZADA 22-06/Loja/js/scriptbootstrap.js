function myFunction(x) {
    x.classList.toggle("change");
}
//NAV
menuaberto = false;


function myFunction(x) {
    x.classList.toggle("change");
    if (menuaberto) {
        //
        document.getElementById("mySidenav").style.width = "0";
        document.body.style.backgroundColor = "#fff";
        menuaberto = false;

    } else {
        //
        document.getElementById("mySidenav").style.width = "175px";
        document.getElementById("menu").style.zIndex = "3";
        menuaberto = true;

    }
}
// SLIDE HEADER
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}


