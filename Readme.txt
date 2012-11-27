=== SeoPress ===
Contributors: svenl77,mahype,slaFFik
Tags: seo,buddypress,wpmu,wp,searchengine optimization,networked blogs,title,meta,meta description,meta keywords,noindex,facebook,open graph
Requires at least: 2.9.x
Tested up to: 3.4.x & Buddypress 1.6.x
Stable tag:  1.2.3

Searchengine optimization plugin for Wordpress & Buddypress

== Description ==
<h3>SeoPress is search engine optimization for</h3>


    * WordPress,
    * WordPress Networked Blogs
    * and Buddypress.


<strong>NEW: Optimize your Posts/Pages for Facebook!</strong>

<h3>Features</h3>

	* Setup Title, Description and Keywords of your WordPress, WordPress sites and Buddypress pages.
	* Optimize your Posts/Pages for Facebook
	* Ban searchengines from your sites (noindex)
	* Autocomplete Special Tags for wordpress values
	* Action hooks for 3rd party plugins
	* Add your own special tags


<h3>Screenshot</h3>
<img src="http://themekraft.com/wp-content/uploads/2010/11/screenshot-seopress.jpg" alt="" title="SeoPress Screenshot" width="530" height="340" class="alignnone size-full wp-image-1796" />

<h3>How the plugin works</h3>
SeoPress automaticaly detects your WordPress configuration and offers you the options you need to setup the different page types of WordPress and Buddypress. Just activate it and all values you can set will be shown!

= Page types =
Your WordPress page has a lot of page types like home, posts, pages, categories and so on. Every page type needs a different setup to have an optimal result in searchengines. SeoPress offers you all page types and shows you the values you can edit on these pages.

= Special Tags =
Use the special tags like %%site_name%% (for getting name of the site) and use it in your page types. The special tag autocomplete will help you to find the right ones.

<h3>Buddypress Support</h3>
SeoPress is the only plugin for WordPress which offers you to setup the meta data of the BuddyPress page types. It automaticaly recognizes if BuddyPress is activated and shows you all options to optimize your different page types.

<h3>Languages</h3>
SeoPress is multilingual and supports the following languages:

* English
* German

Feel free to support the community. Send us your language files to team[at]themekraft.com and we we will add it in the next update!

<h3>SeoPress API</h3>
You need more special tags or do you want to extend your own plugin to support SeoPress with own page types and your own special tags? Just use the API! You can add new page types and Special tags by using hooks and functions we have added to SeoPress. Just take a look at our code and communicate with SeoPress! A documentation is in progress.


For bug report and feature requests please go to:<br><br>
https://github.com/Themekraft/SeoPress-Free/issues or to http://themekraft.com/groups/seopress/forum/

No lose of individual page settings (Meta's&Title) if used "All in One Seo" and "WPSeo"  before.

<br>
== Installation ==
1. Upload 'SeoPress' to the '/wp-content/plugins/' directory<br>
2. a) If you use standard Wordpress installation:<br>
Activate the plugin through the 'Plugins' menu in WordPress<br>
2. b) If you use multiple Blog installation:<br>
Activate the plugin by the Network Admin plugins menu<br>
3. If you use Buddypress:<br>
<br>
<strong>Be sure that the main blog header title have only included wp_title() or bp_title() function.<strong><br><br>

That's it, have fun!
<br>
Plugin is updatefriendly, all needed migration from older versions, will be done on activation.<br>

== Screenshots ==

1. **Settings**
2. **Special Tag autocomplete**
3. **Options**
4. **Setting up Meta data for post/page**
5. **Setting up Facebook data for post/page**


== Changelog ==

= 1.2.3 =
* Fixing enormous number of notices
* Making the plugin better and ready for new features :)

= 1.2.2 =
* Added Pagination and option for it in Seo Options page
* Changed sp_title filter to top of generation
* Fixed: Achive data shown in categories, tags and author pages
* Fixed: Sitename shown title

= 1.2.1 =
* Fixed bug in new post admin page
* Added italian language
* Added seo and facebook preview

= 1.2 =
* Added Facbook optimizing functions

= 1.1.1 =
* Added filter function for correct filtering and changed htmlentities to utf8
* No content in str_replace occured 500 error on server
* Added request if string is empty
* Privacy alert was added if blog is not public
* Added stings to german translations

= 1.1 =
* Added setup window on activaion
* Added function htmlentities to prevent wrong header output
* Changed path to setup
* Fixed: Tabs after thickbox not working
* Added Forum Slug to tk_get_bp_component_by_slug function
* Changed get_page_type function

= 1.1 beta 3 =

* Renamed update script filename
* Changed version name to beta 3
* Dublicate topic fix
* Fixed Buddpress slug bug (on changed slugs)
* Added function to get real component names
* Changed functions for getting active components on admin pages
* Added german language strings
* Only loading jQuery on SeoPress pages

= 1.1 beta 2 =
* Bugfixes and Buddypress 1.5 implementation

= 1.1 beta =
* Complete rework

= 1.0.4 =
* Fixes the jquery conflicts

= 1.0.3 =
* Add new specialtags for post/pages date formatting and archive date
* Add the possibility to use specialtags in post/page metabox
* Add wp_enqueue_script to load jquery
* Add javascript to verify the option settings. Alerts before delete and so on.
* <Clean up the code and add documentation/li>
* Some Bugfixes

= 1.0.2 =
* There was a bug, if you select "displays your latest post" as front page. And the latest post has a meta values in the post meta,
* The plugin used the last post meta values instead of the homepage values.


= 1.0.1 =
* CSS bugfix and backend tweaking

= 1.0 =
* The version "SeoPress 1.0" is a replacemand for the old plugin "Seo for Buddypress".
* It comes with a new UI, a lot of more functionality and many more. Read the Desciption for more details.


Get the actual developement version and all changes in our git repository at https://github.com/Themekraft/SeoPress