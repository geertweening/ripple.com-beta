// Jquery with no conflict
jQuery(document).ready(function($) {

	/*-----------------------------------------------------------------------------------*/
	/*	Slides
	/*-----------------------------------------------------------------------------------*/
	
	/*$('#slides').slides({
		preload: true,
		preloadImage: 'img/loading.gif',
		effect: 'slide, slide',
		crossfade: true,
		slideSpeed: 2000,
		fadeSpeed: 2000,
		generateNextPrev: false,
		generatePagination: false
	});*/

  /*-----------------------------------------------------------------------------------*/
  /*	Carousel
  /*-----------------------------------------------------------------------------------*/

  var carousel = $('#slides').carousel({
    pagination: false,
    nextPrevActions: false
  });

  $('#slides .pagination li').mouseenter(function(){
    var id = $(this).find('a').attr('href');
    $('#slides .pagination li').removeClass('current');
    $(this).addClass('current');
    carousel.carousel('goToItem', $('#' + id));
  });

  $('#slides .pagination a').click(function(e){
    e.preventDefault();
  });

	/*-----------------------------------------------------------------------------------*/
	/*	Sticky Menu
	/*-----------------------------------------------------------------------------------*/
	
	// calculate the height of the header
	// Use outerheight instead of height if have padding 
	var aboveHeight = $('header').outerHeight();
	
	
	// When scroll
	$(window).scroll(function(){
		
		// If scrolled down more than the header's height
		if( $(window).scrollTop() > aboveHeight ){
			
			// if yes, add “fixed” class to the <nav>
	        // add padding top to the #content 
            // (value is same as the height of the nav)
            
            $('#subnav').addClass('fixed').css('top', '0').next().css('padding-top', '60px');
			
		}else{
			
			// when scroll up or less than aboveHeight,
            // remove the “fixed” class, and the padding-top
               
            $('#subnav').removeClass('fixed').next().css('padding-top', '0');
		}
		
	});
	
	/*-----------------------------------------------------------------------------------*/
	/*	Subnavigation active arrow
	/*-----------------------------------------------------------------------------------*/
	
	$('#subnav li').click(function(){
		$('#subnav li').removeClass('active');
		$(this).addClass('active');
	});

  // Scroll Spy

  $('section').each(function(i) {
    var position = $(this).position();
    $(this).scrollspy({
      min: position.top,
      max: position.top + $(this).height(),
      onEnter: function(element, position) {
        $("#subnav-icons li").removeClass('active');
        $("#subnav-icons ." + $(element).find('.anchor').attr('id')).addClass('active');
      }
    });
  });

}); // jquery






