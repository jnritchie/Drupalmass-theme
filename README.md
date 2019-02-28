# Drupalmass-theme: Custom theme build
A sub theme based on bootstrap + custom modules to mirror - mass.gov

*Database dump not needed, everything you need is in theme & module files. setup guide will provide the rest*

*Can also use image shared from digital ocean to recreate demo*

# Setup Guide

## First things first

All the files you need are within the **DrupalMass** folder. The files in the folder "theme", go in your Drupal installation's the theme folder. The files in the "module" folder go in your Drupal installation's the modules folder.

## Install Bootstrap theme + Custom Subtheme

Once theme files are added, login to Drupal and goto "Appearance". Set **Mass.gov Demo** as default theme.

## Install Modules

To enable the custom modules once added, go to **extend** in your drupal dashboard. Check all modules under **EXLABS CUSTOM MODULE** and click "install".

## Editing Homepage Content & Styles

All content for each homepage section ( custom modules ) will be found in html.twig file within module **templates** folder.

Within a specific module you will also find the relative CSS and JS files.

## Editing Overall Theme

The overarching style sheet for the entire theme can be found in: *themes > [themename] > CSS

Within this style sheet you can edit styles for global elements like the header, navigations menus and so on.

The HTML templates for the theme itself will be found in: *themes > [themename]  > templates > system

You would modifiy these files if you want change structure of over theme layouts ( i.e. change navigation structure )

## Dynamically adding content to custom Modules

This is where a tutorial is necessary. However, simply put to do this you will need to 
a) create a content type and setup your fields appropriately
b) You will need to call this content type node in the module block file and create an array
c) Reference this array in the .module file of the custom module that you want the content to show in
d) Modify html.twig file of that module inorder to diplay the fields you created in your custom content type.

This way instead of hard coding content into modules you can add/update content in your modules via drupal CMS.

Example: you create a content type called "Services" with the fields "name" "descirption", "type".

You will need to call and reference this content type and fields in the featured services modules so that when you create a new service in drupal is automatically shows on the page.

*For more detail on how to setup this up contact me to setup tutorial...*
