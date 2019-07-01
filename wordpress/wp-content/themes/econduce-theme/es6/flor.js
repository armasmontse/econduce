(function($) {

	//cambia el logo y hace menú fix cuando haces scroll
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 100) {
	        $('#header_JS').css({
	            boxShadow: '0 0 10px rgba(0,0,0,0.15)',
	            backgroundColor: 'white',
	            position: 'fixed',
	            top: -1,
	            left: -1,
				padding: '0px',
	            width: 'calc(100% + 2px)',
	            opacity: 0
	        });
	        $('#header_JS').addClass('op1')
	        $('.header__logo--fix').css('display','flex');
	        $('.header__logo--top').css('display','none');
	        $('.header').css('color','#808080');
	        $('.header__buttons-group-btn-ingresa').css('color','#808080');
	    }
	    if ($(this).scrollTop() === 0) {
	        $('#header_JS').css('box-shadow','none');
	        $('#header_JS').css('background-color','transparent');
	        $('#header_JS').css('position','none');
			$('#header_JS').css('padding','20px 0px');
	        $('.header__logo--fix').css('display','none');
	        $('.header__logo--top').css('display','flex');
	        $('.header').css('color','white');
	        $('.header__buttons-group-btn-ingresa').css('color','white');
	    }
    });

	//menu responsive (hamburguesa)
	$(document).ready(function () {
    	var $responsive = $('#mobile-menu_JS');
    	$responsive.hide();

    	$('#mobile-button_JS').click(function () {
        	$responsive.slideToggle();
    	});

        //Slider principal
		var header = new Swiper('.header-slider_JS', {
	        paginationClickable: true,
			direction: 'horizontal',
			loop: true,
	        nextButton: '.header-slider__nav--next_JS',
	        prevButton: '.header-slider__nav--prev_JS',
			autoplay: 3000,
        	//autoplayDisableOnInteraction: false
	    });

        //slider de pasos en la página de precios
        $(".pasos_JS").slick({
            autoplay: true,
            autoplaySpeed: 4000,
            dots: true,
            infinite: true,
            customPaging : function(slider, i) {
                var thumb = $(slider.$slides[i]).data();
                return '<span>'+(i+1)+'</span>';
            }
        });

        //slider de citas en la página de precios
        $(".quotes_JS").slick({
            autoplay: true,
            autoplaySpeed: 4000,
            dots: false,
            infinite: true,
        });

        //slider de pasos en la página de precios
        $(".vacantes_slider").slick({
            autoplay: false,
            arrows: true
        });

        //Parte de arriba del slider de medios, en donde aparecen las frases
		$('.slider-for').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
		  	arrows: false,
		  	fade: true,
		  	asNavFor: '.slider-nav',
			//autoplay: true
		});

        //Parte de abajo del slider de medios, en donde aparecen los logos
		$('.slider-nav').slick({
		 	slidesToShow: 5,//IMPORTANTE: SLICK ssólo centra bien la imágen cuando usa número impares
		  	slidesToScroll: 1,
		  	asNavFor: '.slider-for',
		  	dots: false,
            touchMove: true,
            centerMode: true,
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 900,
                    settings: {
                        slidesToShow: 3,//IMPORTANTE: SLICK ssólo centra bien la imágen cuando usa número impares
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        slidesToShow: 1,//IMPORTANTE: SLICK ssólo centra bien la imágen cuando usa número impares
                        slidesToScroll: 1
                    }
                },
            ]
		});



		$('a[href*=#]').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
			&& location.hostname == this.hostname) {
			    var $target = $(this.hash);
			    $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
			    if ($target.length) {
					var targetOffset = $target.offset().top;
					$('html,body').animate({
						scrollTop: targetOffset - $('#header_JS').height()
					}, 1000);
			        return false;
			    }
			}
		});





	});



})(jQuery);
