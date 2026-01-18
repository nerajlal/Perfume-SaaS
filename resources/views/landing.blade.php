<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Tenant Perfume SaaS Platform</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: #fdfbf7;
            color: #1a1a1a;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
        }

        .container {
            max-width: 800px;
            padding: 2rem;
        }

        h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #2d3436 0%, #000000 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.02em;
        }

        p.subtitle {
            font-size: 1.5rem;
            color: #636e72;
            margin-bottom: 3rem;
            line-height: 1.6;
        }

        .cta-button {
            display: inline-block;
            background-color: #000;
            color: #fff;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .brand-demo {
            margin-top: 4rem;
            padding: 2rem;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .brand-demo h3 {
            margin-top: 0;
            font-size: 1.2rem;
        }
        
        .brand-link {
            display: block;
            margin-top: 1rem;
            color: #0984e3;
            text-decoration: none;
        }
        
        .brand-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Launch Your Perfume Brand</h1>
        <p class="subtitle">We provide high-end, customizable e-commerce websites tailored specifically for perfume brands.</p>
        
        <a href="https://metora.in/saas" class="cta-button">Start Your Brand Today</a>

        <div class="brand-demo">
            <h3>Login Account</h3>
            <a href="{{ route('admin.login') }}" class="brand-link">Login To Admin Panel &rarr;</a>
        </div>
    </div>
</body>
</html>
