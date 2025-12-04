<?php
/**
 * Template Part: Room Guide / How-To Post
 *
 * Use this template for step-by-step organizing guides.
 * Example: "Organize Your Tiny Pantry in 5 Steps"
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
            <p>[Open with a relatable problem. Paint a picture of the frustration the reader is experiencing.]</p>

            <p>In this guide, you'll learn exactly how to [achieve result] in [X] simple steps. Whether you're dealing with [scenario 1] or [scenario 2], these strategies will help you create a more organized, functional space.</p>

            <div class="nnh-callout">
                <div class="nnh-callout__title">What You'll Need</div>
                <ul style="margin: 10px 0 0; padding-left: 20px;">
                    <li>About [X] hours of time</li>
                    <li>Garbage bags for donations/trash</li>
                    <li>Organizing bins or baskets (we'll recommend specific ones)</li>
                    <li>Labels (optional but helpful)</li>
                </ul>
            </div>
        </section>

        <!-- Quick Navigation -->
        <nav class="nnh-toc" style="background: var(--nnh-gray-100); padding: 20px; border-radius: var(--nnh-radius-md); margin: 30px 0;">
            <strong>Jump to a Step:</strong>
            <ul style="margin: 10px 0 0; padding-left: 20px;">
                <li><a href="#step-1">Step 1: [Action]</a></li>
                <li><a href="#step-2">Step 2: [Action]</a></li>
                <li><a href="#step-3">Step 3: [Action]</a></li>
                <li><a href="#step-4">Step 4: [Action]</a></li>
                <li><a href="#step-5">Step 5: [Action]</a></li>
                <li><a href="#maintenance">Keeping It Organized</a></li>
                <li><a href="#tools">Recommended Tools</a></li>
            </ul>
        </nav>

        <!-- Step 1 -->
        <section id="step-1">
            <h2>Step 1: [Clear Action Verb + What]</h2>

            <p>[Explain the why behind this step. Help the reader understand the purpose.]</p>

            <p>[Provide detailed instructions. Be specific about what to do.]</p>

            <div class="nnh-callout nnh-callout--tip">
                <div class="nnh-callout__icon">💡</div>
                <div class="nnh-callout__title">Pro Tip</div>
                <p>[Share a helpful tip that makes this step easier or more effective]</p>
            </div>

            <!-- Recommended product for this step -->
            <div class="nnh-product-box">
                <div class="nnh-product-box__header">
                    <div>
                        <h4 class="nnh-product-box__title" style="font-size: 1.1rem;">[Tool/Product for This Step]</h4>
                        <p class="nnh-product-box__subtitle">Helpful for this step</p>
                    </div>
                    <span class="nnh-product-box__price">$XX</span>
                </div>
                <ul class="nnh-product-box__features">
                    <li>[Why this helps with Step 1]</li>
                    <li>[Key feature]</li>
                    <li>[Key feature]</li>
                </ul>
                <div class="nnh-product-box__cta">
                    <a href="#" class="affiliate-button nnh-btn--sm" target="_blank" rel="nofollow noopener sponsored">View on Amazon</a>
                </div>
            </div>
        </section>

        <!-- Step 2 -->
        <section id="step-2">
            <h2>Step 2: [Clear Action Verb + What]</h2>

            <p>[Explain this step in detail...]</p>

            <h4>How to [specific sub-task]:</h4>
            <ol>
                <li>[Sub-step 1]</li>
                <li>[Sub-step 2]</li>
                <li>[Sub-step 3]</li>
            </ol>

            <p>[Additional guidance or tips...]</p>

            <!-- Optional: Another product recommendation -->
        </section>

        <!-- Step 3 -->
        <section id="step-3">
            <h2>Step 3: [Clear Action Verb + What]</h2>

            <p>[Continue with detailed instructions...]</p>

            <!-- Before/After callout -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin: 20px 0;">
                <div style="background: #FFEBEE; padding: 20px; border-radius: var(--nnh-radius-md); text-align: center;">
                    <strong style="color: #C62828;">Before</strong>
                    <p style="margin: 10px 0 0; font-size: 0.9rem;">[Describe the problem state]</p>
                </div>
                <div style="background: #E8F5E9; padding: 20px; border-radius: var(--nnh-radius-md); text-align: center;">
                    <strong style="color: #2E7D32;">After</strong>
                    <p style="margin: 10px 0 0; font-size: 0.9rem;">[Describe the organized result]</p>
                </div>
            </div>
        </section>

        <!-- Step 4 -->
        <section id="step-4">
            <h2>Step 4: [Clear Action Verb + What]</h2>

            <p>[Continue with detailed instructions...]</p>

            <div class="nnh-callout nnh-callout--warning">
                <div class="nnh-callout__icon">⚠️</div>
                <div class="nnh-callout__title">Common Mistake to Avoid</div>
                <p>[Warn readers about a common mistake and how to avoid it]</p>
            </div>
        </section>

        <!-- Step 5 -->
        <section id="step-5">
            <h2>Step 5: [Clear Action Verb + What]</h2>

            <p>[Final step with detailed instructions...]</p>

            <p>[End with the satisfying result they'll achieve]</p>
        </section>

        <!-- Maintenance Tips -->
        <section id="maintenance">
            <h2>Keeping It Organized: Maintenance Tips</h2>

            <p>The key to lasting organization is having a simple system you can maintain. Here's how to keep your [space] organized:</p>

            <!--
            Use the checklist shortcode:

            [checklist title="Weekly Maintenance Checklist"]
            [item]Quick 5-minute tidy every [day][/item]
            [item]Return items to their designated spots[/item]
            [item]Check for expired items (for pantry/fridge)[/item]
            [item product_url="https://amazon.com/..." product_name="Label maker"]Update labels as needed[/item]
            [/checklist]
            -->

            <div class="nnh-checklist">
                <h4 class="nnh-checklist__title">Weekly Maintenance Checklist</h4>
                <ul class="nnh-checklist__list">
                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text">[Daily/Weekly task 1]</span>
                        </div>
                    </li>
                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text">[Daily/Weekly task 2]</span>
                        </div>
                    </li>
                    <li class="nnh-checklist__item">
                        <span class="nnh-checklist__checkbox">✓</span>
                        <div class="nnh-checklist__content">
                            <span class="nnh-checklist__text">[Daily/Weekly task 3]</span>
                        </div>
                    </li>
                </ul>
            </div>

            <p><strong>Pro tip:</strong> Set a recurring reminder on your phone for your weekly maintenance session. 10 minutes a week prevents hours of re-organizing later!</p>
        </section>

        <!-- Recommended Tools Summary -->
        <section id="tools">
            <h2>Recommended Organizing Tools</h2>

            <p>Here are all the products we mentioned in this guide, plus a few extras that make organizing easier:</p>

            <!--
            Use comparison_table shortcode or product_box shortcodes
            -->

            <div class="nnh-quick-compare">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Best For</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>[Product 1]</strong></td>
                            <td>[Use case from guide]</td>
                            <td>$XX</td>
                            <td><a href="#" target="_blank" rel="nofollow noopener sponsored" style="color: var(--nnh-accent); font-weight: 600;">View →</a></td>
                        </tr>
                        <tr>
                            <td><strong>[Product 2]</strong></td>
                            <td>[Use case from guide]</td>
                            <td>$XX</td>
                            <td><a href="#" target="_blank" rel="nofollow noopener sponsored" style="color: var(--nnh-accent); font-weight: 600;">View →</a></td>
                        </tr>
                        <tr>
                            <td><strong>[Product 3]</strong></td>
                            <td>[Use case from guide]</td>
                            <td>$XX</td>
                            <td><a href="#" target="_blank" rel="nofollow noopener sponsored" style="color: var(--nnh-accent); font-weight: 600;">View →</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Wrap Up -->
        <section>
            <h2>You Did It!</h2>

            <p>Congratulations on taking the time to organize your [space]! Remember, the goal isn't perfection—it's creating a system that works for your life.</p>

            <p>If you found this guide helpful, you might also enjoy:</p>
            <ul>
                <li><a href="#">[Related Guide 1]</a></li>
                <li><a href="#">[Related Guide 2]</a></li>
                <li><a href="#">[Related Guide 3]</a></li>
            </ul>

            <div class="nnh-callout">
                <div class="nnh-callout__title">Get the Free Checklist</div>
                <p>Want a printable version of this guide? Download our free [Space] Organization Checklist!</p>
                <a href="#" class="nnh-btn--secondary" style="display: inline-block; margin-top: 10px;">Download Free Checklist</a>
            </div>
        </section>

    </div>
</article>
