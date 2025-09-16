<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f3e9ff, #fff);
            margin: 0;
            padding: 20px;
            text-align: center;
            color: #333;
            transition: background 0.3s, color 0.3s;
        }
        .product-detail {
            background: white;
            max-width: 700px;
            margin: auto;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(90, 24, 154, 0.2);
            transition: all 0.3s ease;
        }
        .product-detail:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(90, 24, 154, 0.25);
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin-bottom: 20px;
        }
        h1 {
            color: #5a189a;
            margin-bottom: 10px;
            font-size: 2em;
        }
        .price {
            font-weight: bold;
            font-size: 1.3em;
            color: #7b2cbf;
            margin: 12px 0;
        }
        .description {
            font-size: 1em;
            line-height: 1.6em;
            color: #555;
            margin: 15px 0 25px;
        }
        .btn {
            display: inline-block;
            margin: 8px;
            padding: 10px 18px;
            background: #5a189a;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(90, 24, 154, 0.3);
        }
        .btn:hover {
            background: #9d4edd;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(90, 24, 154, 0.4);
        }
        .btn-edit {
            background: #7b2cbf;
        }
        .btn-edit:hover {
            background: #c77dff;
        }

        /* 🌙 Dark Mode */
        body.dark {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            color: #eee;
        }
        body.dark .product-detail {
            background: #22223b;
            color: #eee;
            box-shadow: 0 5px 15px rgba(199, 125, 255, 0.2);
        }
        body.dark h1 {
            color: #c77dff;
        }
        body.dark .price {
            color: #c77dff;
        }
        body.dark .description {
            color: #ccc;
        }
        .toggle-theme {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #5a189a;
            color: white;
            border: none;
            padding: 10px 14px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            box-shadow: 0 3px 10px rgba(90, 24, 154, 0.3);
            transition: all 0.3s ease;
        }
        .toggle-theme:hover {
            background: #9d4edd;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    {{-- Tombol toggle tema --}}
    <button class="toggle-theme" onclick="toggleTheme()">🌙 Dark Mode</button>

    <div class="product-detail">
        <h1>{{ $product->title }}</h1>

        @if($product->image)
            @if(Str::startsWith($product->image, ['http://', 'https://']))
                <img src="{{ $product->image }}" alt="{{ $product->title }}">
            @else
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
            @endif
        @else
            <img src="https://via.placeholder.com/600x400?text=No+Image" alt="Tidak ada gambar">
        @endif

        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <p class="description">{{ $product->description }}</p>

        <a href="{{ route('products.index') }}" class="btn">← Kembali</a>
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit">✏️ Edit</a>
    </div>

    <script>
        function toggleTheme() {
            document.body.classList.toggle('dark');
            const btn = document.querySelector('.toggle-theme');
            if (document.body.classList.contains('dark')) {
                btn.textContent = "☀️ Light Mode";
            } else {
                btn.textContent = "🌙 Dark Mode";
            }
        }
    </script>
</body>
</html>
