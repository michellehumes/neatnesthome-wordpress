<?php
/**
 * Template Part: Checklist Post
 *
 * Use this template for checklist-style posts like "30-Day Declutter Plan"
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
            <p>[Opening that connects with the reader's desire for change. Why take on this challenge?]</p>

            <p>This [30-day/weekly/etc.] plan breaks down the overwhelming task of [goal] into small, manageable daily actions. Each task takes just [15-30] minutes, making it easy to fit into even the busiest schedule.</p>

            <div class="nnh-callout">
                <div class="nnh-callout__icon">📋</div>
                <div class="nnh-callout__title">How to Use This Checklist</div>
                <ul style="margin: 10px 0 0; padding-left: 20px;">
                    <li>Work through the tasks in order (they build on each other)</li>
                    <li>Check off each item as you complete it</li>
                    <li>If you miss a day, just pick up where you left off</li>
                    <li>Grab recommended products as needed (optional but helpful)</li>
                </ul>
            </div>

            <!-- Download CTA -->
            <div style="background: var(--nnh-primary-light); padding: 25px; border-radius: var(--nnh-radius-lg); text-align: center; margin: 30px 0;">
                <h4 style="margin-top: 0;">Want a Printable Version?</h4>
                <p style="margin-bottom: 15px;">Get the free PDF checklist you can print and hang on your fridge!</p>
                <a href="#email-signup" class="affiliate-button nnh-btn--secondary">Download Free PDF</a>
            </div>
        </section>

        <!-- Quick Navigation -->
        <nav class="nnh-toc" style="background: var(--nnh-gray-100); padding: 20px; border-radius: var(--nnh-radius-md); margin: 30px 0;">
            <strong>Jump to Week:</strong>
            <ul style="margin: 10px 0 0; padding-left: 20px; display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 5px;">
                <li><a href="#week-1">Week 1: [Theme]</a></li>
                <li><a href="#week-2">Week 2: [Theme]</a></li>
                <li><a href="#week-3">Week 3: [Theme]</a></li>
                <li><a href="#week-4">Week 4: [Theme]</a></li>
                <li><a href="#bonus">Bonus Tasks</a></li>
            </ul>
        </nav>

        <!-- Week 1 -->
        <section id="week-1">
            <h2>Week 1: [Theme - e.g., "Starting Fresh"]</h2>
            <p>[Brief intro about what this week focuses on]</p>

            <!--
            Use the checklist shortcode:

            [checklist title="Days 1-7"]
            [item]Day 1: Clear all flat surfaces in one room[/item]
            [item product_url="https://amazon.com/..." product_name="Desktop organizer"]Day 2: Sort through desk/workspace papers[/item]
            [item]Day 3: Empty and wipe down one drawer[/item]
            [/checklist]
            -->

            <div class="nnh-checklist">
                <h4 class="nnh-checklist__title">Days 1-7</h4>
                <ul class="nnh-checklist__list">

                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 1:</strong> [Task description - be specific about what to do and where]</span>
                        </div>
                    </li>

                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 2:</strong> [Task description]</span>
                            <a href="#" class="nnh-checklist__product-link" target="_blank" rel="nofollow noopener sponsored">
                                [Helpful product] →
                            </a>
                        </div>
                    </li>

                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 3:</strong> [Task description]</span>
                        </div>
                    </li>

                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 4:</strong> [Task description]</span>
                        </div>
                    </li>

                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 5:</strong> [Task description]</span>
                            <a href="#" class="nnh-checklist__product-link" target="_blank" rel="nofollow noopener sponsored">
                                [Helpful product] →
                            </a>
                        </div>
                    </li>

                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 6:</strong> [Task description]</span>
                        </div>
                    </li>

                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 7:</strong> [Rest day or catch-up day]</span>
                        </div>
                    </li>

                </ul>
            </div>

            <div class="nnh-callout nnh-callout--tip">
                <div class="nnh-callout__icon">💡</div>
                <div class="nnh-callout__title">Week 1 Tip</div>
                <p>[Helpful tip specific to this week's tasks]</p>
            </div>

            <!-- Optional: Featured product for this week -->
            <div class="nnh-product-box">
                <div class="nnh-product-box__header">
                    <div>
                        <h4 class="nnh-product-box__title" style="font-size: 1.1rem;">Week 1 Essential: [Product Name]</h4>
                        <p class="nnh-product-box__subtitle">Makes [these tasks] so much easier</p>
                    </div>
                    <span class="nnh-product-box__price">$XX</span>
                </div>
                <p style="margin: 15px 0; font-size: 0.95rem;">[Brief description of why this helps with Week 1 tasks]</p>
                <div class="nnh-product-box__cta">
                    <a href="#" class="affiliate-button nnh-btn--sm" target="_blank" rel="nofollow noopener sponsored">View on Amazon</a>
                </div>
            </div>
        </section>

        <!-- Week 2 -->
        <section id="week-2">
            <h2>Week 2: [Theme - e.g., "Kitchen & Pantry"]</h2>
            <p>[Brief intro about what this week focuses on]</p>

            <div class="nnh-checklist">
                <h4 class="nnh-checklist__title">Days 8-14</h4>
                <ul class="nnh-checklist__list">

                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 8:</strong> [Task description]</span>
                        </div>
                    </li>

                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 9:</strong> [Task description]</span>
                            <a href="#" class="nnh-checklist__product-link" target="_blank" rel="nofollow noopener sponsored">
                                [Helpful product] →
                            </a>
                        </div>
                    </li>

                    <!-- Continue Days 10-14... -->
                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 10:</strong> [Task description]</span>
                        </div>
                    </li>

                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 11:</strong> [Task description]</span>
                        </div>
                    </li>

                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 12:</strong> [Task description]</span>
                        </div>
                    </li>

                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 13:</strong> [Task description]</span>
                        </div>
                    </li>

                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 14:</strong> [Rest/catch-up day]</span>
                        </div>
                    </li>

                </ul>
            </div>

            <!-- Week 2 product suggestion -->
        </section>

        <!-- Week 3 -->
        <section id="week-3">
            <h2>Week 3: [Theme - e.g., "Bedrooms & Closets"]</h2>
            <p>[Brief intro...]</p>

            <div class="nnh-checklist">
                <h4 class="nnh-checklist__title">Days 15-21</h4>
                <ul class="nnh-checklist__list">
                    <!-- Days 15-21 tasks... -->
                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 15:</strong> [Task description]</span>
                        </div>
                    </li>
                    <!-- ... continue ... -->
                </ul>
            </div>
        </section>

        <!-- Week 4 -->
        <section id="week-4">
            <h2>Week 4: [Theme - e.g., "Finishing Strong"]</h2>
            <p>[Brief intro...]</p>

            <div class="nnh-checklist">
                <h4 class="nnh-checklist__title">Days 22-30</h4>
                <ul class="nnh-checklist__list">
                    <!-- Days 22-30 tasks... -->
                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 22:</strong> [Task description]</span>
                        </div>
                    </li>
                    <!-- ... continue ... -->

                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text"><strong>Day 30:</strong> Celebrate your progress! Take before/after photos.</span>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Bonus Tasks -->
        <section id="bonus">
            <h2>Bonus Tasks (If You Have Extra Time)</h2>

            <div class="nnh-checklist">
                <h4 class="nnh-checklist__title">Extra Credit</h4>
                <ul class="nnh-checklist__list">
                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text">[Optional bonus task 1]</span>
                        </div>
                    </li>
                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text">[Optional bonus task 2]</span>
                        </div>
                    </li>
                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text">[Optional bonus task 3]</span>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <!-- All Recommended Products -->
        <section>
            <h2>All Recommended Products</h2>

            <p>Here's everything mentioned in this checklist in one place:</p>

            <div class="nnh-quick-compare">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Used For</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>[Product 1]</strong></td>
                            <td>Week 1 tasks</td>
                            <td>$XX</td>
                            <td><a href="#" target="_blank" rel="nofollow noopener sponsored" style="color: var(--nnh-accent); font-weight: 600;">Shop →</a></td>
                        </tr>
                        <tr>
                            <td><strong>[Product 2]</strong></td>
                            <td>Week 2 tasks</td>
                            <td>$XX</td>
                            <td><a href="#" target="_blank" rel="nofollow noopener sponsored" style="color: var(--nnh-accent); font-weight: 600;">Shop →</a></td>
                        </tr>
                        <tr>
                            <td><strong>[Product 3]</strong></td>
                            <td>Week 3 tasks</td>
                            <td>$XX</td>
                            <td><a href="#" target="_blank" rel="nofollow noopener sponsored" style="color: var(--nnh-accent); font-weight: 600;">Shop →</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Wrap Up -->
        <section>
            <h2>You Completed the Challenge!</h2>

            <p>Congratulations on finishing the [30-Day Declutter Challenge]! You've accomplished something amazing. Your home is now more organized, functional, and peaceful.</p>

            <p><strong>What's next?</strong></p>
            <ul>
                <li>Share your results! Tag us on social media with your before/after photos</li>
                <li>Set up a monthly maintenance routine to keep things tidy</li>
                <li>Tackle another area with our other guides:</li>
            </ul>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin: 20px 0;">
                <a href="#" style="display: block; padding: 20px; background: var(--nnh-gray-100); border-radius: var(--nnh-radius-md); text-align: center; text-decoration: none; color: var(--nnh-text);">
                    <strong>[Related Guide 1]</strong>
                </a>
                <a href="#" style="display: block; padding: 20px; background: var(--nnh-gray-100); border-radius: var(--nnh-radius-md); text-align: center; text-decoration: none; color: var(--nnh-text);">
                    <strong>[Related Guide 2]</strong>
                </a>
                <a href="#" style="display: block; padding: 20px; background: var(--nnh-gray-100); border-radius: var(--nnh-radius-md); text-align: center; text-decoration: none; color: var(--nnh-text);">
                    <strong>[Related Guide 3]</strong>
                </a>
            </div>
        </section>

        <!-- Email Signup -->
        <section id="email-signup" class="nnh-email-optin" style="margin: 40px -20px; padding: 40px 20px;">
            <h3 class="nnh-email-optin__title">Get the Printable Checklist</h3>
            <p class="nnh-email-optin__text">Join 10,000+ organized homes and get this checklist (plus weekly organizing tips) delivered to your inbox!</p>
            <form class="nnh-email-optin__form">
                <input type="email" class="nnh-email-optin__input" placeholder="Enter your email" required>
                <button type="submit" class="nnh-email-optin__button">Get Free PDF</button>
            </form>
        </section>

    </div>
</article>
