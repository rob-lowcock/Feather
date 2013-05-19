# Readme

## Feather PHP Framework v0.1

**This is an initial sample of code, and is subject to significant change.** There's also a lot missing (such as passing data to views) so it's probably best to avoid actually using this framework for now.

Feather is an incredibly small custom PHP framework. It is MVC-based, but that's pretty much all there is to it.

### Getting Started

Extract everything to your server. The contents of the public folder should be where the root of your site is, so the app, system and vendor folders are all kept "behind the scenes". If you wish to rename the public folder, change the setting in app/config.php

#### Controllers

To create a controller, make a new file with the same name as where you want the page to appear. For example, if you want the controller to deal with yoursite.com/users, your file would be called users.php. This should contain a class with the same name (but with the first letter capitalised), which extends BaseController. Each function represents a page, with ```index()``` dealing with the root page. There is a commented example at ```app/controllers/example.php```.

To change the default controller, change the DEFAULT_CONTROLLER setting in app/config.php

#### Views

To use a view, create the view file in the app/views folder, and load it with View::load(filename).

#### Models

Models are held in the app/models folder, and should have a filename which is the same as the class name. Models are loaded with the Model::load(filename) function as an object. For an example, see the app/models/example/stuff.php file and the commented lines in app/controllers/example.php.