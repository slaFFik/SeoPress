=== SeoPress ===
Contributors: svenl77,mahype
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=NWEYBQUNE5PVY
Tags: seo,buddypress,wpmu,wp,searchengine optimization,networked blogs,title,meta,meta description,meta keywords,noindex,facebook,open graph
Requires at least: 2.9.x
Tested up to: 3.2 & Buddypress 1.2.x
Stable tag:  1.2.2

Searchengine optimization plugin for Wordpress & Buddypress

== Description ==
<h3>SeoPress is search engine optimization for</h3>

<ul>
    <li>WordPress,</li>
    <li>WordPress Networked Blogs</li>
    <li>and Buddypress.</li>
</ul>

<strong>NEW: Optimize your Posts/Pages for Facebook!</strong>

<h3>Features</h3>
<ul>
	<li>Setup Title, Description and Keywords of your WordPress, WordPress sites and Buddypress pages.</li>
	<li>Optimize your Posts/Pages for Facebook</li>
	<li>Ban searchengines from your sites (noindex)</li>
	<li>Autocomplete Special Tags for wordpress values</li>
	<li>Action hooks for 3rd party plugins</li>
	<li>Add your own special tags</li>
</ul>

<h3>Screenshot</h3>
<img src="http://themekraft.com/wp-content/uploads/2010/11/screenshot-seopress.jpg" alt="" title="SeoPress Screenshot" width="530" height="340" class="alignnone size-full wp-image-1796" />

<h3>How the plugin works</h3>
SeoPress automaticaly detects your WordPress configuration and offers you the options you need to setup the different page types of WordPress and Buddypress. Just activate it and all values you can set will be shown!

<h4>Page types</h4>
Your WordPress page has a lot of page types like home, posts, pages, categories and so on. Every page type needs a different setup to have an optimal result in searchengines. SeoPress offers you all page types and shows you the values you can edit on these pages.

<h4>Special Tags</h4>
Use the special tags like %%site_name%% (for getting name of the site) and use it in your page types. The special tag autocomplete will help you to find the right ones.

<h3>Buddypress Support</h3>
SeoPress is the only plugin for WordPress which offers you to setup the meta data of the BuddyPress page types. It automaticaly recognizes if BuddyPress is activated and shows you all options to optimize your different page types.

<h3>Languages</h3>
SeoPress is multilingual and supports the following languages:
<ul>
<li>English</li>
<li>German</li>
</ul>
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
<h4>1.2.2</h4>
<ul>
<li>Added Pagination and option for it in Seo Options page</li>
<li>Changed sp_title filter to top of generation</li>
<li>Fixed: Achive data shown in categories, tags and author pages</li>
<li>Fixed: Sitename shown title</li>
</ul>
<h4>1.2.1</h4>
<ul>
<li>Fixed bug in new post admin page</li>
<li>Added italian language</li>
<li>Added seo and facebook preview</li>
</ul>
<h4>1.2</h4>
<ul>
<li>Added Facbook optimizing functions</li>
</ul>
<h4>1.1.1</h4>
<ul>
<li>Added filter function for correct filtering and changed htmlentities to utf8</li>
<li>No content in str_replace occured 500 error on server</li>
<li>Added request if string is empty</li>
<li>Privacy alert was added if blog is not public</li>
<li>Added stings to german translations</li>
</ul>
<h4>1.1</h4>
<ul>
<li>Added setup window on activaion</li>
<li>Added function htmlentities to prevent wrong header output</li>
<li>Changed path to setup</li>
<li>Fixed: Tabs after thickbox not working</li>
<li>Added Forum Slug to tk_get_bp_component_by_slug function</li>
<li>Changed get_page_type function</li>
</ul>
<h4>1.1 beta 3</h4>
<ul>
<li>Renamed update script filename</li>
<li>Changed version name to beta 3</li>
<li>Dublicate topic fix</li>
<li>Fixed Buddpress slug bug (on changed slugs)</li>
<li>Added function to get real component names</li>
<li>Changed functions for getting active components on admin pages</li>
<li>Added german language strings</li>
<li>Only loading jQuery on SeoPress pages</li>
</ul>
<h4>1.1 beta 2</h4>
<ul>
<li>Bugfixes and Buddypress 1.5 implementation</li>
</ul>
<h4>1.1 beta</h4>
<ul>
<li>Complete rework</li>
</ul>
<h4>1.0.4</h4>
<ul>
<li>Fixes the jquery conflicts</li>
</ul>
<h4>1.0.3</h4>
<ul>
<li>Add new specialtags for post/pages date formatting and archive date</li>
<li>Add the possibility to use specialtags in post/page metabox</li>
<li>Add wp_enqueue_script to load jquery</li>
<li>Add javascript to verify the option settings. Alerts before delete and so on.</li>
<li><Clean up the code and add documentation/li>
<li>Some Bugfixes</li>
</ul>
<h4>1.0.2</h4>
<ul>
<li>
There was a bug, if you select "displays your latest post" as front page. And the latest post has a meta values in the post meta,
The plugin used the last post meta values instead of the homepage values.
</li>
</ul>
<h4>1.0.1</h4>
<ul>
<li>CSS bugfix and backend tweaking</li>
</ul>
<h4>1.0</h4>
<ul>
<li>The version "SeoPress 1.0" is a replacemand for the old plugin "Seo for Buddypress".</li>
<li>It comes with a new UI, a lot of more functionality and many more. Read the Desciption for more details.</li>
</ul>

Get the actual developement version and all changes in our git repository at https://github.com/Themekraft/SeoPress-Free