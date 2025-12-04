# Neat Nest Home - Hostinger Setup Guide

Complete step-by-step instructions for deploying on Hostinger.

---

## Step 1: Create WordPress Site on Hostinger (5 minutes)

### If you need a new WordPress installation:

1. Log into **Hostinger hPanel** → https://hpanel.hostinger.com
2. Click **Websites** in the left sidebar
3. Click **Add Website** (top right)
4. Select **WordPress**
5. Fill in:
   - **Website Title:** Neat Nest Home
   - **Admin Email:** your email
   - **Admin Username:** pick something (not "admin")
   - **Admin Password:** strong password (save this!)
6. Choose your domain or subdomain
7. Click **Submit**
8. Wait 2-3 minutes for installation

### If WordPress is already installed:
Skip to Step 2.

---

## Step 2: Access WordPress Admin (1 minute)

1. In hPanel, go to **Websites**
2. Find your site → Click **Manage**
3. Scroll to **WordPress** section
4. Click **Edit Website** or **Admin Panel**
   - Or go directly to: `https://yourdomain.com/wp-admin`
5. Log in with your WordPress credentials

---

## Step 3: Install GeneratePress Theme (2 minutes)

1. In WordPress admin, go to **Appearance → Themes**
2. Click **Add New** (top of page)
3. Search for **GeneratePress**
4. Click **Install** on GeneratePress (by suspended theme)
5. Click **Activate**

> **Don't customize GeneratePress yet** - the child theme handles all styling.

---

## Step 4: Upload Neat Nest Home Child Theme (2 minutes)

1. Download the theme ZIP from your computer:
   - File: `neatnesthome-child.zip`
   - Location: `/neatnesthome-wordpress/neatnesthome-child.zip`

2. In WordPress admin:
   - Go to **Appearance → Themes**
   - Click **Add New**
   - Click **Upload Theme** (top of page)
   - Click **Choose File** → Select `neatnesthome-child.zip`
   - Click **Install Now**
   - Click **Activate**

3. Verify: Your site should now show the Neat Nest Home styling.

---

## Step 5: Install Required Plugins (5 minutes)

Go to **Plugins → Add New** and install these:

### Required:

1. **Advanced Custom Fields (ACF)**
   - Search: "Advanced Custom Fields"
   - Author: WP Engine
   - Click **Install Now** → **Activate**

2. **Rank Math SEO**
   - Search: "Rank Math"
   - Click **Install Now** → **Activate**
   - Run the setup wizard (Basic mode is fine)

### Recommended:

3. **LiteSpeed Cache** (Hostinger includes this)
   - Usually pre-installed on Hostinger
   - If not: Search "LiteSpeed Cache" → Install → Activate

4. **WPForms Lite** (for contact form)
   - Search: "WPForms"
   - Click **Install Now** → **Activate**

---

## Step 6: Import ACF Field Group (2 minutes)

1. Go to **Custom Fields** (left sidebar, added by ACF)
2. Click **Tools** (submenu)
3. Under **Import Field Groups**:
   - Click **Choose File**
   - Navigate to: `neatnesthome-wordpress/theme/neatnesthome-child/acf-json/`
   - Select: `group_nnh_review_fields.json`
   - Click **Import**

4. Verify: Go to **Custom Fields → Field Groups**
   - You should see "Product Review Fields"

---

## Step 7: Create Categories (5 minutes)

Go to **Posts → Categories** and create each:

| Name | Slug |
|------|------|
| Kitchen & Pantry | `kitchen-pantry` |
| Closet & Bedroom | `closet-bedroom` |
| Bathroom & Linen | `bathroom-linen` |
| Entryway & Living Room | `entryway-living-room` |
| Small Spaces & Apartments | `small-spaces` |
| Kids & Family | `kids-family` |
| Laundry & Cleaning | `laundry-cleaning` |
| Garage & Seasonal | `garage-seasonal` |
| Reviews | `reviews` |
| Roundups | `roundups` |
| Checklists & Plans | `checklists-plans` |

---

## Step 8: Create Pages (10 minutes)

For each page, go to **Pages → Add New**:

### Homepage
1. Title: `Home`
2. In the right sidebar, find **Template** dropdown
3. Select: **Homepage**
4. Click **Publish**

### About Page
1. Title: `About`
2. Switch to **Code Editor** (click ⋮ menu → Code Editor)
3. Paste content from: `content/pages/about.html`
4. Click **Publish**

### Contact Page
1. Title: `Contact`
2. First, create a WPForms contact form:
   - Go to **WPForms → Add New**
   - Choose "Simple Contact Form"
   - Save it
   - Copy the shortcode (looks like `[wpforms id="123"]`)
3. In the Contact page, paste content from `content/pages/contact.html`
4. Replace the HTML form with your WPForms shortcode
5. Click **Publish**

### Privacy Policy
1. Title: `Privacy Policy`
2. Paste content from: `content/pages/privacy-policy.html`
3. Click **Publish**

### Affiliate Disclosure
1. Title: `Affiliate Disclosure`
2. Paste content from: `content/pages/affiliate-disclosure.html`
3. Click **Publish**

---

## Step 9: Set Homepage (1 minute)

1. Go to **Settings → Reading**
2. Select: **A static page**
3. Homepage: Select **Home**
4. Posts page: Select **— Select —** (or create a "Blog" page)
5. Click **Save Changes**

---

## Step 10: Create Navigation Menu (5 minutes)

1. Go to **Appearance → Menus**
2. Click **Create a new menu**
3. Menu Name: `Primary Menu`
4. Add items:
   - **Pages:** Home, About, Contact
   - **Categories:** All your room categories
5. Arrange in desired order
6. Under **Menu Settings**, check: **Primary Menu**
7. Click **Save Menu**

---

## Step 11: Add Blog Posts (15 minutes)

For each post, go to **Posts → Add New**:

### Post 1: 30-Day Declutter Plan
1. Title: `30-Day Declutter Challenge: Transform Your Home Room by Room`
2. Switch to Code Editor
3. Paste content from: `content/posts/30-day-declutter-plan.html`
4. Set Category: `Checklists & Plans`
5. Add Tags: `featured`, `declutter`
6. Click **Publish**

### Post 2: Best Pantry Organizers
1. Title: `10 Best Pantry Organizers for Small Spaces (2025)`
2. Paste from: `content/posts/best-pantry-organizers.html`
3. Categories: `Kitchen & Pantry`, `Roundups`
4. Tags: `featured`, `pantry`, `amazon finds`
5. **Publish**

### Post 3: Tiny Bathroom Organization
1. Title: `How to Organize a Tiny Bathroom: 7 Space-Saving Ideas That Actually Work`
2. Paste from: `content/posts/organize-tiny-bathroom.html`
3. Categories: `Bathroom & Linen`, `Small Spaces & Apartments`
4. Tags: `small spaces`, `bathroom`, `renter-friendly`
5. **Publish**

### Post 4: SimpleHouseware Review
1. Title: `SimpleHouseware Under Sink Organizer Review: Is It Worth It?`
2. Paste from: `content/posts/simplehouseware-under-sink-review.html`
3. Categories: `Bathroom & Linen`, `Kitchen & Pantry`, `Reviews`
4. Tags: `product review`, `under sink`
5. **Publish**

### Post 5: Small Closet Solutions
1. Title: `12 Small Closet Storage Ideas That Actually Work (Tested)`
2. Paste from: `content/posts/small-closet-solutions.html`
3. Categories: `Closet & Bedroom`, `Small Spaces & Apartments`, `Roundups`
4. Tags: `featured`, `closet`, `small spaces`
5. **Publish**

---

## Step 12: Configure Rank Math SEO (5 minutes)

1. Go to **Rank Math → Dashboard**
2. Run Setup Wizard if you haven't
3. Go to **Rank Math → Titles & Meta**
4. **Homepage:**
   - SEO Title: `Neat Nest Home | Smart Storage for Real Life`
   - Meta Description: `Practical home organization tips, honest product reviews, and affordable storage solutions. No Pinterest-perfect closets required.`

5. **Posts:**
   - Title Format: `%title% | Neat Nest Home`

6. **Categories:**
   - Title Format: `%term% Organization Ideas | Neat Nest Home`

---

## Step 13: Set Up Google Analytics (5 minutes)

### Option A: Through Rank Math (Easiest)
1. Go to **Rank Math → General Settings → Analytics**
2. Click **Connect Your Google Account**
3. Authorize and select your GA4 property

### Option B: Through Hostinger
1. In hPanel, go to your website
2. Find **Integrations** or **Analytics**
3. Add your GA4 Measurement ID (G-XXXXXXXXXX)

---

## Step 14: Performance Settings (3 minutes)

### LiteSpeed Cache (Hostinger)
1. Go to **LiteSpeed Cache → Cache**
2. Enable: **Enable Cache**
3. Go to **LiteSpeed Cache → Image Optimization**
4. Click **Request Optimization** (processes your images)

### Hostinger CDN
1. In hPanel → your website → **Performance**
2. Enable **Hostinger CDN** if available

---

## Step 15: SSL & Final Checks (2 minutes)

### SSL Certificate
1. In hPanel → **Security → SSL**
2. Should be enabled by default on Hostinger
3. If not, click **Install SSL**

### Final Checklist
- [ ] Visit your site - styling looks correct?
- [ ] Test navigation menu
- [ ] Test a blog post - affiliate buttons work?
- [ ] Test contact form
- [ ] Check mobile view (resize browser)
- [ ] Privacy Policy accessible from footer?

---

## Your Site Is Live! 🎉

### Next Steps:
1. Add featured images to each post
2. Update the affiliate tag to your real Amazon Associates tag
3. Add your logo (Appearance → Customize → Site Identity)
4. Create more content!

### Hostinger-Specific Tips:
- Use **Hostinger AI** in hPanel for quick content ideas
- Enable **Weekly Backups** under hPanel → Files → Backups
- Monitor speed with hPanel → Performance → Page Speed

---

## Troubleshooting

### Theme not showing correctly?
- Clear LiteSpeed Cache (LiteSpeed Cache → Toolbox → Purge All)
- Check that GeneratePress is installed (not just the child theme)

### ACF fields not showing?
- Make sure the post is in "Reviews" or "Roundups" category
- Check Custom Fields → Field Groups → verify "Product Review Fields" exists

### 404 errors on pages?
- Go to Settings → Permalinks
- Click **Save Changes** (even without changing anything)
- This refreshes the permalink structure

---

*Guide created for Hostinger hosting - December 2025*
