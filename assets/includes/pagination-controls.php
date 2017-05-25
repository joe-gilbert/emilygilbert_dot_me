<?php
	the_posts_pagination( array(
		'mid_size' => 3,
		'prev_text' => __( '&lsaquo;', 'textdomain' ),
		'next_text' => __( '&rsaquo;', 'textdomain' ),
		'screen_reader_text' => __( 'Older Shoots', 'textdomain' )
	) );
?>