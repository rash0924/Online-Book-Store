  let slideIndex = 1;
  let slideTimer;

  startSlideshow();

  function plusSlides(n) {
    clearTimeout(slideTimer); 
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    clearTimeout(slideTimer); 
    showSlides(slideIndex = n);
  }

  function startSlideshow() {
    showSlides(slideIndex); 

    slideTimer = setTimeout(function() {
      plusSlides(1);
      startSlideshow(); 
    }, 5000);
  }

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1; }
    if (n < 1) { slideIndex = slides.length; }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
  }