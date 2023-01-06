 let slideIndex = 1;
 showSlide(slideIndex);


 function moveSlide(moveStep) {
     showSlide(slideIndex += moveStep);
 }

 function currentSlide(n) {
     showSlide(slideIndex = n);
 }

 function showSlide(n) {
     let i;
     const slides = document.getElementsByClassName("slide");
     const dots = document.getElementsByClassName('dot');
     
     if (n > slides.length) { slideIndex = 1 }
     if (n < 1) { slideIndex = slides.length }

     for (i = 0; i < slides.length; i++) {
         slides[i].classList.add('hidden');
     }

     for (i = 0; i < dots.length; i++) {
         dots[i].classList.add('bg-white');
     }

     slides[slideIndex - 1].classList.remove('hidden');

     dots[slideIndex - 1].classList.remove('bg-white');
     dots[slideIndex - 1].classList.add('bg-red-600');
 }