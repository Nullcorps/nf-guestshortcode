<?php
defined('ABSPATH') or die("No script kiddies please!");


/**
 * Plugin Name: NF_guestshortcode
 * Plugin URI:
 * Description: Adds a [guest] and [user] shortcode (and a lot more by now)
 * Version: 1.0.0
 * Author: NullCorps
 * Author URI: https://github.com/Nullcorps
 * Text Domain:
 * Domain Path:
 * Network:
 * License: GPL2
 */





add_shortcode('guest','show_guest_content');
function show_guest_content($atts,$content)
   {
   if (!is_user_logged_in())
      {
      return do_shortcode($content);
      }
   return '';
   }







add_shortcode('user','show_user_content');
function show_user_content($atts,$content = null)
   {
   global $post;
   if (!is_user_logged_in())
      {
      return '';
      // "this is for logged in users only  " . wp_login_url( get_permalink($post->ID) ) . ' to view the content' ;
      }
   return do_shortcode($content);
   }








add_shortcode('user_not_premium','show_user_not_premium_content');
function show_user_not_premium_content($atts,$content = null)
   {
   global $post;
   $show = false;

   if (is_user_logged_in())
      {
      //$content .= "Hello";
      global $current_user;
      get_currentuserinfo();

      //echo 'Username: ' . $current_user->user_login . "<br>";
      //echo 'User email: ' . $current_user->user_email . "\n";
      //echo 'User first name: ' . $current_user->user_firstname . "\n";
      //echo 'User last name: ' . $current_user->user_lastname . "\n";
      //echo 'User display name: ' . $current_user->display_name . "\n";
      //echo 'User ID: ' . $current_user->ID . "<br>";
      foreach ( $current_user->roles as $role )
         {
					//echo $role;
					if ($role == 'subscriber') { $show = true; }
					if ($role == 'premium_subscriber') { $show = false; break; }
					if ($role == 'administrator') { $show = false; break; }
					if ($role == 'editor') { $show = false; break; }
					if ($role == 'sub_level_1') { $show = false; break; }
					if ($role == 'sub_level_2') { $show = false; break; }
					if ($role == 'sub_level_3') { $show = false; break; }
				 }
      }
   if ($show == true)
      { return do_shortcode($content); }

   }








add_shortcode('not_premium','show_not_premium_content');
function show_not_premium_content($atts,$content = null)
   {
   global $post;
   $show = true;

   if (!is_user_logged_in())
      { return do_shortcode($content); }

    if (is_user_logged_in())
      {
      //$content .= "Hello";
      global $current_user;
      get_currentuserinfo();

      //echo 'Username: ' . $current_user->user_login . "<br>";
      //echo 'User email: ' . $current_user->user_email . "\n";
      //echo 'User first name: ' . $current_user->user_firstname . "\n";
      //cho 'User last name: ' . $current_user->user_lastname . "\n";
      //echo 'User display name: ' . $current_user->display_name . "\n";
      //echo 'User ID: ' . $current_user->ID . "<br>";
      foreach ( $current_user->roles as $role )
         {
			//echo $role;
			if ($role == 'subscriber') { $show = true; }
			if ($role == 'sub_level_1') { $show = false; }
			if ($role == 'sub_level_2') { $show = false; }
			if ($role == 'sub_level_3') { $show = false; }
			if ($role == 'premium_subscriber') { $show = false; }
			if ($role == 'administrator') { $show = false; }
			if ($role == 'editor') { $show = false; }
			}
      }
   if ($show == true)
      { return do_shortcode($content); }
   }








add_shortcode('premium','show_premium_content');
function show_premium_content($atts,$content = null)
   {
   global $post;
   $show = false;

   if (is_user_logged_in())
      {
      //$content .= "Hello";
      global $current_user;
      get_currentuserinfo();

      //echo 'Username: ' . $current_user->user_login . "<br>";
      //echo 'User email: ' . $current_user->user_email . "\n";
      //echo 'User first name: ' . $current_user->user_firstname . "\n";
      //echo 'User last name: ' . $current_user->user_lastname . "\n";
      //echo 'User display name: ' . $current_user->display_name . "\n";
      //echo 'User ID: ' . $current_user->ID . "<br>";
      foreach ( $current_user->roles as $role )
         {
					//echo $role;
					if ($role == 'sub_level_1') { $show = true; }
					if ($role == 'sub_level_2') { $show = true; }
					if ($role == 'sub_level_3') { $show = true; }
					if ($role == 'premium_subscriber') { $show = true; }
					if ($role == 'administrator') { $show = true; }
					if ($role == 'editor') { $show = true; }
				}
      }
   if ($show == true)
      { return do_shortcode($content); }
   }






// SAME AS ABOVE BASICALLY... 
add_shortcode('premium_subscriber','premium_subscriber');

function premium_subscriber($atts,$content = null)
   {
   global $post;
   $show = false;

   if (is_user_logged_in())
      {
      //$content .= "Hello";
      global $current_user;
      get_currentuserinfo();

      //echo 'Username: ' . $current_user->user_login . "<br>";
      //echo 'User email: ' . $current_user->user_email . "\n";
      //echo 'User first name: ' . $current_user->user_firstname . "\n";
      //echo 'User last name: ' . $current_user->user_lastname . "\n";
      //echo 'User display name: ' . $current_user->display_name . "\n";
      //echo 'User ID: ' . $current_user->ID . "<br>";
      foreach ( $current_user->roles as $role )
         {
			//echo $role;
			if ($role == 'premium_subscriber') { $show = true; }
			if ($role == 'administrator') { $show = true; }
			if ($role == 'editor') { $show = true; }
			}
      }
   if ($show == true)
      { return do_shortcode($content); }
   }







add_shortcode('editor','show_editor_content');
function show_editor_content($atts,$content = null)
   {
   global $post;
   $show = false;

   if (is_user_logged_in())
      {
      //$content .= "Hello";
      global $current_user;
      get_currentuserinfo();

      //echo 'Username: ' . $current_user->user_login . "<br>";
      //echo 'User email: ' . $current_user->user_email . "\n";
      //echo 'User first name: ' . $current_user->user_firstname . "\n";
      //echo 'User last name: ' . $current_user->user_lastname . "\n";
      //echo 'User display name: ' . $current_user->display_name . "\n";
      //echo 'User ID: ' . $current_user->ID . "<br>";
      foreach ( $current_user->roles as $role )
         {
			//echo '#' . $role . "#<br>";
			//if ($role == 'sub_level_1') { $show = true; }
			//if ($role == 'sub_level_2') { $show = true; }
			//if ($role == 'sub_level_3') { $show = true; }
			//if ($role == 'premium_subscriber') { $show = true; }
			if ($role == 'administrator') { $show = true; }
			if ($role == 'editor') { $show = true; }
			}
      }
   if ($show == true)
      { return do_shortcode($content); }
   }











add_shortcode('admin','show_admin_content');
function show_admin_content($atts,$content = null)
   {
   global $post;
   $show = false;

   if (is_user_logged_in())
      {
      //$content .= "Hello";
      global $current_user;
      get_currentuserinfo();

      //echo 'Username: ' . $current_user->user_login . "<br>";
      //echo 'User email: ' . $current_user->user_email . "\n";
      //echo 'User first name: ' . $current_user->user_firstname . "\n";
      //echo 'User last name: ' . $current_user->user_lastname . "\n";
      //echo 'User display name: ' . $current_user->display_name . "\n";
      //echo 'User ID: ' . $current_user->ID . "<br>";
      foreach ( $current_user->roles as $role )
         {
			//echo $role;
			//if ($role == 'premium_subscriber') { $show = true; }
			if ($role == 'administrator') { $show = true; }
			}
      }
   if ($show == true)
      { return do_shortcode($content); }
   }






add_shortcode('subscriber','show_subscriber_content');
function show_subscriber_content($atts,$content = null)
   {
   global $post;
   $show = false;

   if (is_user_logged_in())
      {
      //$content .= "Hello";
      global $current_user;
      get_currentuserinfo();

      //echo 'Username: ' . $current_user->user_login . "<br>";
      //echo 'User email: ' . $current_user->user_email . "\n";
      //echo 'User first name: ' . $current_user->user_firstname . "\n";
      //echo 'User last name: ' . $current_user->user_lastname . "\n";
      //echo 'User display name: ' . $current_user->display_name . "\n";
      //echo 'User ID: ' . $current_user->ID . "<br>";
      foreach ( $current_user->roles as $role )
			{
			//echo $role;
			if ($role == 'subscriber') { $show = true; }
			//if ($role == 'administrator') { $show = true; }
			}
      }
   if ($show == true)
      { return do_shortcode($content); }
   }



?>