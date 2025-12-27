@extends('layouts.app')

@section('title', 'Inglorious - Nurah Perfumes')

@push('styles')
<style>
    /* Image Gallery - Mobile Optimized */
    .image-gallery {
        position: relative;
    }

    .main-image-container {
        position: relative;
        width: 100%;
        aspect-ratio: 1;
        background: var(--bg-light);
        overflow: hidden;
    }

    .main-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: var(--gold);
        color: var(--white);
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .image-dots {
        position: absolute;
        bottom: 15px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 6px;
    }

    .image-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        border: 1px solid var(--white);
        cursor: pointer;
        transition: all 0.3s;
    }

    .image-dot.active {
        background: var(--white);
        width: 20px;
        border-radius: 3px;
    }

    /* Thumbnail Strip */
    .thumbnail-strip {
        display: flex;
        gap: 8px;
        padding: 12px 15px;
        overflow-x: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .thumbnail-strip::-webkit-scrollbar {
        display: none;
    }

    .thumbnail {
        min-width: 60px;
        height: 60px;
        border-radius: 8px;
        border: 2px solid transparent;
        cursor: pointer;
        transition: all 0.3s;
        object-fit: cover;
    }

    .thumbnail.active {
        border-color: var(--gold);
    }

    /* Product Info Section */
    .product-info {
        padding: 20px 15px;
    }

    .product-header {
        margin-bottom: 20px;
    }

    .product-name {
        font-family: 'Playfair Display', serif;
        font-size: 32px;
        font-weight: 700;
        color: var(--black);
        margin-bottom: 12px;
        line-height: 1.2;
    }

    .product-price {
        font-size: 28px;
        font-weight: 700;
        color: var(--black);
        margin-bottom: 12px;
    }

    .rating-row {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }

    .stars {
        color: #ffc107;
        font-size: 16px;
    }

    .rating-text {
        color: var(--text-light);
    }

    /* Promo Banner */
    .promo-banner {
        background: linear-gradient(135deg, var(--gold) 0%, var(--black) 100%);
        color: var(--white);
        padding: 12px 15px;
        margin: 0 -15px 20px;
        text-align: center;
        font-size: 13px;
        font-weight: 600;
    }

    .promo-code {
        font-weight: 800;
        letter-spacing: 1px;
    }

    /* Option Section */
    .option-section {
        margin-bottom: 25px;
    }

    .option-label {
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 12px;
        display: block;
        color: var(--black);
    }

    /* Size Options - Mobile Optimized */
    .size-options {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .size-option {
        padding: 12px;
        border: 2px solid var(--border);
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        background: var(--white);
    }

    .size-option.active {
        border-color: var(--black);
        background: var(--black);
        color: var(--white);
    }

    .size-label {
        font-weight: 700;
        font-size: 14px;
        display: block;
        margin-bottom: 4px;
    }

    .size-price {
        font-size: 12px;
        opacity: 0.8;
    }

    /* Intensity Bar */
    .intensity-container {
        background: var(--bg-light);
        padding: 15px;
        border-radius: 10px;
    }

    .intensity-label {
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 10px;
        text-align: center;
    }

    .intensity-bar {
        width: 100%;
        height: 6px;
        background: #ddd;
        border-radius: 3px;
        position: relative;
        overflow: hidden;
    }

    .intensity-fill {
        position: absolute;
        height: 100%;
        background: linear-gradient(90deg, var(--gold) 0%, var(--black) 100%);
        width: 70%;
        border-radius: 3px;
    }

    /* Notes Card */
    .notes-card {
        background: var(--bg-light);
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .notes-title {
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 15px;
        text-align: center;
    }

    .note-item {
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--border);
    }

    .note-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .note-type {
        font-weight: 700;
        font-size: 13px;
        color: var(--black);
        margin-bottom: 4px;
    }

    .note-list {
        font-size: 13px;
        color: var(--text-light);
    }

    /* Personality Image */
    .personality-section {
        margin-bottom: 20px;
    }

    .personality-image {
        width: 100%;
        border-radius: 12px;
        margin-top: 10px;
    }

    /* Quantity Selector - Mobile Touch Friendly */
    .quantity-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        border: 2px solid var(--border);
        border-radius: 10px;
        overflow: hidden;
    }

    .qty-btn {
        width: 44px;
        height: 44px;
        border: none;
        background: var(--white);
        font-size: 20px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--black);
    }

    .qty-display {
        width: 50px;
        text-align: center;
        font-weight: 700;
        font-size: 16px;
        border-left: 1px solid var(--border);
        border-right: 1px solid var(--border);
    }

    /* Sticky Bottom Bar */
    .sticky-bottom {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: var(--white);
        padding: 12px 15px;
        box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        z-index: 99;
    }

    .add-to-cart-btn {
        width: 100%;
        padding: 16px;
        background: var(--black);
        color: var(--white);
        border: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .add-to-cart-btn:active {
        transform: scale(0.98);
    }

    /* Share Section */
    .share-section {
        padding: 20px 15px;
        border-top: 1px solid var(--border);
        margin-top: 20px;
    }

    .share-title {
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 12px;
    }

    .share-buttons {
        display: flex;
        gap: 10px;
    }

    .share-btn {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 2px solid var(--border);
        background: var(--white);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 18px;
    }

    /* Product Details Accordion */
    .details-section {
        padding: 20px 15px;
    }

    .detail-accordion {
        border-bottom: 1px solid var(--border);
    }

    .accordion-header {
        padding: 18px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
    }

    .accordion-title {
        font-weight: 700;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .accordion-icon {
        font-size: 20px;
        transition: transform 0.3s;
    }

    .accordion-header.active .accordion-icon {
        transform: rotate(180deg);
    }

    .accordion-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .accordion-content.active {
        max-height: 1000px;
        padding-bottom: 18px;
    }

    .accordion-text {
        font-size: 14px;
        line-height: 1.7;
        color: var(--text);
    }

    .detail-highlight {
        background: var(--bg-light);
        padding: 15px;
        border-radius: 10px;
        margin: 15px 0;
        text-align: center;
    }

    .highlight-badge {
        display: inline-block;
        background: var(--black);
        color: var(--white);
        padding: 6px 15px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .highlight-text {
        font-size: 14px;
        line-height: 1.6;
    }

    /* Reviews Section */
    .reviews-section {
        padding: 20px 15px;
        background: var(--bg-light);
    }

    .reviews-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .reviews-title {
        font-family: 'Playfair Display', serif;
        font-size: 22px;
        font-weight: 700;
    }

    .reviews-summary {
        text-align: center;
        margin-bottom: 20px;
        padding: 20px;
        background: var(--white);
        border-radius: 12px;
    }

    .review-score {
        font-size: 42px;
        font-weight: 700;
        color: var(--black);
        line-height: 1;
    }

    .review-stars {
        color: #ffc107;
        font-size: 20px;
        margin: 8px 0;
    }

    .review-count {
        font-size: 13px;
        color: var(--text-light);
    }

    .review-card {
        background: var(--white);
        padding: 15px;
        border-radius: 12px;
        margin-bottom: 12px;
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 10px;
    }

    .reviewer-name {
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 4px;
    }

    .review-stars-small {
        color: #ffc107;
        font-size: 14px;
    }

    .review-text {
        font-size: 14px;
        line-height: 1.6;
        color: var(--text);
    }

    .review-label {
        font-weight: 700;
        margin-bottom: 5px;
    }

    /* FAQ Section */
    .faq-section {
        padding: 20px 15px;
    }

    .faq-title {
        font-family: 'Playfair Display', serif;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .faq-item {
        border-bottom: 1px solid var(--border);
        padding: 18px 0;
    }

    .faq-question {
        display: flex;
        justify-content: space-between;
        align-items: start;
        cursor: pointer;
        gap: 10px;
    }

    .faq-q-text {
        font-weight: 600;
        font-size: 14px;
        line-height: 1.5;
        flex: 1;
    }

    .faq-toggle {
        font-size: 20px;
        font-weight: 300;
        min-width: 20px;
        transition: transform 0.3s;
    }

    .faq-question.active .faq-toggle {
        transform: rotate(45deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .faq-answer.active {
        max-height: 500px;
        padding-top: 12px;
    }

    .faq-answer-text {
        font-size: 13px;
        line-height: 1.7;
        color: var(--text-light);
    }

    /* Footer Spacing */
    .footer-spacer {
        height: 80px;
    }

    /* Loading Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-in {
        animation: fadeIn 0.5s ease forwards;
    }

    /* Toast Notification */
    .toast {
        position: fixed;
        bottom: 100px;
        left: 50%;
        transform: translateX(-50%) translateY(100px);
        background: var(--black);
        color: var(--white);
        padding: 12px 24px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 14px;
        z-index: 1000;
        opacity: 0;
        transition: all 0.3s;
    }

    .toast.show {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }

    /* Responsive - Tablet */
    @media (min-width: 768px) {
        .product-info {
            max-width: 600px;
            margin: 0 auto;
        }

        .main-image-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .sticky-bottom {
            max-width: 600px;
            left: 50%;
            transform: translateX(-50%);
        }
    }
</style>
@endpush

@section('content')

    <!-- Mini Header with Back Button (In-Content) -->
    <div style="background:var(--white); padding:10px 15px; display:flex; align-items:center; gap:10px; border-bottom:1px solid #eee;">
        <button onclick="history.back()" style="border:none; background:none; font-size:24px; cursor:pointer;">←</button>
        <span style="font-family:'Playfair Display',serif; font-weight:700; font-size:18px;">Product Details</span>
    </div>

    <!-- Image Gallery -->
    <div class="image-gallery">
        <div class="main-image-container">
            <span class="image-badge">Bestseller</span>
            <img src="https://myop.in/cdn/shop/files/inglorious_2fe7f645-0169-4447-b197-1b3cad3f6ba5.webp?v=1752146385&width=1080" alt="Inglorious" class="main-image" id="mainImage">
            <div class="image-dots">
                <div class="image-dot active"></div>
                <div class="image-dot"></div>
                <div class="image-dot"></div>
                <div class="image-dot"></div>
                <div class="image-dot"></div>
            </div>
        </div>
        <div class="thumbnail-strip">
            <img src="https://myop.in/cdn/shop/files/inglorious_2fe7f645-0169-4447-b197-1b3cad3f6ba5.webp?v=1752146385&width=416" class="thumbnail active" onclick="changeImage(this, 0)" alt="View 1">
            <img src="https://myop.in/cdn/shop/files/inglorious_notes.webp?v=1759559980&width=416" class="thumbnail" onclick="changeImage(this, 1)" alt="View 2">
            <img src="https://myop.in/cdn/shop/files/inglorious_sensation.webp?v=1759559980&width=416" class="thumbnail" onclick="changeImage(this, 2)" alt="View 3">
            <img src="https://myop.in/cdn/shop/files/bottle_options_for_website.webp?v=1764337765&width=416" class="thumbnail" onclick="changeImage(this, 3)" alt="View 4">
            <img src="https://myop.in/cdn/shop/files/inglorious_79f92dac-1273-4a41-afc5-4954e0e5ff9e.webp?v=1759559980&width=416" class="thumbnail" onclick="changeImage(this, 4)" alt="View 5">
        </div>
    </div>

    <!-- Product Info -->
    <div class="product-info">
        <div class="product-header">
            <h1 class="product-name">Inglorious</h1>
            <div class="product-price" id="productPrice">Rs. 929.00</div>
            <div class="rating-row">
                <span class="stars">⭐⭐⭐⭐⭐</span>
                <span class="rating-text">5.0 (2 reviews)</span>
            </div>
        </div>

        <!-- Promo Banner -->
        <div class="promo-banner">
            🎁 BUY 2 GET 1 FREE! Use code: <span class="promo-code">B2G1</span>
        </div>

        <!-- Size Selection -->
        <div class="option-section">
            <label class="option-label">Select Size</label>
            <div class="size-options">
                <div class="size-option active" data-price="929" onclick="selectSize(this)">
                    <span class="size-label">50ml</span>
                    <span class="size-price">₹929</span>
                </div>
                <div class="size-option" data-price="1699" onclick="selectSize(this)">
                    <span class="size-label">100ml</span>
                    <span class="size-price">₹1,699</span>
                </div>
                <div class="size-option" data-price="2499" onclick="selectSize(this)">
                    <span class="size-label">100ml</span>
                    <span class="size-price">Personalized</span>
                </div>
            </div>
        </div>

        <!-- Intensity -->
        <div class="option-section">
            <label class="option-label">Intensity</label>
            <div class="intensity-container">
                <div class="intensity-label">Long Lasting & Strong</div>
                <div class="intensity-bar">
                    <div class="intensity-fill"></div>
                </div>
            </div>
        </div>

        <!-- Notes -->
        <div class="notes-card">
            <div class="notes-title">Notes & Composition</div>
            <div class="note-item">
                <div class="note-type">▲ Top Notes</div>
                <div class="note-list">Lime, Grapefruit</div>
            </div>
            <div class="note-item">
                <div class="note-type">■ Middle Notes</div>
                <div class="note-list">Watermelon</div>
            </div>
            <div class="note-item">
                <div class="note-type">▼ Base Notes</div>
                <div class="note-list">Seaweed, Ambergris</div>
            </div>
        </div>

        <!-- Personality -->
        <div class="personality-section">
            <label class="option-label">Personality</label>
            <img src="https://myop.in/cdn/shop/files/Men_allday_persnality.png?v=1715808037&width=1030" alt="Personality" class="personality-image">
        </div>

        <!-- Quantity -->
        <div class="quantity-section">
            <label class="option-label" style="margin: 0;">Quantity</label>
            <div class="quantity-controls">
                <button class="qty-btn" onclick="decreaseQty()">−</button>
                <div class="qty-display" id="quantity">1</div>
                <button class="qty-btn" onclick="increaseQty()">+</button>
            </div>
        </div>

        <!-- Share -->
        <div class="share-section">
            <div class="share-title">Share Product</div>
            <div class="share-buttons">
                <button class="share-btn" onclick="share('facebook')">📘</button>
                <button class="share-btn" onclick="share('pinterest')">📌</button>
                <button class="share-btn" onclick="share('whatsapp')">💬</button>
                <button class="share-btn" onclick="share('email')">✉️</button>
            </div>
        </div>
    </div>

    <!-- Product Details Accordion -->
    <div class="details-section">
        <div class="detail-accordion">
            <div class="accordion-header" onclick="toggleAccordion(this)">
                <span class="accordion-title">Description</span>
                <span class="accordion-icon">▼</span>
            </div>
            <div class="accordion-content">
                <div class="accordion-text">
                    <strong>Clean. Vivid. Sensual.</strong>
                    <br><br>
                    A harmonious union of citrus, aromatic and spicy accords, 'Inglorious' guarantees a fresh start for the go-getter in you.
                    <br><br>
                    A fragrance from the scent family of fresh is a must-have in the perfume collection for someone who loves crisp and clean fragrances. With breathtaking notes of fresh grapefruit and lime that make way for refreshing watermelon; finally rounded off by notes of seaweed and ambergris as base.
                </div>
            </div>
        </div>

        <div class="detail-accordion">
            <div class="accordion-header" onclick="toggleAccordion(this)">
                <span class="accordion-title">Key Features</span>
                <span class="accordion-icon">▼</span>
            </div>
            <div class="accordion-content">
                <div class="detail-highlight">
                    <span class="highlight-badge">50% Oil Concentration</span>
                    <p class="highlight-text">Experience the captivating scent that has been reformulated for the Indian tropical weather.</p>
                </div>
                <div class="accordion-text">
                    • Long-lasting fragrance (5-6 hours)<br>
                    • High-quality European perfume oils<br>
                    • Perfect for daily wear<br>
                    • Fresh and energizing scent<br>
                    • Suitable for all occasions
                </div>
            </div>
        </div>

        <div class="detail-accordion">
            <div class="accordion-header" onclick="toggleAccordion(this)">
                <span class="accordion-title">Shipping & Returns</span>
                <span class="accordion-icon">▼</span>
            </div>
            <div class="accordion-content">
                <div class="accordion-text">
                    <strong>Shipping:</strong><br>
                    • Free shipping on orders above ₹399<br>
                    • Delivery within 4-10 business days<br>
                    • Order tracking available<br><br>
                    <strong>Returns:</strong><br>
                    • 14-day return policy<br>
                    • Product must be unused and in original packaging<br>
                    • Sale items are non-returnable
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews -->
    <div class="reviews-section">
        <div class="reviews-header">
            <h2 class="reviews-title">Customer Reviews</h2>
            <button style="background: none; border: none; color: var(--gold); font-weight: 700; font-size: 14px;">Write Review</button>
        </div>

        <div class="reviews-summary">
            <div class="review-score">5.0</div>
            <div class="review-stars">⭐⭐⭐⭐⭐</div>
            <div class="review-count">Based on 2 reviews</div>
        </div>

        <div class="review-card">
            <div class="review-header">
                <div>
                    <div class="reviewer-name">Lipsa Dhar</div>
                    <div class="review-stars-small">⭐⭐⭐⭐⭐</div>
                </div>
            </div>
            <div class="review-text">
                <div class="review-label">Longevity</div>
                Love the captivating smell
            </div>
        </div>

        <div class="review-card">
            <div class="review-header">
                <div>
                    <div class="reviewer-name">Ajmal Kuppanath</div>
                    <div class="review-stars-small">⭐⭐⭐⭐⭐</div>
                </div>
            </div>
            <div class="review-text">
                <div class="review-label">Good product</div>
                good
            </div>
        </div>
    </div>

    <!-- FAQs -->
    <div class="faq-section">
        <h2 class="faq-title">Frequently Asked</h2>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleFAQ(this)">
                <span class="faq-q-text">How to make perfumes last longer?</span>
                <span class="faq-toggle">+</span>
            </div>
            <div class="faq-answer">
                <div class="faq-answer-text">
                    First tip: Moisturize your skin before applying perfume. Dry skin tends to absorb scent faster, so using an unscented moisturizer or even a little Vaseline on your pulse points helps lock in the fragrance. Store your perfumes away from direct sunlight and heat.
                </div>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleFAQ(this)">
                <span class="faq-q-text">Can women use men's perfumes?</span>
                <span class="faq-toggle">+</span>
            </div>
            <div class="faq-answer">
                <div class="faq-answer-text">
                    Fragrance knows no gender. Some scents might appeal more to the opposite sex, but really, it's all about what you love. Pick the perfume that makes you feel great.
                </div>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleFAQ(this)">
                <span class="faq-q-text">What is the right way of applying perfume?</span>
                <span class="faq-toggle">+</span>
            </div>
            <div class="faq-answer">
                <div class="faq-answer-text">
                    Apply a moisturiser or vaseline on the skin prior to wearing a perfume. Spritz the perfume on warm points of your body and give it a moment to soak in and settle.
                </div>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleFAQ(this)">
                <span class="faq-q-text">Are MYOP perfumes long-lasting?</span>
                <span class="faq-toggle">+</span>
            </div>
            <div class="faq-answer">
                <div class="faq-answer-text">
                    Yes, MYOP perfumes are seriously long-lasting! We source our perfume oils straight from Europe and reformulated each scent with 50% oil concentration — specially made to thrive in tropical weather.
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Spacer -->
    <div class="footer-spacer"></div>

    <!-- Sticky Bottom Bar -->
    <div class="sticky-bottom">
        <button class="add-to-cart-btn" onclick="addToCart()">
            <span>Add to Cart</span>
            <span>•</span>
            <span id="cartPrice">₹929</span>
        </button>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast">Added to cart! 🎉</div>

@endsection

@push('scripts')
<script>
    let currentImageIndex = 0;
    let quantity = 1;
    let currentPrice = 929;

    // Image Gallery
    function changeImage(thumbnail, index) {
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.thumbnail');
        const dots = document.querySelectorAll('.image-dot');

        mainImage.src = thumbnail.src.replace('width=416', 'width=1080');
        
        thumbnails.forEach(t => t.classList.remove('active'));
        thumbnail.classList.add('active');

        dots.forEach(d => d.classList.remove('active'));
        dots[index].classList.add('active');

        currentImageIndex = index;
    }

    // Size Selection
    function selectSize(element) {
        document.querySelectorAll('.size-option').forEach(opt => {
            opt.classList.remove('active');
        });
        element.classList.add('active');

        const price = element.getAttribute('data-price');
        currentPrice = parseInt(price);
        updatePrice();
    }

    function updatePrice() {
        const total = currentPrice * quantity;
        document.getElementById('productPrice').textContent = `Rs. ${currentPrice.toLocaleString()}.00`;
        document.getElementById('cartPrice').textContent = `₹${total.toLocaleString()}`;
    }

    // Quantity Controls
    function increaseQty() {
        quantity++;
        document.getElementById('quantity').textContent = quantity;
        updatePrice();
    }

    function decreaseQty() {
        if (quantity > 1) {
            quantity--;
            document.getElementById('quantity').textContent = quantity;
            updatePrice();
        }
    }

    // Add to Cart
    function addToCart() {
        const toast = document.getElementById('toast');
        toast.classList.add('show');

        // Update cart count
        const cartCount = document.querySelector('.cart-count');
        if(cartCount) {
             const currentCount = parseInt(cartCount.textContent) || 0;
             cartCount.textContent = currentCount + quantity;
        }

        // Hide toast after 2 seconds
        setTimeout(() => {
            toast.classList.remove('show');
        }, 2000);

        // Haptic feedback on mobile
        if (navigator.vibrate) {
            navigator.vibrate(50);
        }
    }

    // Accordion Toggle
    function toggleAccordion(header) {
        const content = header.nextElementSibling;
        const isActive = header.classList.contains('active');

        // Close all accordions
        document.querySelectorAll('.accordion-header').forEach(h => {
            h.classList.remove('active');
            h.nextElementSibling.classList.remove('active');
        });

        // Open clicked accordion if it wasn't active
        if (!isActive) {
            header.classList.add('active');
            content.classList.add('active');
        }
    }

    // FAQ Toggle
    function toggleFAQ(question) {
        const answer = question.nextElementSibling;
        const isActive = question.classList.contains('active');

        question.classList.toggle('active');
        answer.classList.toggle('active');
    }

    // Share Function
    function share(platform) {
        const url = window.location.href;
        const text = 'Check out Inglorious perfume from MYOP!';

        switch(platform) {
            case 'facebook':
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
                break;
            case 'whatsapp':
                window.open(`https://wa.me/?text=${text} ${url}`, '_blank');
                break;
            case 'pinterest':
                window.open(`https://pinterest.com/pin/create/button/?url=${url}`, '_blank');
                break;
            case 'email':
                window.location.href = `mailto:?subject=${text}&body=${url}`;
                break;
        }
    }

    // Touch Swipe for Image Gallery
    let touchStartX = 0;
    let touchEndX = 0;

    const imageContainer = document.querySelector('.main-image-container');

    if(imageContainer){
        imageContainer.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });

        imageContainer.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });
    }

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0 && currentImageIndex < 4) {
                // Swipe left - next image
                currentImageIndex++;
                const nextThumb = document.querySelectorAll('.thumbnail')[currentImageIndex];
                changeImage(nextThumb, currentImageIndex);
            } else if (diff < 0 && currentImageIndex > 0) {
                // Swipe right - previous image
                currentImageIndex--;
                const prevThumb = document.querySelectorAll('.thumbnail')[currentImageIndex];
                changeImage(prevThumb, currentImageIndex);
            }
        }
    }

    // Smooth Scroll Animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.option-section, .notes-card, .detail-accordion, .review-card').forEach(el => {
        observer.observe(el);
    });

    // Prevent scroll when at top (iOS bounce fix)
    let lastScrollTop = 0;
    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop) {
            // Scrolling down
        } else {
            // Scrolling up
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    }, false);
</script>
@endpush