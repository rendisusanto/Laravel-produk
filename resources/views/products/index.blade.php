<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* 🌈 Reset */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: "Poppins", sans-serif;
            background: #f9f9f9;
            color: #333;
            padding: 30px;
            transition: background 0.4s, color 0.4s;
        }

        /* 🏷️ Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #5a189a;
        }
        .btn {
            display: inline-block;
            padding: 10px 18px;
            background: #5a189a;
            color: #fff;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(90,24,154,0.2);
        }
        .btn:hover { background: #9d4edd; transform: translateY(-2px); }

        /* 🌍 Toggle Dark Mode */
        .toggle-theme {
            border: none;
            background: #eee;
            color: #333;
            font-size: 0.9rem;
            padding: 8px 14px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .toggle-theme:hover { background: #ddd; }

        /* 🛒 Produk Grid */
        .product-grid {
            display: grid;
            gap: 25px;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            margin-top: 20px;
        }

        /* 🎴 Card Produk */
        .product-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: #eee;
        }

        .product-content {
            padding: 18px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-content h3 {
            font-size: 1.2rem;
            color: #222;
            margin-bottom: 8px;
        }

        .product-content p {
            font-size: 0.95rem;
            color: #666;
            line-height: 1.4;
            margin-bottom: 12px;
        }

        .price {
            font-size: 1.15rem;
            font-weight: 700;
            color: #7b2cbf;
            margin-bottom: 15px;
        }

        /* 🔘 Actions */
        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        .btn-action {
            flex: 1;
            text-align: center;
            background: #eee;
            color: #333;
            border-radius: 8px;
            padding: 8px 0;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
            text-decoration: none;
        }
        .btn-action:hover { background: #ddd; }
        .btn-edit { background: #ffd166; color: #222; }
        .btn-edit:hover { background: #ffca3a; }
        .btn-delete { background: #ef476f; color: #fff; }
        .btn-delete:hover { background: #d90429; }

        /* 🌙 Dark Mode */
        body.dark { background: #121212; color: #eee; }
        body.dark h1 { color: #c77dff; }
        body.dark .btn { background: #c77dff; }
        body.dark .product-card { background: #1e1e2f; }
        body.dark .product-content h3 { color: #fff; }
        body.dark .product-content p { color: #bbb; }
        body.dark .price { color: #ff80ff; }
        body.dark .toggle-theme { background: #333; color: #fff; }
    </style>
</head>
<body>
    <header>
        <h1>🛍️ Daftar Produk</h1>
        <div>
            <a href="{{ route('products.create') }}" class="btn">+ Tambah Produk</a>
            <button class="toggle-theme" onclick="toggleTheme()">🌙 Dark</button>
        </div>
    </header>

    {{-- Flash Message --}}
    @if(session('success'))
        <div style="background:#d4edda;color:#155724;padding:12px;border-radius:8px;margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Produk List --}}
    <div class="product-grid">
        @foreach($products as $product)
            <div class="product-card">
                {{-- Cek gambar (link atau lokal) --}}
                @if($product->image)
                    @if(Str::startsWith($product->image, ['http://', 'https://']))
                        <img src="{{ $product->image }}" class="product-image" alt="{{ $product->title }}">
                    @else
                        <img src="{{ asset('storage/' . $product->image) }}" class="product-image" alt="{{ $product->title }}">
                    @endif
                @else
                    <img src="https://via.placeholder.com/280x200?text=No+Image" class="product-image" alt="No Image">
                @endif

                <div class="product-content">
                    <div>
                        <h3>{{ $product->title }}</h3>
                        <p>{{ Str::limit($product->description, 80) }}</p>
                    </div>
                    <div>
                        <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        <div class="actions">
                            <a href="{{ route('products.show', $product->id) }}" class="btn-action">ℹ️ Info</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn-action btn-edit">✏️ Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="flex:1;" onsubmit="return confirm('Yakin hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete">🗑️ Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div style="margin-top:30px;text-align:center;">
        {{ $products->links() }}
    </div>

    <script>
        function toggleTheme() {
            document.body.classList.toggle("dark");
            const btn = document.querySelector(".toggle-theme");
            btn.textContent = document.body.classList.contains("dark") ? "☀️ Light" : "🌙 Dark";
        }
    </script>
</body>
</html>
