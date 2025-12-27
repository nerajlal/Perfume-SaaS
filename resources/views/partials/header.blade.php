<!-- Promo Bar -->
<div class="promo-bar">
    Free Shipping on all orders above <span>₹399</span>
</div>

<!-- Mobile Header -->
<div class="mobile-header">
    <div class="header-top">
        <button class="menu-btn" onclick="toggleMenu()">☰</button>
        <a href="{{ route('home') }}" class="logo">Nurah</a>
        <div class="header-icons">
            <button class="icon-btn">🔍</button>
            <button class="icon-btn">
                🛒
                <span class="cart-count">0</span>
            </button>
        </div>
    </div>
</div>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <div class="menu-header">
        <span>MENU</span>
        <button class="menu-close" onclick="toggleMenu()">×</button>
    </div>
    <ul class="menu-list">
        <li class="menu-item"><a href="{{ route('home') }}" class="menu-link">Home</a></li>
        <li class="menu-item"><a href="{{ route('collection') }}" class="menu-link">Shop All</a></li>
        <li class="menu-item"><a href="#" class="menu-link">Best Sellers</a></li>
        <li class="menu-item"><a href="#" class="menu-link">New Arrivals</a></li>
        <li class="menu-item"><a href="#" class="menu-link">Gift Sets</a></li>
        <li class="menu-item"><a href="#" class="menu-link">About Us</a></li>
        <li class="menu-item"><a href="#" class="menu-link">Contact</a></li>
    </ul>
</div>
<div class="menu-overlay" id="menuOverlay" onclick="toggleMenu()"></div>

<script>
    function toggleMenu() {
        const menu = document.getElementById('mobileMenu');
        const overlay = document.getElementById('menuOverlay');
        menu.classList.toggle('active');
        overlay.classList.toggle('active');
        
        if (menu.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }
</script>
