<?php

if(!function_exists('postByType')){
   
   function postByType($post_type){
        $query = new WP_Query(array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => -1,
        ));
        
        if($query->have_posts()) {
            $posts = $query->posts;
            var_dump($posts);
            echo "<br>";
        }
        wp_reset_query();
    }
}

if (!function_exists('allPostsTypes')) {
    function allPostsTypes()
    {
        $args = array(
            'public'   => true,
            '_builtin' => false,
        );
        $output = 'names'; // names or objects, note names is the default
        $operator = 'or'; // 'and' or 'or'
        $post_types = get_post_types($args, $output, $operator);
        foreach ($post_types  as $post_type) {
            echo '<p>' . $post_type . '</p>';
        }
    }
}
