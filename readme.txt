=== Insert or Embed Camtasia Content into Wordpress Trial ====
Contributors: elearningplugins.com
Donate link: http://www.elearningplugins.com
Tags: Camtasia, insert, embed, iframe, elearning, mp4, techsmith, articulate, replay, premiere
Requires at least: 4.2.2
Tested up to: 4.2.2
Stable tag: 1.0
Quickly embed or insert Camtasia content into a post or page

== Description ==

This plugin will add a new toolbar icon (the Camtasia logo) next to the 'Add Media' button on the Edit Post and Edit Page pages.  Upon clicking this toolbar icon, you will have the ability to upload your published Camtasia content as a ZIP file.  Once uploaded, the plugin will automatically extract the content, find the appropriate .html file, and add code to your post or page that will display your Camtasia content as an iframe or a lightbox.

Built for Camtasia, but works with any MP4 file!  Try it with MP4 files created with Articulate Replay, Adobe Premiere, or any other video production software!

https://www.youtube.com/watch?v=fSEHeIatOzE

== Installation ==

1. Upload the 'insert-or-embed-Camtasia-into-wordpress' folder to the `/wp-content/plugins/` directory. Activate the plugin through the 'Plugins' menu in WordPress

== How to Use ==

1. Create a new post or page
2. Click on the Camtasia logo
3. Browse for a MP4 file or .zip file that you created using Camtasia
4. Upload and go!

https://www.youtube.com/watch?v=fSEHeIatOzE


== Frequently Asked Questions ==

= How do I use this to embed Camtasia content? =

1. Create a new post or page
2. Click on the Camtasia logo
3. Browse for a MP4 file or .zip file that you created using Camtasia
4. Upload and go!

= Why does the upload never finish or I get a -1 error message? =

In order to resolve this issue, you need to update your php.ini in your wp-admin folder to reflect the following: 

post_max_size = 50M

max_execution_time = 60

max_input_time = 60

upload_max_filesize = 50M


(These settings will vary depending upon your server and content.  You may need to contact your hosting company to make these changes.) 

For additional troubleshooting information, see:  http://www.elearningplugins.com/increase-maximum-upload-file-size/

= How do I increase the maximum file size? =

http://www.elearningplugins.com/increase-maximum-upload-file-size/

= If I delete the plugin, what happens to the content that I've uploaded? =

The uploaded content is saved into the wp-content / uploads / Camtasia_uploads folder on your site.  Thus, your uploaded content will not be removed if you delete this plugin.

== Changelog ==

= 1.0 =

Initial version.