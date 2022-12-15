<?php
/**
 * Plugin Name: Wp Raw Markdown Content
 * Description: Ruy's dumb ideas :)
 * Author: Ruy Monteiro
 */

add_action( 'graphql_register_types', 'wp_raw_markdown_post' );
add_action( 'graphql_register_types', 'wp_raw_markdown_page' );

function wp_raw_markdown_page() {
  register_graphql_field( 'Page', 'markdown', [
    'type' => 'String',
    'description' => __( 'Raw markdown format', 'your-textdomain' ),
    'resolve' => function(\WPGraphQL\Model\Post $post, $args, $context, $info) {
       return get_post($post->ID)->post_content_filtered;
    }
  ] );
};

function wp_raw_markdown_post() {
  register_graphql_field( 'Post', 'markdown', [
    'type' => 'String',
    'description' => __( 'Raw markdown format', 'your-textdomain' ),
    'resolve' => function(\WPGraphQL\Model\Post $post, $args, $context, $info) {
       return get_post($post->ID)->post_content_filtered;
    }
  ] );
};
