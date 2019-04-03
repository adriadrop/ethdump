INTRODUCTION
------------
Casper is a theme inspire by the default Ghost theme "Casper".

REQUIREMENTS
------------
* Image URL Formatter - https://www.drupal.org/project/image_url_formatter

INSTALLATION
------------
All you need to do it install and set as default.

CONFIGURATION
-------------
Overwriting configuration in Drupal 8 from a theme is not possible during the
install process, only profiles can do that. However, you can use DrupalConsole
to override some configuration without no problems. For this reason, you can use
the following commands to override some configuration need it.

CONFIGURATION WITH DRUPAL CONSOLE (RECOMMENDED)
-----------------------------------------------
Run this command from your Drupal root directory
drupal chain --file=themes/contrib/casper/chain/contrib/configuration.yml

This is assuming that your Casper is at themes/contrib/casper. If Casper is not
inside of the contrib folder and instead is at themes/casper. You can run:
drupal chain --file=themes/casper/chain/non-contrib/configuration.yml

If you do not have DrupalConsole installed on your server you can follow the
manual steps

MANUAL CONFIGURATION
---------------------
 1. Disable the front page view. Go to (/admin/structure/views) click on the
    edit button of the view "Frontpage" and click disable.

 2. At these locations /admin/config/people/accounts/form-display and
    /admin/config/people/accounts/display enable the following fields:
      - Header User Picture
      - Profile Picture
      - Facebook
      - Website
      - Twitter
      - Bio
      - Full name
      - Google +
  3. In Manage Display /admin/config/people/accounts/display.
     - You will need to configure "Header User Picture" and "Profile Picture":
        - Format: Image URL
        - URL type: FULL URL
        - Image Style: None
        - Link image to: Nothing.
     - For the field "Website":
        - Format: Separate link text and URL.

HOW TO EDIT THE FRONT PAGE ?
----------------------------
Casper uses his custom fields to handle the front page information. Casper front
page fields can be found at admin/appearance/settings/casper.
 - Front Page Title
 - Front Page Background Image
 - Website Logo

HOW TO ADD USER INFORMATION ?
-----------------------------
Casper hold some extra information per user that it can be edit at -
user/[nid]/edit

 - Header User Picture
 - Profile Picture
 - Facebook
 - Website
 - Twitter
 - Bio
 - Full name
 - Google +

MAINTAINERS
-----------
 - Darryl Norris (darol100)
