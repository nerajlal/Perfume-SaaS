<!-- Footer -->
<footer>
    <div class="footer-content">
        <!-- Brand Column -->
        <div class="footer-col">
            <div class="footer-logo">Nurah.</div>
            <p class="footer-tagline">Crafting memories through scents. India's first perfume bar offering exceptional, long-lasting fragrances.</p>
            <div class="footer-social">
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-link"><i class="fab fa-pinterest-p"></i></a>
            </div>
        </div>

        <!-- Shop Column -->
        <div class="footer-col">
            <h3 class="footer-heading">Shop</h3>
            <ul class="footer-links">
                <li><a href="{{ route('collection', ['category' => 'fresh']) }}">Fresh Collection</a></li>
                <li><a href="{{ route('collection', ['category' => 'oriental-woody']) }}">Oriental & Woody</a></li>
                <li><a href="{{ route('collection', ['category' => 'floral']) }}">Floral Collection</a></li>
                <li><a href="{{ route('all-products') }}">All Products</a></li>
                <li><a href="{{ route('cosmopolitan') }}">Cosmopolitan</a></li>
            </ul>
        </div>

        <!-- Support Column -->
        <div class="footer-col">
            <h3 class="footer-heading">Support</h3>
            <ul class="footer-links">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Store Locator</a></li>
                <li><a href="#">Shipping Policy</a></li>
                <li><a href="#">Returns & Exchanges</a></li>
            </ul>
        </div>

        <!-- Newsletter Column -->
        <div class="footer-col">
            <h3 class="footer-heading">Newsletter</h3>
            <p class="newsletter-text">Subscribe to receive updates, access to exclusive deals, and more.</p>
            <form class="footer-form">
                <input type="email" placeholder="Enter your email" class="footer-input">
                <button type="submit" class="footer-btn">Join</button>
            </form>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="copyright">© 2025 Nurah Perfumes. All rights reserved.</div>
        <div class="payment-icons">
            <i class="fab fa-cc-visa"></i>
            <i class="fab fa-cc-mastercard"></i>
            <i class="fab fa-cc-amex"></i>
            <i class="fab fa-google-pay"></i>
        </div>
    </div>
</footer>

<!-- Quick Action Button -->
<div class="quick-action">
    <button class="action-btn" onclick="window.scrollTo({top: 0, behavior: 'smooth'})"><i class="fas fa-arrow-up"></i></button>
</div>
