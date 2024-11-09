(function($) {

    "use strict";

    //  Header sticky
    const headerSticky = function() {
      const header = document.querySelector('#header');
      if (!header) return;      
      const trigHeight = 1;

      window.addEventListener('scroll', function () {
          let tj = window.scrollY;

          if (tj > trigHeight) {
              header.classList.add('sticky');
          } else {
              header.classList.remove('sticky');
          }
      });
    };

    // init jarallax parallax
    var initJarallax = function() {
      jarallax(document.querySelectorAll(".jarallax"));

      jarallax(document.querySelectorAll(".jarallax-img"), {
        keepImg: true,
      });
    }

    // product quantity
    var initProductQty = function(){

      $('.product-qty').each(function(){

        var $el_product = $(this);
        var quantity = 0;

        $el_product.find('.quantity-right-plus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($el_product.find('#quantity').val());
            $el_product.find('#quantity').val(quantity + 1);
        });

        $el_product.find('.quantity-left-minus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($el_product.find('#quantity').val());
            if(quantity>0){
              $el_product.find('#quantity').val(quantity - 1);
            }
        });

      });

    }

    $(document).ready(function() {
      
      /* Video */
      var $videoSrc;  
        $('.play-btn').click(function() {
          $videoSrc = $(this).data( "src" );
        });

        $('#myModal').on('shown.bs.modal', function (e) {

        $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
      })

      $('#myModal').on('hide.bs.modal', function (e) {
        $("#video").attr('src',$videoSrc); 
      })

      var swiper = new Swiper(".main-swiper", {
        loop: true,
        speed: 800,
        autoplay: {
          delay: 6000,
        },
        effect: "fade",
        pagination: {
          el: ".main-slider-pagination",
          clickable: true,
        },
      });
      
      var swiper = new Swiper(".product-swiper", {
        speed: 1000,
        spaceBetween: 20,
        navigation: {
          nextEl: ".product-carousel-next",
          prevEl: ".product-carousel-prev",
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          480: {
            slidesPerView: 2,
          },
          900: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
          1200: {
            slidesPerView: 6,
            spaceBetween: 20,
          }
        },
      }); 

      var swiper = new Swiper(".testimonial-swiper", {
        speed: 1000,
        navigation: {
          nextEl: ".testimonial-arrow-next",
          prevEl: ".testimonial-arrow-prev",
        },
      });

      var thumb_slider = new Swiper(".thumb-swiper", {
        slidesPerView: 1,
      });
      var large_slider = new Swiper(".large-swiper", {
        spaceBetween: 10,
        effect: 'fade',
        thumbs: {
          swiper: thumb_slider,
        },
      });

      headerSticky();
      initJarallax();
      initProductQty();
      AOS.init();
      
    }); // End of a document ready

    window.addEventListener("load", function () {
      const preloader = document.getElementById("preloader");
      preloader.classList.add("hide-preloader");      
    });

})(jQuery);