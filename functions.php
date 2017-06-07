<?php

/*
 * Removes the emoji html head scripts and other garbage included after the 4.2 update
------------------------------------------------------------------------*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/*
 * Add Post thumbnail (featured image) support
------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
} /* END if function exists add_theme_support */


/*
 * Returns the string 'post-id-#' where '#' is specific to page or post
------------------------------------------------------------------------*/
if ( !function_exists('post_or_page_specific_class') ) {
	function post_or_page_specific_class() {

		switch (TRUE):

			case is_category():
				$lp_permalink = basename( $_SERVER['REQUEST_URI'] );
				$class = $lp_permalink . "-category category-lp";
				break;

			case is_home():
				$class = 'homepage';
				break;

			case is_page():
				$lp_permalink = basename( get_permalink() );
				$class = $lp_permalink . '-lp';
				break;

			case is_search():
			case is_404():
				$class = "search-lp";
				break;

			case is_single():
				$post_identification_number = get_the_ID();
				$class = "post-id-" . $post_identification_number . " single-post";
				break;

			default:
				$class = '';
				break;

		endswitch;


		return $class;

	} /* END post_or_page_specific_class */

} /* END if function exists post_or_page_specific_class */


/*
 * Custom post photo gallery formatting
------------------------------------------------------------------------*/
if ( !function_exists('custom_post_gallery_format') ) {

	function custom_post_gallery_format( $string, $attr ) {
		$post = get_post();

		static $instance = 0;
		$instance++;

		if ( ! empty( $attr['ids'] ) ) {
			if ( empty( $attr['orderby'] ) ) {
				$attr['orderby'] = 'post__in';
			}
			$attr['include'] = $attr['ids'];
		}

		$html5 = current_theme_supports( 'html5', 'gallery' );
		$atts = shortcode_atts( array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post ? $post->ID : 0,
			'itemtag'    => $html5 ? 'figure'     : 'dl',
			'icontag'    => $html5 ? 'div'        : 'dt',
			'captiontag' => $html5 ? 'figcaption' : 'dd',
			'columns'    => 3,
			'size'       => 'large',
			'include'    => '',
			'exclude'    => '',
			'link'       => ''
		), $attr, 'gallery' );

		$id = intval( $atts['id'] );

		if ( ! empty( $atts['include'] ) ) {
			$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif ( ! empty( $atts['exclude'] ) ) {
			$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
		} else {
			$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
		}

		if ( empty( $attachments ) ) {
			return '';
		}

		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment ) {
				$output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
			}
			return $output;
		}


		if ( is_home() ){

			/* Initial gallery wrapping output */
			$output = '
				<ul class="gallery-slider">
			';

			/* Iterate through each gallery image and wrap with a figure html element */
			foreach ( $attachments as $id => $attachment ) {

				$attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';

				$image_output = wp_get_attachment_image( $id, $atts['size'], false );

				$image_meta  = wp_get_attachment_metadata( $id );

				$output .= "<li>";
				$output .= $image_output;
				$output .= "</li>\n";
			}

			/* Closing gallery wrapping output */
			$output .= "</ul>";



		} else {

			/* Initial gallery wrapping output */
			$output = '
				<section class="post-gallery-grid gallery-columns-'. $atts['columns'] .' clear-fix">
					<div class="grid-sizer"></div>
			';

			/* Iterate through each gallery image and wrap with a figure html element */
			foreach ( $attachments as $id => $attachment ) {

				$attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';

				$image_output = wp_get_attachment_image( $id, $atts['size'], false, 'class=grid-image' );

				$image_meta  = wp_get_attachment_metadata( $id );

				$output .= "<figure class=\"grid-item\">";
				$output .= $image_output;
				$output .= "</figure>\n";
			}

			/* Closing gallery wrapping output */
			$output .= "</section>";

		}

		return $output;

	} /* END function custom_post_gallery_format */

	add_filter('post_gallery', 'custom_post_gallery_format', 10, 2); /* hook name, function name, execution priority, accepted arguments. */

} /* END if function exists custom_post_gallery_format */


/*
 * Enables the 'Formats' dropdown on the TinyMCE editor.
------------------------------------------------------------------------*/
if ( !function_exists('wpb_mce_buttons_2') ) {

	function wpb_mce_buttons_2( $buttons ) {
		array_unshift($buttons, 'styleselect');
		return $buttons;
	}

	add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

} /* END if function exists wpb_mce_buttons_2 */


/*
 * Replaces any styles under the 'Formats' TinyMCE dropdown with the ones defined below.
-----------------------------------------------------------------------------------------*/
if ( !function_exists('my_mce_before_init_insert_formats') ) {

	function my_mce_before_init_insert_formats( $init_array ) {

		/* Define the style_formats array. Each array child is a format with it's own settings. */
		$style_formats = array(
			array(
				'title' => 'Narrow Text',
				'block' => 'p',
				'classes' => 'narrow-column',
				'wrapper' => false
			)
		);

		/* Insert the array, JSON ENCODED, into 'style_formats' */
		$init_array['style_formats'] = json_encode( $style_formats );

		return $init_array;

	}

	/* Attach callback to 'tiny_mce_before_init' */
	add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

} /* END if function exists my_mce_before_init_insert_formats */


/*
 * Custom backend settings Menu
------------------------------------------------------------------------*/
class CustomSettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin',
            'Custom Settings',
            'manage_options',
            'custom-setting-admin',
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'custom_option_name' );
        ?>
        <div class="wrap">
            <h1>Custom Settings</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'custom_option_group' );
                do_settings_sections( 'custom-setting-admin' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'custom_option_group', // Option group
            'custom_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Homepage Gallery Image ID Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'custom-setting-admin' // Page
        );

        add_settings_field(
            'gallery_image_ids', // ID
            'Gallery Image IDs', // Title
            array( $this, 'gallery_image_ids_callback' ), // Callback
            'custom-setting-admin', // Page
            'setting_section_id' // Section
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['gallery_image_ids'] ) )
            $new_input['gallery_image_ids'] = esc_attr( $input['gallery_image_ids'] );

        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your comma separated image IDs below:';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function gallery_image_ids_callback()
    {
        printf(
        	'<textarea type="textarea" id="gallery_image_ids" name="custom_option_name[gallery_image_ids]" cols="50" rows="6">%s</textarea>',
            isset( $this->options['gallery_image_ids'] ) ? esc_attr( $this->options['gallery_image_ids']) : ''
        );
    }
} /* END class CustomSettingsPage */

if( is_admin() )
    $custom_settings_page = new CustomSettingsPage();

?>