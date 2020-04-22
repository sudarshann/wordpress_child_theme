<?php

namespace SB;

Helpers::start();

class Helpers {

    public static $debug_mode;

    public static function start() {
        self::$debug_mode = SB_DEBUG_MODE;
    }

    public static function disable_debug_mode() {
        self::$debug_mode = false;
    }

    public static function enable_debug_mode() {
        self::$debug_mode = true;
    }

    public static function get_error_response($message, $data = []) {
        return ['error' => true, 'message' => $message, 'data' => $data];
    }

    public static function get_sucess_response($message, $data = []) {
        return ['error' => false, 'message' => $message, 'data' => $data];
    }

    public static function get_api_error_response($type, $message, $data = array()) {
        $function_name = debug_backtrace()[1]['function'];
        if ($type == '') {
            $code = $function_name . '_error';
        } else {
            $code = $type . '_error';
        }

        $result = array(
            'code' => $code,
            'data' => isset($data) ? $data : '',
            'message' => $message
        );
        return $result;
    }

    public static function get_api_success_response($type, $message, $data = array()) {
        $function_name = debug_backtrace()[1]['function'];
        if ($type == '') {
            $code = $function_name . '_success';
        } else {
            $code = $type . '_success';
        }


        $result = array(
            'code' => $code,
            'data' => isset($data) ? $data : '',
            'message' => $message
        );
        return $result;
    }

    public static function print_object($object, $should_i_die = false) {
        if (self::$debug_mode === false) {
            return;
        }
        echo '<pre>';
        print_r($object);
        echo '</pre>';
        if ($should_i_die === true) {
            die('<br/><br/>Stopping Execution after printing the object.....');
        }
    }

    public static function dump_object($object, $should_i_die = false) {
        if (self::$debug_mode === false) {
            return;
        }

        echo '<pre>';
        var_dump($object);
        echo '</pre>';
        if ($should_i_die === true) {
            die('<br/><br/>Stopping Execution after dumpping the object.....');
        }
    }

    public static function stack_trace() {

        if (self::$debug_mode === false) {
            return;
        }

        echo '<pre>';
        print_r(debug_backtrace());
        echo '</pre>';
        die('<br/><br/>Stopping Execution after printing the object.....');
    }

    // Register Custom Post Type
    public static function register_custom_post_type($name, $slug, $supports = []) {

        if (empty($name) || empty($slug)) {
            return false;
        }

        if (empty($supports)) {
            $supports = array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes');
        }

        $labels = array(
            'name' => __($name, THEME_NAME),
            'singular_name' => __($name, THEME_NAME),
            'menu_name' => __($name, THEME_NAME),
            'parent_item_colon' => __('Parent Item:', THEME_NAME),
            'all_items' => __('All ' . $name, THEME_NAME),
            'view_item' => __('View ' . $name, THEME_NAME),
            'add_new_item' => __('Add New ' . $name, THEME_NAME),
            'add_new' => __('Add New', THEME_NAME),
            'edit_item' => __('Edit ' . $name, THEME_NAME),
            'update_item' => __('Update ' . $name, THEME_NAME),
            'search_items' => __('Search ' . $name, THEME_NAME),
            'not_found' => __($name . ' Not found', THEME_NAME),
            'not_found_in_trash' => __($name . ' Not found in Trash', THEME_NAME),
        );
        $args = array(
            'label' => __($name, THEME_NAME),
            'description' => __('Description', THEME_NAME),
            'labels' => $labels,
            'supports' => $supports,
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 8,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post',
        );
        add_theme_support('post-thumbnails');
        register_post_type($slug, $args);
        return true;
    }

    public static function check_get_current_user_roles($role) {
        $roles = self::get_current_user_roles();
        
        if(in_array($role, $roles)){
            return true;
        } else {
            return false;
        }
    }
    
    public static function get_current_user_roles() {
        if (is_user_logged_in()) {
            $user = wp_get_current_user();
            $roles = (array) $user->roles;
            return $roles; // This returns an array
            // Use this to return a single value
            // return $roles[0];
        } else {
            return array();
        }
    }

}
