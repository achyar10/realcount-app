
$(document).ready(function () {
  

    // ============ // BACK TO TOP \\ ============\\
    $(window).scroll(function () {
      if ($(this).scrollTop() > 150) {
        $('#back-to-top').fadeIn();
      } else {
        $('#back-to-top').fadeOut();
      }
    });
    // scroll body to 0px on click
    $('#back-to-top').on('click', function (e) {
      e.preventDefault();
         $('html,body').animate({
           scrollTop: 0
         }, 700);
     });
  
  
    // ============ // SWIPER CONFIG \\ ============\\
    var swiper = new Swiper('.swiper-containerx', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      autoplay: {
        delay: 4500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      grabCursor: true,
      speed: 300,
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      loop: true,
    });
  
    var swiper = new Swiper('.swiper-container-foto', {
      // navigation: {
      //   nextEl: '.swiper-button-next-foto',
      //   prevEl: '.swiper-button-prev-foto',
      // },
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      slidesPerView: 4,
      loop: true,
      breakpoints: {
        320: {
          slidesPerView: 1.5,
        },
        640: {
          slidesPerView: 2,
        },
        991: {
          slidesPerView: 4,
        },
        
      }
    });
  
    var swiper = new Swiper('.swiper-container-mindex', {
      // navigation: {
      //   nextEl: '.swiper-button-next-foto',
      //   prevEl: '.swiper-button-prev-foto',
      // },
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      slidesPerView: 8,
      loop: true,
      breakpoints: {
        321: {
          slidesPerView: 3,
        },
        641: {
          slidesPerView: 4,
        },
        1025: {
          slidesPerView: 6,
        },
        1200: {
          slidesPerView: 7,
        },
        
      }
    });
  
    // ========== # Foto Detail Slider # ========== \\
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 20,
      slidesPerView: 4,
      // loop: true,
      freeMode: true,
      loopedSlides: 3, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      
      breakpoints: {
        320: {
          slidesPerView: 3,
        },
        
        991: {
          slidesPerView: 4,
        },
        
      }
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      // loop:true,
      loopedSlides: 3, //looped slides should be the same
      speed: 800,
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    });
  
    // ============ // MODAL POPUP \\ ============\\
      $('.popup__overlay, .modalpop__close').click(function () {
        $('#js-removepop').hide();
      });
  
      
    
    // ============ // SEARCH SHOW \\ ============\\
    $('.cari__icon, .cari__close, .cari__overlay').click(function () {
      $('.cari__form').fadeToggle();
    });
  
    // ============ // BURGER MENU \\ ============\\
    $('.burger').click(function () {
      $('.menu').slideToggle();
    });
  
    // ============ // SOSMED WIDGET TAB \\ ============\\
    $('.nav-item').click(function () {
      // $('.menu').slideToggle();
      $('.nav-item').removeClass('active');
      $(this).addClass('active');
  
      var idTabNav = $(this).attr("id");
      var idTabContent = idTabNav+"content";
      $('.tab-pane').removeClass('active');
  
      $('#'+idTabContent+'').addClass('active');
  
    });
  
    // ============ // FOOTER BANNER CLOSE \\ ============\\
    $('.banner-footer-close').click(function () {
      $('.banner-footer ').fadeOut();
    });
    var a = $('.banner-footer-inner img').length;
   
    if (a === 0){
      $('.banner-footer-close').hide();
    }
    
  
  
  
  });
  
  
    // ========== # Sticky Nav Menu Scrolling # ========== \\
    $(window).scroll(function(){
    if ($(this).scrollTop() > 25) {
      $('.mainmenu').addClass('nempel');
    } else {
      $('.mainmenu').removeClass("nempel")
    }
    });
  
  
  
  
    checkScreenSize();
        
    function checkScreenSize(){
        var newWindowWidth = $(window).width();
        if (newWindowWidth < 992) {
          $(".menu ul li.has-dropdown").click(function(){
            $(this).children('ul').slideToggle();
          });  
        }  
    }
  
  
  // ========== # Convert Alt Image to Text # ========== \\
  $(function(){
    $('.detail__content p img').each(function(){
      var alt = $(this).attr("alt");
      $(this).after("<div class='captiondetail'> "+alt+"</div> "   ); 
    });
  });
  
  $(".char-textarea").on("keyup",function(event){
    checkTextAreaMaxLength(this,event);
  });
  
  // ========== # Checks the MaxLength of the Textarea # ========== \\
  function checkTextAreaMaxLength(textBox, e) { 
      var maxLength = parseInt($(textBox).data("length"));
      if (!checkSpecialKeys(e)) { 
          if (textBox.value.length > maxLength - 1) textBox.value = textBox.value.substring(0, maxLength); 
     } 
    $(".char-count").html(maxLength - textBox.value.length);
      
      return true; 
  } 
  /* Checks if the keyCode pressed is inside special chars
  -------------------------------------------------------
  @prerequisite:	e = e.keyCode object for the key pressed
  */
  function checkSpecialKeys(e) { 
      if (e.keyCode != 8 && e.keyCode != 46 && e.keyCode != 37 && e.keyCode != 38 && e.keyCode != 39 && e.keyCode != 40) 
          return false; 
      else 
          return true; 
  }