<?php
/**
 * Template Name: Homepage
 *
 * Custom homepage template for Neat Nest Home
 *
 * @package NeatNestHome
 */

get_header();
?>

<main id="primary" class="site-main nnh-homepage">

    <!-- HERO SECTION -->
    <section class="nnh-hero">
        <div class="nnh-hero__content" style="max-width: 800px; margin: 0 auto;">
            <h1 class="nnh-hero__headline">Smart storage for real life.</h1>
            <p class="nnh-hero__subhead">
                Practical organizing solutions that actually work—no Pinterest-perfect closets required.
                Just real tips, honest reviews, and products that help tame the chaos.
            </p>
            <a href="<?php echo home_url('/30-day-declutter-plan/'); ?>" class="affiliate-button nnh-btn--lg">
                Start with the 30-Day Declutter Plan
            </a>
        </div>
    </section>

    <!-- CATEGORY GRID -->
    <section class="nnh-category-section" style="padding: var(--nnh-space-2xl) var(--nnh-space-lg); max-width: 1200px; margin: 0 auto;">
        <h2 class="nnh-section-title">Find Solutions by Room</h2>

        <div class="nnh-category-grid">

            <a href="<?php echo home_url('/category/kitchen-pantry/'); ?>" class="nnh-category-card">
                <div class="nnh-category-card__image" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/category-kitchen.jpg'); background-color: var(--nnh-primary-light);"></div>
                <div class="nnh-category-card__content">
                    <h3 class="nnh-category-card__title">Kitchen & Pantry</h3>
                </div>
            </a>

            <a href="<?php echo home_url('/category/closet-bedroom/'); ?>" class="nnh-category-card">
                <div class="nnh-category-card__image" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/category-closet.jpg'); background-color: var(--nnh-primary-light);"></div>
                <div class="nnh-category-card__content">
                    <h3 class="nnh-category-card__title">Closet & Bedroom</h3>
                </div>
            </a>

            <a href="<?php echo home_url('/category/bathroom-linen/'); ?>" class="nnh-category-card">
                <div class="nnh-category-card__image" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/category-bathroom.jpg'); background-color: var(--nnh-primary-light);"></div>
                <div class="nnh-category-card__content">
                    <h3 class="nnh-category-card__title">Bathroom & Linen</h3>
                </div>
            </a>

            <a href="<?php echo home_url('/category/small-spaces/'); ?>" class="nnh-category-card">
                <div class="nnh-category-card__image" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/category-small-spaces.jpg'); background-color: var(--nnh-primary-light);"></div>
                <div class="nnh-category-card__content">
                    <h3 class="nnh-category-card__title">Small Spaces & Apartments</h3>
                </div>
            </a>

            <a href="<?php echo home_url('/category/kids-family/'); ?>" class="nnh-category-card">
                <div class="nnh-category-card__image" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/category-kids.jpg'); background-color: var(--nnh-primary-light);"></div>
                <div class="nnh-category-card__content">
                    <h3 class="nnh-category-card__title">Kids & Family</h3>
                </div>
            </a>

            <a href="<?php echo home_url('/category/entryway-living-room/'); ?>" class="nnh-category-card">
                <div class="nnh-category-card__image" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/category-entryway.jpg'); background-color: var(--nnh-primary-light);"></div>
                <div class="nnh-category-card__content">
                    <h3 class="nnh-category-card__title">Entryway & Living Room</h3>
                </div>
            </a>

            <a href="<?php echo home_url('/category/laundry-cleaning/'); ?>" class="nnh-category-card">
                <div class="nnh-category-card__image" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/category-laundry.jpg'); background-color: var(--nnh-primary-light);"></div>
                <div class="nnh-category-card__content">
                    <h3 class="nnh-category-card__title">Laundry & Cleaning</h3>
                </div>
            </a>

            <a href="<?php echo home_url('/category/garage-seasonal/'); ?>" class="nnh-category-card">
                <div class="nnh-category-card__image" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/category-garage.jpg'); background-color: var(--nnh-primary-light);"></div>
                <div class="nnh-category-card__content">
                    <h3 class="nnh-category-card__title">Garage & Seasonal</h3>
                </div>
            </a>

        </div>
    </section>

    <!-- TOP PICKS SECTION -->
    <section class="nnh-top-picks">
        <h2 class="nnh-section-title">Neat Nest Top Picks</h2>
        <p style="text-align: center; max-width: 600px; margin: -15px auto 30px; color: var(--nnh-text-light);">
            Our favorite products that actually work—tested and approved by real organizers.
        </p>

        <div class="nnh-top-picks__grid">

            <?php
            // Query featured products (posts with 'featured' tag or custom field)
            $featured_query = new WP_Query(array(
                'posts_per_page' => 6,
                'tag' => 'featured',
                'post_status' => 'publish',
            ));

            if ($featured_query->have_posts()) :
                while ($featured_query->have_posts()) : $featured_query->the_post();
                    $product_name = get_field('product_name') ?: get_the_title();
                    $price = get_field('price_range') ?: '';
                    $rating = get_field('rating') ?: '4.5';
                    $amazon_url = get_field('amazon_url') ?: '#';
            ?>

            <div class="nnh-product-box">
                <?php if (has_post_thumbnail()) : ?>
                <div class="nnh-product-box__image">
                    <?php the_post_thumbnail('nnh-product-box'); ?>
                </div>
                <?php endif; ?>

                <div class="nnh-product-box__header">
                    <div>
                        <h3 class="nnh-product-box__title" style="font-size: 1.1rem;">
                            <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
                                <?php echo esc_html($product_name); ?>
                            </a>
                        </h3>
                    </div>
                    <?php if ($price) : ?>
                    <span class="nnh-product-box__price"><?php echo esc_html($price); ?></span>
                    <?php endif; ?>
                </div>

                <div class="nnh-product-box__rating">
                    <?php echo nnh_get_star_rating($rating); ?>
                    <span class="nnh-product-box__rating-text"><?php echo esc_html($rating); ?></span>
                </div>

                <div class="nnh-product-box__cta">
                    <?php echo nnh_get_amazon_button($amazon_url, 'View on Amazon', 'nnh-btn--sm'); ?>
                </div>
            </div>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
            <!-- Placeholder products if no featured posts yet -->
            <div class="nnh-product-box">
                <div class="nnh-product-box__header">
                    <h3 class="nnh-product-box__title" style="font-size: 1.1rem;">[Featured Product 1]</h3>
                    <span class="nnh-product-box__price">$XX</span>
                </div>
                <div class="nnh-product-box__cta">
                    <a href="#" class="affiliate-button nnh-btn--sm">View on Amazon</a>
                </div>
            </div>

            <div class="nnh-product-box">
                <div class="nnh-product-box__header">
                    <h3 class="nnh-product-box__title" style="font-size: 1.1rem;">[Featured Product 2]</h3>
                    <span class="nnh-product-box__price">$XX</span>
                </div>
                <div class="nnh-product-box__cta">
                    <a href="#" class="affiliate-button nnh-btn--sm">View on Amazon</a>
                </div>
            </div>

            <div class="nnh-product-box">
                <div class="nnh-product-box__header">
                    <h3 class="nnh-product-box__title" style="font-size: 1.1rem;">[Featured Product 3]</h3>
                    <span class="nnh-product-box__price">$XX</span>
                </div>
                <div class="nnh-product-box__cta">
                    <a href="#" class="affiliate-button nnh-btn--sm">View on Amazon</a>
                </div>
            </div>
            <?php endif; ?>

        </div>

        <div style="text-align: center; margin-top: 30px;">
            <a href="<?php echo home_url('/category/reviews/'); ?>" class="nnh-btn--outline" style="display: inline-block; padding: 12px 24px; border: 2px solid var(--nnh-primary); border-radius: var(--nnh-radius-md); color: var(--nnh-primary); text-decoration: none; font-weight: 600;">
                See All Product Reviews →
            </a>
        </div>
    </section>

    <!-- LATEST POSTS SECTION -->
    <section class="nnh-latest-posts">
        <h2 class="nnh-section-title">Latest Guides & Reviews</h2>

        <div class="nnh-post-grid" style="max-width: 1200px; margin: 0 auto;">

            <?php
            $recent_query = new WP_Query(array(
                'posts_per_page' => 6,
                'post_status' => 'publish',
            ));

            if ($recent_query->have_posts()) :
                while ($recent_query->have_posts()) : $recent_query->the_post();
                    $categories = get_the_category();
                    $category_name = !empty($categories) ? $categories[0]->name : 'Guide';
            ?>

            <article class="nnh-post-card">
                <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>">
                    <div class="nnh-post-card__image" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'nnh-card'); ?>');"></div>
                </a>
                <?php else : ?>
                <div class="nnh-post-card__image" style="background-color: var(--nnh-primary-light);"></div>
                <?php endif; ?>

                <div class="nnh-post-card__content">
                    <span class="nnh-post-card__category"><?php echo esc_html($category_name); ?></span>
                    <h3 class="nnh-post-card__title">
                        <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <p class="nnh-post-card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                </div>
            </article>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
            <!-- Placeholder posts -->
            <article class="nnh-post-card">
                <div class="nnh-post-card__image" style="background-color: var(--nnh-primary-light);"></div>
                <div class="nnh-post-card__content">
                    <span class="nnh-post-card__category">Kitchen</span>
                    <h3 class="nnh-post-card__title">[Placeholder Post Title]</h3>
                    <p class="nnh-post-card__excerpt">Sample excerpt text goes here...</p>
                </div>
            </article>
            <?php endif; ?>

        </div>

        <div style="text-align: center; margin-top: 30px;">
            <a href="<?php echo home_url('/blog/'); ?>" class="nnh-btn--outline" style="display: inline-block; padding: 12px 24px; border: 2px solid var(--nnh-primary); border-radius: var(--nnh-radius-md); color: var(--nnh-primary); text-decoration: none; font-weight: 600;">
                View All Posts →
            </a>
        </div>
    </section>

    <!-- EMAIL OPT-IN SECTION -->
    <section class="nnh-email-optin">
        <h2 class="nnh-email-optin__title">Get the 30-Day Declutter Checklist</h2>
        <p class="nnh-email-optin__text">
            Join 10,000+ organized homes! Get our free printable checklist plus weekly tips delivered to your inbox.
        </p>
        <form class="nnh-email-optin__form" action="#" method="post">
            <input type="email" class="nnh-email-optin__input" name="email" placeholder="Enter your email" required>
            <button type="submit" class="nnh-email-optin__button">Get Free Checklist</button>
        </form>
        <p style="font-size: 0.8rem; opacity: 0.8; margin-top: 15px;">No spam, ever. Unsubscribe anytime.</p>
    </section>

    <!-- ABOUT TEASER -->
    <section style="padding: var(--nnh-space-2xl) var(--nnh-space-lg); max-width: 800px; margin: 0 auto; text-align: center;">
        <h2 class="nnh-section-title">Why Neat Nest Home?</h2>
        <p style="font-size: 1.1rem; line-height: 1.8; color: var(--nnh-text-light);">
            We're not professional organizers with unlimited budgets. We're real people who've tackled the
            same cramped closets, overflowing pantries, and chaotic entryways you're dealing with.
            Every product we recommend has been researched, compared, and chosen because it actually works—not
            because it looks good on Instagram.
        </p>
        <a href="<?php echo home_url('/about/'); ?>" style="display: inline-block; margin-top: 15px; color: var(--nnh-primary); font-weight: 600;">
            Learn more about us →
        </a>
    </section>

</main>

<?php
get_footer();
