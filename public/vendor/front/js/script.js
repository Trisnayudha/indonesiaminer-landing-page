(function ($) {
	'use strict';

	window.mobileAndTabletCheck = function() {
		let check = false;
		(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
		return check;
	};

	$(window).bind('load', function () {
		// preloader
		function preLoader() {
			$('body').addClass('loaded');
			$('.preloader').addClass('loaded');
		}
		setTimeout(function () {
			preLoader();
		}, 600);
	});

	$(window).on('scroll', function () {
		var inMobile = mobileAndTabletCheck();

		// scroll to top
		var scrollToTop = $('.scroll-to-top-btn'),
			scroll = $(window).scrollTop();
		if (scroll >= 400) {
			scrollToTop.addClass('show');
		} else {
			scrollToTop.removeClass('show');
		}

		// scroll to top
		// var scrollToTopVideo = $('.box__vid-main'),
			// scrollWin = $(window).scrollTop();
		// if (inMobile === true) {
		// 	scrollToTopVideo.addClass('mobile-vid');
		// } else {
			// if (scrollWin >= 400) {
			// 	scrollToTopVideo.addClass('mobile-vid');
			// } else {
			// 	scrollToTopVideo.removeClass('mobile-vid');
			// }
		// }

		var headerNav = $('.header-nav');
		var checkHeader = false;
		if (headerNav.hasClass('bg-transparent') === true) {
			checkHeader = true;
		} else if (headerNav.hasClass('bg-light') === true) {
			checkHeader = true;
		}

		if (checkHeader) {
			// if (scroll > 80) {
			// 	headerNav.removeClass('bg-transparent');
			// 	headerNav.addClass('bg-light');
			// } else {
			// 	headerNav.addClass('bg-transparent');
			// 	headerNav.removeClass('bg-light');
			// }

			if (inMobile === true) {
				$('.header-nav .nav-item .nav-link').css('color', 'black');
			} else {
				// if (scroll > 80) {
					$('.header-nav .nav-item .nav-link').css('color', 'black');
				// } else {
				// 	$('.header-nav .nav-item .nav-link').css('color', 'white');
				// }
			}
		}
	});

	// aos scroll-animation Init
	function aosAnim() {
		AOS.init({
			duration: 600,
			once: true
		});
	}
	setTimeout(function () {
		aosAnim();
	}, 1700);

	$(document).ready(function () {
		function getHeightDetailCompany() {
			let ChangeHeight = 0;
			let headerCompany = $('#company-detail-header').height();
			let bodyCompany = $('#company-detail-body').height();
			let buttonCompany = $('#company-detail-button').height();
			if (headerCompany != null) {
				ChangeHeight += headerCompany;
			}
			if (bodyCompany != null) {
				ChangeHeight += bodyCompany;
			}
			if (buttonCompany != null) {
				ChangeHeight += buttonCompany;
			}
			if (ChangeHeight !== 0) {
				ChangeHeight += 30;
				$('.box__vid-main').css('height', ChangeHeight);
			}
		}
		setTimeout(() => {
			getHeightDetailCompany();
		}, 1000);
		function getHeight() {
			let boxCompany = $('.col-2-5 .box-company').width();
			let boxProduct = $('.col-2-5 .box-product').width();
			let boxTimeline = $('.box-timeline').width();
			let boxNewsContentLg = $('.box__news-content-lg').width();
			let boxNewsContentSm = $('.box__news-content-sm').width();

			var maxHeight = 0;

			$('.col-2-5 .box-product .body').each(function(){
				var thisH = $(this).height();
				if (thisH > maxHeight) { maxHeight = thisH; }
			});

			$('.col-2-5 .box-product .body').css('height', `${maxHeight + 20}px`);
			
			if (boxCompany != null) {
				$('.col-2-5 .box-company .image').css('height', boxCompany);
			}
			if (boxProduct != null) {
				$('.col-2-5 .box-product .image').css('height', boxProduct);
			}
			if (boxTimeline != null) {
				$('.box-timeline .image').css('height', boxTimeline);
			}
			if (boxNewsContentLg != null) {
				boxNewsContentLg = boxNewsContentLg * 450 / 800;
				$('.box__news-content-lg').css('height', boxNewsContentLg);
			}
			if (boxNewsContentSm != null) {
				boxNewsContentSm = boxNewsContentSm * 450 / 800;
				$('.box__news-content-sm').css('height', boxNewsContentSm);
			}

		}
		setTimeout(() => {
			getHeight();
		}, 1000);
		function getHeightNews() {
			let boxNewsUpdate = $('.box-news-update .image').width();
			
			if (boxNewsUpdate != null) {
				boxNewsUpdate = boxNewsUpdate * 450 / 800;
				console.log(boxNewsUpdate);
				$('.box-news-update .image').css('height', boxNewsUpdate);
			}

		}

		setTimeout(() => {
			getHeightNews();
		}, 1000);

		function changeHeightCompany() {
			let heights = $(".list-plat-company .content-company").map(function ()
				{
					return $(this).height();
				}).get();
			let titleHeights = $(".list-plat-company .title-com-wrapper").map(function ()
				{
					return $(this).height();
				}).get();

			let textHeights = $(".list-plat-company .text-com").map(function ()
				{
					return $(this).height();
				}).get();

			let maxHeight = Math.max.apply(null, heights) + 50;
			let maxTitleHeights = Math.max.apply(null, titleHeights);
			let maxTextHeight = Math.max.apply(null, textHeights);
			$('.list-plat-company .content-company').css('height', `${maxHeight}px`);
			$('.list-plat-company .title-com-wrapper').css('height', `${maxTitleHeights}px`);
			$('.list-plat-company .text-com').css('height', `${maxTextHeight}px`);
		}

		setTimeout(() => {
			changeHeightCompany()
		}, 1000);

		if ($(window).width() < 1199) {
			$('.navbar .dropdown-toggle').on('click', function (e) {
				$(this).siblings('.dropdown-menu, .dropdown-submenu').animate({
					height: 'toggle'
				}, 300);
			});
		}

		// disable accordion collapse toogle
		$('.disable-toogle').on('hide.bs.collapse', function (e) {
			e.preventDefault();
		});

		// popupFix init
		function popupFix() {
			var vScrollWidth = window.innerWidth - $(document).width();

			function noBodyScroll() {
				$('body').css({
					// 'padding-right': vScrollWidth + 'px',
					'overflow-y': 'hidden'
				});
			}

			function doBodyScroll() {
				setTimeout(function () {
					$('body').css({
						'padding-right': 0,
						'overflow-y': 'auto'
					});
				}, 300);
			}

			var navbarToggler = $('.navbar-toggler');
			$(navbarToggler).on('click', function () {
				if (navbarToggler.attr('aria-expanded') === 'false') {
					noBodyScroll();
				}
				if (navbarToggler.attr('aria-expanded') === 'true') {
					doBodyScroll();
				}
			});
		}
		popupFix();

		// smoothScroll init
		function smoothScroll() {
			$('.smooth-scroll').click(function (event) {
				if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
					if (target.length) {
						event.preventDefault();
						$('html, body').animate({
							scrollTop: target.offset().top
						}, 300, function () {
							var $target = $(target);
							$target.focus();
							if ($target.is(':focus')) {
								return false;
							} else {
								$target.attr('tabindex', '-1');
								$target.focus();
							}
						});
					}
				}
			});
		}
		smoothScroll();

		$(window).resize(function () { 
			getHeight();
			getHeightDetailCompany();
			getHeightNews();
			changeHeightCompany();
		});
	});

	// function speakerCarousel() {
	// 	$('.speaker-carousel').slick({
	// 		dots: false,
	// 		arrows: true,
	// 		infinite: true,
	// 		speed: 900,
	// 		autoplay: true,
	// 		autoplaySpeed: 5000,
	// 		mobileFirst: true,
	// 		slidesToShow: 2,
	// 		slidesToScroll: 2,
	// 		centerPadding: '60px',
	// 		responsive: [{
	// 				breakpoint: 1200,
	// 				settings: {
	// 					slidesToShow: 3
	// 				}
	// 			},
	// 			{
	// 				breakpoint: 991,
	// 				settings: {
	// 					slidesToShow: 3
	// 				}
	// 			},
	// 			{
	// 				breakpoint: 767,
	// 				settings: {
	// 					slidesToShow: 2
	// 				}
	// 			},
	// 			{
	// 				breakpoint: 480,
	// 				settings: {
	// 					slidesToShow: 1
	// 				}
	// 			},
	// 			{
	// 				breakpoint: 0,
	// 				settings: {
	// 					slidesToShow: 1
	// 				}
	// 			}
	// 		]
	// 	});
	// }
	// speakerCarousel();

	// function adsCarousel() {
	// 	$('.ads-carousel').slick({
	// 		dots: true,
	// 		arrows: false,
	// 		infinite: true,
	// 		speed: 900,
	// 		autoplay: true,
	// 		autoplaySpeed: 5000,
	// 		mobileFirst: true,
	// 		slidesToScroll: 1,
	// 		responsive: [{
	// 				breakpoint: 1200,
	// 				settings: {
	// 					slidesToShow: 1
	// 				}
	// 			},
	// 			{
	// 				breakpoint: 991,
	// 				settings: {
	// 					slidesToShow: 1
	// 				}
	// 			},
	// 			{
	// 				breakpoint: 767,
	// 				settings: {
	// 					slidesToShow: 1
	// 				}
	// 			},
	// 			{
	// 				breakpoint: 480,
	// 				settings: {
	// 					slidesToShow: 1
	// 				}
	// 			},
	// 			{
	// 				breakpoint: 0,
	// 				settings: {
	// 					slidesToShow: 1
	// 				}
	// 			}
	// 		]
	// 	});
	// }
	// adsCarousel();
})(jQuery);

'use strict';
;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.upload-file');
	var className = $('.upload-file');
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			readURL(this);

			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector('.namefile').innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		function readURL(input) {
			if (input.files) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('.file-'+className.attr('id').replace('uploadfile-', '')).attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);

				label.querySelector('.content').classList.add('black-upload');
				label.querySelector('.namefile').classList.add('white-textupload');
				label.querySelector('.ri-upload-cloud-line').style.display = 'none';
			} else {
				label.querySelector('.content').classList.remove('black-upload');
				label.querySelector('.namefile').classList.remove('white-textupload');
				label.querySelector('.ri-upload-cloud-line').style.display = 'block';
			}
		}

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}( document, window, 0 ));

const modalFilterCategories = (open = false) => {
    if (open) {
        $("#modalFilterCategories").modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });
    } else {
        $("#modalFilterCategories").modal('hide');
    }
}