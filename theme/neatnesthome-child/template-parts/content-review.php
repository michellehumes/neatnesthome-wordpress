<?php
/**
 * Template Part: Single Product Review
 *
 * Use this template for individual product review posts.
 * Copy content to your post or use as reference.
 *
 * @package NeatNestHome
 */

// Get ACF fields
$product_name = get_field('product_name');
$subtitle = get_field('product_subtitle');
$amazon_url = get_field('amazon_url');
$price_range = get_field('price_range');
$rating = get_field('rating');
$best_for = get_field('best_for');
$pros = get_field('pros');
$cons = get_field('cons');
$key_features = get_field('key_features');
$product_image = get_field('product_image');
$faq_items = get_field('faq_items');

// Fallback to featured image
if (!$product_image) {
    $product_image = get_the_post_thumbnail_url(get_the_ID(), 'nnh-product-box');
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

        <div class="entry-meta">
            <span class="posted-on">Last Updated: <?php echo get_the_modified_date(); ?></span>
        </div>
    </header>

    <div class="entry-content">

        <!-- Introduction Section -->
        <section class="nnh-intro">
            <?php
            // Display first paragraph/intro from post content
            $content = get_the_content();
            $intro_end = strpos($content, '</p>');
            if ($intro_end !== false) {
                echo '<p>' . substr($content, 0, $intro_end + 4) . '</p>';
            }
            ?>
        </section>

        <!-- Quick Navigation -->
        <nav class="nnh-toc" style="background: var(--nnh-gray-100); padding: 20px; border-radius: var(--nnh-radius-md); margin: 30px 0;">
            <strong>In This Review:</strong>
            <ul style="margin: 10px 0 0; padding-left: 20px;">
                <li><a href="#overview">Product Overview</a></li>
                <li><a href="#pros-cons">Pros & Cons</a></li>
                <li><a href="#who-its-for">Who It's For</a></li>
                <li><a href="#alternatives">Alternatives to Consider</a></li>
                <li><a href="#verdict">Our Verdict</a></li>
                <?php if ($faq_items) : ?><li><a href="#faq">FAQ</a></li><?php endif; ?>
            </ul>
        </nav>

        <!-- Product Overview Section -->
        <section id="overview">
            <h2><?php echo esc_html($product_name); ?> Overview</h2>

            <?php if ($product_image) : ?>
            <figure class="nnh-product-box__image" style="text-align: center; margin: 20px 0;">
                <img src="<?php echo esc_url($product_image); ?>"
                     alt="<?php echo esc_attr($product_name); ?>"
                     loading="lazy">
            </figure>
            <?php endif; ?>

            <div class="nnh-product-box nnh-product-box--featured">
                <div class="nnh-product-box__header">
                    <div>
                        <h3 class="nnh-product-box__title"><?php echo esc_html($product_name); ?></h3>
                        <?php if ($subtitle) : ?>
                        <p class="nnh-product-box__subtitle"><?php echo esc_html($subtitle); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if ($price_range) : ?>
                    <span class="nnh-product-box__price"><?php echo esc_html($price_range); ?></span>
                    <?php endif; ?>
                </div>

                <?php if ($rating) : ?>
                <div class="nnh-product-box__rating">
                    <span class="nnh-product-box__stars"><?php echo nnh_get_star_rating($rating); ?></span>
                    <span class="nnh-product-box__rating-text"><?php echo esc_html($rating); ?> out of 5</span>
                </div>
                <?php endif; ?>

                <?php if ($key_features) : ?>
                <ul class="nnh-product-box__features">
                    <?php foreach ($key_features as $feature) : ?>
                    <li><?php echo esc_html($feature['feature']); ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <?php if ($amazon_url) : ?>
                <div class="nnh-product-box__cta">
                    <?php echo nnh_get_amazon_button($amazon_url, 'Check Current Price on Amazon'); ?>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Pros & Cons Section -->
        <section id="pros-cons">
            <h2>Pros & Cons</h2>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin: 20px 0;">
                <?php if ($pros) : ?>
                <div style="background: #E8F5E9; padding: 20px; border-radius: var(--nnh-radius-md);">
                    <h4 style="color: #2E7D32; margin-top: 0;">What We Like</h4>
                    <ul style="margin: 0; padding-left: 20px;">
                        <?php foreach ($pros as $pro) : ?>
                        <li style="margin-bottom: 8px;"><?php echo esc_html($pro['pro']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if ($cons) : ?>
                <div style="background: #FFEBEE; padding: 20px; border-radius: var(--nnh-radius-md);">
                    <h4 style="color: #C62828; margin-top: 0;">Room for Improvement</h4>
                    <ul style="margin: 0; padding-left: 20px;">
                        <?php foreach ($cons as $con) : ?>
                        <li style="margin-bottom: 8px;"><?php echo esc_html($con['con']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Who It's For Section -->
        <section id="who-its-for">
            <h2>Who Is This For?</h2>

            <?php if ($best_for) : ?>
            <div class="nnh-callout">
                <div class="nnh-callout__title">Best For</div>
                <p><?php echo esc_html($best_for); ?></p>
            </div>
            <?php endif; ?>

            <!-- Add your detailed "who it's for" content here -->
            <p>[Add detailed description of the ideal user for this product. Consider space constraints, budget, lifestyle, etc.]</p>
        </section>

        <!-- Alternatives Section -->
        <section id="alternatives">
            <h2>Alternatives to Consider</h2>
            <p>If the <?php echo esc_html($product_name); ?> isn't quite right for you, here are some alternatives:</p>

            <!-- Use product_box shortcodes for alternatives -->
            <p><em>[Add 2-3 alternative product boxes using the [product_box] shortcode]</em></p>

            <!--
            Example:
            [product_box
                name="Alternative Product Name"
                price="$XX"
                rating="4.5"
                amazon_url="https://amazon.com/dp/XXXXXXX"
                image="image-url.jpg"
            ]
            [feature]Feature 1[/feature]
            [feature]Feature 2[/feature]
            [feature]Feature 3[/feature]
            [best_for]Different use case[/best_for]
            [/product_box]
            -->
        </section>

        <!-- Verdict Section -->
        <section id="verdict">
            <h2>Our Verdict</h2>

            <div class="nnh-callout nnh-callout--tip">
                <div class="nnh-callout__icon">⭐</div>
                <div class="nnh-callout__title">Bottom Line</div>
                <p>[Summarize your recommendation. Is it worth the price? Who should buy it? Any final tips?]</p>
            </div>

            <?php if ($amazon_url) : ?>
            <div style="text-align: center; margin: 30px 0;">
                <?php echo nnh_get_amazon_button($amazon_url, 'Get the ' . $product_name . ' on Amazon', 'nnh-btn--lg'); ?>
            </div>
            <?php endif; ?>
        </section>

        <!-- FAQ Section -->
        <?php if ($faq_items) : ?>
        <section id="faq">
            <h2>Frequently Asked Questions</h2>

            <div class="nnh-faq-list">
                <?php foreach ($faq_items as $faq) : ?>
                <div class="nnh-faq-item" style="margin-bottom: 20px; padding: 20px; background: var(--nnh-gray-100); border-radius: var(--nnh-radius-md);">
                    <h4 style="margin-top: 0; margin-bottom: 10px;"><?php echo esc_html($faq['question']); ?></h4>
                    <p style="margin: 0;"><?php echo wp_kses_post($faq['answer']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

    </div>
</article>
