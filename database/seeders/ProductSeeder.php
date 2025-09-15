<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'image' => 'product1.jpg',
            'title' => 'Kursi Kayu Minimalis',
            'description' => 'Kursi kayu bergaya minimalis cocok untuk ruang tamu modern.',
            'price' => 350000,
            'stock' => 15
        ]);

        Product::create([
            'image' => 'product2.jpg',
            'title' => 'Meja Belajar Lipat',
            'description' => 'Meja lipat multifungsi untuk belajar dan bekerja dari rumah.',
            'price' => 250000,
            'stock' => 25
        ]);

        Product::create([
            'image' => 'product3.jpg',
            'title' => 'Lampu Tidur Estetik',
            'description' => 'Lampu tidur dengan cahaya hangat, desain unik untuk dekorasi kamar.',
            'price' => 120000,
            'stock' => 30
        ]);
    }
}
