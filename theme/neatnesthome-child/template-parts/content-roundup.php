<?php
/**
 * Template Part: "Best X for Y" Roundup Post
 *
 * Use this template for roundup/listicle posts comparing multiple products.
 *
 * @package NeatNestHome
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

        <div class="entry-meta">
            <span class="posted-on">Last Updated: <?php echo get_the_modified_date(); ?></span>
        </div>
    </header>

    <div class="entry-content">

        <!-- Introduction -->
        <section class="nnh-intro">
            <p>[Write a compelling intro that addresses the reader's problem. Why are they searching for this? What will they find in this post?]</p>

            <p>After researching and testing [number] products, we've narrowed it down to the [X] best options for [specific use case]. Whether you're dealing with [problem 1], [problem 2], or [problem 3], there's something here for you.</p>
        </section>

        <!-- Quick Navigation -->
        <nav class="nnh-toc" style="background: var(--nnh-gray-100); padding: 20px; border-radius: var(--nnh-radius-md); margin: 30px 0;">
            <strong>Quick Jump:</strong>
            <ul style="margin: 10px 0 0; padding-left: 20px;">
                <li><a href="#top-picks">Our Top 3 Picks</a></li>
                <li><a href="#comparison">Quick Comparison</a></li>
                <li><a href="#detailed-reviews">Detailed Reviews</a></li>
                <li><a href="#buying-guide">Buying Guide</a></li>
                <li><a href="#faq">FAQ</a></li>
            </ul>
        </nav>

        <!-- Top 3 Quick Summary -->
        <section id="top-picks">
            <h2>Our Top 3 Picks at a Glance</h2>

            <div style="display: grid; gap: 20px; margin: 20px 0;">

                <!-- Best Overall -->
                <div class="nnh-product-box nnh-product-box--featured">
                    <div class="nnh-product-box__header">
                        <div>
                            <h3 class="nnh-product-box__title">[Product Name 1]</h3>
                            <p class="nnh-product-box__subtitle">Best Overall</p>
                        </div>
                        <span class="nnh-product-box__price">$XX</span>
                    </div>
                    <div class="nnh-product-box__rating">
                        <span class="nnh-product-box__stars" style="color: #F4A524;">★★★★★</span>
                        <span class="nnh-product-box__rating-text">4.8 out of 5</span>
                    </div>
                    <p style="margin: 15px 0;">[One sentence about why this is the best overall choice]</p>
                    <div class="nnh-product-box__cta">
                        <a href="#" class="affiliate-button" target="_blank" rel="nofollow noopener sponsored">Check Price on Amazon</a>
                    </div>
                </div>

                <!-- Budget Pick -->
                <div class="nnh-product-box">
                    <div class="nnh-product-box__header">
                        <div>
                            <h3 class="nnh-product-box__title">[Product Name 2]</h3>
                            <p class="nnh-product-box__subtitle">Best Budget Option</p>
                        </div>
                        <span class="nnh-product-box__price">$XX</span>
                    </div>
                    <p style="margin: 15px 0;">[One sentence about why this is the best budget choice]</p>
                    <div class="nnh-product-box__cta">
                        <a href="#" class="affiliate-button" target="_blank" rel="nofollow noopener sponsored">Check Price on Amazon</a>
                    </div>
                </div>

                <!-- Premium Pick -->
                <div class="nnh-product-box">
                    <div class="nnh-product-box__header">
                        <div>
                            <h3 class="nnh-product-box__title">[Product Name 3]</h3>
                            <p class="nnh-product-box__subtitle">Premium Choice</p>
                        </div>
                        <span class="nnh-product-box__price">$XX</span>
                    </div>
                    <p style="margin: 15px 0;">[One sentence about why this is the premium choice]</p>
                    <div class="nnh-product-box__cta">
                        <a href="#" class="affiliate-button" target="_blank" rel="nofollow noopener sponsored">Check Price on Amazon</a>
                    </div>
                </div>

            </div>
        </section>

        <!-- Comparison Table -->
        <section id="comparison">
            <h2>Quick Comparison</h2>

            <!--
            Use the comparison_table shortcode:

            [comparison_table title="Compare All Products"]
            [product name="Product 1" price="$29" best_for="Small spaces" rating="4.8" amazon_url="https://..." winner="yes"]
            [product name="Product 2" price="$19" best_for="Budget buyers" rating="4.5" amazon_url="https://..." badge="budget"]
            [product name="Product 3" price="$49" best_for="Large families" rating="4.7" amazon_url="https://..." badge="premium"]
            [product name="Product 4" price="$35" best_for="Renters" rating="4.4" amazon_url="https://..."]
            [/comparison_table]
            -->

            <div class="nnh-comparison-wrapper">
                <table class="nnh-comparison-table">
                    <thead>
                        <tr>
                            <th>Feature</th>
                            <th>
                                <span class="winner-badge">BEST OVERALL</span>
                                [Product 1]
                            </th>
                            <th>[Product 2]</th>
                            <th>[Product 3]</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Our Rating</td>
                            <td><span class="stars">★★★★★</span> 4.8</td>
                            <td><span class="stars">★★★★☆</span> 4.5</td>
                            <td><span class="stars">★★★★★</span> 4.7</td>
                        </tr>
                        <tr>
                            <td>Price Range</td>
                            <td><strong>$XX - $XX</strong></td>
                            <td>$XX - $XX</td>
                            <td>$XX - $XX</td>
                        </tr>
                        <tr>
                            <td>Dimensions</td>
                            <td>[Dimensions]</td>
                            <td>[Dimensions]</td>
                            <td>[Dimensions]</td>
                        </tr>
                        <tr>
                            <td>Material</td>
                            <td>[Material]</td>
                            <td>[Material]</td>
                            <td>[Material]</td>
                        </tr>
                        <tr>
                            <td>Best For</td>
                            <td>[Use case]</td>
                            <td>[Use case]</td>
                            <td>[Use case]</td>
                        </tr>
                        <tr class="verdict-row">
                            <td>Our Verdict</td>
                            <td>Best Overall</td>
                            <td>Best Budget</td>
                            <td>Best Premium</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="#" class="affiliate-button nnh-btn--sm" target="_blank" rel="nofollow noopener sponsored">Check Price</a></td>
                            <td><a href="#" class="affiliate-button nnh-btn--sm" target="_blank" rel="nofollow noopener sponsored">Check Price</a></td>
                            <td><a href="#" class="affiliate-button nnh-btn--sm" target="_blank" rel="nofollow noopener sponsored">Check Price</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Detailed Reviews -->
        <section id="detailed-reviews">
            <h2>Detailed Reviews</h2>

            <!-- Product 1 - Best Overall -->
            <div id="product-1">
                <h3>1. [Product Name] — Best Overall</h3>

                <!--
                Use the product_box shortcode:

                [product_box
                    name="Product Name"
                    subtitle="Best Overall"
                    price="$XX"
                    rating="4.8"
                    amazon_url="https://amazon.com/dp/XXXXXXX"
                    image="https://..."
                    featured="yes"
                ]
                [feature]Feature 1[/feature]
                [feature]Feature 2[/feature]
                [feature]Feature 3[/feature]
                [feature]Feature 4[/feature]
                [feature]Feature 5[/feature]
                [best_for]Small apartments, renters, or anyone needing extra pantry space[/best_for]
                [/product_box]
                -->

                <p>[2-3 paragraphs about the product. What makes it stand out? What did you like/dislike? Who is it best for?]</p>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin: 20px 0;">
                    <div style="background: #E8F5E9; padding: 15px; border-radius: var(--nnh-radius-md);">
                        <strong style="color: #2E7D32;">Pros:</strong>
                        <ul style="margin: 10px 0 0; padding-left: 20px;">
                            <li>[Pro 1]</li>
                            <li>[Pro 2]</li>
                            <li>[Pro 3]</li>
                        </ul>
                    </div>
                    <div style="background: #FFEBEE; padding: 15px; border-radius: var(--nnh-radius-md);">
                        <strong style="color: #C62828;">Cons:</strong>
                        <ul style="margin: 10px 0 0; padding-left: 20px;">
                            <li>[Con 1]</li>
                            <li>[Con 2]</li>
                        </ul>
                    </div>
                </div>

                <div style="text-align: center; margin: 20px 0;">
                    <a href="#" class="affiliate-button" target="_blank" rel="nofollow noopener sponsored">Check Price on Amazon</a>
                </div>
            </div>

            <hr style="margin: 40px 0; border: none; border-top: 1px solid var(--nnh-gray-200);">

            <!-- Product 2 -->
            <div id="product-2">
                <h3>2. [Product Name] — Best Budget Option</h3>
                <p>[Repeat the same structure for each product...]</p>
            </div>

            <hr style="margin: 40px 0; border: none; border-top: 1px solid var(--nnh-gray-200);">

            <!-- Product 3 -->
            <div id="product-3">
                <h3>3. [Product Name] — Premium Choice</h3>
                <p>[Repeat the same structure for each product...]</p>
            </div>

            <!-- Continue for all products... -->

        </section>

        <!-- Buying Guide -->
        <section id="buying-guide">
            <h2>Buying Guide: How to Choose the Right [Product Type]</h2>

            <p>Before you buy, consider these factors:</p>

            <h4>Size & Dimensions</h4>
            <p>[Explain how to measure and what sizes work for different spaces]</p>

            <h4>Material Quality</h4>
            <p>[Discuss different materials and their pros/cons]</p>

            <h4>Installation</h4>
            <p>[Talk about mounting options, tools needed, renter-friendly options]</p>

            <h4>Price vs. Value</h4>
            <p>[Help readers understand what they get at different price points]</p>

            <div class="nnh-callout nnh-callout--tip">
                <div class="nnh-callout__icon">💡</div>
                <div class="nnh-callout__title">Pro Tip</div>
                <p>[Share an insider tip that helps readers make a better decision]</p>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq">
            <h2>Frequently Asked Questions</h2>

            <div class="nnh-faq-item" style="margin-bottom: 20px; padding: 20px; background: var(--nnh-gray-100); border-radius: var(--nnh-radius-md);">
                <h4 style="margin-top: 0; margin-bottom: 10px;">Q: [Common question 1]?</h4>
                <p style="margin: 0;">[Answer with helpful, specific information]</p>
            </div>

            <div class="nnh-faq-item" style="margin-bottom: 20px; padding: 20px; background: var(--nnh-gray-100); border-radius: var(--nnh-radius-md);">
                <h4 style="margin-top: 0; margin-bottom: 10px;">Q: [Common question 2]?</h4>
                <p style="margin: 0;">[Answer with helpful, specific information]</p>
            </div>

            <div class="nnh-faq-item" style="margin-bottom: 20px; padding: 20px; background: var(--nnh-gray-100); border-radius: var(--nnh-radius-md);">
                <h4 style="margin-top: 0; margin-bottom: 10px;">Q: [Common question 3]?</h4>
                <p style="margin: 0;">[Answer with helpful, specific information]</p>
            </div>
        </section>

        <!-- Final Thoughts -->
        <section>
            <h2>Final Thoughts</h2>

            <p>[Summarize your recommendations. Restate your top pick and why. Give the reader confidence in their choice.]</p>

            <p>For most people, we recommend the <strong>[Top Pick Product]</strong>. It offers the best balance of [quality, price, features] and works well for [common use cases].</p>

            <p>If you're on a budget, the <strong>[Budget Pick]</strong> is a solid alternative that still gets the job done.</p>

            <div style="text-align: center; margin: 30px 0;">
                <a href="#" class="affiliate-button nnh-btn--lg" target="_blank" rel="nofollow noopener sponsored">See Our Top Pick on Amazon</a>
            </div>
        </section>

    </div>
</article>
