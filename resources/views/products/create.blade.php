<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
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
        .note {
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Produk</h2>

        @if ($errors->any())
            <div style="color:red; margin-bottom: 10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Nama Produk</label>
            <input type="text" name="title" value="{{ old('title') }}" required>

            <label>Deskripsi</label>
            <textarea name="description" rows="4" required>{{ old('description') }}</textarea>

            <label>Harga</label>
            <input type="number" name="price" value="{{ old('price') }}" required>

            <label>Stok</label>
            <input type="number" name="stock" value="{{ old('stock', 0) }}">

            <label>Upload Gambar (pilih salah satu)</label>
            <input type="file" name="image" accept="image/*">

            <label>atau Masukkan Link Gambar</label>
            <input type="text" name="image_url" value="{{ old('image_url') }}" placeholder="https://example.com/gambar.jpg">

            <p class="note">💡 Anda bisa pilih upload file <b>atau</b> masukkan URL gambar. Jika dua-duanya diisi, prioritas ke URL.</p>

            <button type="submit">Simpan</button>
        </form>

        <a href="{{ route('products.index') }}">← Kembali ke daftar produk</a>
    </div>
</body>
</html>
