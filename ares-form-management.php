<?php

/**
 * Plugin Name: Ares Form Management
 * Description: این پلاگین قابلیت مدیریت فرم‌ها را فراهم می‌کند.
 * Version: 1.0
 * Author: Ares
*/

// ثبت فرم در منوی مدیریت
function ares_add_form_menu() {
    add_menu_page(
        'Ares Form Management',
        'Ares Form Management',
        'manage_options',
        'ares_form_management',
        'ares_form_management_page',
        'dashicons-feedback',
        20
    );
}

add_action('admin_menu', 'ares_add_form_menu');

// صفحه مدیریت فرم‌ها
function ares_form_management_page() {
    // خواندن و نمایش فایل HTML
    $html_file = plugin_dir_path(__FILE__) . 'style/index.html';
    if (file_exists($html_file)) {
        echo file_get_contents($html_file);
    }

    // خواندن و نمایش فایل CSS
    $css_file = plugin_dir_url(__FILE__) . 'style/css/main.css';
    if (file_exists($css_file)) {
        echo '<style>';
        echo file_get_contents($css_file);
        echo '</style>';
    }
}


// ثبت اسکریپت‌ها و استایل‌های مورد نیاز
function ares_enqueue_scripts() {
    wp_enqueue_script('ares-form-script', plugin_dir_url(__FILE__) . 'js/form-script.js', array('jquery'), '1.0', true);
    wp_enqueue_style('ares-form-style', plugins_url('style/css/main.css', __FILE__), array(), '1.0');
}

add_action('admin_enqueue_scripts', 'ares_enqueue_scripts');


