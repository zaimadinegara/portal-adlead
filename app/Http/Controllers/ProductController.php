<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $storeUrl = 'https://lynk.id/leadersadvanced?fbclid=PAdGRleAQHQ7JleHRuA2FlbQIxMQABp5nyFS4Ywf1KZ68Y-s9nIZ-pKf1KVLC85wg_f6Dycm3U5wRrC1qU2gknDhMq_aem_Lr42ocp8gy3UaZsWMfe90Q&utm_source=ig&utm_medium=social&utm_content=link_in_bio';

        $products = [
            [
                'name' => 'Advanced Leader Mentoring',
                'description' => 'Program mentoring kepemimpinan, komunikasi, dan strategi komunitas untuk pelajar, profesional, dan penggerak organisasi.',
                'price' => 'Akses via toko resmi',
                'lynk_url' => $storeUrl,
            ],
            [
                'name' => 'Kelas Intensif Komunitas',
                'description' => 'Kelas online dan workshop praktis untuk meningkatkan kapasitas tim, branding komunitas, dan growth konten digital.',
                'price' => 'Akses via toko resmi',
                'lynk_url' => $storeUrl,
            ],
            [
                'name' => 'Toolkit Konten & Branding',
                'description' => 'Paket template dan framework yang dapat dipakai untuk mengembangkan media komunitas yang konsisten dan profesional.',
                'price' => 'Akses via toko resmi',
                'lynk_url' => $storeUrl,
            ],
            [
                'name' => 'Produk Pilihan Advanced Leader',
                'description' => 'Koleksi produk digital dan program pembelajaran untuk komunitas yang ingin bertumbuh lebih cepat dan berdampak.',
                'price' => 'Lihat detail di lynk.id',
                'lynk_url' => $storeUrl,
            ],
        ];

        return view('products.index', compact('products', 'storeUrl'));
    }
}
