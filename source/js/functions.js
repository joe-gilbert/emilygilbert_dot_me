/*********************************************
		Functions
*********************************************/
function makeObjectFixedPositioned(nonFixedObject){

	var objectToFix = $(nonFixedObject),
			objectsPosition = objectToFix.offset();

	objectToFix.css({
		'position' : 'fixed',
		'top' : objectsPosition.top,
		'left' : objectsPosition.left
	});

} /* END function makeObjectFixedPositioned */


function removeInlineStyles(styledObject){

	var objectToFix = $(styledObject);

	objectToFix.removeAttr('style');

} /* END function makeObjectFixedPositioned */


/*********************************************
		jQuery Actions
*********************************************/
$(document).ready(function(){


	/* Controls the top navigation click functionality */
	$('.hamburger-menu-control').on('click', function(e){
		/* Prevent the default anchor jump */
		e.preventDefault();

		/* Toggle the class 'active-navi' on the hamburger menu's parent nav */
		$(this).parent('nav').toggleClass('active-navi');

		/* Make the hamburger menu control fixed position to prevent jump when the scroll bar is visible. */
		if( $('.active-navi').length ){
			makeObjectFixedPositioned('.hamburger-menu-control');
		}else{
			removeInlineStyles('.hamburger-menu-control');
		}

		/* Prevent window scrolling */
		$('html, body').toggleClass('overlay-no-scroll');

	}); /* END. On .hamburger-menu-control click */


	/* Single Post Masonry Plugin */
	if( $('.post-gallery-grid').length ){

		var $masonryGrid = $('.post-gallery-grid').masonry({
			columnWidth: '.grid-sizer',
			itemSelector: '.grid-item',
			percentPosition: true
		});

		/* layout Masonry after each image loads */
		$masonryGrid.imagesLoaded().progress( function() {
			$masonryGrid.masonry('layout');
		});
	} /* END if .post-gallery-gird length */


	/* Homepage Gallery Slider Functionality */
	if( $('.gallery-slider').length ){
		$('.gallery-slider').responsiveSlides({
		  auto: true,						// Boolean: Animate automatically, true or false
		  speed: 500,						// Integer: Speed of the transition, in milliseconds
		  timeout: 5000,				// Integer: Time between slide transitions, in milliseconds
		  pager: false,					// Boolean: Show pager, true or false
		  nav: false,						// Boolean: Show navigation, true or false
		  random: false,				// Boolean: Randomize the order of the slides, true or false
		  pause: false,					// Boolean: Pause on hover, true or false
		  pauseControls: true,	// Boolean: Pause when hovering controls, true or false
		  namespace: "slider"		// String: Change the default namespace used
		});
	} /* END if .gallery-slider length */


}); /* END Document Ready Function */


/*********************************************
		Google Analytics Tracking
*********************************************/
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-5194968-2', 'auto');
ga('send', 'pageview');
/* END Google Analytics Tracking */