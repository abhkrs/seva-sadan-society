jQuery(document).ready(function ($) {
	$('.approach-item').matchHeight();
  $('.testimnial-item .desc').matchHeight();  
  $('.testimnial-item .fw-bold').matchHeight();  

  $('.round-4-design .text').matchHeight();  
  $('.round-4-design h3').matchHeight();  
});




   



document.addEventListener("DOMContentLoaded", () => {
	const elements = document.querySelectorAll('.animate-this');

	const observer = new IntersectionObserver((entries) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				entry.target.classList.add('animated');
				observer.unobserve(entry
					.target);
			}
		});
	}, {
		threshold: 0.1
	});

	elements.forEach(element => {
		observer.observe(element);
	});
});

jQuery(document).ready(function ($) {
$(".testimonial").owlCarousel({
	autoplay: false,
	loop: true,
	margin: 20,
	stagePadding: 0,
	nav: false,
	items: 1,
	dots: true,
	responsive:{
        0:{
            items:1,
        },

        580:{
            items:1.1,
        },
        778:{
            items:1.6,
            stagePadding: 100
        },
        1280:{
            items:2,
            stagePadding: 120
        },
        1400:{
            items:2,
            stagePadding: 150,
        }
    }
});


$(".blog-slide").owlCarousel({
    autoplay: true,
    loop: true,
    margin: 20,
    stagePadding: 0,
    nav: false,
    items: 1,
    dots: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1.5
        },
        1280: {
            items: 2,
        }
    },
    onInitialized: adjustMatchHeight,
    onResized: adjustMatchHeight,
    onTranslated: adjustMatchHeight
});

function adjustMatchHeight() {
    $('.blog-slide .match').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
    });
}


let $approach = $(".approach");

$(".prev").on("click", function() {
  $approach.trigger("prev.owl.carousel");
});
$(".next").on("click", function() {
  $approach.trigger("next.owl.carousel");
});

$(".approach").owlCarousel({
	autoplay: true,
	loop: true,
	margin: 20,
	stagePadding: 0,
	nav: false,
  dots:false,
	items: 1,
	dots: false,
	responsive:{
        0:{
            items:1
        },
        1280:{
            items: 1.6
        },
        1400:{
            items:1.5
        }
    }
});

});

  // header

  var header = document.getElementById("header");
  var stop = (header.offsetTop - 60);

  window.onscroll = function (e) {
    var scrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
    if (scrollTop >= 200) {
      header.className = 'stick';
    } else {
      header.className = '';
    }

  }
  
//   Active Link Menu

//   $(function () {
//     var url = window.location.pathname.replace(/\/$/, '');
//     var isHomePage = (url === '' || url === '/');
//     // console.log(url);
//     // console.log(isHomePage);
//     $('.navbar-nav .nav-item a').each(function () {
//         var linkUrl = $(this).attr('href').replace(/\/$/, '');

//         if (isHomePage) {
//             $('#homeid').addClass('active');
//         } else {
//             var urlRegExp = new RegExp(url + "$");
//             if (urlRegExp.test(linkUrl)) {
//                 $(this).addClass('active');
//             } else {
//                 $(this).removeClass('active');
//             }
//         }
//     });
// });
	
