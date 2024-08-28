


$(document).ready(function(){
  $('.list-bar2').click(function(){
      $('.menu_fix_mobile').addClass('main-menu-show');
  });

  $('.close-menu #close-menu-button').click(function(){
      $(this).parent().parent().removeClass('main-menu-show');
  });

  $('.nav-item .mm1').click(function(){
    $(this).parent().find('.nav-sub').slideToggle();
  });

  $('.nav-item .mm2').click(function(){
    $(this).parent().find('.nav-sub-child').slideToggle();
  });

  $('.box_search .icon_se').click(function(){
    $(this).parent().toggleClass('open');
  });

  $('.menu-mobile .nav-sub-link').click(function(){
    $(this).parent().find('.nav-sub-child').slideToggle();
    $(this).parent().toggleClass('active');
  });

  $('.search').click(function(){
    $(this).toggleClass('open');
  });
});

function myFunction(x) {
  x.classList.toggle("change");
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

/*$('.list_thuong_hieu li a').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top-170
    }, 0);
    return false;
});*/



function updateCountdown() {
  const targetDate = new Date();
  targetDate.setDate(targetDate.getDate() + 1);
  targetDate.setHours(0, 0, 0, 0);

  const countdownInterval = setInterval(() => {
      const now = new Date().getTime();
      const distance = targetDate - now;

      if (distance < 0) {
          clearInterval(countdownInterval);
          // Thực hiện các hành động khi thời gian kết thúc
          console.log("Countdown finished!");
          // Bắt đầu lại đồng hồ đếm ngược cho ngày hôm sau
          updateCountdown();
      } else {
          const days = Math.floor(distance / (1000 * 60 * 60 * 24));
          const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          const seconds = Math.floor((distance % (1000 * 60)) / 1000);

          document.getElementById('days').innerText = days.toString().padStart(2, '0');
          document.getElementById('hours').innerText = hours.toString().padStart(2, '0');
          document.getElementById('minutes').innerText = minutes.toString().padStart(2, '0');
          document.getElementById('seconds').innerText = seconds.toString().padStart(2, '0');
      }
  }, 1000);
}

// Gọi hàm để bắt đầu đồng hồ đếm ngược
updateCountdown();

const linkprojects3 = document.querySelectorAll(".link_3d-register");
const bupuplinkproject3 = document.querySelector('.pupup-lienhe');
let isMenuOpenlinkproject3 = false;

linkprojects3.forEach(linkproject3 => {
    linkproject3.addEventListener('click', l3 => {
        l3.preventDefault();
        isMenuOpenlinkproject3 = !isMenuOpenlinkproject3;
        // linkproject.setAttribute('aria-expanded', String(isMenuOpen));
        // menu.hidden = !isMenuOpen;
        if (isMenuOpenlinkproject3) {
            bupuplinkproject3.classList.add('active');
        } else {
            bupuplinkproject3.classList.remove('active');
        }
    });
});