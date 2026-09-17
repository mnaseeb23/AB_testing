/**
 * Leather Jacket House - Main JavaScript
 */
document.addEventListener('DOMContentLoaded', () => {
  // --- Sticky Header Scroll Effect ---
  const header = document.querySelector('.site-header');
  if (header) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 40) {
        header.classList.add('is-scrolled');
      } else {
        header.classList.remove('is-scrolled');
      }
    });
  }

  // --- Mobile Drawer Navigation ---
  const mobileToggle = document.querySelector('.mobile-nav-toggle');
  const mobileDrawer = document.querySelector('.mobile-drawer');
  const drawerOverlay = document.querySelector('.drawer-overlay');
  const drawerClose = document.querySelector('.drawer-close-btn');

  function openDrawer() {
    if (mobileDrawer) mobileDrawer.classList.add('is-open');
    if (drawerOverlay) drawerOverlay.classList.add('is-open');
    document.body.style.overflow = 'hidden';
  }

  function closeDrawer() {
    if (mobileDrawer) mobileDrawer.classList.remove('is-open');
    if (drawerOverlay) drawerOverlay.classList.remove('is-open');
    document.body.style.overflow = '';
  }

  if (mobileToggle) mobileToggle.addEventListener('click', openDrawer);
  if (drawerClose) drawerClose.addEventListener('click', closeDrawer);
  if (drawerOverlay) drawerOverlay.addEventListener('click', closeDrawer);

  // --- Product Gallery Thumbnail Switcher ---
  const thumbs = document.querySelectorAll('.gallery-thumb');
  const mainImage = document.querySelector('.product-gallery-main img');

  if (thumbs.length && mainImage) {
    thumbs.forEach(thumb => {
      thumb.addEventListener('click', () => {
        thumbs.forEach(t => t.classList.remove('is-active'));
        thumb.classList.add('is-active');
        const newSrc = thumb.getAttribute('data-full');
        if (newSrc) {
          mainImage.src = newSrc;
        }
      });
    });
  }

  // --- Size Selector ---
  const sizeButtons = document.querySelectorAll('.size-btn');
  const sizeInput = document.getElementById('selected-product-size');

  if (sizeButtons.length) {
    sizeButtons.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        sizeButtons.forEach(b => b.classList.remove('is-selected'));
        btn.classList.add('is-selected');
        if (sizeInput) {
          sizeInput.value = btn.getAttribute('data-size');
        }
      });
    });
  }

  // --- Size Guide Modal ---
  const sizeGuideLink = document.querySelector('.size-guide-link');
  const sizeGuideModal = document.getElementById('size-guide-modal');
  const modalCloseBtns = document.querySelectorAll('.modal-close, .modal-overlay');

  if (sizeGuideLink && sizeGuideModal) {
    sizeGuideLink.addEventListener('click', (e) => {
      e.preventDefault();
      sizeGuideModal.classList.add('is-active');
      document.body.style.overflow = 'hidden';
    });
  }

  modalCloseBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      if (e.target === btn) {
        document.querySelectorAll('.modal-overlay').forEach(modal => {
          modal.classList.remove('is-active');
        });
        document.body.style.overflow = '';
      }
    });
  });

  // --- Product Tabs ---
  const tabBtns = document.querySelectorAll('.tab-nav-btn');
  const tabPanes = document.querySelectorAll('.tab-pane');

  if (tabBtns.length && tabPanes.length) {
    tabBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const targetId = btn.getAttribute('data-tab');
        tabBtns.forEach(b => b.classList.remove('is-active'));
        tabPanes.forEach(p => p.classList.remove('is-active'));

        btn.classList.add('is-active');
        const targetPane = document.getElementById(targetId);
        if (targetPane) targetPane.classList.add('is-active');
      });
    });
  }

  // --- Quantity Selector ---
  const qtyPlus = document.querySelector('.qty-btn.plus');
  const qtyMinus = document.querySelector('.qty-btn.minus');
  const qtyInput = document.querySelector('.qty-input');

  if (qtyPlus && qtyMinus && qtyInput) {
    qtyPlus.addEventListener('click', (e) => {
      e.preventDefault();
      let val = parseInt(qtyInput.value, 10) || 1;
      qtyInput.value = val + 1;
    });

    qtyMinus.addEventListener('click', (e) => {
      e.preventDefault();
      let val = parseInt(qtyInput.value, 10) || 1;
      if (val > 1) {
        qtyInput.value = val - 1;
      }
    });
  }

  // --- Wishlist Feedback ---
  const wishlistBtns = document.querySelectorAll('.product-wishlist-btn');
  wishlistBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      btn.classList.toggle('is-active');
      const heart = btn.querySelector('svg');
      if (heart) {
        if (btn.classList.contains('is-active')) {
          heart.style.fill = '#D38C2F';
          heart.style.stroke = '#D38C2F';
        } else {
          heart.style.fill = 'none';
          heart.style.stroke = 'currentColor';
        }
      }
    });
  });

  // --- Newsletter Form Submission Feedback ---
  const newsletterForm = document.querySelector('.newsletter-form');
  if (newsletterForm) {
    newsletterForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const input = newsletterForm.querySelector('.newsletter-input');
      const submitBtn = newsletterForm.querySelector('.newsletter-submit');
      if (input && input.value) {
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Subscribed!';
        submitBtn.style.backgroundColor = '#28a745';
        input.value = '';
        setTimeout(() => {
          submitBtn.textContent = originalText;
          submitBtn.style.backgroundColor = '';
        }, 3500);
      }
    });
  }
});
