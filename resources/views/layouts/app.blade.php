<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Nurah Perfumes - @yield('title', 'India\'s First Perfume Bar')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; -webkit-tap-highlight-color: transparent; }
        :root {
            --black: #000000;
            --white: #ffffff;
            --gold: #d4a574;
            --dark-gold: #b8915f;
            --text: #333333;
            --text-light: #666666;
            --bg-light: #f8f8f8;
            --border: #e0e0e0;
            --success: #28a745;
        }
        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--text);
            line-height: 1.5;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            background: var(--white);
        }

        /* Common Components */
        .promo-bar { background: linear-gradient(135deg, var(--black) 0%, #1a1a1a 100%); color: var(--white); padding: 12px 15px; text-align: center; font-size: 12px; font-weight: 600; position: sticky; top: 0; z-index: 1001; }
        .promo-bar span { color: var(--gold); font-weight: 700; }
        
        .mobile-header { background: var(--white); position: sticky; top: 40px; z-index: 1000; box-shadow: 0 2px 10px rgba(0,0,0,0.08); padding: 12px 15px; }
        .header-top { display: flex; justify-content: space-between; align-items: center; }
        .menu-btn, .back-btn { background: none; border: none; font-size: 24px; cursor: pointer; padding: 5px; }
        .logo { font-family: 'Playfair Display', serif; font-size: 24px; font-weight: 900; color: var(--black); text-decoration: none; letter-spacing: -0.5px; }
        .header-icons { display: flex; gap: 15px; align-items: center; }
        .icon-btn { background: none; border: none; font-size: 20px; cursor: pointer; position: relative; }
        .cart-count { position: absolute; top: -5px; right: -8px; background: var(--gold); color: var(--white); width: 16px; height: 16px; border-radius: 50%; font-size: 10px; display: flex; align-items: center; justify-content: center; font-weight: 700; }

        /* Mobile Menu */
        .mobile-menu { position: fixed; top: 0; left: -100%; width: 85%; max-width: 320px; height: 100vh; background: var(--white); z-index: 2000; transition: left 0.3s ease; overflow-y: auto; box-shadow: 2px 0 20px rgba(0,0,0,0.1); }
        .mobile-menu.active { left: 0; }
        .menu-header { padding: 20px 15px; background: var(--black); color: var(--white); display: flex; justify-content: space-between; align-items: center; }
        .menu-close { background: none; border: none; color: var(--white); font-size: 28px; cursor: pointer; }
        .menu-list { list-style: none; padding: 20px 0; }
        .menu-item { border-bottom: 1px solid var(--border); }
        .menu-link { display: block; padding: 15px 20px; color: var(--text); text-decoration: none; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; }
        .menu-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.6); z-index: 1999; opacity: 0; pointer-events: none; transition: opacity 0.3s; }
        .menu-overlay.active { opacity: 1; pointer-events: all; }

        /* Footer */
        footer { background: var(--black); color: var(--white); padding: 40px 20px 20px; margin-top: auto; }
        .footer-logo { font-family: 'Playfair Display', serif; font-size: 28px; font-weight: 900; margin-bottom: 15px; }
        .footer-description { font-size: 13px; line-height: 1.7; color: rgba(255,255,255,0.75); margin-bottom: 20px; }
        .footer-social { display: flex; gap: 15px; margin-bottom: 30px; }
        .social-btn { width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: var(--white); text-decoration: none; font-size: 18px; border: 1px solid rgba(255,255,255,0.1); }
        .footer-section { margin-bottom: 30px; }
        .footer-heading { font-family: 'Playfair Display', serif; font-size: 18px; font-weight: 700; margin-bottom: 15px; color: var(--gold); }
        .footer-links { list-style: none; }
        .footer-links li { margin-bottom: 12px; }
        .footer-links a { color: var(--white); text-decoration: none; font-size: 13px; opacity: 0.8; transition: opacity 0.3s; }
        .footer-links a:hover { opacity: 1; color: var(--gold); }
        .newsletter-form { display: flex; position: relative; }
        .newsletter-input { width: 100%; padding: 14px 50px 14px 15px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.2); background: rgba(255,255,255,0.05); color: var(--white); font-family: inherit; font-size: 14px; }
        .newsletter-btn { position: absolute; right: 5px; top: 5px; bottom: 5px; width: 40px; background: var(--gold); border: none; border-radius: 6px; cursor: pointer; font-size: 18px; display: flex; align-items: center; justify-content: center; }
        .footer-bottom { text-align: center; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px; font-size: 12px; opacity: 0.6; }
        
        /* Quick Action */
        .quick-action { position: fixed; bottom: 20px; right: 20px; z-index: 990; }
        .action-btn { width: 50px; height: 50px; border-radius: 50%; background: var(--gold); color: var(--white); border: none; box-shadow: 0 4px 15px rgba(212, 165, 116, 0.4); font-size: 24px; cursor: pointer; display: flex; align-items: center; justify-content: center; }
        
        /* Global Animations */
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-in { animation: fadeIn 0.5s ease forwards; }

        /* Utilities */
        .text-center { text-align: center; }
        .mb-20 { margin-bottom: 20px; }
    </style>
    @stack('styles')
</head>
<body>
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script>
        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Lazy Loading Animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.section, .product-card, .category-card, .feature').forEach(el => {
            observer.observe(el);
        });
    </script>
    @stack('scripts')
</body>
</html>
