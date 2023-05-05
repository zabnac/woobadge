<?php
/**
 * Plugin Name: Custom Badges for WooCommerce
 * Plugin URI: https://github.com/user/repo
 * Description: This plugin adds custom badges to WooCommerce products. I will be adding new features such as modifying the badge look etc.
 * Version: 1.0.0
 * Author: Omer Canbaz
 * Author URI: https://github.com/zabnac
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: custom-badges
 * Domain Path: /languages
 * WC requires at least: 6.2
 * WC tested up to: 6.2
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add custom fields to General tab in Product Data
 */
function custom_badges_product_fields() {
    global $woocommerce, $post;

    echo '<div class="options_group">';

    // Badge Text Field
    woocommerce_wp_text_input(
        array(
            'id' => '_badge_text',
            'label' => __('Badge Text', 'custom-badges'),
            'placeholder' => '',
            'desc_tip' => 'true',
            'description' => __('Enter the text/number to display on the badge.', 'custom-badges')
        )
    );

    // Badge Position Field
    woocommerce_wp_select(
        array(
            'id' => '_badge_position',
            'label' => __('Badge Position', 'custom-badges'),
            'options' => array(
                'left_top' => __('Left Top', 'custom-badges'),
                'right_top' => __('Right Top', 'custom-badges'),
                'left_bottom' => __('Left Bottom', 'custom-badges'),
                'right_bottom' => __('Right Bottom', 'custom-badges'),
            ),
            'desc_tip' => 'true',
            'description' => __('Select the position where the badge will be displayed.', 'custom-badges')
        )
    );

    echo '</div>';
}
add_action('woocommerce_product_options_general_product_data', 'custom_badges_product_fields');

/**
 * Save custom fields values
 */
function custom_badges_save_product_fields($post_id) {
    $badge_text = $_POST['_badge_text'];
    if (!empty($badge_text)) {
        update_post_meta($post_id, '_badge_text', esc_attr($badge_text));
    }

    $badge_position = $_POST['_badge_position'];
    if (!empty($badge_position)) {
        update_post_meta($post_id, '_badge_position', esc_attr($badge_position));
    }
}
add_action('woocommerce_process_product_meta', 'custom_badges_save_product_fields');

/**
 * Display Badge on Product Image
 */
function custom_badges_display_badge() {
    global $product;

    $badge_text = get_post_meta($product->get_id(), '_badge_text', true);
    $badge_position = get_post_meta($product->get_id(), '_badge_position', true);

    if (!empty($badge_text)) {
        echo '<div class="custom-badge ' . esc_attr($badge_position) . '">' . esc_html($badge_text) . '</div>';
    }
}
add_action('woocommerce_before_shop_loop_item_title', 'custom_badges_display_badge', 9);
add_action('woocommerce_before_single_product_summary', 'custom_badges_display_badge', 20);

/**
 * Add custom badge styles to the website
 */
function custom_badges_styles() {
    ?>
    <style type="text/css">
        .custom-badge {
            position: absolute;
            background-color: #dd4d4d;
            color: white;
            border-radius: 8px;
            padding: 3px 10px;
            font-size: 14px;
            z-index: 10;
            white-space: nowrap;
        }

        .custom-badge.left_top {
            top: 10px;
            left: 10px;
        }

        .custom-badge.right_top {
            top: 10px;
            right: 10px;
        }

        .custom-badge.left_bottom {
            bottom: 10px;
            left: 10px;
        }

        .custom-badge.right_bottom {
            bottom: 10px;
            right: 10px;
        }
    </style>
    <?php
}
add_action('wp_head', 'custom_badges_styles');

   
