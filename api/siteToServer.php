<?php



// function getPostTypes(){
// 	$response = wp_remote_get( 'http://127.0.0.1:8000/api/v1/plugin/projects/8/post-types', array(
//         'headers' => array(
//             'Accept' => 'application/json',
//         )
//     ));
//     if ( ( !is_wp_error($response)) && (200 === wp_remote_retrieve_response_code( $response ) ) ) {
//         if( json_last_error() === JSON_ERROR_NONE ) {
// 			$responseBody = wp_remote_retrieve_body( $response );
// 			$result = json_encode( $responseBody );
// 			var_dump($result);
//         }
//     }
// }


// function syncData(){
// 	$response = wp_remote_get( 'http://127.0.0.1:8000/api/v1/plugin/projects/8/data-sync', array(
//         'headers' => array(
//             'Accept' => 'application/json',
// 			'Content-Type' => 'application/json'
// 		),
//     ));
	
//     if ( ( !is_wp_error($response)) && (200 === wp_remote_retrieve_response_code( $response ) ) ) {
//         if( json_last_error() === JSON_ERROR_NONE ) {
// 			$responseBody = wp_remote_retrieve_body( $response );
// 			$result = json_encode( $responseBody );
// 			var_dump($result);
//         }
//     }
// }

if(! function_exists('spiderSeoSync')){

	function spiderSeoSync($post_type)
	{
		$arguments = [
			'post_type' => $post_type['post_type'],
			'post_status' => 'publish',
		];
		$query = new WP_Query($arguments);
		$data = [];
		if($query->have_posts()){
			while($query->have_posts()){
				$query->the_post();
				$data['data'][] = [
					"title" => get_the_title(),
					"body" => get_the_content()
				];
		}
	 }
	 $args = array(
		 'method' => 'PUT',
		 'headers' => array(
			 'Accept' => 'application/json',
			 'Content-Type' => 'application/json',
			 'Authorization' => 'Bearer 9|YxdOcSvS6OfpZOraw5hJLfnWId7RONltsrz5s50B',
			),
			'body'        => json_encode($data),
			
		);
		// http://127.0.0.1:8000/api/v1/plugin/data-sync
		
		$response = wp_remote_request('http://127.0.0.1:8000/api/v1/plugin/data-sync', $args);
		return wp_remote_retrieve_body( $response );		
	}
}

	

