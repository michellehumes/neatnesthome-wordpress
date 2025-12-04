# Neat Nest Home - WordPress Affiliate Site

A complete WordPress child theme and content system for a home organization Amazon affiliate blog.

## Quick Start

1. Install WordPress and GeneratePress theme
2. Upload `theme/neatnesthome-child` to `/wp-content/themes/`
3. Activate "Neat Nest Home Child" theme
4. Install ACF plugin and import field group from `acf-json/`
5. Follow `docs/DEPLOYMENT_CHECKLIST.md` for full setup

## What's Included

### Theme Files (`theme/neatnesthome-child/`)

| File | Purpose |
|------|---------|
| `style.css` | Complete brand design system (colors, typography, components) |
| `functions.php` | Affiliate tag handling, shortcodes, schema markup, utilities |
| `assets/js/affiliate-enhancements.js` | Click tracking, sticky CTA, link enhancement |
| `acf-json/group_nnh_review_fields.json` | ACF field configuration for reviews |
| `templates/template-homepage.php` | Custom homepage template |
| `template-parts/content-*.php` | Post templates for different content types |

### Reusable Components

All components are implemented as **shortcodes** in functions.php:

#### Product Box
```shortcode
[product_box name="Product" price="$29" rating="4.5" amazon_url="..." featured="yes"]
[feature]Feature 1[/feature]
[feature]Feature 2[/feature]
[best_for]Small apartments[/best_for]
[/product_box]
```

#### Comparison Table
```shortcode
[comparison_table title="Quick Comparison"]
[product name="Product 1" price="$29" rating="4.8" amazon_url="..." winner="yes"]
[product name="Product 2" price="$19" rating="4.5" amazon_url="..." badge="budget"]
[/comparison_table]
```

#### Checklist
```shortcode
[checklist title="Declutter Checklist"]
[item]Task 1[/item]
[item product_url="..." product_name="Helper tool"]Task 2[/item]
[/checklist]
```

#### Callout Box
```shortcode
[callout type="tip" title="Pro Tip"]Your content here[/callout]
```

### Post Templates

| Template | Use For |
|----------|---------|
| `content-review.php` | Single product reviews |
| `content-roundup.php` | "Best X for Y" comparison posts |
| `content-guide.php` | Step-by-step room guides |
| `content-checklist.php` | Day-by-day challenges (30-day declutter, etc.) |

## Key Features

### Amazon Affiliate Integration
- **Auto-tagging**: All Amazon links automatically get your affiliate tag
- **Link enhancement**: Proper `rel` attributes added automatically
- **Click tracking**: GA4 events fired on all affiliate clicks
- **Mobile sticky CTA**: Featured product floats on mobile for better conversion

### SEO & Schema
- **Product schema**: Auto-generated for posts with ACF product fields
- **FAQ schema**: Auto-generated for posts with FAQ repeater field
- **Review schema**: Included with product schema

### Performance
- Native lazy loading for images
- Minimal CSS (design system approach)
- No jQuery dependency
- Font preloading

## Brand Colors

| Color | Hex | Usage |
|-------|-----|-------|
| Primary (Sage) | `#5B8A72` | Links, headings, accents |
| Primary Dark | `#4A7461` | Hover states |
| Primary Light | `#E8F0EC` | Backgrounds |
| Accent (Terracotta) | `#D4A574` | CTA buttons, highlights |
| Text | `#333333` | Body text |
| Background | `#FAFAFA` | Page background |

## Site Structure

```
Home
├── Kitchen & Pantry
├── Closet & Bedroom
├── Bathroom & Linen
├── Entryway & Living Room
├── Small Spaces & Apartments
├── Kids & Family
├── Laundry & Cleaning
├── Garage & Seasonal
├── Checklists & Plans
├── About
└── Contact
```

## Required Plugins

- **Advanced Custom Fields (ACF)** - Product fields
- **Rank Math SEO** - SEO and additional schema
- **Caching plugin** - WP Super Cache or LiteSpeed Cache

## Configuration

### Set Your Affiliate Tag

Add to `wp-config.php`:
```php
define('NNH_AFFILIATE_TAG', 'your-tag-20');
```

Or edit `functions.php` line ~50.

### Google Analytics

The JS automatically sends events to GA4 if `gtag()` is available. Configure GA4 via Rank Math or manually add the tracking code.

## Adapted From

This implementation adapts patterns from the existing `toolshed-implementation/` folder:
- Comparison table HTML/CSS structure
- Affiliate button styling
- Click tracking JavaScript
- Disclosure box patterns

## Documentation

See `docs/DEPLOYMENT_CHECKLIST.md` for complete setup instructions.

---

*Created December 2025*
