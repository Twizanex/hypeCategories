<?php

namespace hypeJunction\Categories;

$entity = elgg_extract('entity', $vars);

$input_params = elgg_extract('input', $vars, array());
$name = elgg_extract('name', $input_params, 'categories');
$value = elgg_extract('value', $input_params, array());
$multiple = elgg_extract('multiple', $input_params, HYPECATEGORIES_INPUT_MULTIPLE);

if (Taxonomy::instanceOfCategory($entity)) {
	$has_children = Taxonomy::getSubcategories($entity->guid, array('count' => true));
	$checkbox_attr = elgg_format_attributes(array(
		'type' => ($multiple === false) ? 'radio' : 'checkbox',
		'name' => "{$name}[]",
		'value' => $entity->guid,
		'checked' => (is_array($value) && in_array($entity->guid, $value)),
		'class' => ($has_children) ? 'categories-tree-input-node' : 'categories-tree-input-leaf',
	));
	$checkbox = "<input $checkbox_attr />";
	$attr = $entity->getDisplayName();
} else if (elgg_instanceof($entity, 'site')) {
	$attr = elgg_echo('categories:select:site');
} else {
	$attr = elgg_echo('categories:select:group');
}

echo '<label>' . $checkbox . $attr . '</label>';
