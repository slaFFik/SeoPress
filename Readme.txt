=== SeoPress ===
Contributors: svenl77,mahype,slaFFik
Tags: seo,BuddyPress,wpmu,wp,searchengine optimization,networked blogs,title,meta,meta description,meta keywords,noindex,facebook,open graph
Requires at least: WordPress 3.1.x & BuddyPress 1.2.x
Tested up to: WordPress 3.5.x & BuddyPress 1.6.3
Stable tag: 1.2.4

Complete search-engine optimization (SEO) plugin for Wordpress & BuddyPress

== Description ==

= SeoPress is search engine optimization for =
* WordPress,
* WordPress Networked Blogs
* and BuddyPress.

= Optimize your Posts/Pages for Facebook!=

= Features =

* Setup Title, Description and Keywords of your WordPress, WordPress sites and BuddyPress pages.
* Optimize your Posts/Pages for Facebook
* Ban searchengines from your sites (noindex)
* Autocomplete Special Tags for wordpress values
* Action hooks for 3rd party plugins
* Add your own special tags

= How the plugin works =

SeoPress automaticaly detects your WordPress configuration and offers you the options you need to setup the different page types of WordPress and BuddyPress. Just activate it and all values you can set will be shown!

= Page types =

Your WordPress page has a lot of page types like home, posts, pages, categories and so on. Every page type needs a different setup to have an optimal result in searchengines. SeoPress offers you all page types and shows you the values you can edit on these pages.

= Special Tags =

Use the special tags like %%site_name%% (for getting name of the site) and use it in your page types. The special tag autocomplete will help you to find the right ones.

= BuddyPress Support =

SeoPress is the only plugin for WordPress which offers you to setup the meta data of the BuddyPress page types. It automaticaly recognizes if BuddyPress is activated and shows you all options to optimize your different page types.

= Languages =

SeoPress is multilingual and can be translated into any language.
Feel free to support the community. Send us your language files to team[at]themekraft.com and we we will add it in the next update!

For bug reports and features requests please go to:

https://github.com/Themekraft/SeoPress/issues

No lose of individual page settings (Meta's & Title) if used "All in One Seo" and "WPSeo"  before.

== Installation ==

1. Upload 'SeoPress' to the '/wp-content/plugins/' directory<br>
2. If you use standard Wordpress installation: Activate the plugin through the 'Plugins' menu in WordPress
3. If you use multiple Blog installation: Activate the plugin by the Network Admin plugins menu
4. If you use BuddyPress:

Be sure that the main blog header title have only included wp_title() or bp_title() function.

== Screenshots ==

1. **Settings**
2. **Special Tag autocomplete**
3. **Options**
4. **Setting up Meta data for post/page**
5. **Setting up Facebook data for post/page**


== Changelog ==

= 1.2.4 =
* Finally fixed group forum topic problems.
* Added ability to delete all plugin's data on deactivation

= 1.2.3 =
* Fixing enormous number of notices
* Making the plugin ready for new features

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
* Bugfixes and BuddyPress 1.5 implementation

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
* The version "SeoPress 1.0" is a replacemand for the old plugin "Seo for BuddyPress".
* It comes with a new UI, a lot of more functionality and many more. Read the Desciption for more details.


Get the actual developement version and all changes in our git repository at https://github.com/Themekraft/SeoPress