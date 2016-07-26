=== User Profile ===
	Contributors: pickplugins
	Donate link: http://paratheme.com
	Tags: user profile, Custom User Profile
	Requires at least: 3.8
	Tested up to: 4.3.1
	Stable tag: 1.5
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html

	Creating unlimited user profile field and awesome author profile.

== Description ==


By this plugin you can create unlimited user input field on user profile and display anywhere via shortcodes.

We have designed special author profile for users as like social profile. displaying author latest post, comment and about.

### User Profile by http://paratheme.com

* [Plugin Page!&raquo;](http://paratheme.com/items/user-profile-awesome-user-profile-page-for-wordpress/)
* [Support!&raquo;](http://paratheme.com/qa/)

<strong>Plugin Features</strong><br />

* Responsive admin settings.
* Easy way to create input field on user profile.
* Unlimited user profile field.

N.B. We are working on this plugin making some fancy social feature.


<strong>Short-code for Author Profile</strong>

This short-code for user profile, you can paste short-code anywhere on content by fixed author id or auhtor.php page by making dynamic author id.
Display on content:

`[up_author_profile themes="flat" id="1"]`

Display on author.php

`<?php
$author = get_queried_object();
$authorid = $author->ID;
echo do_shortcode( '[up_author_profile themes="flat" id="'.$authorid.'"]' ); 
?>`

<strong>Post feed</strong>
Display list of post followed authors

`[up_follower_post_feed]`


== Installation ==

1. Install as regular WordPress plugin.<br />
2. Go your plugin setting via WordPress Dashboard and find "<strong>User Profile</strong>" activate it.<br />

After activate plugin you will see "User Profile" menu at left side on WordPress dashboard.<br />

<strong>Short-code for Author Profile</strong>

This short-code for user profile, you can paste short-code anywhere on content by fixed author id or auhtor.php page by making dynamic author id.
Display on content:

`[up_author_profile themes="flat" id="1"]`

Display on author.php

`<?php
$author = get_queried_object();
$authorid = $author->ID;
echo do_shortcode( '[up_author_profile themes="flat" id="'.$authorid.'"]' ); 
?>`

<strong>Post feed</strong>
Display list of post followed authors

`[up_follower_post_feed]`


== Screenshots ==

1. screenshot-1
2. screenshot-2
3. screenshot-3

== Changelog ==


	= 1.5 =
	
    * 21/09/2015 add - total followers count.
    

	= 1.4 =
	
    * 15/09/2015 add - post feed for followers.

	= 1.3 =
	
    * 15/01/2015 add - Added author follow features.
    * 15/01/2015 Fix - Content float issue.   
    * 18/12/2014 Fix - Cover image repeat problem fixed.    

	= 1.2 =
	
    * 18/12/2014 Fix - Remove save changes from setting page.
    * 18/12/2014 add - Added empty profile image.
    * 18/12/2014 add - Added empty cover image.

	= 1.1 =
	
    * 07/11/2014 Fix - Empty post issue.
    * 07/11/2014 Fix - Empty commemts issue.
    * 07/11/2014 Fix - Empty porfile description issue.

	= 1.0 =
	
    * 05/11/2014 Initial release.
