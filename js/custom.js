// Jquery with no conflict
jQuery(document).ready(function($) {

	/*-----------------------------------------------------------------------------------*/
	/*	Slides
	/*-----------------------------------------------------------------------------------*/
	
	$('#slides').slides({
		preload: true,
		preloadImage: 'img/loading.gif',
		effect: 'slide, slide',
		crossfade: true,
		slideSpeed: 200,
		fadeSpeed: 500,
		generateNextPrev: false,
		generatePagination: false
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
	
	/*-----------------------------------------------------------------------------------*/
	/*	Waypoints
	/*-----------------------------------------------------------------------------------*/
	
	var sections = $('article');
	var navigation_links = $('#subnav-icons li');
	
	
	sections.waypoint({
		handler: function(event, direction){
			
			var active_section;
			active_section = $(this);
			if(direction === "up") active_section = active_section.prev();
			
			var active_link = $('#subnav-icons a[href="#' + active_section.attr("id") + '"]');
			active_link = $('#subnav-icons li.' + active_section.attr("id") );
			
			navigation_links.removeClass('active');
			active_link.addClass('active');
		},
		offset: 70
	});
	
	// Scrollto
	
	navigation_links.click(function(event){
		$.scrollTo(
			$(this).children('a').attr("href"),
			{
				duration: 600,
				offset: {'left':0, 'top':-70}
			}
		);
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






