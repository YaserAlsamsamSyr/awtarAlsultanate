            //  first-mySlides
            // Next/previous controls
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            // Thumbnail image controls
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            let slideIndex = 0;
            showSlides();
            function showSlides() {
              let i;
              let slides = document.getElementsByClassName("first-mySlides");
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                // document.getElementsByClassName("dottt")[i].style.backgroundColor="#1d1c1c";
              }
              slideIndex++;
              if (slideIndex > slides.length) {slideIndex = 1}
              slides[slideIndex-1].style.display = "block";
              // document.getElementsByClassName("dottt")[slideIndexx-1].style.backgroundColor="#e2ad56";
              setTimeout(showSlides, 7000); // Change image every 2 seconds
            }
      
            // this code for last slider in this page
            // Next/previous controls
            function plusSlidess(n) {
              showSlidess(slideIndexx += n);
            }
            // Thumbnail image controls
            function currentSlidee(n) {
              showSlidess(slideIndexx = n);
            }
            let slideIndexx = 0;
            showSlidess();
            function showSlidess() {
              let i;
              let slides = document.getElementsByClassName("mySlidesss");
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                // document.getElementsByClassName("dottt")[i].style.backgroundColor="#1d1c1c";
              }
              slideIndexx++;
              if (slideIndexx > slides.length) {slideIndexx = 1}
              slides[slideIndexx-1].style.display = "block";
              // document.getElementsByClassName("dottt")[slideIndexx-1].style.backgroundColor="#e2ad56";
              setTimeout(showSlidess, 5000); // Change image every 2 seconds
            }