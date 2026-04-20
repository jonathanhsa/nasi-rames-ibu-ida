<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - Kantin Ibu Ida</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2ed573;
            --dark: #2f3542;
            --light: #f1f2f6;
            --shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Outfit', sans-serif; }
        body { background: #fdf2f2; color: var(--dark); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        
        .receipt-card {
            background: white;
            border-radius: 20px;
            width: 100%;
            max-width: 500px;
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
        }
        .receipt-header {
            background: var(--primary);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .success-icon {
            width: 60px; height: 60px; background: white; color: var(--primary);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-size: 30px; font-weight: bold; margin: 0 auto 15px;
        }
        .receipt-header h1 { font-size: 1.8rem; margin-bottom: 5px; }
        .receipt-header p { opacity: 0.9; }
        
        .receipt-body { padding: 30px; }
        .info-row { display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 1.05rem; }
        .info-label { color: #747d8c; }
        .info-value { font-weight: 600; text-align: right; }
        
        .divider { height: 2px; background: dashed #dfe4ea; margin: 20px 0; }
        
        .item-list { margin-bottom: 20px; }
        .item-row { display: flex; justify-content: space-between; margin-bottom: 8px; }
        .item-name { font-weight: 600; }
        .item-qty { color: #747d8c; font-size: 0.9rem; }
        .item-price { font-weight: 600; }
        
        .total-row { display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 20px; border-top: 2px solid var(--light); }
        .total-label { font-size: 1.2rem; font-weight: 700; }
        .total-amount { font-size: 1.5rem; font-weight: 700; color: var(--primary); }
        
        .btn-home {
            display: block; width: 100%; text-align: center; background: var(--light);
            color: var(--dark); padding: 15px; text-decoration: none; font-weight: 600;
            border-radius: 10px; margin-top: 20px; transition: 0.3s;
        }
        .btn-home:hover { background: #dfe4ea; }
        
        .wa-btn {
            display: block; width: 100%; text-align: center; background: #25D366;
            color: white; padding: 15px; text-decoration: none; font-weight: 600;
            border-radius: 10px; margin-top: 10px; transition: 0.3s; box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
        }
        .wa-btn:hover { background: #1ebe57; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="receipt-card">
    <div class="receipt-header">
        <div class="success-icon">✓</div>
        <h1>Pesanan Diterima!</h1>
        <p>Terima kasih telah memesan di Kantin Ibu Ida</p>
    </div>
    
    <div class="receipt-body">
        <div class="info-row">
            <span class="info-label">Order ID</span>
            <span class="info-value">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Nama</span>
            <span class="info-value">{{ $order->customer_name }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Telepon</span>
            <span class="info-value">{{ $order->customer_phone }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Waktu</span>
            <span class="info-value">{{ $order->created_at->format('d M Y, H:i') }}</span>
        </div>
        
        <div class="divider"></div>
        
        <div class="item-list">
            @foreach($order->items as $item)
            <div class="item-row">
                <div>
                    <div class="item-name">{{ $item->menu->name }}</div>
                    <div class="item-qty">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                </div>
                <div class="item-price">Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</div>
            </div>
            @endforeach
        </div>
        
        <div class="total-row">
            <span class="total-label">Total Pembayaran</span>
            <span class="total-amount">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
        </div>

        @php
            $wa_text = "Halo Ibu Ida, saya " . $order->customer_name . " ingin konfirmasi pesanan (Order ID: #" . str_pad($order->id, 5, '0', STR_PAD_LEFT) . ") dengan total Rp " . number_format($order->total_price, 0, ',', '.') . ". Terima kasih.";
            $wa_url = "https://wa.me/6289539821084?text=" . urlencode($wa_text);
        @endphp
        
        <a href="{{ $wa_url }}" target="_blank" class="wa-btn">Konfirmasi via WhatsApp</a>
        <a href="{{ route('home') }}" class="btn-home">Kembali ke Beranda</a>
    </div>
</div>

</body>
</html>
