# Neat Nest Home - Deployment Checklist

Complete guide to deploying the Neat Nest Home WordPress affiliate site.

---

## Phase 1: WordPress Setup (30 minutes)

### 1.1 Fresh WordPress Installation
- [ ] Install WordPress on your hosting (SiteGround, Bluehost, etc.)
- [ ] Set site title: "Neat Nest Home"
- [ ] Set tagline: "Smart storage for real life."
- [ ] Configure permalink structure: Post name (`/%postname%/`)
- [ ] Set timezone to your location
- [ ] Disable comments if not needed (Settings > Discussion)

### 1.2 Install Parent Theme
- [ ] Install GeneratePress from Appearance > Themes > Add New
- [ ] Do NOT activate yet

### 1.3 Install Child Theme
- [ ] Upload `neatnesthome-child` folder via FTP to `/wp-content/themes/`
  - Or zip the folder and upload via Appearance > Themes > Add New > Upload
- [ ] Activate "Neat Nest Home Child" theme

### 1.4 Essential Plugins
Install and activate these plugins:

**Required:**
- [ ] **Advanced Custom Fields (ACF)** - For product review fields
- [ ] **Rank Math SEO** - For SEO and schema markup
- [ ] **WP Super Cache** or **LiteSpeed Cache** - For performance

**Recommended:**
- [ ] **Smush** or **ShortPixel** - Image optimization
- [ ] **Wordfence** - Security
- [ ] **UpdraftPlus** - Backups
- [ ] **WPForms Lite** - Contact form

**Optional:**
- [ ] **ThirstyAffiliates** or **Lasso** - Advanced affiliate link management
- [ ] **TablePress** - For complex comparison tables

---

## Phase 2: Theme Configuration (20 minutes)

### 2.1 GeneratePress Settings
Navigate to Appearance > Customize:

**Site Identity:**
- [ ] Upload logo (recommended: 200px wide)
- [ ] Upload favicon (512x512px)

**Layout > Container:**
- [ ] Container width: 1200px
- [ ] Content layout: Separate containers

**Typography:**
- [ ] Body font: Inter (already loaded via child theme)
- [ ] Heading font: Cormorant Garamond (already loaded)
- [ ] Base font size: 17px
- [ ] Line height: 1.7

**Colors:**
- [ ] Background: #FAFAFA
- [ ] Text: #333333
- [ ] Link: #5B8A72
- [ ] Link hover: #4A7461

### 2.2 Menus
Create Primary Menu (Appearance > Menus):

```
- Home
- Kitchen & Pantry (category)
- Closet & Bedroom (category)
- Bathroom & Linen (category)
- Entryway & Living Room (category)
- Small Spaces & Apartments (category)
- Kids & Family (category)
- Laundry & Cleaning (category)
- Garage & Seasonal (category)
- Checklists & Plans (category or page)
- About (page)
- Contact (page)
```

### 2.3 Homepage Setup
- [ ] Create new page titled "Home"
- [ ] Set Page Template to "Homepage" (from template dropdown)
- [ ] Go to Settings > Reading
- [ ] Set "Your homepage displays" to "A static page"
- [ ] Select "Home" as Homepage

---

## Phase 3: Categories & Taxonomies (10 minutes)

### 3.1 Create Categories
Go to Posts > Categories and create:

| Category | Slug | Description |
|----------|------|-------------|
| Kitchen & Pantry | kitchen-pantry | Organization solutions for kitchens and pantries |
| Closet & Bedroom | closet-bedroom | Closet organization and bedroom storage |
| Bathroom & Linen | bathroom-linen | Bathroom organization and linen closet solutions |
| Entryway & Living Room | entryway-living-room | Entryway and living room organization |
| Small Spaces & Apartments | small-spaces | Solutions for apartments and small homes |
| Kids & Family | kids-family | Family-friendly organization solutions |
| Laundry & Cleaning | laundry-cleaning | Laundry room and cleaning supply organization |
| Garage & Seasonal | garage-seasonal | Garage and seasonal storage solutions |
| Reviews | reviews | Individual product reviews |
| Roundups | roundups | Best-of lists and product comparisons |
| Checklists & Plans | checklists-plans | Organizing checklists and planning guides |

### 3.2 Create Tags
Common tags to create:
- `featured` (for homepage featured products)
- `budget-friendly`
- `premium`
- `renter-friendly`
- `no-drill`
- `amazon-best-seller`

---

## Phase 4: ACF Setup (15 minutes)

### 4.1 Import Field Groups
- [ ] Go to Custom Fields > Tools
- [ ] Import the JSON from `acf-json/group_nnh_review_fields.json`
- [ ] Verify fields appear under Custom Fields > Field Groups

### 4.2 Field Group Assignment
Ensure "Product Review Fields" shows on:
- Posts in "Reviews" category
- Posts in "Roundups" category

---

## Phase 5: Essential Pages (30 minutes)

### 5.1 Create Required Pages

**About Page:**
- [ ] Create page: "About"
- [ ] Slug: `about`
- [ ] Content: Your story, mission, and why readers should trust your recommendations

**Contact Page:**
- [ ] Create page: "Contact"
- [ ] Slug: `contact`
- [ ] Add WPForms contact form

**Affiliate Disclosure:**
- [ ] Create page: "Affiliate Disclosure"
- [ ] Slug: `affiliate-disclosure`
- [ ] Use content from `/toolshed-implementation/pages/affiliate-disclosure.html`
- [ ] Update brand name to "Neat Nest Home"

**Privacy Policy:**
- [ ] Create page: "Privacy Policy"
- [ ] Slug: `privacy-policy`
- [ ] Use content from `/toolshed-implementation/pages/privacy-policy.html`
- [ ] Update brand name and contact info

**Terms of Service (optional):**
- [ ] Create if needed

### 5.2 Starter Content Posts
Create at least 3-5 posts to populate the site:

**Checklist Post:**
- [ ] Title: "30-Day Declutter Plan: Transform Your Home Step by Step"
- [ ] Category: Checklists & Plans
- [ ] Use template from `content-checklist.php`

**Roundup Post:**
- [ ] Title: "Best Under-Sink Organizers for Small Bathrooms (2025)"
- [ ] Category: Bathroom & Linen, Roundups
- [ ] Use template from `content-roundup.php`

**Room Guide:**
- [ ] Title: "Organize Your Tiny Pantry in 5 Simple Steps"
- [ ] Category: Kitchen & Pantry
- [ ] Use template from `content-guide.php`

---

## Phase 6: SEO & Analytics (20 minutes)

### 6.1 Rank Math Configuration
- [ ] Run setup wizard
- [ ] Connect Google Search Console
- [ ] Set homepage SEO title: "Neat Nest Home | Smart Storage for Real Life"
- [ ] Set homepage meta description (150-160 chars)

**Title Templates:**
- Posts: `%title% | Neat Nest Home`
- Categories: `%term% Organization Ideas | Neat Nest Home`

**Schema Settings:**
- [ ] Enable Article schema for posts
- [ ] Enable Product schema (will be enhanced by our custom schema)

### 6.2 Google Analytics 4
- [ ] Create GA4 property at analytics.google.com
- [ ] Get Measurement ID (G-XXXXXXXXXX)
- [ ] Add via Rank Math > General Settings > Analytics
- [ ] Or add tracking code to header via Appearance > Customize > Additional Scripts

### 6.3 Google Search Console
- [ ] Add property at search.google.com/search-console
- [ ] Verify ownership
- [ ] Submit sitemap: `https://neatnesthome.com/sitemap_index.xml`

---

## Phase 7: Amazon Affiliate Setup (10 minutes)

### 7.1 Amazon Associates
- [ ] Sign up at affiliate-program.amazon.com (if not already)
- [ ] Get your affiliate tag (e.g., `neatnesthome-20`)

### 7.2 Configure Affiliate Tag
Edit `functions.php` or add to `wp-config.php`:

```php
// Add to wp-config.php (before "That's all, stop editing!")
define('NNH_AFFILIATE_TAG', 'neatnesthome-20');
```

Or update the default in functions.php:
```php
// Find this line and update:
return defined('NNH_AFFILIATE_TAG') ? NNH_AFFILIATE_TAG : 'neatnesthome-20';
```

---

## Phase 8: Performance Optimization (15 minutes)

### 8.1 Caching
- [ ] Configure WP Super Cache or LiteSpeed Cache
- [ ] Enable page caching
- [ ] Enable browser caching
- [ ] Minify CSS/JS if not causing issues

### 8.2 Images
- [ ] Install Smush or ShortPixel
- [ ] Enable lazy loading (already in theme)
- [ ] Set up automatic compression for uploads
- [ ] Use WebP format when possible

### 8.3 Test Performance
- [ ] Run Google PageSpeed Insights test
- [ ] Run GTmetrix test
- [ ] Target: 90+ mobile score, <3s load time

---

## Phase 9: Pre-Launch Checklist

### Content & Design
- [ ] All placeholder text replaced with real content
- [ ] All images uploaded and optimized
- [ ] Category images added (for homepage)
- [ ] Logo uploaded
- [ ] Favicon uploaded
- [ ] Contact form tested
- [ ] Email signup form connected (Mailchimp, ConvertKit, etc.)

### Legal & Compliance
- [ ] Privacy Policy published
- [ ] Affiliate Disclosure published and linked
- [ ] Cookie consent banner (if required for your region)
- [ ] FTC compliance: affiliate links marked appropriately

### Technical
- [ ] SSL certificate active (HTTPS)
- [ ] XML sitemap generated
- [ ] Robots.txt configured correctly
- [ ] 404 page customized
- [ ] Mobile responsiveness tested
- [ ] All links working (no 404s)
- [ ] Forms submitting correctly

### SEO
- [ ] Homepage meta title/description set
- [ ] All pages have unique meta descriptions
- [ ] Images have alt text
- [ ] Schema markup validating (test with Google Rich Results Test)

---

## Phase 10: Launch & Post-Launch

### Launch Day
- [ ] Remove "Coming Soon" or maintenance mode
- [ ] Submit sitemap to Google Search Console
- [ ] Submit to Bing Webmaster Tools
- [ ] Test all affiliate links one more time
- [ ] Share on social media

### First Week
- [ ] Monitor Google Analytics for issues
- [ ] Check Search Console for crawl errors
- [ ] Fix any 404 errors that appear
- [ ] Respond to any contact form submissions

### Ongoing
- [ ] Publish 2-3 new posts per week
- [ ] Update old posts with new products/info
- [ ] Monitor affiliate link performance
- [ ] Build email list
- [ ] Create Pinterest pins for each post

---

## File Structure Reference

```
neatnesthome-wordpress/
├── theme/
│   └── neatnesthome-child/
│       ├── style.css                 # Main stylesheet with brand CSS
│       ├── functions.php             # All custom functionality
│       ├── acf-json/
│       │   └── group_nnh_review_fields.json
│       ├── assets/
│       │   ├── css/
│       │   ├── js/
│       │   │   └── affiliate-enhancements.js
│       │   └── images/
│       ├── template-parts/
│       │   ├── content-review.php    # Single review template
│       │   ├── content-roundup.php   # Roundup template
│       │   ├── content-guide.php     # Room guide template
│       │   └── content-checklist.php # Checklist template
│       └── templates/
│           └── template-homepage.php # Custom homepage
└── docs/
    └── DEPLOYMENT_CHECKLIST.md       # This file
```

---

## Shortcode Reference

### Product Box
```
[product_box
    name="Product Name"
    subtitle="Optional subtitle"
    price="$29"
    rating="4.5"
    amazon_url="https://amazon.com/dp/XXXXXXX"
    image="https://..."
    featured="yes"
]
[feature]Feature 1[/feature]
[feature]Feature 2[/feature]
[feature]Feature 3[/feature]
[best_for]Small apartments[/best_for]
[/product_box]
```

### Comparison Table
```
[comparison_table title="Quick Comparison"]
[product name="Product 1" price="$29" best_for="Small spaces" rating="4.8" amazon_url="https://..." winner="yes"]
[product name="Product 2" price="$19" best_for="Budget buyers" rating="4.5" amazon_url="https://..." badge="budget"]
[product name="Product 3" price="$49" best_for="Large families" rating="4.7" amazon_url="https://..." badge="premium"]
[/comparison_table]
```

### Checklist
```
[checklist title="Kitchen Declutter Checklist"]
[item]Clear countertops of all items[/item]
[item product_url="https://amazon.com/..." product_name="Counter organizer"]Organize frequently used items[/item]
[item]Sort through pantry and check expiration dates[/item]
[/checklist]
```

### Callout Box
```
[callout type="tip" title="Pro Tip"]
Your helpful tip content here.
[/callout]

[callout type="warning" title="Common Mistake"]
Warning content here.
[/callout]
```

---

## Support & Resources

- **GeneratePress Documentation:** https://docs.generatepress.com/
- **ACF Documentation:** https://www.advancedcustomfields.com/resources/
- **Rank Math Documentation:** https://rankmath.com/kb/
- **Amazon Associates Help:** https://affiliate-program.amazon.com/help

---

*Deployment guide created December 2025*
