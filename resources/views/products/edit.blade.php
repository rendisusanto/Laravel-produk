<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f6ff;
            padding: 20px;
        }
        .container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(90, 24, 154, 0.2);
        }
        h2 {
            text-align: center;
            color: #5a189a;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #5a189a;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: vertical;
        }
        button {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #7b2cbf;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #9d4edd;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #5a189a;
        }
        .current-image {
            margin-top: 10px;
            text-align: center;
        }
        .current-image img {
            max-width: 200px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Produk</h2>

        @if ($errors->any())
            <div style="color:red; margin-bottom: 10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Nama Produk</label>
            <input type="text" name="title" value="{{ old('title', $product->title) }}" required>

            <label>Deskripsi</label>
            <textarea name="description" rows="4" required>{{ old('description', $product->description) }}</textarea>

            <label>Harga</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" required>

            <label>Upload Gambar (File)</label>
            <input type="file" name="image" accept="image/*">

            <label>Atau Masukkan Link Gambar</label>
            <input type="text" name="image_url" value="{{ old('image_url', Str::startsWith($product->image, 'http') ? $product->image : '') }}" placeholder="https://contoh.com/gambar.jpg">

            @if ($product->image)
                <div class="current-image">
                    <p>Gambar Saat Ini:</p>
                    @if(Str::startsWith($product->image, 'http'))
                        <img src="{{ $product->image }}" alt="Gambar Produk">
                    @else
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar Produk">
                    @endif
                </div>
            @endif

            <button type="submit">Simpan Perubahan</button>
        </form>

        <a href="{{ route('products.index') }}">← Kembali ke daftar produk</a>
    </div>
</body>
</html>
