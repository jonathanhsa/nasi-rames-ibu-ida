<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Kantin Ibu Ida</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #ff6b6b;
            --primary-dark: #ff4757;
            --secondary: #feca57;
            --dark: #222f3e;
            --dark-soft: #2d3436;
            --light: #f8f9fa;
            --light-pink: #fdf2f2;
            --glass: rgba(255,255,255,0.85);
            --glass-border: rgba(255,255,255,0.4);
            --shadow: 0 8px 32px rgba(31,38,135,0.12);
            --shadow-hover: 0 20px 50px rgba(255,107,107,0.25);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Outfit', sans-serif; background: var(--light-pink); color: var(--dark); overflow-x: hidden; }

        /* ====== NAVBAR ====== */
        nav {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(20px);
            padding: 16px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 20px rgba(255,107,107,0.1);
        }
        .nav-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }
        .nav-logo {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }
        .nav-title { font-size: 1.2rem; font-weight: 700; color: var(--dark); line-height: 1.2; }
        .nav-subtitle { font-size: 0.75rem; color: #888; font-weight: 400; }
        .nav-links { display: flex; gap: 8px; }
        .nav-link {
            padding: 8px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s;
            color: #555;
        }
        .nav-link:hover { background: #fee; color: var(--primary); }
        .nav-link.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
        }

        /* ====== HERO ====== */
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 60%, #c0392b 100%);
            padding: 60px 40px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: -60%; left: -30%;
            width: 80%; height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
        }
        .hero::after {
            content: '';
            position: absolute;
            bottom: -40%; right: -20%;
            width: 60%; height: 150%;
            background: radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 70%);
        }
        .hero-content { position: relative; z-index: 1; }
        .hero-badge {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.3);
            padding: 6px 18px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 16px;
            backdrop-filter: blur(10px);
        }
        .hero h1 { font-size: 2.8rem; font-weight: 800; margin-bottom: 12px; letter-spacing: -0.5px; }
        .hero p { font-size: 1.1rem; font-weight: 300; opacity: 0.9; max-width: 500px; margin: 0 auto; }

        /* ====== FILTER TABS ====== */
        .filter-section {
            padding: 30px 40px 0;
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .filter-btn {
            padding: 10px 24px;
            border-radius: 50px;
            border: 2px solid #eee;
            background: white;
            font-family: 'Outfit', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            color: #666;
        }
        .filter-btn:hover, .filter-btn.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-color: transparent;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255,107,107,0.3);
        }

        /* ====== MENU GRID ====== */
        .container { max-width: 1200px; margin: 0 auto; padding: 30px 40px 60px; }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
        }
        .section-title span { color: var(--primary); }
        .menu-count {
            background: var(--light-pink);
            color: var(--primary);
            font-weight: 600;
            font-size: 0.85rem;
            padding: 6px 14px;
            border-radius: 50px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
            gap: 24px;
        }

        .menu-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
        }

        .card-img-wrap {
            position: relative;
            overflow: hidden;
            height: 200px;
        }
        .card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .menu-card:hover .card-img-wrap img { transform: scale(1.07); }

        .card-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .card-body { padding: 20px; }
        .card-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
            line-height: 1.3;
        }
        .card-desc {
            font-size: 0.88rem;
            color: #888;
            line-height: 1.6;
            margin-bottom: 16px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card-price {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--primary);
        }
        .card-price span { font-size: 0.8rem; font-weight: 500; color: #aaa; }

        .btn-order {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            padding: 9px 20px;
            border-radius: 50px;
            font-family: 'Outfit', sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s;
            box-shadow: 0 4px 12px rgba(255,107,107,0.3);
        }
        .btn-order:hover { transform: scale(1.05); box-shadow: 0 6px 18px rgba(255,107,107,0.4); }

        /* ====== EMPTY STATE ====== */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: #aaa;
        }
        .empty-state .icon { font-size: 4rem; margin-bottom: 16px; }
        .empty-state p { font-size: 1.1rem; font-weight: 500; }

        /* ====== FOOTER ====== */
        footer {
            background: var(--dark);
            color: #aaa;
            text-align: center;
            padding: 30px;
            font-size: 0.9rem;
        }
        footer strong { color: var(--primary); }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 768px) {
            nav { padding: 14px 20px; }
            .hero { padding: 40px 20px; }
            .hero h1 { font-size: 2rem; }
            .filter-section { padding: 20px 20px 0; }
            .container { padding: 20px 20px 50px; }
            .menu-grid { grid-template-columns: 1fr 1fr; gap: 16px; }
        }
        @media (max-width: 500px) {
            .menu-grid { grid-template-columns: 1fr; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

<nav>
    <a href="/" class="nav-brand">
        <div class="nav-logo">🍛</div>
        <div>
            <div class="nav-title">Kantin Ibu Ida</div>
            <div class="nav-subtitle">Nasi Rames Premium</div>
        </div>
    </a>
    <div class="nav-links">
        <a href="/" class="nav-link">Pesan Sekarang</a>
        <a href="/menu" class="nav-link active">Daftar Menu</a>
    </div>
</nav>

<div class="hero">
    <div class="hero-content">
        <div class="hero-badge">🍽️ Menu Lengkap Kami</div>
        <h1>Daftar Menu Hari Ini</h1>
        <p>Pilihan nasi rames autentik dengan cita rasa rumahan yang selalu segar dan lezat.</p>
    </div>
</div>

<div class="filter-section">
    <button class="filter-btn active" onclick="filterMenu('all', this)">Semua Menu</button>
    <button class="filter-btn" onclick="filterMenu('makanan', this)">🍛 Makanan</button>
    <button class="filter-btn" onclick="filterMenu('minuman', this)">🥤 Minuman</button>
</div>

<div class="container">
    <div class="section-header">
        <div class="section-title">Menu <span>Tersedia</span></div>
        <div class="menu-count" id="menuCount">{{ $menus->count() }} item</div>
    </div>

    @if($menus->isEmpty())
        <div class="empty-state">
            <div class="icon">🍽️</div>
            <p>Belum ada menu yang tersedia.</p>
        </div>
    @else
        <div class="menu-grid" id="menuGrid">
            @foreach($menus as $menu)
            <div class="menu-card" data-category="{{ strtolower($menu->category ?? 'makanan') }}">
                <div class="card-img-wrap">
                    <img
                        src="{{ $menu->image ?: 'https://images.unsplash.com/photo-1604014237800-1c9102c219da?auto=format&fit=crop&w=400&q=80' }}"
                        alt="{{ $menu->name }}"
                        onerror="this.src='https://images.unsplash.com/photo-1516684732162-798a0062be99?auto=format&fit=crop&w=400&q=80'"
                    >
                    <div class="card-badge">{{ $menu->category ?? 'Makanan' }}</div>
                </div>
                <div class="card-body">
                    <div class="card-name">{{ $menu->name }}</div>
                    <div class="card-desc">{{ $menu->description ?? 'Menu spesial dari Kantin Ibu Ida.' }}</div>
                    <div class="card-footer">
                        <div class="card-price">
                            Rp {{ number_format($menu->price, 0, ',', '.') }}
                            <span>/ porsi</span>
                        </div>
                        <a href="/" class="btn-order">+ Pesan</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>

<footer>
    <p>© {{ date('Y') }} <strong>Kantin Ibu Ida</strong> — Nasi Rames Autentik, Pesan dengan Mudah!</p>
</footer>

<script>
    function filterMenu(category, btn) {
        // Update tombol aktif
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const cards = document.querySelectorAll('.menu-card');
        let visible = 0;

        cards.forEach(card => {
            const cat = card.getAttribute('data-category');
            const show = category === 'all' || cat === category;
            card.style.display = show ? '' : 'none';
            if (show) visible++;
        });

        document.getElementById('menuCount').textContent = visible + ' item';
    }
</script>

</body>
</html>
