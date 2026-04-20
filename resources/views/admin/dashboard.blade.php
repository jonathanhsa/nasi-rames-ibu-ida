<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Kantin Ibu Ida</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #ff6b6b; --dark: #222f3e; --light: #f8f9fa; }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Outfit', sans-serif; }
        body { background: #fdf2f2; color: var(--dark); display: flex; }
        .sidebar { width: 250px; background: white; height: 100vh; padding: 30px; position: fixed; box-shadow: 2px 0 10px rgba(0,0,0,0.05); }
        .sidebar h2 { color: var(--primary); margin-bottom: 40px; font-size: 1.5rem; }
        .sidebar ul { list-style: none; }
        .sidebar ul li { margin-bottom: 20px; }
        .sidebar ul li a { text-decoration: none; color: var(--dark); font-weight: 600; font-size: 1.1rem; display: block; transition: 0.3s; }
        .sidebar ul li a:hover { color: var(--primary); }
        .main-content { margin-left: 250px; padding: 40px; width: calc(100% - 250px); }
        h1 { margin-bottom: 30px; font-size: 2.5rem; }
        
        .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px; }
        .stat-card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .stat-card h3 { font-size: 1rem; color: #777; margin-bottom: 10px; }
        .stat-card .val { font-size: 2rem; font-weight: 700; color: var(--primary); }
        
        .section-card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); margin-bottom: 40px; }
        .section-card h2 { margin-bottom: 20px; color: var(--dark); border-bottom: 2px solid #eee; padding-bottom: 10px; }
        
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { text-align: left; padding: 15px; border-bottom: 1px solid #eee; }
        th { color: #777; font-weight: 600; }
        
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 600; }
        .form-control { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none; }
        .form-control:focus { border-color: var(--primary); }
        
        .btn { background: var(--primary); color: white; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; }
        .btn:hover { background: #ff4757; }
        .btn-logout { background: #e74c3c; color: white; border: none; padding: 10px; border-radius: 8px; cursor: pointer; width: 100%; margin-top: 20px; font-weight: 600; }
        
        .alert { background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Kantin</h2>
        <ul>
            <li><a href="#dashboard">Dashboard</a></li>
            <li><a href="#menu">Menu Makanan</a></li>
            <li><a href="#bahan">Stok Bahan</a></li>
            <li><a href="#riwayat">Riwayat Penjualan</a></li>
        </ul>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>

    <div class="main-content">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <h1 id="dashboard">Dashboard</h1>
        
        <div class="stats">
            <div class="stat-card">
                <h3>Total Pendapatan</h3>
                <div class="val">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
            </div>
            <div class="stat-card">
                <h3>Total Pesanan</h3>
                <div class="val">{{ $totalOrders }}</div>
            </div>
        </div>

        <div class="section-card" id="menu">
            <h2>Tambah Menu Baru</h2>
            <form action="{{ route('admin.menu.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Menu</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>URL Gambar</label>
                    <input type="url" name="image" class="form-control" required>
                </div>
                <button type="submit" class="btn">Simpan Menu</button>
            </form>
            
            <h3 style="margin-top: 30px; margin-bottom: 15px;">Daftar Menu</h3>
            <table>
                <tr>
                    <th>Menu</th>
                    <th>Harga</th>
                </tr>
                @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="section-card" id="bahan">
            <h2>Stok Bahan Baku</h2>
            <form action="{{ route('admin.ingredient.store') }}" method="POST">
                @csrf
                <div style="display: flex; gap: 15px;">
                    <div class="form-group" style="flex: 2;">
                        <label>Nama Bahan</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Jumlah Stok</label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Satuan (contoh: kg, ikat)</label>
                        <input type="text" name="unit" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn">Tambah Stok</button>
            </form>

            <h3 style="margin-top: 30px; margin-bottom: 15px;">Daftar Bahan</h3>
            <table>
                <tr>
                    <th>Nama Bahan</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                </tr>
                @foreach($ingredients as $bahan)
                <tr>
                    <td>{{ $bahan->name }}</td>
                    <td>{{ $bahan->stock }}</td>
                    <td>{{ $bahan->unit }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="section-card" id="riwayat">
            <h2>Riwayat Penjualan</h2>
            <table>
                <tr>
                    <th>Waktu</th>
                    <th>Nama Pelanggan</th>
                    <th>Pesanan</th>
                    <th>Total</th>
                </tr>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>
                        <ul style="margin-left: 20px;">
                            @foreach($order->items as $item)
                                @if($item->menu)
                                    <li>{{ $item->menu->name }} (x{{ $item->quantity }})</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td style="font-weight: bold;">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>
</body>
</html>
