=== hashtagger ===
Contributors: petersplugins
Donate link: https://petersplugins.com/make-a-donation/
Tags: hashtag, hashtags, tag, tags, tag archive, archive, social, twitter, facebook
Requires at least: 3.0
Tested up to: 4.9
Stable tag: 3.8
Requires PHP: 5.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows you to use #hashtags, @usernames and $cashtags in your posts. #hashtags are automatically added as post tags. Highly customizable!

== Description ==

<strong>The [hashtagger Plugin](https://petersplugins.com/free-wordpress-plugins/hashtagger/) allows you to use #hashtags, @usernames and $cashtags in your posts</strong>

This plugin uses the [WordPress Tag system](https://codex.wordpress.org/Posts_Tags_Screen) to automatically convert a #hashtag into a Post Tag. Each #hashtag is added as a "normal" tag (without leading hash) to the post, so it is fully compatible with existing tags!

<blockquote>
If you like this plugin please do me favor and leave a review here on wordpress.org so that other people know it is helpful for you. Thanks!
</blockquote>

[youtube https://youtu.be/cNNn1VLz4zs]
<strong>Note: The video is outdated! A new version will be created as soon as possible.</strong>

= Usage =

Just type anywhere in a post

**#hashtag** 
This adds "hashtag" as tag to the current post and on links to tag archive page for "hashtag" when showing the post.

**+#hashtag** 
Use +#hashtag to only link to a tag archive page without adding "hashtag" as tag to the post. When showing the post the link is showed as "#hashtag" (without "+"). If the tag does not exist the text remains unchanged and no link is created.

**##hashtag**
Use duplicate ##hashes to tell the plugin that this word should not be converted into a tag. Duplicate hashes are replaced by a single hash when showing the post.

**@username**
This creates a link either to the Profile Page or the Website of User "username". The usage of @usernames can be activated optionally. If the username does not exist the text remains unchanged and no link is created. It is **highly recommended** to use @nicknames instead of @usernames to enhance security ([read more](https://petersplugins.com/docs/hashtagger/#usernames)).

**@@username**
Use @@username to avoid link creation. When showing the post this is displayed as "@username" without link (@username feature has to be activated).

**$cashtag**
This creates a link to the concerning stock symbol at MarketWatch, Google Finance or Yahoo Finance. The usage of $cashtags can be activated optionally. $cashtags link to the concerning stock symbol at MarketWatch, Google Finance or Yahoo Finance. **Notice**: stock symbols can not be validated, using a invalid stock symbol will cause an not found error on the target site.

**$$chashtag**
Use $$cashtag to avoid link creation. When showing the post this is displayed as "$cashtag" without link ($cashtag feature has to be activated).

= Docs & Support =

More detailed information about the hashtagger plugin can be found in the [Plugin Manual](https://petersplugins.com/docs/hashtagger/). For support check the [Support Forum](https://wordpress.org/support/plugin/hashtagger).

= WordPress Security =

If you activate the @username feature **it is highly recommended to use @nickname instead of @username** ([read more](https://petersplugins.com/docs/hashtagger/#usernames))!

= Post Types and Section Types =

It is possible to use #hashtags, @usernames and $cashtags on Posts, on Pages and on Custom Post Types within Content, Title and Excerpt. Activate only the Post Types and Section Types you want to be processed to avoid unnecessary processing for best performance.

= Formatting links =

Additional CSS Class(es) to add to the #hashtag and @username links can be configured on the plugins setting page.

= Display of links in front end =

Optionally all symbols (#, @, $) can be removed from the links generated in front end.

= Display of Tags in front end =

There's an option to automatically add a hash symbol in front of tags (e.g. when using the Tag Cloud Widget).

== For developers ==

= Theme function =

Use `do_hashtagger( $content )` in your theme files to process #hashtags and @usernames in $content.

== Frequently Asked Questions ==

= What characters can a hashtag include? =

The hashtag detection follows the rules for hashtags on Twitter, Facebook and Google+. The minimum length for a hashtag is 2 characters. A hashtag must not start with a number (this can be changed optionally). A hashtag not only ends at a space but also at punctuation marks and other special characters. A hashtag may contain underscores.

= Does this also work for pages? =

Yes and No. Yes - the plugin can add the tags also for pages. No - WordPress does not show the tags section for pages and also pages are not listed on tag archives. 

This plugin does not change this behavior of WordPress because there already exist several plugins that add the tag functionality for pages. Please use one of them if you want to tag your pages.

= How to change the Tag base? =

The Tag base for the Tag Archive Page URL (e.g. example.com/**tag**/anytag) can be set on the 'Permalink Settings' page under 'Tag base' in your WP admin.

= Where does @username link to? =

This can be set on hashtagger Settings Page. @username links can either link to the Users Profile Page or to the Users Webiste (Users Profile Page if no Webpage is set). When linking to Users Website the link can be opened in a new window if desired.

= Why should I use @nicknames instead of @usernames =

This is important to enhance WordPress security. Please take a look at the [Manual](https://petersplugins.com/docs/hashtagger/#usernames).

= Can I use #hashtags and/or @usernames in Excerpts? =

Yes, just activate this feature.

= Can I use #hashtags and/or @usernames in Titles? =

Yes, just activate this feature.

= Can I regenerate all existing Posts after changing Settings? =

Yes, you can regenerate all affected objects (Post, Pages, Custom Posts) using the current settings.

== Screenshots ==

1. hashtagger Settings General Section: This section shows the current Tag base setting
2. hashtagger Settings Tags Section: Options to allow hashtags starting with numbers and disable link creation (screenshot is outdated)
3. hashtagger Settings Usernames Section: Handling of @usernames respectively @nicknames can be changed here
4. hashtagger Settings Cashtags Section: Handling of $cashtags can be changed here
5. hashtagger Settings Advanced Section: Option to not delete tags that are not found in content – may be useful if already a lot of posts with tags exist - but please note that with this setting activated tags will not be removed if you delete a hashtag
6. hashtagger Settings Post Types Section: In this section the Post Types to handle can be defined - activate only the Post Types for which you want to use hashtags to make sure posts are nor processed unnecessarily for better performance
7. hashtagger Settings Section Types Section: In this section the Section Types to handle can be defined - only activate the Section Types you want to use for best performance
8. hashtagger Settings CSS Style Section: Add CSS Classes to use for the generated links in Front End
9. hashtagger Settings Display Section: Option to not display symbols in front of generated links in Front End
10. hashtagger Settings Regenerate Section: Regenerate all existing Objects with the current settings

= More plugins from Peter =

* **[404page](https://wordpress.org/plugins/404page/)** - Define any of your WordPress pages as 404 error page 
* **[smart Archive Page Remove](https://wordpress.org/plugins/smart-archive-page-remove/)** - Completely remove unwated Archive Pages from your Blog 
* **[smart User Slug Hider](https://wordpress.org/plugins/smart-user-slug-hider/)** - Hide usernames in author pages URLs to enhance security 
* [See all](https://profiles.wordpress.org/petersplugins/#content-plugins)

== Changelog ==

= 3.8 (2017-11-16) =
* faulty display in WP 4.9 fixed

= 3.7 (2017-09-13) =
* Option to automatically add hash symbol in front of tags 

= 3.6 (2017-07-11) =
* Redesigned admin interface
* Code improvement

= 3.5 (2016-09-13) =
* Option to only create tags from #hashtags, but do not show links
* Bug fix Tag Regeneration

= 3.4 (2016-08-18) =
* Enhanced Polylang support to allow same hashtag in several languages
* Option to allow hashtags starting with numbers

= 3.3 (2015-12-22) =
* Uage of cashtags to link to stock symbols
* Optionally remove symbols in front of generated links in front end

= 3.2 (2015-05-28) =
* Works now with [User Submitted Posts](https://wordpress.org/plugins/user-submitted-posts/)
* Works now with [Barley for WordPress](http://getbarley.com/editor/wp)
* Hook filters only when needed

= 3.1 (2015-02-05) =
* Spanish translation added (thanks to [Andrew](http://www.webhostinghub.com) for translating)
* Cosmetics

= 3.0 (2014-12-21) =
* Completely rewritten with a lot of new Settings and a feature to regenerate existing objects

= 2.1 (2014-10-10) =
* Optionally use @nicknames instead of @usernames (thanks to [joeymalek](https://profiles.wordpress.org/joeymalek/) for pointing out)
* Added `do_hashtagger()` Theme Function (thanks to [joinfof](https://profiles.wordpress.org/joinfof/) for the idea)

= 2.0 (2014-09-17) =
* Optional usage of @usernames
* Syntax +#hashtag to create link only without adding tag

= 1.3 (2014-08-15) =
* Solved: do not use hex color codes in css as hashtags (see [this Support topic](https://wordpress.org/support/topic/this-is-really-great-but-it-doesnt-let-me-color-code-anything))

= 1.2 (2014-08-05) =
* hashtags can contain non ASCII characters
* hashtags must not start with a number
* hashtags can start after punctuation marks without whitespace
* hashtags end at punctuation marks

= 1.1 (2014-07-31) =
* Option to specify css class added
* German translation added

= 1.0 (2014-07-09) =
* Initial Release

== Upgrade Notice ==

= 3.8 =
faulty display in WP 4.9 fixed

= 3.7 =
Option to automatically add hash symbol in front of tags 

= 3.6 =
Unified admin interface

= 3.5 =
Option to only create tags from #hashtags, but do not show links

= 3.4 =
Enhanced Polylang support to allow same hashtag in several languages, option to allow hashtags starting with numbers

= 3.3 =
Version 3.3 introduces $cashtag feature

= 3.2 =
Works now with "User Submitted Posts" Plugin and "Barley for WordPress" Plugin

= 3.1 =
Spanish translation, Cosmetics.

= 3.0 =
Version 3.0 introduces a lot of new features and settings. Don't miss it!