$(document).ready(function () {
    $('.autoplay').slick({
        dots: true,
        arrows: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 551,
                settings: {
                    slidesToShow: 1,
                    dots: true,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            }
        ]
    });

    $('.box-slider-doitac').slick({
        dots: false,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 551,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            }
        ]

    })
    $('.all-content-banner').slick({
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 2000,
    }),
        $('.item-slider-ld-pages').slick({
            dots: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            autoplaySpeed: 2000,
            responsive: [

                {
                    breakpoint: 551,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                }
            ]
        }),
        $(".slick-customer").slick({
            infinite: true,
            // autoplay: true,
            speed: 500,
            cssEase: "linear",
            arrows: true,
            prevArrow: ".arrowBack",
            nextArrow: ".arrowNext",
        });
    $('.faded').slick({
        infinite: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        cssEase: 'linear',
        slidesToShow: 3,
        slidesToScroll: 1,
    });

    $('.box-posts-news-right').slick({
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 4,
        slidesToScroll: 1,
        vertical: true,
    });
    $('.autoplay1').slick({
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        speed: 1000,
        autoplaySpeed: 3000,
        fade: true,
        infinite: true,
        cssEase: 'linear',
        nextArrow: false,
        prevArrow: false,
    });

    $('.autoplay3').slick({
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    dots: false,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            },
            {
                breakpoint: 551,
                settings: {
                    slidesToShow: 1,
                    dots: false,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            }
        ]
    });

    $('.autoplay4').slick({
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        autoplaySpeed: 2000,
        prevArrow: '<button type="button" class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg></button>',
        nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></button>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    dots: false,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            },
            {
                breakpoint: 551,
                settings: {
                    slidesToShow: 1,
                    dots: false,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            }
        ]
    });

    $('.autoplay5').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        prevArrow: false,
        nextArrow: false,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            },
            {
                breakpoint: 786,
                settings: {
                    slidesToShow: 2,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            }
        ]
    });

    $(".autoplay6").slick({
        dots: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 551,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });

    $('.adaptive-1').slick({
        dots: false,
        infinite: true,
        speed: 1000,
        asNavFor: '.sss',
        slidesToShow: 1,
        focusOnSelect: true,
        adaptiveHeight: true
    });

    $('.sss').slick({
        dots: false,
        infinite: true,
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        adaptiveHeight: true
    });

    $('.adaptive1-1').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });

    $(".autoplay4").slick({
        dots: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        speed: 500,
        autoplaySpeed: 1500
    });

});
$('.slide-3').slick({
    dots: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2500,
    speed: 1800,
    prevArrow: '<button type="button" class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg></button>',
    nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></button>',
    responsive: [{
        breakpoint: 991,
        settings: {
            slidesToShow: 5,
        }
    },
    {
        breakpoint: 767,
        settings: {
            slidesToShow: 4,
        }
    },
    {
        breakpoint: 550,
        settings: {
            slidesToShow: 2,
        }
    }
    ]
});
// Function to handle clicking on the question text
function handleQuestionClick(event) {
    const questionCard = event.currentTarget;

    if (questionCard.classList.contains("open2")) {
        questionCard.classList.remove("open2");
    } else {
        // First, close any other open question cards
        document.querySelectorAll(".text-click-question.open2").forEach(function (element) {
            element.classList.remove("open2");
        });
        // Then, open the clicked question card
        questionCard.classList.add("open2");
    }
}

// Add event listeners to question text
document.querySelectorAll(".text-click-question").forEach(function (element) {
    element.addEventListener("click", handleQuestionClick);
});


//   window.addEventListener('scroll', function() {
//       var header = document.querySelector('.header-bottom');
//       // Kiểm tra xem cuộn trang xuống khoảng 100px
//       if (window.scrollY > 100) {
//           // Thêm lớp scroll-down vào header
//           header.classList.add('scroll-down');
//       } else {
//           // Loại bỏ lớp scroll-down nếu không cuộn đủ 100px
//           header.classList.remove('scroll-down');
//       }
//   });