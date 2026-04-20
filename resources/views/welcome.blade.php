<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Ibu Ida - Nasi Rames Premium</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #ff6b6b;
            --secondary: #feca57;
            --dark: #222f3e;
            --light: #f8f9fa;
            --glass: rgba(255, 255, 255, 0.8);
            --glass-border: rgba(255, 255, 255, 0.3);
            --shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Outfit', sans-serif; }
        body { background: #fdf2f2; color: var(--dark); overflow-x: hidden; }
        header {
            background: linear-gradient(135deg, var(--primary), #ff4757);
            padding: 4rem 2rem;
            text-align: center;
            color: white;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
            position: relative;
            overflow: hidden;
        }
        header::after {
            content: '';
            position: absolute;
            top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 10%, transparent 20%);
            background-size: 20px 20px;
            animation: moveBackground 20s linear infinite;
            z-index: 0;
        }
        @keyframes moveBackground {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }
        header h1 { font-size: 3rem; font-weight: 700; position: relative; z-index: 1; margin-bottom: 10px; }
        header p { font-size: 1.2rem; font-weight: 300; position: relative; z-index: 1; opacity: 0.9; }
        
        .container { max-width: 1200px; margin: -30px auto 50px; padding: 0 20px; position: relative; z-index: 2; }
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px; margin-bottom: 50px; }
        .menu-card {
            background: var(--glass);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            flex-direction: column;
        }
        .menu-card:hover { transform: translateY(-10px); box-shadow: 0 15px 40px rgba(31, 38, 135, 0.2); }
        .menu-img { width: 100%; height: 200px; object-fit: cover; }
        .menu-info { padding: 20px; flex-grow: 1; display: flex; flex-direction: column; }
        .menu-title { font-size: 1.4rem; font-weight: 600; margin-bottom: 10px; color: var(--primary); }
        .menu-desc { font-size: 0.95rem; color: #555; margin-bottom: 15px; flex-grow: 1; line-height: 1.5; }
        .menu-price { font-size: 1.2rem; font-weight: 700; color: var(--dark); margin-bottom: 15px; }
        
        .quantity-control { display: flex; align-items: center; justify-content: space-between; background: var(--light); border-radius: 50px; padding: 5px; }
        .qty-btn { background: white; border: none; width: 35px; height: 35px; border-radius: 50%; font-size: 1.2rem; cursor: pointer; box-shadow: 0 2px 5px rgba(0,0,0,0.1); transition: 0.2s; color: var(--primary); font-weight: bold; }
        .qty-btn:hover { background: var(--primary); color: white; }
        .qty-input { width: 40px; text-align: center; border: none; background: transparent; font-size: 1.1rem; font-weight: 600; outline: none; }
        
        .order-section {
            background: white;
            border-radius: 30px;
            padding: 40px;
            box-shadow: var(--shadow);
            margin-top: 20px;
        }
        .order-section h2 { font-size: 2rem; color: var(--primary); margin-bottom: 25px; text-align: center; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-weight: 600; margin-bottom: 8px; color: var(--dark); }
        .form-control { width: 100%; padding: 15px; border: 2px solid #eee; border-radius: 12px; font-size: 1rem; transition: 0.3s; font-family: 'Outfit', sans-serif; }
        .form-control:focus { border-color: var(--primary); outline: none; box-shadow: 0 0 0 4px rgba(255, 107, 107, 0.1); }
        
        .submit-btn {
            background: linear-gradient(45deg, var(--primary), #ff4757);
            color: white;
            border: none;
            padding: 16px 30px;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 700;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(255, 107, 107, 0.3);
            font-family: 'Outfit', sans-serif;
        }
        .submit-btn:hover { transform: translateY(-3px); box-shadow: 0 15px 25px rgba(255, 107, 107, 0.4); }
        
        .total-preview {
            text-align: right; font-size: 1.5rem; font-weight: 700; margin-bottom: 20px; color: var(--dark);
            padding: 20px; background: #fdf2f2; border-radius: 15px; border-left: 5px solid var(--primary);
        }

        .error-msg { color: #e74c3c; font-size: 0.9rem; margin-top: 5px; }
        .alert { padding: 15px; border-radius: 10px; margin-bottom: 20px; text-align: center; font-weight: 600; }
        .alert-error { background: #fee; color: #e74c3c; border: 1px solid #fcc; }
    </style>
</head>
<body>

<header>
    <h1>Kantin Ibu Ida</h1>
    <p>Nasi Rames Autentik, Pesan dengan Sekali Klik!</p>
</header>

<div class="container">
    <form action="{{ route('order.store') }}" method="POST" id="orderForm">
        @csrf
        
        @if($errors->any())
            <div class="alert alert-error">
                Ada kesalahan, periksa kembali pesanan Anda. @foreach($errors->all() as $err) {{ $err }} @endforeach
            </div>
        @endif

        <div class="menu-grid">
            @foreach($menus as $menu)
            <div class="menu-card">
                <img src="{{ $menu->image }}" alt="{{ $menu->name }}" class="menu-img">
                <div class="menu-info">
                    <h3 class="menu-title">{{ $menu->name }}</h3>
                    <p class="menu-desc">{{ $menu->description }}</p>
                    <div class="menu-price">Rp {{ number_format($menu->price, 0, ',', '.') }}</div>
                    
                    <div class="quantity-control">
                        <button type="button" class="qty-btn" onclick="updateQty({{ $menu->id }}, -1)">-</button>
                        <input type="number" name="menus[{{ $menu->id }}]" id="qty-{{ $menu->id }}" class="qty-input" value="0" min="0" readonly data-price="{{ $menu->price }}">
                        <button type="button" class="qty-btn" onclick="updateQty({{ $menu->id }}, 1)">+</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="order-section">
            <h2>Lengkapi Data Pesanan</h2>
            <div class="form-group">
                <label for="customer_name">Nama Lengkap</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Masukkan nama Anda..." required value="{{ old('customer_name') }}">
                @error('customer_name') <div class="error-msg">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="customer_phone">Nomor HP / WhatsApp</label>
                <input type="text" name="customer_phone" id="customer_phone" class="form-control" placeholder="Contoh: 08123456789" required value="{{ old('customer_phone') }}">
                @error('customer_phone') <div class="error-msg">{{ $message }}</div> @enderror
            </div>
            
            <div class="total-preview" id="totalPreview">
                Total: Rp 0
            </div>

            <button type="submit" class="submit-btn">Pesan Sekarang</button>
        </div>
    </form>
</div>

<script>
    function updateQty(id, change) {
        const input = document.getElementById('qty-' + id);
        let val = parseInt(input.value) + change;
        if (val < 0) val = 0;
        input.value = val;
        calculateTotal();
    }

    function calculateTotal() {
        let total = 0;
        const inputs = document.querySelectorAll('.qty-input');
        inputs.forEach(input => {
            const qty = parseInt(input.value);
            const price = parseFloat(input.getAttribute('data-price'));
            if(qty > 0) {
                total += qty * price;
            }
        });
        document.getElementById('totalPreview').innerText = 'Total: Rp ' + new Intl.NumberFormat('id-ID').format(total);
    }
</script>
</body>
</html>
