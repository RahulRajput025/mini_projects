var slide_index = 0;

displaySlides(slide_index);

function displaySlides(number) {
  var i;
  var slides = document.getElementsByClassName("slider__item");
  if (number > slides.length) {
    slide_index = 1;
  } else if (number < 1) {
    slide_index = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slide_index - 1].style.display = "block";
}

function nextSlide(number) {
  displaySlides(slide_index += number);
}
function currentSlide(number) {
  displaySlides(slide_index = number);
}
