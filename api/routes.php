<?php

add_action('rest_api_init', function() {

	register_rest_route( 'sp/v1', 'posts/(?P<type>[a-zA-Z0-9-]+)', array(
		'methods' => 'GET',
		'callback' => 'spiderSeoPostsByType',
    )); 
   
    register_rest_route('sp/v1', 'types', [
		'methods' => 'GET',
		'callback' => 'spiderSeoAllPostsTypes',
	]);
	register_rest_route( 'sp/v1', 'categories/(?P<type>[a-zA-Z0-9-]+)/(?P<category>[a-zA-Z0-9-]+)', array(
		'methods' => 'GET',
		'callback' => 'spiderSeoCategoriesByType',
		'args'     => array(
			'type' => array(
				'required' => true,
			),
			'category'   => array(
				'required' => true,
			),
		),
    )); 
	register_rest_route( 'sp/v1', 'site-type', array(
		'methods' => 'GET',
		'callback' => 'spiderSeoSiteType',
    ));

	//Update Post
    register_rest_route( 'sp/v1', '/posts-update/(?P<id>[a-zA-Z0-9-]+)', array(
        'methods' => 'POST',
        'callback' => 'spiderSeoUpdatePost'
    ));

	//Update Category
    register_rest_route( 'sp/v1', '/categories-update/(?P<category>[a-zA-Z0-9- _]+)/(?P<id>[a-zA-Z0-9-]+)', array(
        'methods' => 'POST',
        'callback' => 'spiderSeoUpdateCategory'
    ));

	// register_rest_route('sp/v1', 'dataToSend/(?P<post_type>[a-zA-Z0-9-]+)', [
	// 	'methods' => 'get',
	// 	'callback' => 'dataToSend',
	// ]);

});