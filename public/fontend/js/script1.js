 // ===================zoom-img====================

 var productImg = document.getElementById("imgzoompr");
 var list = document.getElementsByClassName("thumbs-img")



 if ($('img').hasClass("thumbs-img")) {
     list[0].onmouseover = function() {
         productImg.src = list[0].src;
         var link0 = list[0].src;
         $("#imgzoompr").attr("xoriginal", link0);
     }
     list[1].onmouseover = function() {
         productImg.src = list[1].src;
         var link1 = list[1].src;
         $("#imgzoompr").attr("xoriginal", link1);
     }
     list[2].onmouseover = function() {
         productImg.src = list[2].src;
         var link2 = list[2].src;
         $("#imgzoompr").attr("xoriginal", link2);
     }
     list[3].onmouseover = function() {
         productImg.src = list[3].src;
         var link3 = list[3].src;
         $("#imgzoompr").attr("xoriginal", link3);
     }




     function openModal() {
         document.getElementById("myModal").style.display = "block";
     }

     function closeModal() {
         document.getElementById("myModal").style.display = "none";
     }

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
         var dots = document.getElementsByClassName("demo");
         if (n > slides.length) { slideIndex = 1 }
         if (n < 1) { slideIndex = slides.length }
         for (i = 0; i < slides.length; i++) {
             slides[i].style.display = "none";
         }

         slides[slideIndex - 1].style.display = "block";
         dots[slideIndex - 1].className += " active";
     }

 }


 // ==========================================slider====================================================




 $('.num-in span').click(function() {
     var $input = $(this).parents('.num-block').find('input.in-num');
     if ($(this).hasClass('minus')) {
         var count = parseFloat($input.val()) - 1;
         count = count < 1 ? 1 : count;
         if (count < 2) {
             $(this).addClass('dis');
         } else {
             $(this).removeClass('dis');
         }
         $input.val(count);
     } else {
         var count = parseFloat($input.val()) + 1
         $input.val(count);
         if (count > 1) {
             $(this).parents('.num-block').find(('.minus')).removeClass('dis');
         }
     }

     $input.change();
     return false;
 });
 // ============================================
 $(window).scroll(function() {
     if ($(this).scrollTop() >= 44) {
         $('#menu-1').addClass('st-navbar-desktop-fixed');
         $('.login').css("display", "none");
         $('.loginindex').css("display", "none");
     } else {
         $('#menu-1').removeClass('st-navbar-desktop-fixed');
         $('.login').css("display", "block");
         $('.loginindex').css("display", "block");
     }
 });





 $("#bars").click(function() {
     $("div.menu").toggleClass("display");
     $("#bars").css("opacity", "0");
     $("#close").css("opacity", "1");
     $("#close").css("top", "15px");

 });

 $('#close').click(function() {
     $("div.menu").removeClass("display");
     $("#bars").css("opacity", "1");
     $("#close").css("opacity", "0");

 });

 // =================tooltip==========================
 $(document).ready(function() {
     $('[data-toggle="tooltip"]').tooltip();
 });
 // ======================END=========================
 // back-to-top=================
 var btn = $('#button');

 $(window).scroll(function() {
     if ($(window).scrollTop() > 300) {
         btn.addClass('show');
     } else {
         btn.removeClass('show');
     }
 });

 btn.on('click', function(e) {
     e.preventDefault();
     $('html, body').animate({ scrollTop: 0 }, '300');
 });
 // end==============
 //===================Counter======================

 $('.box').each(function() {
     $(this).prop('Counter', 0).animate({
         Counter: $(this).text()
     }, {
         duration: Number($(this).attr("data-duration")),
         easing: 'swing',
         step: function(now) {
             $(this).text(Math.ceil(now));
         }
     });
 });

 // ============================ENd=================================

 $('.img-large, .thumbs-img').xzoom({ zoomWidth: 400, zoomHeight: 380, title: true, tint: '#333', Xoffset: 20 });


 var swiper = new Swiper('.swiper-container', {
     slidesPerView: 4,
     spaceBetween: 30,

     autoplay: {
         delay: 4000,
     },
     loop: true,
     pagination: {
         el: ".swiper-pagination",
         clickable: true,
     },
     navigation: {
         nextEl: ".swiper-button-next",
         prevEl: ".swiper-button-prev",
     },
     breakpoints: {
         1200: {
             slidesPerView: 4,
             spaceBetween: 20,
         },
         1024: {
             slidesPerView: 4,
             spaceBetween: 20,
         },
         990: {
             slidesPerView: 4,
             spaceBetween: 20,
         },

         768: {
             slidesPerView: 3,
             spaceBetween: 20,
         },
         411: {
             slidesPerView: 2,
             spaceBetween: 20,
         },
         375: {
             slidesPerView: 1,
             spaceBetween: 20,
         },
         360: {
             slidesPerView: 1,
             spaceBetween: 20,
         },
         320: {
             slidesPerView: 1,
             spaceBetween: 20,
         },
         220: {
             slidesPerView: 1,
             spaceBetween: 20,
         },
     }
 });

 $(".swiper-container").hover(function() {
     (this).swiper.autoplay.stop();
 }, function() {
     (this).swiper.autoplay.start();
 });

 // ======================================END===================================

 (function() {
     var curpage = 1;
     var click = true;
     var left = document.getElementById("left");
     var right = document.getElementById("right");
     var pagePrefix = "slide";
     var pageShift = 650;
     var transitionPrefix = "circle";
     var svg = true;

     function leftSlide() {
         if (click) {
             if (curpage == 1) curpage = 5;
             console.log("woek");
             sliding = true;
             curpage--;
             svg = true;
             click = false;
             for (k = 1; k <= 4; k++) {
                 var a1 = document.getElementById(pagePrefix + k);
                 a1.className += " tran";
             }
             setTimeout(() => {
                 move();
             }, 200);
             setTimeout(() => {
                 for (k = 1; k <= 4; k++) {
                     var a1 = document.getElementById(pagePrefix + k);
                     a1.classList.remove("tran");
                 }
             }, 1400);
         }
     }

     function rightSlide() {
         if (click) {
             if (curpage == 4) curpage = 0;
             console.log("woek");
             sliding = true;
             curpage++;
             svg = false;
             click = false;
             for (k = 1; k <= 4; k++) {
                 var a1 = document.getElementById(pagePrefix + k);
                 a1.className += " tran";
             }
             setTimeout(() => {
                 move();
             }, 200);
             setTimeout(() => {
                 for (k = 1; k <= 4; k++) {
                     var a1 = document.getElementById(pagePrefix + k);
                     a1.classList.remove("tran");
                 }
             }, 1400);
         }
     }

     function move() {
         if (sliding) {
             sliding = false;
             if (svg) {
                 for (j = 1; j <= 14; j++) {
                     var c = document.getElementById(transitionPrefix + j);
                     c.classList.remove("steap");
                     c.setAttribute("class", transitionPrefix + j + " streak");
                     console.log("streak");
                 }
             } else {
                 for (j = 15; j <= 28; j++) {
                     var c = document.getElementById(transitionPrefix + j);
                     c.classList.remove("steap");
                     c.setAttribute("class", transitionPrefix + j + " streak");
                     console.log("streak");
                 }
             }
             setTimeout(() => {
                 for (i = 1; i <= 4; i++) {
                     if (i == curpage) {
                         var a = document.getElementById(pagePrefix + i);
                         a.className += " up1";
                     } else {
                         var b = document.getElementById(pagePrefix + i);
                         b.classList.remove("up1");
                     }
                 }
                 sliding = true;
             }, 600);
             setTimeout(() => {
                 click = true;
             }, 1700);

             setTimeout(() => {
                 if (svg) {
                     for (j = 1; j <= 14; j++) {
                         var c = document.getElementById(transitionPrefix + j);
                         c.classList.remove("streak");
                         c.setAttribute("class", transitionPrefix + j + " steap");
                     }
                 } else {
                     for (j = 15; j <= 28; j++) {
                         var c = document.getElementById(transitionPrefix + j);
                         c.classList.remove("streak");
                         c.setAttribute("class", transitionPrefix + j + " steap");
                     }
                     sliding = true;
                 }
             }, 850);
             setTimeout(() => {
                 click = true;
             }, 1700);
         }
     }

     if (left != null) {
         left.onmousedown = () => {
             leftSlide();
         };

         right.onmousedown = () => {
             rightSlide();
         };
     }

     document.onkeydown = e => {
         if (e.keyCode == 37) {
             leftSlide();
         } else if (e.keyCode == 39) {
             rightSlide();
         }
     };
 })();

 //for codepen header
 // setTimeout(() => {
 // 	rightSlide();
 // }, 500);