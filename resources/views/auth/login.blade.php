<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Kantin Ibu Ida</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #ff6b6b; --dark: #222f3e; --light: #f8f9fa; }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Outfit', sans-serif; }
        body { background: #fdf2f2; color: var(--dark); display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-card { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(31, 38, 135, 0.1); width: 100%; max-width: 400px; }
        h1 { text-align: center; color: var(--primary); margin-bottom: 30px; font-size: 2rem; }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: 600; margin-bottom: 8px; }
        input { width: 100%; padding: 12px; border: 2px solid #eee; border-radius: 10px; font-size: 1rem; outline: none; }
        input:focus { border-color: var(--primary); }
        .btn { background: var(--primary); color: white; border: none; padding: 15px; width: 100%; border-radius: 10px; font-size: 1.1rem; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .btn:hover { background: #ff4757; }
        .error { color: #e74c3c; font-size: 0.9rem; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="login-card">
        <h1>Admin Login</h1>
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required value="{{ old('username') }}">
                @error('username') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>
