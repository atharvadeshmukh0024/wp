<?php
/*
Plugin Name: WPQuickView Share Buttons
Description: Adds floating social share buttons (Twitter, LinkedIn, WhatsApp) to blog posts.
Version: 1.0
Author: Nakshatra Deshmukh
*/

// Enqueue CSS for styling the buttons
function wpqv_enqueue_share_buttons_style() {
    wp_enqueue_style('wpqv-share-buttons-style', plugin_dir_url(__FILE__) . 'style.css');
}
add_action('wp_enqueue_scripts', 'wpqv_enqueue_share_buttons_style');

// Add buttons after post content
function wpqv_add_share_buttons($content) {
    if (is_single()) {
        $url = urlencode(get_permalink());
        $title = urlencode(get_the_title());

        $buttons = '<div class="wpqv-share-buttons">
            <a href="https://wa.me/?text=' . $title . ' ' . $url . '" target="_blank" class="wpqv-button wpqv-wa">WhatsApp</a>
            <a href="https://twitter.com/intent/tweet?url=' . $url . '&text=' . $title . '" target="_blank" class="wpqv-button wpqv-twitter">Twitter</a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=' . $url . '" target="_blank" class="wpqv-button wpqv-linkedin">LinkedIn</a>
        </div>';
        return $content . $buttons;
    }
    return $content;
}
add_filter('the_content', 'wpqv_add_share_buttons');
?>
