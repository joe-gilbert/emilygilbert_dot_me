$(document).ready(function(){

	/* Single Post Masonry Plugin */
	$('.post-gallery-grid').masonry({
		columnWidth: '.grid-sizer',
		itemSelector: '.grid-item',
		percentPosition: true
	});

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
	}

}); /* END Document Ready Function */


/* Google Analytics Tracking */
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-5194968-2', 'auto');
ga('send', 'pageview');
/* END Google Analytics Tracking */