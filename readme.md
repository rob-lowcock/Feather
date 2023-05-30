# ⚠️ Deprecated

This repo is no longer maintained.

# Readme

## Feather PHP Framework v0.1

[![Build Status](https://travis-ci.org/BobLoco/Feather.png?branch=master)](https://travis-ci.org/BobLoco/Feather)

**This is an initial sample of code, and is subject to significant change.** There's also a lot missing (such as anything to do with a database) so it's probably best to avoid actually using this framework for now.

Feather is an incredibly small custom PHP framework. It is MVC-based, but that's pretty much all there is to it.

### Getting Started

Extract everything to your server. The contents of the public folder should be where the root of your site is, so the app, system and vendor folders are all kept "behind the scenes". If you wish to rename the public folder, change the ```PUBLIC_FOLDER``` setting in app/config.php

#### Controllers

To create a controller, make a new file with the same name as where you want the page to appear. For example, if you want the controller to deal with yoursite.com/users, your file would be called users.php. This should contain a class with the same name (but with the first letter capitalised), which extends BaseController. Each function represents a page, with ```index()``` dealing with the root page. There is a commented example at app/controllers/example.php.

To change the default controller, change the ```DEFAULT_CONTROLLER``` setting in app/config.php

#### Views

To use a view, create the view file in the app/views folder, and load it with ```View::load(filename)```. To pass data to the view, add a second parameter containing an array. The key of an element in this array will then be available as a variable in the view. For an example, see app/controllers/example.php and app/views/feather/default.php

#### Models

Models are held in the app/models folder, and should have a filename which is the same as the class name. Models are loaded with the ```Model::load(filename)``` function as an object. For an example, see the app/models/example/stuff.php file and the commented lines in app/controllers/example.php. Please note these are separate from the ORM models (below).

#### Database (Experimental)

If you want to connect to a MySQL database, you can do so by changing the settings in config.php. To use the ORM, tables should be named as plural, lowercase (e.g. 'users'). You then create a file in app/models/orm/ with the singular of the table name (also in lowercase), which contains a class extending Orm. Continuing the example of a users table:

```php
// app/models/orm/user.php
 
class User extends Orm {

}

```

You can then get one particular entry by id using ```User::find($id)``` or all entries using ```User::all()```. Each entry is returned as an object. Continuing the example above:

```php
// Get the first user in the database with an ID of 1
$user1 = User::find(1);

// Output his name
echo $user1->name;

// Get all users in the database
$users = User::all();

// Loop through them and give their names
foreach ($users as $user) {
	echo $user->name;
}
```
