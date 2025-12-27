@extends('layouts.app')

@section('title', 'Fresh Perfumes - Nurah Perfumes')

@push('styles')
<style>
    /* Filter Bar */
    .filter-bar {
        background: var(--white);
        padding: 12px 15px;
        display: flex;
        gap: 10px;
        border-bottom: 1px solid var(--border);
    }

    .filter-btn,
    .sort-btn {
        flex: 1;
        padding: 10px 15px;
        background: var(--white);
        border: 2px solid var(--border);
        border-radius: 10px;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .filter-btn.active,
    .sort-btn.active {
        border-color: var(--black);
        background: var(--black);
        color: var(--white);
    }

    .filter-count {
        background: var(--gold);
        color: var(--white);
        width: 20px;
        height: 20px;
        border-radius: 50%;
        font-size: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }

    /* Results Bar */
    .results-bar {
        background: var(--white);
        padding: 12px 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
        color: var(--text-light);
    }

    .results-count {
        font-weight: 600;
        color: var(--black);
    }

    .view-toggle {
        display: flex;
        gap: 8px;
    }

    .view-btn {
        background: none;
        border: 1px solid var(--border);
        width: 36px;
        height: 36px;
        border-radius: 6px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    .view-btn.active {
        background: var(--black);
        color: var(--white);
        border-color: var(--black);
    }

    /* Product Grid */
    .products-container {
        padding: 15px;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }

    .product-grid.list-view {
        grid-template-columns: 1fr;
    }

    .product-card {
        background: var(--white);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        position: relative;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .product-image-wrapper {
        position: relative;
        width: 100%;
        aspect-ratio: 1;
        overflow: hidden;
        background: var(--bg-light);
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .product-card:active .product-image {
        transform: scale(1.05);
    }

    .product-badge {
        position: absolute;
        top: 8px;
        left: 8px;
        background: var(--gold);
        color: var(--white);
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 9px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .favorite-btn {
        position: absolute;
        top: 8px;
        right: 8px;
        background: var(--white);
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }

    .favorite-btn.active {
        color: #ff3b30;
    }

    .product-info {
        padding: 12px;
    }

    .product-name {
        font-family: 'Playfair Display', serif;
        font-size: 15px;
        font-weight: 700;
        color: var(--black);
        margin-bottom: 6px;
        line-height: 1.3;
    }

    .product-price {
        font-size: 14px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 8px;
    }

    .product-price span {
        font-size: 11px;
        font-weight: 500;
        color: var(--text-light);
    }

    .quick-view-btn {
        width: 100%;
        padding: 8px;
        background: var(--black);
        color: var(--white);
        border: none;
        border-radius: 8px;
        font-weight: 700;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        cursor: pointer;
    }

    /* List View Styles */
    .product-grid.list-view .product-card {
        display: flex;
        flex-direction: row;
    }

    .product-grid.list-view .product-image-wrapper {
        width: 120px;
        flex-shrink: 0;
    }

    .product-grid.list-view .product-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 12px;
    }

    /* Bottom Sheet - Filter */
    .bottom-sheet {
        position: fixed;
        bottom: -100%;
        left: 0;
        right: 0;
        background: var(--white);
        border-radius: 20px 20px 0 0;
        box-shadow: 0 -5px 30px rgba(0,0,0,0.2);
        z-index: 200;
        transition: bottom 0.3s ease;
        max-height: 85vh;
        overflow-y: auto;
    }

    .bottom-sheet.active {
        bottom: 0;
    }

    .sheet-header {
        position: sticky;
        top: 0;
        background: var(--white);
        padding: 20px 15px;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 1;
    }

    .sheet-title {
        font-family: 'Playfair Display', serif;
        font-size: 20px;
        font-weight: 700;
    }

    .sheet-close {
        background: none;
        border: none;
        font-size: 28px;
        cursor: pointer;
        color: var(--text-light);
    }

    .sheet-content {
        padding: 20px 15px;
    }

    /* Filter Options */
    .filter-section {
        margin-bottom: 30px;
    }

    .filter-section-title {
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 15px;
        color: var(--black);
    }

    .filter-options {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .filter-option {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }

    .filter-checkbox {
        width: 20px;
        height: 20px;
        border: 2px solid var(--border);
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }

    .filter-option input:checked + .filter-checkbox {
        background: var(--black);
        border-color: var(--black);
        color: var(--white);
    }

    .filter-label {
        font-size: 14px;
        flex: 1;
    }

    .filter-count-label {
        font-size: 12px;
        color: var(--text-light);
    }

    /* Price Range Slider */
    .price-inputs {
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
    }

    .price-input {
        flex: 1;
        padding: 10px 12px;
        border: 2px solid var(--border);
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
    }

    .price-slider {
        width: 100%;
        height: 6px;
        background: var(--border);
        border-radius: 3px;
        position: relative;
        margin: 20px 0;
    }

    .price-slider-fill {
        position: absolute;
        height: 100%;
        background: var(--black);
        border-radius: 3px;
    }

    /* Sheet Actions */
    .sheet-actions {
        position: sticky;
        bottom: 0;
        background: var(--white);
        padding: 15px;
        border-top: 1px solid var(--border);
        display: flex;
        gap: 10px;
    }

    .clear-btn {
        flex: 1;
        padding: 14px;
        background: var(--white);
        border: 2px solid var(--black);
        border-radius: 12px;
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        cursor: pointer;
    }

    .apply-btn {
        flex: 2;
        padding: 14px;
        background: var(--black);
        color: var(--white);
        border: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        cursor: pointer;
    }

    /* Sort Options */
    .sort-options {
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    .sort-option {
        padding: 18px 15px;
        border-bottom: 1px solid var(--border);
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
    }

    .sort-option:last-child {
        border-bottom: none;
    }

    .sort-option.active {
        background: var(--bg-light);
        font-weight: 700;
        color: var(--black);
    }

    .sort-check {
        font-size: 18px;
        color: var(--gold);
    }

    /* Overlay */
    .overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.6);
        z-index: 199;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s;
    }

    .overlay.active {
        opacity: 1;
        pointer-events: all;
    }

    /* Load More */
    .load-more-container {
        padding: 20px 15px;
        text-align: center;
    }

    .load-more-btn {
        padding: 14px 40px;
        background: var(--black);
        color: var(--white);
        border: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        cursor: pointer;
        letter-spacing: 0.5px;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-icon {
        font-size: 64px;
        margin-bottom: 20px;
        opacity: 0.3;
    }

    .empty-title {
        font-family: 'Playfair Display', serif;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .empty-text {
        font-size: 14px;
        color: var(--text-light);
        margin-bottom: 20px;
    }

    .reset-filters-btn {
        padding: 12px 30px;
        background: var(--black);
        color: var(--white);
        border: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        cursor: pointer;
    }

    /* Features Footer */
    .features-footer {
        background: var(--white);
        padding: 30px 15px;
        margin-top: 30px;
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .feature {
        text-align: center;
    }

    .feature-icon {
        font-size: 32px;
        margin-bottom: 10px;
    }

    .feature-title {
        font-weight: 700;
        font-size: 13px;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .feature-text {
        font-size: 12px;
        color: var(--text-light);
        line-height: 1.5;
    }

    /* Animations */
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

    .product-card {
        animation: fadeIn 0.4s ease forwards;
    }

    /* Loading State */
    .loading {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px;
    }

    .spinner {
        width: 40px;
        height: 40px;
        border: 3px solid var(--border);
        border-top-color: var(--black);
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Tablet Responsive */
    @media (min-width: 768px) {
        .product-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .products-container {
            max-width: 1200px;
            margin: 0 auto;
        }
    }

    @media (min-width: 1024px) {
        .product-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }
</style>
@endpush

@section('content')
    <div class="page-header" style="padding: 15px; text-align: center;">
        <h1 style="font-family: 'Playfair Display', serif; font-size: 24px; font-weight: 700;">Fresh Perfumes</h1>
    </div>

    <!-- Filter Bar -->
    <div class="filter-bar">
        <button class="filter-btn" onclick="openFilters()">
            <span>🎚️</span>
            <span>Filter</span>
            <span class="filter-count" id="filterCount" style="display: none;">0</span>
        </button>
        <button class="sort-btn" onclick="openSort()">
            <span>⇅</span>
            <span>Sort</span>
        </button>
    </div>

    <!-- Results Bar -->
    <div class="results-bar">
        <div>
            <span class="results-count" id="resultsCount">11</span> Products
        </div>
        <div class="view-toggle">
            <button class="view-btn active" onclick="setView('grid')">⊞</button>
            <button class="view-btn" onclick="setView('list')">☰</button>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="products-container">
        <div class="product-grid" id="productGrid">
            <!-- Product 1 -->
            <a href="/product/the-legend" class="product-card">
                <div class="product-image-wrapper">
                    <button class="favorite-btn" onclick="toggleFavorite(event, this)">♡</button>
                    <img src="https://myop.in/cdn/shop/files/the_legend_b941e444-0b65-48f4-8f1c-85f520434ef9.webp?v=1752146445&width=1080" alt="The Legend" class="product-image">
                </div>
                <div class="product-info">
                    <h3 class="product-name">The Legend</h3>
                    <p class="product-price"><span>From</span> ₹929</p>
                    <button class="quick-view-btn" onclick="quickView(event)">Quick View</button>
                </div>
            </a>

            <!-- Product 2 -->
            <a href="/product/inglorious" class="product-card">
                <div class="product-image-wrapper">
                    <button class="favorite-btn" onclick="toggleFavorite(event, this)">♡</button>
                    <img src="https://myop.in/cdn/shop/files/inglorious_2fe7f645-0169-4447-b197-1b3cad3f6ba5.webp?v=1752146385&width=1080" alt="Inglorious" class="product-image">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Inglorious</h3>
                    <p class="product-price"><span>From</span> ₹929</p>
                    <button class="quick-view-btn" onclick="quickView(event)">Quick View</button>
                </div>
            </a>

            <!-- Product 3 -->
            <a href="/product/guilt-for-men" class="product-card">
                <div class="product-image-wrapper">
                    <button class="favorite-btn" onclick="toggleFavorite(event, this)">♡</button>
                    <img src="https://myop.in/cdn/shop/files/guilt_for_men_db653709-2ed6-419e-b778-2c42f97a9525.webp?v=1752146489&width=1080" alt="Guilt for Men" class="product-image">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Guilt for Men</h3>
                    <p class="product-price"><span>From</span> ₹1,129</p>
                    <button class="quick-view-btn" onclick="quickView(event)">Quick View</button>
                </div>
            </a>

            <!-- Product 4 -->
            <a href="/product/the-valentine" class="product-card">
                <div class="product-image-wrapper">
                    <button class="favorite-btn" onclick="toggleFavorite(event, this)">♡</button>
                    <img src="https://myop.in/cdn/shop/files/the_valentine_93fbeb79-eb84-4246-af91-508494f5bd13.jpg?v=1752146452&width=2000" alt="The Valentine" class="product-image">
                </div>
                <div class="product-info">
                    <h3 class="product-name">The Valentine</h3>
                    <p class="product-price"><span>From</span> ₹1,129</p>
                    <button class="quick-view-btn" onclick="quickView(event)">Quick View</button>
                </div>
            </a>

            <!-- Product 5 -->
            <a href="/product/aqua-game" class="product-card">
                <div class="product-image-wrapper">
                    <button class="favorite-btn" onclick="toggleFavorite(event, this)">♡</button>
                    <img src="https://myop.in/cdn/shop/files/aqua_game_5e7d7c66-a6ef-4b99-8304-ddcb9e7b9f31.webp?v=1752146361&width=1080" alt="Aqua Game" class="product-image">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Aqua Game</h3>
                    <p class="product-price"><span>From</span> ₹929</p>
                    <button class="quick-view-btn" onclick="quickView(event)">Quick View</button>
                </div>
            </a>

            <!-- Product 6 -->
            <a href="/product/ibiza" class="product-card">
                <div class="product-image-wrapper">
                    <span class="product-badge">Popular</span>
                    <button class="favorite-btn" onclick="toggleFavorite(event, this)">♡</button>
                    <img src="https://myop.in/cdn/shop/files/ibiza.webp?v=1752146335&width=1080" alt="Ibiza" class="product-image">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Ibiza</h3>
                    <p class="product-price"><span>From</span> ₹1,279</p>
                    <button class="quick-view-btn" onclick="quickView(event)">Quick View</button>
                </div>
            </a>

            <!-- Product 7 -->
            <a href="/product/aqua-marine" class="product-card">
                <div class="product-image-wrapper">
                    <button class="favorite-btn" onclick="toggleFavorite(event, this)">♡</button>
                    <img src="https://myop.in/cdn/shop/files/aqua_marine_17199988-9404-4ac0-87df-cb50ec619aa8.webp?v=1752146497&width=1080" alt="Aqua Marine" class="product-image">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Aqua Marine</h3>
                    <p class="product-price"><span>From</span> ₹929</p>
                    <button class="quick-view-btn" onclick="quickView(event)">Quick View</button>
                </div>
            </a>

            <!-- Product 8 -->
            <a href="/product/blue" class="product-card">
                <div class="product-image-wrapper">
                    <button class="favorite-btn" onclick="toggleFavorite(event, this)">♡</button>
                    <img src="https://myop.in/cdn/shop/files/Blue_61fa9b7f-ee12-4b11-86e1-5c2cd73efaa0.webp?v=1752146472&width=4096" alt="Blue" class="product-image">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Blue</h3>
                    <p class="product-price"><span>From</span> ₹929</p>
                    <button class="quick-view-btn" onclick="quickView(event)">Quick View</button>
                </div>
            </a>

            <!-- Product 9 -->
            <a href="/product/ocean-bliss" class="product-card">
                <div class="product-image-wrapper">
                    <span class="product-badge">New</span>
                    <button class="favorite-btn" onclick="toggleFavorite(event, this)">♡</button>
                    <img src="https://myop.in/cdn/shop/files/Frame_1.webp?v=1764337765&width=4320" alt="Ocean Bliss" class="product-image">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Ocean Bliss</h3>
                    <p class="product-price"><span>From</span> ₹929</p>
                    <button class="quick-view-btn" onclick="quickView(event)">Quick View</button>
                </div>
            </a>

            <!-- Product 10 -->
            <a href="/product/afterparty" class="product-card">
                <div class="product-image-wrapper">
                    <button class="favorite-btn" onclick="toggleFavorite(event, this)">♡</button>
                    <img src="https://myop.in/cdn/shop/files/afterparty.webp?v=1752146181&width=1080" alt="Afterparty" class="product-image">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Afterparty</h3>
                    <p class="product-price"><span>From</span> ₹1,129</p>
                    <button class="quick-view-btn" onclick="quickView(event)">Quick View</button>
                </div>
            </a>

            <!-- Product 11 -->
            <a href="/product/nightfall" class="product-card">
                <div class="product-image-wrapper">
                    <button class="favorite-btn" onclick="toggleFavorite(event, this)">♡</button>
                    <img src="https://myop.in/cdn/shop/files/nightfall.webp?v=1752146242&width=1080" alt="Nightfall" class="product-image">
                </div>
                <div class="product-info">
                    <h3 class="product-name">Nightfall</h3>
                    <p class="product-price"><span>From</span> ₹929</p>
                    <button class="quick-view-btn" onclick="quickView(event)">Quick View</button>
                </div>
            </a>
        </div>

        <!-- Load More -->
        <!-- <div class="load-more-container">
            <button class="load-more-btn">Load More</button>
        </div> -->
    </div>

    <!-- Features Footer -->
    <div class="features-footer">
        <div class="feature">
            <div class="feature-icon"><i class="fas fa-truck"></i></div>
            <div class="feature-title">Free Shipping</div>
            <div class="feature-text">Free shipping on orders above ₹399</div>
        </div>
        <div class="feature">
            <div class="feature-icon"><i class="fas fa-undo"></i></div>
            <div class="feature-title">Easy Returns</div>
            <div class="feature-text">Simple return process with the perfumes</div>
        </div>
        <div class="feature">
            <div class="feature-icon"><i class="fas fa-lock"></i></div>
            <div class="feature-title">Secure Payment</div>
            <div class="feature-text">Payment information is processed securely</div>
        </div>
    </div>

    <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="closeSheets()"></div>

    <!-- Filter Bottom Sheet -->
    <div class="bottom-sheet" id="filterSheet">
        <div class="sheet-header">
            <h2 class="sheet-title">Filters</h2>
            <button class="sheet-close" onclick="closeSheets()">×</button>
        </div>
        <div class="sheet-content">
            <!-- Price Filter -->
            <div class="filter-section">
                <div class="filter-section-title">Price Range</div>
                <div class="price-inputs">
                    <input type="number" class="price-input" placeholder="Min ₹" value="929">
                    <input type="number" class="price-input" placeholder="Max ₹" value="1279">
                </div>
            </div>

            <!-- Availability -->
            <div class="filter-section">
                <div class="filter-section-title">Availability</div>
                <div class="filter-options">
                    <label class="filter-option">
                        <input type="checkbox" style="display: none;">
                        <div class="filter-checkbox"></div>
                        <span class="filter-label">In Stock</span>
                        <span class="filter-count-label">(11)</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox" style="display: none;">
                        <div class="filter-checkbox"></div>
                        <span class="filter-label">Out of Stock</span>
                        <span class="filter-count-label">(0)</span>
                    </label>
                </div>
            </div>

            <!-- Gender -->
            <div class="filter-section">
                <div class="filter-section-title">Gender</div>
                <div class="filter-options">
                    <label class="filter-option">
                        <input type="checkbox" style="display: none;">
                        <div class="filter-checkbox"></div>
                        <span class="filter-label">For Him</span>
                        <span class="filter-count-label">(8)</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox" style="display: none;">
                        <div class="filter-checkbox"></div>
                        <span class="filter-label">For Her</span>
                        <span class="filter-count-label">(2)</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox" style="display: none;">
                        <div class="filter-checkbox"></div>
                        <span class="filter-label">Unisex</span>
                        <span class="filter-count-label">(1)</span>
                    </label>
                </div>
            </div>

            <!-- Size -->
            <div class="filter-section">
                <div class="filter-section-title">Size</div>
                <div class="filter-options">
                    <label class="filter-option">
                        <input type="checkbox" style="display: none;">
                        <div class="filter-checkbox"></div>
                        <span class="filter-label">50ml</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox" style="display: none;">
                        <div class="filter-checkbox"></div>
                        <span class="filter-label">100ml</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="sheet-actions">
            <button class="clear-btn" onclick="clearFilters()">Clear All</button>
            <button class="apply-btn" onclick="applyFilters()">Apply Filters</button>
        </div>
    </div>

    <!-- Sort Bottom Sheet -->
    <div class="bottom-sheet" id="sortSheet">
        <div class="sheet-header">
            <h2 class="sheet-title">Sort By</h2>
            <button class="sheet-close" onclick="closeSheets()">×</button>
        </div>
        <div class="sheet-content">
            <div class="sort-options">
                <div class="sort-option active" onclick="selectSort(this)">
                    <span>Best Selling</span>
                    <span class="sort-check">✓</span>
                </div>
                <div class="sort-option" onclick="selectSort(this)">
                    <span>Featured</span>
                </div>
                <div class="sort-option" onclick="selectSort(this)">
                    <span>Price: Low to High</span>
                </div>
                <div class="sort-option" onclick="selectSort(this)">
                    <span>Price: High to Low</span>
                </div>
                <div class="sort-option" onclick="selectSort(this)">
                    <span>Alphabetically: A-Z</span>
                </div>
                <div class="sort-option" onclick="selectSort(this)">
                    <span>Alphabetically: Z-A</span>
                </div>
                <div class="sort-option" onclick="selectSort(this)">
                    <span>Date: New to Old</span>
                </div>
                <div class="sort-option" onclick="selectSort(this)">
                    <span>Date: Old to New</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Open/Close Sheets
    function openFilters() {
        document.getElementById('filterSheet').classList.add('active');
        document.getElementById('overlay').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function openSort() {
        document.getElementById('sortSheet').classList.add('active');
        document.getElementById('overlay').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeSheets() {
        document.querySelectorAll('.bottom-sheet').forEach(sheet => {
            sheet.classList.remove('active');
        });
        document.getElementById('overlay').classList.remove('active');
        document.body.style.overflow = '';
    }

    // View Toggle
    function setView(view) {
        const grid = document.getElementById('productGrid');
        const viewBtns = document.querySelectorAll('.view-btn');
        
        viewBtns.forEach(btn => btn.classList.remove('active'));
        event.currentTarget.classList.add('active');
        
        if (view === 'list') {
            grid.classList.add('list-view');
        } else {
            grid.classList.remove('list-view');
        }
    }

    // Favorite Toggle
    function toggleFavorite(event, btn) {
        event.preventDefault();
        event.stopPropagation();
        btn.classList.toggle('active');
        btn.textContent = btn.classList.contains('active') ? '♥' : '♡';
        
        // Haptic feedback
        if (navigator.vibrate) {
            navigator.vibrate(30);
        }
    }

    // Quick View
    function quickView(event) {
        event.preventDefault();
        event.stopPropagation();
        alert('Quick View coming soon!');
    }

    // Filter Functions
    function clearFilters() {
        document.querySelectorAll('.filter-option input').forEach(input => {
            input.checked = false;
        });
        updateFilterCount();
    }

    function applyFilters() {
        updateFilterCount();
        closeSheets();
        // Filter logic here
    }

    function updateFilterCount() {
        const checkedCount = document.querySelectorAll('.filter-option input:checked').length;
        const countBadge = document.getElementById('filterCount');
        if (checkedCount > 0) {
            countBadge.textContent = checkedCount;
            countBadge.style.display = 'flex';
        } else {
            countBadge.style.display = 'none';
        }
    }

    // Sort Selection
    function selectSort(option) {
        document.querySelectorAll('.sort-option').forEach(opt => {
            opt.classList.remove('active');
            opt.querySelector('.sort-check')?.remove();
        });
        
        option.classList.add('active');
        const check = document.createElement('span');
        check.className = 'sort-check';
        check.textContent = '✓';
        option.appendChild(check);
        
        setTimeout(() => closeSheets(), 300);
    }

    // Checkbox Toggle
    document.querySelectorAll('.filter-option').forEach(option => {
        const checkbox = option.querySelector('input');
        const visual = option.querySelector('.filter-checkbox');
        
        option.addEventListener('click', () => {
            checkbox.checked = !checkbox.checked;
            if (checkbox.checked) {
                visual.textContent = '✓';
            } else {
                visual.textContent = '';
            }
        });
    });

    // Prevent body scroll when sheet is open
    const sheets = document.querySelectorAll('.bottom-sheet');
    sheets.forEach(sheet => {
        sheet.addEventListener('touchmove', (e) => {
            if (e.target.closest('.sheet-content') || e.target.closest('.sheet-header')) {
                return;
            }
            e.preventDefault();
        }, { passive: false });
    });

    // Smooth scroll reveal
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationDelay = `${entry.target.dataset.index * 0.05}s`;
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.product-card').forEach((card, index) => {
        card.dataset.index = index;
        observer.observe(card);
    });
</script>
@endpush