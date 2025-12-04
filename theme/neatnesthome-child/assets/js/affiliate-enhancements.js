/**
 * AFFILIATE ENHANCEMENTS FOR NEAT NEST HOME
 * ==========================================
 * Handles affiliate link enhancement, click tracking, and mobile sticky CTA
 *
 * Adapted from existing ToolShed Tested implementation
 */

(function() {
  'use strict';

  // Configuration - uses localized data from WordPress when available
  const CONFIG = {
    // Amazon affiliate tag (fallback if not passed from WP)
    affiliateTag: (typeof nnhConfig !== 'undefined' && nnhConfig.affiliateTag)
      ? nnhConfig.affiliateTag
      : 'neatnesthome-20',

    // Selectors for affiliate links
    amazonSelectors: 'a[href*="amazon.com"], a[href*="amzn.to"]',

    // Enable sticky CTA bar on mobile
    enableStickyCTA: true,

    // Scroll threshold to show sticky bar (pixels)
    stickyScrollThreshold: 500,

    // Enable exit intent popup (disabled by default)
    enableExitIntent: false,

    // GA4 event category
    eventCategory: 'Affiliate'
  };

  /**
   * Initialize all enhancements when DOM is ready
   */
  document.addEventListener('DOMContentLoaded', function() {
    enhanceAffiliateLinks();
    setupClickTracking();

    if (CONFIG.enableStickyCTA && isMobile()) {
      setupStickyCTA();
    }

    if (CONFIG.enableExitIntent) {
      setupExitIntent();
    }

    // Add smooth scroll for anchor links
    setupSmoothScroll();
  });

  /**
   * Enhance all affiliate links with proper attributes
   */
  function enhanceAffiliateLinks() {
    const affiliateLinks = document.querySelectorAll(CONFIG.amazonSelectors);

    affiliateLinks.forEach(function(link) {
      // Ensure links open in new tab
      link.setAttribute('target', '_blank');
      link.setAttribute('rel', 'nofollow noopener sponsored');

      // Add affiliate button class if not already styled and contains CTA text
      const linkText = link.textContent.toLowerCase();
      const isCTALink = linkText.includes('check price') ||
                        linkText.includes('buy') ||
                        linkText.includes('view on') ||
                        linkText.includes('shop') ||
                        linkText.includes('get it');

      if (!link.classList.contains('affiliate-button') && isCTALink) {
        link.classList.add('affiliate-button');
      }

      // Ensure Amazon links have affiliate tag
      if (link.href.includes('amazon.com') && !link.href.includes('tag=')) {
        try {
          const url = new URL(link.href);
          url.searchParams.set('tag', CONFIG.affiliateTag);
          link.href = url.toString();
        } catch (e) {
          // URL parsing failed, append tag manually
          const separator = link.href.includes('?') ? '&' : '?';
          link.href = link.href + separator + 'tag=' + CONFIG.affiliateTag;
        }
      }
    });
  }

  /**
   * Set up click tracking for analytics
   */
  function setupClickTracking() {
    document.querySelectorAll(CONFIG.amazonSelectors).forEach(function(link) {
      link.addEventListener('click', function(e) {
        trackAffiliateClick('Amazon', this.href, this.textContent);
      });
    });
  }

  /**
   * Send click event to Google Analytics
   */
  function trackAffiliateClick(retailer, url, linkText) {
    // Extract product name from link text or URL
    const productName = linkText.trim() || extractProductFromUrl(url);

    // GA4 tracking
    if (typeof gtag === 'function') {
      gtag('event', 'affiliate_click', {
        'event_category': CONFIG.eventCategory,
        'event_label': retailer,
        'link_url': url,
        'link_text': productName,
        'page_title': document.title,
        'page_path': window.location.pathname
      });
    }

    // Legacy Universal Analytics (if still in use)
    if (typeof ga === 'function') {
      ga('send', 'event', CONFIG.eventCategory, 'Click', retailer);
    }

    // dataLayer push for GTM
    if (typeof dataLayer !== 'undefined') {
      dataLayer.push({
        'event': 'affiliate_click',
        'affiliate_retailer': retailer,
        'affiliate_url': url,
        'affiliate_product': productName
      });
    }
  }

  /**
   * Extract product identifier from Amazon URL
   */
  function extractProductFromUrl(url) {
    // Try to extract ASIN from URL
    const asinMatch = url.match(/\/dp\/([A-Z0-9]{10})/i) ||
                      url.match(/\/product\/([A-Z0-9]{10})/i);
    return asinMatch ? asinMatch[1] : 'Unknown Product';
  }

  /**
   * Set up sticky CTA bar for mobile
   */
  function setupStickyCTA() {
    // Find the first product box or featured product on the page
    const productBox = document.querySelector(
      '.nnh-product-box--featured, ' +
      '.nnh-product-box, ' +
      '[class*="top-pick"], ' +
      '[class*="best-overall"]'
    );

    if (!productBox) return;

    // Get product info
    const productName = productBox.querySelector('h3, .nnh-product-box__title')?.textContent || 'Top Pick';
    const productPrice = productBox.querySelector('.nnh-product-box__price')?.textContent || '';
    const productLink = productBox.querySelector('a[href*="amazon.com"], .affiliate-button')?.href || '#';

    // Don't create if no valid link
    if (productLink === '#') return;

    // Create sticky bar
    const stickyBar = document.createElement('div');
    stickyBar.className = 'nnh-sticky-cta';
    stickyBar.innerHTML = `
      <div class="nnh-sticky-cta__info">
        <div class="nnh-sticky-cta__name">${escapeHtml(productName)}</div>
        <div class="nnh-sticky-cta__price">${productPrice ? productPrice + ' - ' : ''}Our Top Pick</div>
      </div>
      <a href="${escapeHtml(productLink)}"
         class="affiliate-button nnh-btn--sm"
         target="_blank"
         rel="nofollow noopener sponsored">
        Check Price
      </a>
    `;

    document.body.appendChild(stickyBar);
    document.body.classList.add('has-sticky-cta');

    // Track clicks on sticky bar
    stickyBar.querySelector('.affiliate-button').addEventListener('click', function() {
      trackAffiliateClick('Amazon', this.href, 'Sticky CTA - ' + productName);
    });

    // Show/hide based on scroll
    let ticking = false;

    window.addEventListener('scroll', function() {
      if (!ticking) {
        window.requestAnimationFrame(function() {
          if (window.scrollY > CONFIG.stickyScrollThreshold) {
            stickyBar.classList.add('active');
          } else {
            stickyBar.classList.remove('active');
          }
          ticking = false;
        });
        ticking = true;
      }
    });
  }

  /**
   * Set up exit intent popup (optional)
   */
  function setupExitIntent() {
    let shown = false;

    document.addEventListener('mouseout', function(e) {
      if (shown) return;
      if (e.clientY < 10) {
        shown = true;
        showExitPopup();
      }
    });
  }

  /**
   * Show exit intent popup
   */
  function showExitPopup() {
    const popup = document.createElement('div');
    popup.className = 'nnh-exit-popup-overlay';
    popup.innerHTML = `
      <div class="nnh-exit-popup" style="
        background: white;
        max-width: 450px;
        margin: 50px auto;
        padding: 40px;
        border-radius: 12px;
        text-align: center;
        position: relative;
      ">
        <button class="nnh-exit-popup__close" style="
          position: absolute;
          top: 15px;
          right: 15px;
          background: none;
          border: none;
          font-size: 24px;
          cursor: pointer;
          color: #999;
        ">&times;</button>
        <h3 style="margin-bottom: 10px; font-size: 1.5rem;">Wait! Before You Go...</h3>
        <p style="color: #666; margin-bottom: 20px;">Get our free 30-Day Declutter Checklist and transform your home!</p>
        <form class="nnh-exit-popup__form" style="display: flex; gap: 10px; flex-direction: column;">
          <input type="email" placeholder="Enter your email" required style="
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
          ">
          <button type="submit" class="affiliate-button" style="width: 100%;">Get Free Checklist</button>
        </form>
        <p style="font-size: 0.8rem; color: #999; margin-top: 15px;">No spam. Unsubscribe anytime.</p>
      </div>
    `;

    popup.style.cssText = `
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0,0,0,0.6);
      z-index: 10000;
      overflow-y: auto;
    `;

    document.body.appendChild(popup);

    // Close button
    popup.querySelector('.nnh-exit-popup__close').addEventListener('click', function() {
      popup.remove();
    });

    // Click outside to close
    popup.addEventListener('click', function(e) {
      if (e.target === popup) {
        popup.remove();
      }
    });
  }

  /**
   * Setup smooth scrolling for anchor links
   */
  function setupSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
      anchor.addEventListener('click', function(e) {
        const targetId = this.getAttribute('href');
        if (targetId === '#') return;

        const target = document.querySelector(targetId);
        if (target) {
          e.preventDefault();
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  }

  /**
   * Check if user is on mobile device
   */
  function isMobile() {
    return window.innerWidth <= 768;
  }

  /**
   * Escape HTML to prevent XSS
   */
  function escapeHtml(str) {
    const div = document.createElement('div');
    div.textContent = str;
    return div.innerHTML;
  }

  /**
   * Utility: Debounce function
   */
  function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

})();

/**
 * Table of Contents scroll spy (if TOC exists)
 */
(function() {
  const toc = document.querySelector('.table-of-contents, .nnh-toc');
  if (!toc) return;

  const headings = document.querySelectorAll('h2[id], h3[id]');
  const tocLinks = toc.querySelectorAll('a');

  function updateActiveLink() {
    const scrollPos = window.scrollY + 100;

    headings.forEach(function(heading, index) {
      const nextHeading = headings[index + 1];
      const sectionTop = heading.offsetTop;
      const sectionBottom = nextHeading ? nextHeading.offsetTop : document.body.scrollHeight;

      if (scrollPos >= sectionTop && scrollPos < sectionBottom) {
        tocLinks.forEach(link => link.classList.remove('active'));
        const activeLink = toc.querySelector(`a[href="#${heading.id}"]`);
        if (activeLink) activeLink.classList.add('active');
      }
    });
  }

  let debounceTimer;
  window.addEventListener('scroll', function() {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(updateActiveLink, 50);
  });
})();

/**
 * Lazy load images that are not natively supported
 */
(function() {
  if ('loading' in HTMLImageElement.prototype) {
    // Browser supports native lazy loading
    return;
  }

  // Fallback for older browsers
  const images = document.querySelectorAll('img[loading="lazy"]');
  const observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      if (entry.isIntersecting) {
        const img = entry.target;
        if (img.dataset.src) {
          img.src = img.dataset.src;
        }
        observer.unobserve(img);
      }
    });
  });

  images.forEach(function(img) {
    observer.observe(img);
  });
})();
