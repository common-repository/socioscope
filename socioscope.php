<?php
/**
 * Plugin Name: SocioScope
 * Description: Enables Facebook, Twitter and Email Share Button on Posts
 * Version:     0.0.2
 * Author:      Engramium
 * Author URI:  www.engramium.com/
 * Text Domain: socioscope
 * Domain Path: /languages/
 *
 */

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) exit;

// Social Share Code Starts here

add_shortcode( 'socioscope', 'socioscope_shortcode' );
function socioscope_shortcode() {
	ob_start();
	echo '<div class="socioscope">';
	echo '<a href="https://www.facebook.com/sharer/sharer.php?t=' . get_the_title() . '&u=' . get_permalink() . '" title="' . esc_html( 'Share on Facebook', 'socioscope' ) . '" class="facebook" target="_blank"><span class="icon"><svg viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path fill="currentColor" d="m22.676 0h-21.352c-.731 0-1.324.593-1.324 1.324v21.352c0 .732.593 1.324 1.324 1.324h11.494v-9.294h-3.129v-3.621h3.129v-2.675c0-3.099 1.894-4.785 4.659-4.785 1.325 0 2.464.097 2.796.141v3.24h-1.921c-1.5 0-1.792.721-1.792 1.771v2.311h3.584l-.465 3.63h-3.119v9.282h6.115c.733 0 1.325-.592 1.325-1.324v-21.352c0-.731-.592-1.324-1.324-1.324" /></svg></span><span class="text">' . esc_html( 'facebook', 'socioscope' ) . '</span></a>';
	echo '<a href="https://twitter.com/intent/tweet?text=' . get_the_title() . '&url=' . get_permalink() . '" title="' . esc_html( 'Share on Twitter', 'socioscope' ) . '" class="twitter" target="_blank"><span class="icon"><svg viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path fill="currentColor" d="m23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124-4.09-.193-7.715-2.157-10.141-5.126-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548z" /></svg></span><span class="text">' . esc_html( 'twitter', 'socioscope' ) . '</span></a>';
	echo '<a href="mailto:?subject=' . get_the_title() . '&body=' . get_permalink() . '" title="' . esc_html( 'Share over Email', 'socioscope' ) . '" class="email" target="_blank"><span class="icon"><svg viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path fill="currentColor" d="M21.386 2.614H2.614A2.345 2.345 0 0 0 .279 4.961l-.01 14.078a2.353 2.353 0 0 0 2.346 2.347h18.771a2.354 2.354 0 0 0 2.347-2.347V4.961a2.356 2.356 0 0 0-2.347-2.347zm0 4.694L12 13.174 2.614 7.308V4.961L12 10.827l9.386-5.866v2.347z" /></svg></span><span class="text">' . esc_html( 'email', 'socioscope' ) . '</span></a>';
	echo '</div>';
	echo '<style>.socioscope,.socioscope *{box-sizing:border-box!important;-webkit-tap-highlight-color:transparent!important;transition:all .5s ease!important;padding:0!important;border:0!important;margin:0!important}.socioscope{font-size:0!important;margin:30px 0!important}.socioscope a{display:inline-block!important;width:33%!important;min-width:120px!important;font-family:arial!important;font-size:16px!important;color:#fff!important;text-align:center!important;text-decoration:none!important;text-shadow:none!important;line-height:0!important;padding:15px 0!important;background:#000!important;box-shadow:none!important}.socioscope a.facebook{background:#3B5998!important}.socioscope a.twitter{background:#1DA1F2!important}.socioscope a.email{background:#222!important}.socioscope a.print{background:#777!important}.socioscope a:hover{opacity:.8!important}.socioscope .icon{display:inline-block!important;width:20px!important;height:20px!important}.socioscope .text{position:relative!important;top:-4px!important;margin-left:10px!important}.widget-area .socioscope a{min-width:0!important}.widget-area .socioscope .text{display:none!important}@media(max-width:576px){.socioscope a{min-width:0!important}.socioscope .text{display:none!important}}</style>';
	$output = ob_get_clean();
	return $output;
}

add_filter( 'the_content', 'socioscope_before_after' );
function socioscope_before_after( $content ) {
	if ( is_single() ) {
		$beforecontent = do_shortcode( '[socioscope]' );
		$aftercontent = do_shortcode( '[socioscope]' );
		$fullcontent = $beforecontent . $content . $aftercontent;
	} else {
		$fullcontent = $content;
	}
	return $fullcontent;
}



// Social Share Code Ends