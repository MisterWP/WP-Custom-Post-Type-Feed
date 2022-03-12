<?php
/**
 * @package WP Custom Post Type Feed
 * @version 0.1
 */
/*
Plugin Name: WP Custom Post Type Feed
Plugin URI: https://www.easyhoster.com/probleme-indexation/
Description: Create RSS Feed for WordPress Pages & Custom Post Types
Author: EasyHoster
Version: 0.1
Author URI: https://www.easyhoster.com/
*/

/* How to get a feed for post type 'page' and others? Source : https://www.easyhoster.com/probleme-indexation/ */

/**
 * Set post type to 'page' if it was requested.
 *
 * @param  object $query
 * @return void
 */
function eh_pages_in_feed( &$query )
{
	if ( isset ( $_GET['post_type'] ) && $_GET['post_type'] === 'page' && is_feed() )
	{
		$query->set( 'post_type', 'page' );
	}
	// For adding any Custom Post Type, below, remove the comment /* */ and replace "NEW_CUSTOM_POST_TYPE" by the Custom Post Type Slug which can be found in your WordPress Dashboard URL by visiting the list of your custom posts : https://example.com/wp-admin/edit.php?post_type=NEW_CUSTOM_POST_TYPE
	/* elseif ( isset ( $_GET['post_type'] ) && $_GET['post_type'] === 'NEW_CUSTOM_POST_TYPE' && is_feed() )
	{
		$query->set( 'post_type', 'NEW_CUSTOM_POST_TYPE' );
	} */
}

add_action( 'pre_get_posts', 'eh_pages_in_feed' );