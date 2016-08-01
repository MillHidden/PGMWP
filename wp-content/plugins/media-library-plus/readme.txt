=== Media Library Plus ===
Contributors: maxfoundry, AlanP57
Tags:album, files, folders, gallery, image, images, Jetpack Gallery, media folders, media library, media organizer, NextGEN, NextGEN Gallery, photo, photo albums, photos, The WordPress Gallery
Requires at least: 4.0
Tested up to: 4.5.2
Stable tag: 3.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easier file and folder management for WordPress Media Library for Galleries and Albums

== Description ==

We built Media Library Plus as a better way to manage image and video folders for making a WordPress Gallery or Album.  Media Library Plus gives you greater organization of media than is available in the WordPress Media Library by letting you name, work with and organize the folders contained in WordPress Media Library in a more logical manner.

WordPress Media library only let’s you organize your files by month and year.  Media Library Plus (MLP) lets you add and build new folders and sub folders to label and organize your media folders as you wish. It also lets you perform operations on these folders and their contents. MLP adds to and works with the functionality of WordPress Media Library. It does not replace it.

If you have been looking for a clearer, more logical manner to organize your WordPress Gallery and Album displays we think you will like using Media Library Plus.


= Media Library Plus Pro =

[Media Library Pro Plus](http://www.maxgalleria.com/downloads/media-library-plus-pro/?utm_source=wordpress&utm_medium=mlpp&utm_content=mlpp&utm_campaign=repo) integrates with post and page editor pages to let you select and add images to your posts and pages for the editor. Media Library Plus Pro lets you create new MaxGalleria and NextGEN Galleries directly from your MLP folders. This is where your images are so it is a logical place to select them and build your Gallery. Creating a Gallery with MaxGalleria comes standard with MLP.

**The WordPress Gallery**

MLPP includes an integration with The WordPress Gallery which ships with the core of WordPress. Our integration lets you create a gallery from your post and page editor.

= NextGEN Gallery =

Media Library Plus Pro lets you create a NextGEN gallery from the Media Library Pro Plus directory. We recommend using this capability when creating new NextGEN galleries.

**File Name View Mode**

When you are dealing with large image libraries the wait time can be quite long in WordPress Media Library. In order to speed the process of image selection we have built a file name view mode options into Media Library Plus Pro. This let’s you see all of the file names in a folder quickly and then click on specific files to see their images.

**Using Media Library Plus**

To get started download and install the Media Library Plus plugin. Once Media Library Plus is activated you will see Media Library + in the WordPress dashboard menu.  And you are ready to go!

Now the fun begins.

When you click on Media Library + it displays the contents of the uploads folder where you will see the level folders such as ‘2015’, ‘2014’.
We assume your site has the WordPress Media Library setting option ‘Organize my uploads into month- and year-based folders’ selected. If not the plugin automatically changes your settings to this. To view the contents of a folder, click on the folder image. To navigate up in the folder structure click on the links in the Location: breadcrumb string.

Clicking an image will take you to the image attachment details page. If you close that page when you are done you will be in the old media library. Instead click your browser’s go back button twice and you will be taken back to the folder page.

**Button Bar**

The Button Bar provides the main functionality to manage folders and files and is located below the breadcrumbs navigation. When the mouse hovers over a button its function is displayed in the message area below the button bar.

File/Folder Organizing Buttons

Clicking the Add New button displays the upload box.

Here you can select a single file to upload one or more files by dragging the image from the file manager and dropping them in the upload box. Uploaded files will be added to the current folder.

New Folder – Allows you to create a new folder in the current directory. 
Rename – Rename a file in the current directory. Folders cannot be renamed. 
Copy – The copy function allows you to copy selected files to a folder. To copy click the Copy button in the tool bar. Then select the files to be copied, select the destination folder from the drop down list and click ‘Copy Files’. 
Move – The move function lets you to move selected files to another folder. To move files click the Move button in the tool bar. Then select the files to be moved, select the destination folder from the drop down list and click ‘Move Files’. 
Delete – The delete function let you delete select files or selected folders. Folders have to be empty to be deleted. 
Select/Unselect – Select or unselect all files in the current directory. Sort by Date/Sort by Name – changes the display order of items in the current directory; either by name or by date. Search – Users can search for a file or folder by typing in the name of the file in the search box and pressing Enter.

The search results page will display files and/or folders that are similar to the search text. You can click on an image or file to go to its folder or click on a folder view its contents.

In the event that you need to rescan your database's image and folder data the Media Library Plus Reset plugin has been included. To use deactivate Media Library Plus, activate Media Library Plus Reset and select Media Library Plus Reset->Reset Database to erase the folder data. Then deactivate Media Library Plus Reset and reactivate Media Library Plus. MLP will perform a fresh scan of your database.

**Working with images and galleries after initial setup**

Media Library Plus is a stand along plugin that contains an integration with MaxGalleria. With MLP you can add your images to MaxGalleria with a click of a button.



== Screenshots ==

1. Media Library Plus page
2. Clicking the Add New button displays the upload box
3. The Search results page


== Installation ==

For automatic installation:

1. Login to your website and go to the Plugins section of your admin panel.
2. Click the Add New button.
3. Under Install Plugins, click the Upload link.
4. Select the plugin zip file from your computer then click the Install Now button.
5. You should see a message stating that the plugin was installed successfully.
6. Click the Activate Plugin link.

For manual installation:

1. You should have access to the server where WordPress is installed. If you don't, see your system administrator.
2. Copy the plugin zip file up to your server and unzip it somewhere on the file system.
3. Copy the "media-library-extended" folder into the /wp-content/plugins directory of your WordPress installation.
4. Login to your website and go to the Plugins section of your admin panel.
5. Look for "Media Library Plus" and click Activate.

== Changelog ==
= 3.0.3 =
* Added second method to get the absolute path
* Added drag and drop for moving files.

= 3.0.1 =
* Added upgrade to pro page

= 3.0.0 =
* Removed code to update attachment URLs

= 2.37 =
* Fixed MLP-reset version number

= 2.36 =
* Modified to work with Wordpress 4.5.1

= 2.35 =
* CSS modified to work with Wordpress 4.5

= 2.34 =
* Modified the code to allow the deletion of folder data even if the folder does not exist

= 2.33 =
* Made the stand alone version of MLP compatible with Maxgalleria

= 2.32 =
* Removed Maxgallery promo on MLP page
* Updated MLP page promo

= 2.31 =
* Changed database engine used for creating the folders table to MyISAM 

= 2.3 =
* Added folder sync function to scan and update the database with new files and folders found on the server
* Fix problem with incorrect path to images in the new srcset parameter

= 1.04 =
* Included the media library plus reset plugin
* Placed Media Library Plus in its own menu to allow other plugins to add submenus to the Media menu

= 1.03 =
* Add support for user defined uploads folder
* Added code to handle attachment_id in attachement URLs

= 1.02 =
* Added facebook like and share buttons
* Added support for muilt site network activation
* Added code to update theme customizer data if a file used by the customizer is moved.

= 1.01 =
* Revisions to the readme file and banner image
* Added scan for folders in uploads directory during initial scan on plugin activation
* Added rating request notice

= 1.0 =
* Initial version of the Media Library Plus
