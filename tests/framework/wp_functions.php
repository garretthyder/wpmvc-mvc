<?php

require_once __DIR__.'/classes/wp_user.php';
require_once __DIR__.'/classes/wp_post.php';
require_once __DIR__.'/classes/wp_term.php';

/**
 * WordPress compatibility functions.
 * Emulates WordPress functions for testing purposes.
 *
 * @author Alejandro Mostajo <http://about.me/amostajo>
 * @copyright 10Quality <http://www.10quality.com>
 * @license MIT
 * @package WPMVC\MVC
 * @version 2.1.5
 */

if (!defined('ARRAY_A'))
    define('ARRAY_A', true);
if (!defined('DOING_AUTOSAVE'))
    define('DOING_AUTOSAVE', false);
function get_template_directory()
{
    return __DIR__.'/theme/';
}
function get_current_user_id()
{
    return 404;
}
function get_userdata($id)
{
    return new WP_User($id);
}
function get_user_by($key, $id)
{
    return new WP_User($id);
}
function get_post($id, $output = ARRAY_A)
{
    $post = new WP_Post($id);
    return $output === ARRAY_A ? (array)$post : $post;
}
function wp_insert_post($args, &$error)
{
    $error = isset($args->ID) && in_array($args->ID, [1,2,3,4,5,6,7]);
}
function wp_delete_post($ID, $force = true)
{
    return true;
}
function get_post_meta($ID, $key = '', $row = true)
{
    return empty($key) ? [] : '"1"';
}
function get_user_meta($ID, $key = '', $row = true)
{
    return empty($key) ? [] : '"1"';
}
function delete_user_meta($ID, $key)
{
    return true;
}
function update_user_meta($ID, $key, $value)
{
    return true;
}
function wp_insert_user($data)
{
    return true;
}
function is_wp_error($error)
{
    return is_a($error, 'WP_Error');
}
function get_option($key)
{
    if ($key == 'model_test')
        return '{"ID":"test","a":"A value","b":"B value","isSetup":false}';
    return;
}
function update_option($key, $value)
{
    return true;
}
function delete_option($key)
{
    return true;
}
function get_category($ID)
{
    $cat = new stdClass;
    $cat->term_id = $ID;
    $cat->cat_ID = $ID;
    $cat->name = 'Category';
    $cat->slug = 'category';
    $cat->taxonomy = 'category';
    return $cat;
}
function update_term_meta($ID, $key, $value)
{
    return true;
}
function delete_term_meta($ID, $key)
{
    return true;
}
function get_term_meta($ID, $key = '', $row = true)
{
    return empty($key) ? [] : '"1"';
}
function wp_insert_term($name, $tax, $args)
{
    return rand();
}
function wp_delete_term($term, $tax)
{
    return true;
}
function do_action($hook, $callback)
{
    return true;
}
function apply_filters($hook, $value)
{
    return $value;
}
function wp_nonce_field($key, $nonce)
{
    return true;
}
function wp_verify_nonce($nonce, $key)
{
    return true;
}
function get_stylesheet_directory()
{
    return __DIR__.'/theme/';
}
function get_post_thumbnail_id( $id )
{
    return 1500;
}
function wp_upload_dir()
{
    return array(
        'path'      => 'C:\test/wp-content/uploads',
        'url'       => 'http://test/wp-content/uploads',
        'subdir'    => '',
        'basedir'   => 'C:\test/wp-content/uploads',
        'baseurl'   => 'http://test/wp-content/uploads',
        'error'     => null,
    );
}
function maybe_unserialize($value)
{
    return $value;
}
function maybe_serialize($value)
{
    return $value;
}
function get_terms( $tax, $args )
{
    return [new WP_Term(1, $tax),new WP_Term(2, $tax)];
}
function get_term( $id, $tax )
{
    return ['term_id' => $id, 'slug' => 'term-'.$id, 'name' => 'Term ID:'.$id, 'taxonomy' => $tax];
}
function get_term_by( $prop, $slug, $tax )
{
    return ['term_id' => 404, 'slug' => $slug, 'name' => ucfirst( $slug ), 'taxonomy' => $tax];
}
function wp_update_term($id, $tax, $args)
{
    return $id;
}