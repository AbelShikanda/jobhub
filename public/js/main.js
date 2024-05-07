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
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Header carousel
    $('.header-carousel').owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: true,
        loop: true,
        nav: true,
        navText: [
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
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });

})(jQuery);


/*
category dropdown

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
function toggleDropdownProfile() {
    let button = document.querySelector('.dropdown-button-profile');
    let menu = document.querySelector('.dropdown-menu-profile');
    button.classList.toggle('open');
    if (menu.style.display === 'block') {
        menu.style.display = 'none';
    } else {
        menu.style.display = 'block';
    }
}
// document.addEventListener('click', function (event) {
//     let button = document.querySelector('.dropdown-button-category');
//     let menu = document.querySelector('.dropdown-menu-category');
//     if (!button.contains(event.target) && !menu.contains(event.target) && menu.style.display === 'block') {
//         toggleDropdown();
//     }
// });
document.addEventListener('click', function profileDropdownHandler(event) {
    let button = document.querySelector('.dropdown-button-profile');
    let menu = document.querySelector('.dropdown-menu-profile');
    if (!button.contains(event.target) && !menu.contains(event.target) && menu.style.display === 'block') {
        toggleDropdownProfile();
    }
});

document.addEventListener('click', function categoryDropdownHandler(event) {
    let button = document.querySelector('.dropdown-button-category');
    let menu = document.querySelector('.dropdown-menu-category');
    if (!button.contains(event.target) && !menu.contains(event.target) && menu.style.display === 'block') {
        toggleDropdown();
    }
});




/*
profile dropdown

*/



$(function () {
    $(".menu-link").click(function () {
        $(".menu-link").removeClass("is-active");
        $(this).addClass("is-active");
    });
});

$(function () {
    $(".main-header-link").click(function () {
        $(".main-header-link").removeClass("is-active");
        $(this).addClass("is-active");
    });
});

const dropdowns = document.querySelectorAll(".dropdown-profile");
dropdowns.forEach((dropdown) => {
    dropdown.addEventListener("click", (e) => {
        e.stopPropagation();
        dropdowns.forEach((c) => c.classList.remove("is-active"));
        dropdown.classList.add("is-active");
    });
});

$(".search-bar input")
    .focus(function () {
        $(".header").addClass("wide");
    })
    .blur(function () {
        $(".header").removeClass("wide");
    });

$(document).click(function (e) {
    var container = $(".status-button");
    var dd = $(".dropdown-profile");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        dd.removeClass("is-active");
    }
});

$(function () {
    $(".dropdown-profile").on("click", function (e) {
        $(".content-wrapper").addClass("overlay");
        e.stopPropagation();
    });
    $(document).on("click", function (e) {
        if ($(e.target).is(".dropdown-profile") === false) {
            $(".content-wrapper").removeClass("overlay");
        }
    });
});

$(function () {
    $(".status-button:not(.open)").on("click", function (e) {
        $(".overlay-app").addClass("is-active");
    });
    $(".pop-up .close").click(function () {
        $(".overlay-app").removeClass("is-active");
    });
});

$(".status-button:not(.open)").click(function () {
    $(".pop-up").addClass("visible");
});

$(".pop-up .close").click(function () {
    $(".pop-up").removeClass("visible");
});

const toggleButton = document.querySelector('.dark-light');

// Add 'light-mode' class to body by default
document.body.classList.add('light-mode');

// toggleButton.addEventListener('click', () => {
//     document.body.classList.toggle('light-mode');
// });

document.getElementById('revealButton').addEventListener('click', function() {
    document.getElementById('inputField').classList.remove('app-card-edit-input');
    this.style.display = 'none';
});