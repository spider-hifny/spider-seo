<?php

if(! function_exists('spiderSeoAllPostsTypes')){

	function spiderSeoAllPostsTypes() {
		$args = array(
			'public'   => true,
		);
		$output = 'names'; // names or objects, note names is the default
		$operator = 'and'; // 'and' or 'or'
		return SpiderSEOAdminPageFramework::getOption( 'SpiderSEO',['sync_section','post_types_to_sync'] );

	}
	
}

if(! function_exists('spiderSeoSiteType')){

	function spiderSeoSiteType(){
		return 'wordpress';
	}
	
}

if(! function_exists('spiderSeoPostsByType')){

	function spiderSeoPostsByType( $type ) { 
		$args = [
			'post_type' => $type['type'],
			'post_status' => 'publish',
			'posts_per_page' => -1,
		];
		$metaArgs = array(
			'type'=>'string',
			'single'=>true,
			'show_in_rest'=>true
		);
		register_post_meta($type['type'], 'spiderseo_meta_title', $metaArgs);
		register_post_meta($type['type'], 'spiderseo_meta_description', $metaArgs);

		$posts = get_posts($args);
		$data = [];
		$i = 0;
		
		foreach($posts as $post) {
			$data[$i]['id'] = $post->ID;
			$data[$i]['title'] = $post->post_title;
			$data[$i]['post_type'] = $post->post_type;
			$data[$i]['content'] = $post->post_content;
			$data[$i]['slug'] = $post->post_name;
			$data[$i]['link'] = $post->guid;
			$data[$i]['featured_image']['thumbnail'] = get_the_post_thumbnail_url($post->ID, 'thumbnail');
			$data[$i]['featured_image']['medium'] = get_the_post_thumbnail_url($post->ID, 'medium');
			$data[$i]['featured_image']['large'] = get_the_post_thumbnail_url($post->ID, 'large');
			$data[$i]['post_date'] = $post->post_date;
			$data[$i]['post_modified'] = $post->post_modified;

			$i++;
		}

		return $data;
		
	}
}
if(! function_exists('spiderSeoCategoriesByType')){

	function spiderSeoCategoriesByType( $request ) {
		$type = $request->get_param( 'type' );
		$taxonomy   = $request->get_param( 'category' );
		if($taxonomy == 'product'){
			$taxonomy = 'product_cat';
		}
			$terms = get_terms($taxonomy,['post_type' => $type]);
			return $terms;
	}
}

if(! function_exists('spiderSeoUpdatePost')){

	function spiderSeoUpdatePost( $request ){
		$post_id = $request->get_param('id');
		$post = $request->get_params();
		$post['ID'] = $post_id;
		if($post['post_content']){
			$post['post_content'] = wp_kses_post($post['post_content']);
		}
		if ($metaTitle =$request->get_param('spiderseo_meta_title')) {
			update_post_meta($post_id, 'spiderseo_meta_title', $metaTitle);
			
		}
		if ($metaDescription =$request->get_param('spiderseo_meta_description')) {
			update_post_meta($post_id, 'spiderseo_meta_description', $metaDescription);
		}
		if( $new_post_id = wp_update_post( $post, true ) ){
			$response['success'] = true;
			$response['data'] = $new_post_id;	
			$response['message'] = 'post updated with success!';	
		}else{
				$response['success'] = false;
			$response['message'] = 'check again later!';	
		}
		
		return new WP_REST_Response( $response );
	}
}

if(! function_exists('spiderSeoUpdateCategory')){

	function spiderSeoUpdateCategory( $request ){
		$category_id = $request->get_param('id');
		
		$name = $request->get_param('name');
		$slug = $request->get_param('slug');
		$taxonomy   = $request->get_param( 'category' );
		$update = wp_update_term( $category_id, $taxonomy, array(
			'name' => $name,
			'slug' => $slug
		) );
	
			if( $update ){
				$response['success'] = true;
				$response['message'] = 'category updated with success!';	
			}else{
				   $response['success'] = false;
				$response['message'] = 'check again later!';	
			}
		
		return new WP_REST_Response( $response );
		}
	}
