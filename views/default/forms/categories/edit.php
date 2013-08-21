<?php

$entity = elgg_extract('entity', $vars);

if (elgg_instanceof($entity)) {
	$container = $entity->getContainerEntity();
} else {
	$container = elgg_extract('container', $vars, elgg_get_site_entity());
}

echo elgg_view('input/hidden', array(
	'name' => 'categories[hierarchy][]',
	'value' => ''
));

echo elgg_view('input/hidden', array(
	'name' => 'categories[guid][]',
	'value' => $entity->guid
));
echo elgg_view('input/hidden', array(
	'name' => 'categories[container_guid][]',
	'value' => $container->guid,
	'rel' => 'container-guid',
));

echo '<div class="categories-icon-move icon-small"></div>';

$upload = elgg_echo('hj:categories:edit:icon');

echo "<div class=\"categories-icon-upload\" title=\"$upload\">";
if (elgg_instanceof($entity) && $entity->icontime) {
	echo elgg_view('output/img', array(
		'src' => $entity->getIconURL('tiny')
	));
}
echo elgg_view('input/file', array(
	'name' => 'categories[icon][]',
	'class' => 'hidden'
));
echo '</div>';

echo '<div class="categories-category-title">';
echo elgg_view('input/text', array(
	'name' => 'categories[title][]',
	'value' => $entity->title,
	'placeholder' => elgg_echo('hj:categories:edit:title')
));
echo '</div>';

echo '<div class="categories-icon-info icon-small"></div>';
echo '<div class="categories-icon-plus"></div>';
echo '<div class="categories-icon-minus"></div>';

echo '<div class="categories-category-meta hidden">';

echo '<div class="categories-category-description">';
//echo '<label>' . elgg_echo('hj:categories:edit:description') . '</label>';
echo elgg_view('input/text', array(
	'name' => 'categories[description][]',
	'value' => $entity->description,
	'placeholder' => elgg_echo('hj:categories:edit:description')
));
echo '</div>';

echo '<div class="categories-category-access">';
//echo '<label>' . elgg_echo('hj:categories:edit:access_id') . '</label>';
echo elgg_view('input/access', array(
	'name' => 'categories[access_id][]',
	'entity' => $entity,
));
echo '</div>';

echo '</div>';