hypeCategories
==============

Categories and taxonomy for Elgg

## Features ##

* Support for site-wide and internal group categories
* User-friendly UI for adding and managing categories
* Support for category icons

## Configuration ##

* If you are working with a large taxonomy, you will most likely need to update your PHP runtime configuration.
If, when managing categories, you loose entries or hierarchies, increase the value of ```max_input_vars```
http://www.php.net/manual/en/info.configuration.php

## Usage

### Adding category input

To add a category input to your form, add the following code:

```
$input = elgg_view('input/category', array(
	'name_override' => 'my_categories', // do not include, unless you are attaching some custom event hooks to process user input
	'multiple' => true, // specifies whether users should have an option to select multiple categories
	'entity' => $entity, // an entity, which is being edited (will be used to obtain currently selected categories, unless 'value' parameter is present)
	'value' => array(), // an array of category GUIDs to be selected by default
));
```

By default, the plugin will listen to ```'create','all'``` and ```'update','all'``` events
and create a ```filed_in``` relationship with selected categories (and all parent categories).

To display entity categories, use:

```
$output = elgg_view('output/category', array(
	'entity' => $entity // Entity for which the categories should be displayed
));
```

### Custom category subtypes

To add custom category subtypes to the workflow globally, update 'taxonomy_tree_subtypes' config value.

For example, you may want to have multiple taxonomies for categorizing content by topic, by context etc. The easiest way to achieve that, is by using different
category subtypes, e.g. topic, cluster, grouping etc, or blog_categories, bookmark_categories etc.

Context-based filtering of category subtypes can be achieved via ```'get_subtypes', 'framework:categories'``` hook.


### Internationalization

You can internationalize category names by adding translations to your language files. Translations should be namespaced with ```"category:$category_title"```.

## Versioning

The master branch has been switched to Elgg 1.9.+ development.
Legacy 1.8 code is in elgg1.8 branch.


## Installing with Composer

hypeCategories can be included in your Elgg project by ```require``` from the project's
root ```composer.json```.

Support for composer in Elgg is an experimental feature pioneered by [@Srokap](https://github.com/Srokap/ "Paweł Sroka").

Provisional config to include hypeCategories into your project:
```json
{
	"require": {
		"hypejunction/hypecategories" : "@stable"
	}
}
```

## Screenshots ##

![alt text](https://raw.github.com/hypeJunction/hypeCategories/master/screenshots/manage.png "Category Management Tool")
![alt text](https://raw.github.com/hypeJunction/hypeCategories/master/screenshots/form.png "Form Field")
![alt text](https://raw.github.com/hypeJunction/hypeCategories/master/screenshots/tree.png "Categories Tree")
![alt text](https://raw.github.com/hypeJunction/hypeCategories/master/screenshots/category_view.png "Category Full View")