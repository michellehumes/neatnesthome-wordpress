<?php
/**
 * Neat Nest Home Child Theme Functions
 *
 * @package NeatNestHome
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// =============================================================================
// THEME SETUP
// =============================================================================

/**
 * Enqueue parent and child theme styles
 */
function nnh_enqueue_styles() {
    // Parent theme style
    wp_enqueue_style(
        'generatepress-style',
        get_template_directory_uri() . '/style.css'
    );

    // Child theme style
    wp_enqueue_style(
        'neatnesthome-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('generatepress-style'),
        wp_get_theme()->get('Version')
    );

    // Google Fonts
    wp_enqueue_style(
        'nnh-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@400;500;600&family=Montserrat:wght@500;600;700&display=swap',
        array(),
        null
    );

    // Affiliate enhancements script
    wp_enqueue_script(
        'nnh-affiliate-enhancements',
        get_stylesheet_directory_uri() . '/assets/js/affiliate-enhancements.js',
        array(),
        '1.0.0',
        true
    );

    // Pass config to JS
    wp_localize_script('nnh-affiliate-enhancements', 'nnhConfig', array(
        'affiliateTag' => nnh_get_affiliate_tag(),
        'siteUrl' => home_url(),
    ));
}
add_action('wp_enqueue_scripts', 'nnh_enqueue_styles');

/**
 * Theme setup
 */
function nnh_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'gallery', 'caption'));

    // Custom image sizes
    add_image_size('nnh-product-box', 400, 400, true);
    add_image_size('nnh-card', 600, 400, true);
    add_image_size('nnh-hero', 1200, 600, true);

    // Register nav menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'neatnesthome'),
        'footer' => __('Footer Menu', 'neatnesthome'),
    ));
}
add_action('after_setup_theme', 'nnh_theme_setup');

// =============================================================================
// AMAZON AFFILIATE TAG MANAGEMENT
// =============================================================================

/**
 * Get the Amazon affiliate tag
 */
function nnh_get_affiliate_tag() {
    // Store your affiliate tag here - change this to your actual tag
    return defined('NNH_AFFILIATE_TAG') ? NNH_AFFILIATE_TAG : 'neatnesthome-20';
}

/**
 * Append affiliate tag to Amazon URLs
 *
 * @param string $url The Amazon URL
 * @return string URL with affiliate tag
 */
function nnh_add_affiliate_tag($url) {
    if (empty($url)) {
        return $url;
    }

    // Check if it's an Amazon URL
    if (strpos($url, 'amazon.com') === false && strpos($url, 'amzn.to') === false) {
        return $url;
    }

    // Parse URL
    $parsed = parse_url($url);
    if (!$parsed) {
        return $url;
    }

    // Parse existing query string
    $query_params = array();
    if (isset($parsed['query'])) {
        parse_str($parsed['query'], $query_params);
    }

    // Only add tag if not already present
    if (!isset($query_params['tag'])) {
        $query_params['tag'] = nnh_get_affiliate_tag();
    }

    // Rebuild URL
    $new_query = http_build_query($query_params);
    $scheme = isset($parsed['scheme']) ? $parsed['scheme'] . '://' : 'https://';
    $host = isset($parsed['host']) ? $parsed['host'] : '';
    $path = isset($parsed['path']) ? $parsed['path'] : '';

    return $scheme . $host . $path . '?' . $new_query;
}

/**
 * Filter all content to add affiliate tags to Amazon links
 */
function nnh_filter_affiliate_links($content) {
    if (empty($content)) {
        return $content;
    }

    // Pattern to match Amazon links
    $pattern = '/<a\s[^>]*href=["\']([^"\']*(?:amazon\.com|amzn\.to)[^"\']*)["\'][^>]*>/i';

    return preg_replace_callback($pattern, function($matches) {
        $original_tag = $matches[0];
        $url = $matches[1];
        $new_url = nnh_add_affiliate_tag($url);

        // Replace the URL in the tag
        $new_tag = str_replace($url, $new_url, $original_tag);

        // Add rel attributes if not present
        if (strpos($new_tag, 'rel=') === false) {
            $new_tag = str_replace('<a ', '<a rel="nofollow noopener sponsored" ', $new_tag);
        }

        // Add target="_blank" if not present
        if (strpos($new_tag, 'target=') === false) {
            $new_tag = str_replace('<a ', '<a target="_blank" ', $new_tag);
        }

        return $new_tag;
    }, $content);
}
add_filter('the_content', 'nnh_filter_affiliate_links', 20);

// =============================================================================
// AFFILIATE DISCLOSURE
// =============================================================================

/**
 * Auto-add affiliate disclosure to posts
 */
function nnh_add_affiliate_disclosure($content) {
    if (!is_single() || !in_the_loop() || !is_main_query()) {
        return $content;
    }

    // Get post categories
    $categories = get_the_category();
    $review_categories = array(
        'kitchen-pantry',
        'closet-bedroom',
        'bathroom-linen',
        'entryway-living-room',
        'small-spaces',
        'kids-family',
        'laundry-cleaning',
        'garage-seasonal',
        'reviews',
        'roundups',
    );

    $is_review = false;
    foreach ($categories as $cat) {
        if (in_array($cat->slug, $review_categories)) {
            $is_review = true;
            break;
        }
    }

    // Also check for custom field
    if (get_post_meta(get_the_ID(), '_nnh_has_affiliate_links', true) === 'yes') {
        $is_review = true;
    }

    if (!$is_review) {
        return $content;
    }

    $disclosure = '
    <div class="nnh-disclosure">
        <p>
            <strong>Disclosure:</strong> This post contains affiliate links. If you purchase through our links, we may earn a small commission at no extra cost to you. This helps support Neat Nest Home. <a href="' . home_url('/affiliate-disclosure/') . '">Learn more</a>
        </p>
    </div>';

    return $disclosure . $content;
}
add_filter('the_content', 'nnh_add_affiliate_disclosure', 5);

// =============================================================================
// SHORTCODES - PRODUCT BOX
// =============================================================================

/**
 * Product Box Shortcode
 *
 * Usage: [product_box name="Product Name" price="$29" rating="4.5" amazon_url="..." featured="yes"]
 *        [feature]Feature 1[/feature]
 *        [feature]Feature 2[/feature]
 *        [best_for]Small kitchens[/best_for]
 *        [/product_box]
 */
function nnh_product_box_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'name' => '',
        'subtitle' => '',
        'price' => '',
        'rating' => '',
        'amazon_url' => '',
        'image' => '',
        'featured' => 'no',
        'best_for' => '',
    ), $atts, 'product_box');

    // Ensure affiliate tag on URL
    $amazon_url = nnh_add_affiliate_tag($atts['amazon_url']);

    // Generate star rating
    $stars = '';
    if ($atts['rating']) {
        $rating = floatval($atts['rating']);
        $full_stars = floor($rating);
        $half_star = ($rating - $full_stars) >= 0.5;

        for ($i = 0; $i < $full_stars; $i++) {
            $stars .= '★';
        }
        if ($half_star) {
            $stars .= '★';
        }
        for ($i = 0; $i < (5 - ceil($rating)); $i++) {
            $stars .= '☆';
        }
    }

    $featured_class = $atts['featured'] === 'yes' ? ' nnh-product-box--featured' : '';

    // Parse nested shortcodes for features
    $features = array();
    if (preg_match_all('/\[feature\](.*?)\[\/feature\]/s', $content, $matches)) {
        $features = $matches[1];
    }

    // Parse best_for if in content
    $best_for = $atts['best_for'];
    if (preg_match('/\[best_for\](.*?)\[\/best_for\]/s', $content, $match)) {
        $best_for = $match[1];
    }

    ob_start();
    ?>
    <div class="nnh-product-box<?php echo esc_attr($featured_class); ?>">
        <?php if ($atts['image']) : ?>
        <div class="nnh-product-box__image">
            <img src="<?php echo esc_url($atts['image']); ?>" alt="<?php echo esc_attr($atts['name']); ?>">
        </div>
        <?php endif; ?>

        <div class="nnh-product-box__header">
            <div>
                <h3 class="nnh-product-box__title"><?php echo esc_html($atts['name']); ?></h3>
                <?php if ($atts['subtitle']) : ?>
                <p class="nnh-product-box__subtitle"><?php echo esc_html($atts['subtitle']); ?></p>
                <?php endif; ?>
            </div>
            <?php if ($atts['price']) : ?>
            <span class="nnh-product-box__price"><?php echo esc_html($atts['price']); ?></span>
            <?php endif; ?>
        </div>

        <?php if ($stars) : ?>
        <div class="nnh-product-box__rating">
            <span class="nnh-product-box__stars"><?php echo $stars; ?></span>
            <span class="nnh-product-box__rating-text"><?php echo esc_html($atts['rating']); ?> out of 5</span>
        </div>
        <?php endif; ?>

        <?php if (!empty($features)) : ?>
        <ul class="nnh-product-box__features">
            <?php foreach ($features as $feature) : ?>
            <li><?php echo wp_kses_post(trim($feature)); ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <?php if ($best_for) : ?>
        <div class="nnh-product-box__best-for">
            <strong>Best For:</strong> <?php echo esc_html($best_for); ?>
        </div>
        <?php endif; ?>

        <?php if ($amazon_url) : ?>
        <div class="nnh-product-box__cta">
            <a href="<?php echo esc_url($amazon_url); ?>"
               class="affiliate-button"
               target="_blank"
               rel="nofollow noopener sponsored">
                View on Amazon
            </a>
        </div>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('product_box', 'nnh_product_box_shortcode');

// =============================================================================
// SHORTCODES - COMPARISON TABLE
// =============================================================================

/**
 * Comparison Table Shortcode
 *
 * Usage: [comparison_table]
 *        [product name="Product 1" price="$29" best_for="Small spaces" rating="4.8" amazon_url="..." winner="yes"]
 *        [product name="Product 2" price="$39" best_for="Large families" rating="4.6" amazon_url="..."]
 *        [/comparison_table]
 */
function nnh_comparison_table_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'title' => 'Quick Comparison',
    ), $atts, 'comparison_table');

    // Parse products from content
    $products = array();
    if (preg_match_all('/\[product\s+([^\]]+)\]/', $content, $matches, PREG_SET_ORDER)) {
        foreach ($matches as $match) {
            $product_atts = shortcode_parse_atts($match[1]);
            $products[] = wp_parse_args($product_atts, array(
                'name' => '',
                'price' => '',
                'best_for' => '',
                'rating' => '',
                'amazon_url' => '',
                'winner' => 'no',
                'badge' => '',
            ));
        }
    }

    if (empty($products)) {
        return '';
    }

    ob_start();
    ?>
    <div class="nnh-quick-compare">
        <h3><?php echo esc_html($atts['title']); ?></h3>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Best For</th>
                    <th>Price</th>
                    <th>Rating</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) :
                    $url = nnh_add_affiliate_tag($product['amazon_url']);
                    $badge_class = '';
                    $badge_text = '';

                    if ($product['winner'] === 'yes') {
                        $badge_class = 'badge--winner';
                        $badge_text = 'WINNER';
                    } elseif ($product['badge']) {
                        $badge_text = strtoupper($product['badge']);
                        if (stripos($product['badge'], 'budget') !== false) {
                            $badge_class = 'badge--budget';
                        } elseif (stripos($product['badge'], 'premium') !== false) {
                            $badge_class = 'badge--premium';
                        } else {
                            $badge_class = 'badge--winner';
                        }
                    }
                ?>
                <tr>
                    <td>
                        <?php if ($badge_text) : ?>
                        <span class="badge <?php echo esc_attr($badge_class); ?>"><?php echo esc_html($badge_text); ?></span>
                        <?php endif; ?>
                        <strong><?php echo esc_html($product['name']); ?></strong>
                    </td>
                    <td><?php echo esc_html($product['best_for']); ?></td>
                    <td><strong><?php echo esc_html($product['price']); ?></strong></td>
                    <td>
                        <span class="stars" style="color: #F4A524;">
                            <?php
                            $rating = floatval($product['rating']);
                            echo str_repeat('★', floor($rating));
                            if ($rating - floor($rating) >= 0.5) echo '★';
                            echo str_repeat('☆', 5 - ceil($rating));
                            ?>
                        </span>
                    </td>
                    <td>
                        <a href="<?php echo esc_url($url); ?>"
                           target="_blank"
                           rel="nofollow noopener sponsored"
                           style="color: var(--nnh-accent); font-weight: 600; text-decoration: none;">
                            View →
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('comparison_table', 'nnh_comparison_table_shortcode');

// =============================================================================
// SHORTCODES - CHECKLIST
// =============================================================================

/**
 * Checklist Shortcode
 *
 * Usage: [checklist title="30-Day Declutter Checklist"]
 *        [item]Clear kitchen counters[/item]
 *        [item product_url="..." product_name="Organizer"]Organize pantry[/item]
 *        [/checklist]
 */
function nnh_checklist_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'title' => 'Checklist',
    ), $atts, 'checklist');

    // Parse items from content
    $items = array();
    if (preg_match_all('/\[item([^\]]*)\](.*?)\[\/item\]/s', $content, $matches, PREG_SET_ORDER)) {
        foreach ($matches as $match) {
            $item_atts = shortcode_parse_atts($match[1]);
            $items[] = array(
                'text' => trim($match[2]),
                'product_url' => isset($item_atts['product_url']) ? $item_atts['product_url'] : '',
                'product_name' => isset($item_atts['product_name']) ? $item_atts['product_name'] : 'Shop product',
            );
        }
    }

    if (empty($items)) {
        return '';
    }

    ob_start();
    ?>
    <div class="nnh-checklist">
        <h4 class="nnh-checklist__title"><?php echo esc_html($atts['title']); ?></h4>
        <ul class="nnh-checklist__list">
            <?php foreach ($items as $item) :
                $product_url = $item['product_url'] ? nnh_add_affiliate_tag($item['product_url']) : '';
            ?>
            <li class="nnh-checklist__item">
                <span class="nnh-checklist__checkbox">✓</span>
                <div class="nnh-checklist__content">
                    <span class="nnh-checklist__text"><?php echo wp_kses_post($item['text']); ?></span>
                    <?php if ($product_url) : ?>
                    <a href="<?php echo esc_url($product_url); ?>"
                       class="nnh-checklist__product-link"
                       target="_blank"
                       rel="nofollow noopener sponsored">
                        <?php echo esc_html($item['product_name']); ?> →
                    </a>
                    <?php endif; ?>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('checklist', 'nnh_checklist_shortcode');

// =============================================================================
// SHORTCODES - CALLOUT BOX
// =============================================================================

/**
 * Callout Box Shortcode
 *
 * Usage: [callout type="tip" title="Pro Tip"]Your tip content here[/callout]
 */
function nnh_callout_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'type' => 'default', // default, tip, warning
        'title' => '',
    ), $atts, 'callout');

    $class = 'nnh-callout';
    if ($atts['type'] === 'tip') {
        $class .= ' nnh-callout--tip';
        $icon = '💡';
        $default_title = 'Pro Tip';
    } elseif ($atts['type'] === 'warning') {
        $class .= ' nnh-callout--warning';
        $icon = '⚠️';
        $default_title = 'Note';
    } else {
        $icon = '📌';
        $default_title = 'Note';
    }

    $title = $atts['title'] ? $atts['title'] : $default_title;

    ob_start();
    ?>
    <div class="<?php echo esc_attr($class); ?>">
        <div class="nnh-callout__icon"><?php echo $icon; ?></div>
        <div class="nnh-callout__title"><?php echo esc_html($title); ?></div>
        <p><?php echo wp_kses_post(do_shortcode($content)); ?></p>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('callout', 'nnh_callout_shortcode');

// =============================================================================
// REVIEW SCHEMA MARKUP
// =============================================================================

/**
 * Add Review/Product schema to posts with ACF fields
 */
function nnh_add_review_schema() {
    if (!is_single()) {
        return;
    }

    $post_id = get_the_ID();

    // Check if post has product/review data (ACF fields)
    $product_name = get_field('product_name', $post_id);
    $rating = get_field('rating', $post_id);
    $amazon_url = get_field('amazon_url', $post_id);

    if (!$product_name) {
        return;
    }

    // Get additional data
    $price_range = get_field('price_range', $post_id);
    $pros = get_field('pros', $post_id);
    $image = get_the_post_thumbnail_url($post_id, 'full');

    // Build schema
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        'name' => $product_name,
        'description' => get_the_excerpt($post_id),
        'review' => array(
            '@type' => 'Review',
            'reviewRating' => array(
                '@type' => 'Rating',
                'ratingValue' => $rating ? $rating : '4.5',
                'bestRating' => '5',
                'worstRating' => '1',
            ),
            'author' => array(
                '@type' => 'Organization',
                'name' => 'Neat Nest Home',
            ),
            'datePublished' => get_the_date('c', $post_id),
        ),
    );

    if ($image) {
        $schema['image'] = $image;
    }

    if ($amazon_url) {
        $schema['url'] = nnh_add_affiliate_tag($amazon_url);
    }

    if ($price_range) {
        // Parse price range like "$20-$30"
        preg_match('/\$?(\d+(?:\.\d{2})?)/', $price_range, $matches);
        if ($matches) {
            $schema['offers'] = array(
                '@type' => 'Offer',
                'price' => $matches[1],
                'priceCurrency' => 'USD',
                'availability' => 'https://schema.org/InStock',
            );
        }
    }

    // Add aggregateRating if we have one
    if ($rating) {
        $schema['aggregateRating'] = array(
            '@type' => 'AggregateRating',
            'ratingValue' => $rating,
            'bestRating' => '5',
            'reviewCount' => '1',
        );
    }

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
}
add_action('wp_head', 'nnh_add_review_schema');

/**
 * Add FAQ Schema for posts with FAQ content
 */
function nnh_add_faq_schema() {
    if (!is_single()) {
        return;
    }

    $post_id = get_the_ID();
    $faqs = get_field('faq_items', $post_id);

    if (!$faqs || !is_array($faqs)) {
        return;
    }

    $faq_items = array();
    foreach ($faqs as $faq) {
        if (!empty($faq['question']) && !empty($faq['answer'])) {
            $faq_items[] = array(
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => array(
                    '@type' => 'Answer',
                    'text' => $faq['answer'],
                ),
            );
        }
    }

    if (empty($faq_items)) {
        return;
    }

    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $faq_items,
    );

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
}
add_action('wp_head', 'nnh_add_faq_schema');

// =============================================================================
// CUSTOM POST TYPE: REVIEWS (Optional - Alternative to using standard posts)
// =============================================================================

/**
 * Register Reviews Custom Post Type
 * Uncomment this function if you prefer a separate post type for reviews
 */
/*
function nnh_register_reviews_cpt() {
    $labels = array(
        'name' => 'Reviews',
        'singular_name' => 'Review',
        'menu_name' => 'Reviews',
        'add_new' => 'Add New Review',
        'add_new_item' => 'Add New Review',
        'edit_item' => 'Edit Review',
        'new_item' => 'New Review',
        'view_item' => 'View Review',
        'search_items' => 'Search Reviews',
        'not_found' => 'No reviews found',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'reviews'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon' => 'dashicons-star-filled',
        'show_in_rest' => true,
    );

    register_post_type('reviews', $args);
}
add_action('init', 'nnh_register_reviews_cpt');
*/

// =============================================================================
// REGISTER CUSTOM TAXONOMIES (Room Categories)
// =============================================================================

/**
 * Register Room taxonomy for better organization
 */
function nnh_register_room_taxonomy() {
    $labels = array(
        'name' => 'Rooms',
        'singular_name' => 'Room',
        'menu_name' => 'Rooms',
        'all_items' => 'All Rooms',
        'edit_item' => 'Edit Room',
        'view_item' => 'View Room',
        'add_new_item' => 'Add New Room',
        'search_items' => 'Search Rooms',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'room'),
    );

    register_taxonomy('room', array('post'), $args);
}
add_action('init', 'nnh_register_room_taxonomy');

// =============================================================================
// ADMIN CUSTOMIZATIONS
// =============================================================================

/**
 * Add admin columns for affiliate link status
 */
function nnh_add_affiliate_column($columns) {
    $columns['has_affiliate'] = 'Affiliate Links';
    return $columns;
}
add_filter('manage_posts_columns', 'nnh_add_affiliate_column');

function nnh_render_affiliate_column($column, $post_id) {
    if ($column === 'has_affiliate') {
        $content = get_post_field('post_content', $post_id);
        if (strpos($content, 'amazon.com') !== false || strpos($content, 'amzn.to') !== false) {
            echo '<span style="color: green;">✓ Yes</span>';
        } else {
            echo '<span style="color: #999;">—</span>';
        }
    }
}
add_action('manage_posts_custom_column', 'nnh_render_affiliate_column', 10, 2);

// =============================================================================
// ACF JSON LOCAL SAVE/LOAD
// =============================================================================

/**
 * Save ACF JSON to theme folder
 */
function nnh_acf_json_save_point($path) {
    return get_stylesheet_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'nnh_acf_json_save_point');

/**
 * Load ACF JSON from theme folder
 */
function nnh_acf_json_load_point($paths) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', 'nnh_acf_json_load_point');

// =============================================================================
// PERFORMANCE OPTIMIZATIONS
// =============================================================================

/**
 * Add lazy loading to images
 */
function nnh_add_lazy_loading($content) {
    // Add loading="lazy" to images that don't have it
    $content = preg_replace(
        '/<img((?!loading=)[^>]*)>/i',
        '<img$1 loading="lazy">',
        $content
    );
    return $content;
}
add_filter('the_content', 'nnh_add_lazy_loading', 999);

/**
 * Preload critical fonts
 */
function nnh_preload_fonts() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'nnh_preload_fonts', 1);

// =============================================================================
// UTILITY FUNCTIONS
// =============================================================================

/**
 * Generate star rating HTML
 */
function nnh_get_star_rating($rating) {
    $rating = floatval($rating);
    $full_stars = floor($rating);
    $half_star = ($rating - $full_stars) >= 0.5;

    $output = '<span class="nnh-stars" style="color: #F4A524;">';
    for ($i = 0; $i < $full_stars; $i++) {
        $output .= '★';
    }
    if ($half_star) {
        $output .= '★';
    }
    for ($i = 0; $i < (5 - ceil($rating)); $i++) {
        $output .= '☆';
    }
    $output .= '</span>';

    return $output;
}

/**
 * Get Amazon button HTML
 */
function nnh_get_amazon_button($url, $text = 'View on Amazon', $class = '') {
    $url = nnh_add_affiliate_tag($url);
    $classes = 'affiliate-button' . ($class ? ' ' . $class : '');

    return sprintf(
        '<a href="%s" class="%s" target="_blank" rel="nofollow noopener sponsored">%s</a>',
        esc_url($url),
        esc_attr($classes),
        esc_html($text)
    );
}
