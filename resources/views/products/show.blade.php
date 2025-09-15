<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f6ff;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .product-detail {
            background: white;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(90, 24, 154, 0.2);
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        h1 {
            color: #5a189a;
        }
        .price {
            font-weight: bold;
            font-size: 1.2em;
            color: #7b2cbf;
            margin: 10px 0;
        }
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background: #5a189a;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #9d4edd;
        }
        .btn-edit {
            background: #7b2cbf;
        }
        .btn-edit:hover {
            background: #c77dff;
        }
    </style>
</head>
<body>
    <div class="product-detail">
        <h1>{{ $product->title }}</h1>

        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
        @else
            <img src="https://via.placeholder.com/400x300?text=No+Image" alt="Tidak ada gambar">
        @endif

        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <p>{{ $product->description }}</p>

        <a href="{{ route('products.index') }}" class="btn">← Kembali</a>
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit">✏️ Edit</a>
    </div>
</body>
</html>
