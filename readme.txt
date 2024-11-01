=== Xtreme 3D Stack ===
Contributors: Flashtuning 
Tags: gallery, 3d, papervision, flv, video, zoom, fullscreen, autoplay, xml, actionscript, as3, autoscroll, effects, camera, rotate
Requires at least: 2.9.0
Tested up to: 3.0.1
Stable tag: trunk

The most advanced XML 3D Stack application. No Flash Knowledge required to insert the 3D Stack SWF inside the HTML page(s) of your site.

== Description ==

XML 3D Photo Stack  / XML Image Gallery / Flash Video Stack / PaperVision 3D Stack

**Features**

* No Flash Knowledge required to insert the 3D Stack SWF inside the HTML page(s) of your site
* Fully customizable XML driven content
* SlideShow mode support when pressing on first object
* Customizable width, height and item size
* Unlimited number of images at different sizes (JPG, PNG, BMP, GIF) and SWF support
* It includes support for video bjects (FLVs, MP4, M4A, MOV, MP4V, 3GP, 3G2)
* AutoPlay / Previous / Next with timer for each image
* Scroll Bar and MouseWheel navigation support
* Time period adjustable from the XML file (in seconds)
* Based on Papervision 3D engine including camera support
* Image description and effects / Full Screen mode support
* Optionally set the XML settings file path in HTML using FlashVars


== Installation ==

1. Go to Wordpress folder in the archive file and upload the **xtreme-3d-stack** folder to the **/wp-content/plugins/** directory. Activate through the 'Plugins' menu in WordPress.
2. Copy the **flashtuning** folder from Wordpress folder in **wp-content** folder. (e.g: "http://www.yoursite.com/wp-content/flashtuning/xtreme-3d-stack")
3. Insert the swf into post or page using this tag: `[xtreme-3d-stack]`
4. If you want to modify the width and height of the media wall insert this attributes into the tag: **[xtreme-3d-stack width="yourvalue" height="yourvalue"]**
5. If you want to use multiple instances of Xtreme 3D Stack on different pages. Follow this steps:
a. There are 2 xml files in **wp-content/flashtuning/xtreme-3d-stack/assets/xml** folder: stack-settings.xml, used for general settings, and media.xml, used for individual items.
b. Modify the 2 xml files according to your needs and rename them (eg.: stack-settings2.xml, media2.xml)
c. Open the stack-settings2.xml, search for this tag
    <url value="assets/xml/media.xml"/> </imageUrl></strong> and change the attribute value to <em>media2.xml</em>
d. Copy the 2 modified xml files to **wp-content/flashtuning/xtreme-3d-stack/assets/xml** folder
e. Use the **xml** attribute [xtreme-3d-stack xml="media-settings2.xml"] when you insert the 3d stack on a page.
6. Optionally for custom pages use this php function: **xtreme3DStackEcho(width,height,xmlFile)** (e.g: xtreme3DStackEcho(590,450,'stack-settings.xml') )


== Screenshots ==

1. Fully customizable XML driven content (see the online demo at [Flashtuning.net](http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-3d-stack.html "Sample Xtreme 3D Stack") ). No Flash Knowledge required to insert the 3D Stack SWF inside the HTML page(s) of your site.

