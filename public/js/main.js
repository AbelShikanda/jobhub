(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').css('top', '0px');
        } else {
            $('.sticky-top').css('top', '-100px');
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Header carousel
    $('.header-carousel').owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: true,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav : false,
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });
    
})(jQuery);
  

/*


*/

function toggleDropdown() {
    let button = document.querySelector('.dropdown-button-category');
    let menu = document.querySelector('.dropdown-menu-category');
    button.classList.toggle('open');
    if (menu.style.display === 'block') {
      menu.style.display = 'none';
    } else {
      menu.style.display = 'block';
    }
  }
//   document.querySelectorAll('.dropdown-menu a').forEach(function(a) {
//     a.addEventListener('click', function(event) {
//       event.preventDefault();
//       let selected = document.querySelector('.dropdown-menu .selected');
//       selected.classList.remove('selected');
//       this.classList.add('selected');
//       document.querySelector('.dropdown-text').innerHTML = this.innerHTML;
//       toggleDropdown();
//     });
//   });
  document.addEventListener('click', function(event) {
    let button = document.querySelector('.dropdown-button-category');
let menu = document.querySelector('.ddropdown-menu-category');
if (!button.contains(event.target) && !menu.contains(event.target) && menu.style.display === 'block') {
toggleDropdown();
}
});