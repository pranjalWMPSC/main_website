(function($){"use strict";function handlePreloader(){if($('.preloader').length){$('.preloader').delay(200).fadeOut(500);}}

function headerStyle(){if($('.main-header').length){var windowpos=$(window).scrollTop();var siteHeader=$('.main-header');var scrollLink=$('.scroll-to-top');if(windowpos>=200){siteHeader.addClass('fixed-header');scrollLink.fadeIn(300);}else{siteHeader.removeClass('fixed-header');scrollLink.fadeOut(300);}}}

headerStyle();if($('.main-header li.dropdown ul').length){$('.main-header li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');$('.main-header li.dropdown .dropdown-btn').on('click',function(){$(this).prev('ul').slideToggle(500);});$('.main-header .main-menu li.dropdown .dropdown-btn').on('click',function(){$(this).prev('.mega-menu').slideToggle(500);});$('.fullscreen-menu .navigation li.dropdown > a').on('click',function(){$(this).next('ul').slideToggle(500);});$('.navigation li.dropdown > a').on('click',function(e){e.preventDefault();});$('.main-header .navigation li.dropdown > a,.hidden-bar .side-menu li.dropdown > a').on('click',function(e){e.preventDefault();});}

if($('.hidden-bar,.fullscreen-menu').length){var hiddenBar=$('.hidden-bar');var hiddenBarOpener=$('.nav-toggler');var hiddenBarCloser=$('.hidden-bar-closer,.close-menu');$('.hidden-bar-wrapper').mCustomScrollbar();hiddenBarOpener.on('click',function(){$('body').addClass('visible-menu-bar');hiddenBar.addClass('visible-sidebar');});hiddenBarCloser.on('click',function(){$('body').removeClass('visible-menu-bar');hiddenBar.removeClass('visible-sidebar');});}

if($('.progress-line').length){$('.progress-line').appear(function(){var el=$(this);var percent=el.data('width');$(el).css('width',percent+'%');},{accY:0});}

if($('.custom-select-box').length){$('.custom-select-box').selectmenu().selectmenu('menuWidget').addClass('overflow');}

if($('.filter-list').length){$('.filter-list').mixItUp({});}

if($('.count-box').length){$('.count-box').appear(function(){var $t=$(this),n=$t.find(".count-text").attr("data-stop"),r=parseInt($t.find(".count-text").attr("data-speed"),10);if(!$t.hasClass("counted")){$t.addClass("counted");$({countNum:$t.find(".count-text").text()}).animate({countNum:n},{duration:r,easing:"linear",step:function(){$t.find(".count-text").text(Math.floor(this.countNum));},complete:function(){$t.find(".count-text").text(this.countNum);}});}},{accY:0});}

if($('.main-slider-carousel-three').length){$('.main-slider-carousel-three').owlCarousel({animateIn:'fadeIn',animateOut:'fadeOut',loop:true,margin:0,dot:false,nav:false,autoHeight:true,smartSpeed:50,autoplay:5000,navText:['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],responsive:{0:{items:1},600:{items:1},800:{items:1},1024:{items:1},1200:{items:1}}});}

if($('.main-slider-carousel').length){$('.main-slider-carousel').owlCarousel({animateOut:'slideInDown',animateIn:'slideIn',loop:true,margin:0,nav:true,autoHeight:true,smartSpeed:500,autoplay:6000,navText:['<span class="flaticon-back-5"></span>','<span class="flaticon-next-7"></span>'],responsive:{0:{items:1},600:{items:1},800:{items:1},1024:{items:1},1200:{items:1}}});}

if($('.main-slider-carousel-two').length){$('.main-slider-carousel-two').owlCarousel({loop:true,margin:0,dot:false,nav:false,autoHeight:true,smartSpeed:500,autoplay:6000,navText:['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],responsive:{0:{items:1},600:{items:1},800:{items:1},1024:{items:1},1200:{items:1}}});}

if($('.popular-causes-carousel').length){$('.popular-causes-carousel').owlCarousel({loop:true,margin:0,nav:true,autoHeight:true,smartSpeed:500,autoplay:5000,navText:['<span class="fas fa-long-arrow-alt-left"></span>','<span class="fas fa-long-arrow-alt-right"></span>'],responsive:{0:{items:1},600:{items:1},800:{items:1},1024:{items:1},1200:{items:1}}});}

if($('.team-carousel').length){$('.team-carousel').owlCarousel({loop:true,margin:30,nav:true,autoHeight:true,smartSpeed:500,autoplay:5000,navText:['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],responsive:{0:{items:1},600:{items:1},800:{items:2},1024:{items:2},1200:{items:2}}});}

if($('.story-carousel').length){$('.story-carousel').owlCarousel({loop:true,margin:30,nav:true,autoHeight:true,smartSpeed:500,autoplay:5000,navText:['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],responsive:{0:{items:1},600:{items:1},800:{items:3},1024:{items:3},1200:{items:3}}});}

if($('.events-carousel').length){$('.events-carousel').owlCarousel({loop:true,margin:65,nav:true,autoHeight:true,smartSpeed:500,autoplay:5000,navText:['<span class="fas fa-long-arrow-alt-left"></span>','<span class="fas fa-long-arrow-alt-right"></span>'],responsive:{0:{items:1,margin:30},600:{items:1,margin:30},800:{items:2,margin:30},1024:{items:2,margin:30},1200:{items:2}}});}

if($('.testimonial-carousel').length){$('.testimonial-carousel').owlCarousel({loop:true,margin:0,nav:true,autoHeight:true,smartSpeed:500,autoplay:5000,navText:['<span class="fas fa-long-arrow-alt-left"></span>','<span class="fas fa-long-arrow-alt-right"></span>'],responsive:{0:{items:1},600:{items:1},800:{items:1},1024:{items:1},1200:{items:1}}});}

if($('.article-carousel').length){$('.article-carousel').owlCarousel({loop:true,margin:0,nav:true,autoHeight:true,smartSpeed:500,autoplay:5000,navText:['<span class="fas fa-long-arrow-alt-left"></span> Prev','Next <span class="fas fa-long-arrow-alt-right"></span>'],responsive:{0:{items:1},600:{items:1},800:{items:1},1024:{items:1},1200:{items:1}}});}

if($('.news-carousel').length){$('.news-carousel').owlCarousel({loop:true,margin:40,nav:true,autoHeight:false,smartSpeed:1000,autoplay:5000,navText:['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],responsive:{0:{items:1,margin:30},600:{items:1,margin:30},800:{items:2,margin:30},1024:{items:3,margin:30},1200:{items:4}}});}

if($('.story').length){$('.story').owlCarousel({loop:true,margin:40,nav:true,autoHeight:false,smartSpeed:1000,autoplay:5000,navText:['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],responsive:{0:{items:1,margin:30},600:{items:1,margin:30},800:{items:2,margin:30},1024:{items:3,margin:30},1200:{items:3}}});}

if($('.sponsors-carousel').length){$('.sponsors-carousel').owlCarousel({loop:true,margin:30,nav:true,smartSpeed:500,autoplay:4000,navText:['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],responsive:{0:{items:1},480:{items:2},600:{items:3},800:{items:4},1024:{items:7}}});}

if($('.plumbing-carousel').length){$('.plumbing-carousel').owlCarousel({loop:true,margin:30,nav:false,smartSpeed:500,autoplay:4000,navText:['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],responsive:{0:{items:1},480:{items:2},600:{items:3},800:{items:4},1024:{items:1}}});}

if($('.time-countdown').length){$('.time-countdown').each(function(){var $this=$(this),finalDate=$(this).data('countdown');$this.countdown(finalDate,function(event){var $this=$(this).html(event.strftime(''+'<div class="counter-column"><span class="count">%D</span><span class="unit">Days</div></div> '+'<div class="counter-column"><span class="count">%H</span><span class="unit">Hours</div></div>  '+'<div class="counter-column"><span class="count">%M</span><span class="unit">Mins</div></div>  '+'<div class="counter-column"><span class="count">%S</span><span class="unit">SECS</div></div>'));});});}

if($('.accordion-box').length){$(".accordion-box").on('click','.acc-btn',function(){var outerBox=$(this).parents('.accordion-box');var target=$(this).parents('.accordion');if($(this).hasClass('active')!==true){$(outerBox).find('.accordion .acc-btn').removeClass('active');}

if($(this).next('.acc-content').is(':visible')){return false;}else{$(this).addClass('active');$(outerBox).children('.accordion').removeClass('active-block');$(outerBox).find('.accordion').children('.acc-content').slideUp(300);target.addClass('active-block');$(this).next('.acc-content').slideDown(300);}});}

if($('.lightbox-image').length){$('.lightbox-image').fancybox({openEffect:'fade',closeEffect:'fade',helpers:{media:{}}});}

if($('#contact-form').length){$('#contact-form').validate({rules:{firstname:{required:true},email:{required:true,email:true},phone:{required:true},subject:{required:true},message:{required:true}}});}

if($('.scroll-to-target').length){$(".scroll-to-target").on('click',function(){var target=$(this).attr('data-target');$('html, body').animate({scrollTop:$(target).offset().top},1500);});}

if($('.wow').length){var wow=new WOW({boxClass:'wow',animateClass:'animated',offset:0,mobile:true,live:true});wow.init();}

$(window).on('scroll',function(){headerStyle();});$(window).on('load',function(){handlePreloader();});})(window.jQuery);

if($('.plumbing').length){$('.plumbing').owlCarousel({loop:true,margin:40,nav:true,autoHeight:false,smartSpeed:1000,autoplay:5000,navText:['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],responsive:{0:{items:1,margin:30},600:{items:2,margin:30},800:{items:2,margin:30},1024:{items:3,margin:30},1200:{items:3}}});}


if($('.press').length){$('.press').owlCarousel({loop:true,margin:40,nav:true,autoHeight:false,smartSpeed:1000,autoplay:false,navText:['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],responsive:{0:{items:1,margin:30},600:{items:1,margin:30},800:{items:1,margin:30},1024:{items:2,margin:30},1200:{items:1}}});}