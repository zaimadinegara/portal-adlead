<?php

namespace Database\Seeders;

use App\Models\ArticleSubmission;
use App\Models\Category;
use App\Models\Post;
use App\Models\PopupAd;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdvancedLeaderContentSeeder extends Seeder
{
    public function run(): void
    {
        $categoryNames = [
            'Liputan',
            'Esai',
            'Teknologi',
            'Ekonomi',
            'Kreatif',
            'Inspirasi',
            'Komunitas',
        ];

        $categories = collect($categoryNames)->mapWithKeys(function (string $name) {
            $slug = Str::slug($name);

            $category = Category::query()->updateOrCreate(
                ['slug' => $slug],
                ['name' => $name],
            );

            return [$slug => $category];
        });

        $posts = [
            [
                'title' => 'Advanced Leader Resmikan Kanal Berita Publik untuk Komunitas Indonesia',
                'category_slug' => 'komunitas',
                'content' => '<p>Advanced Leader resmi meluncurkan kanal berita publik sebagai ruang kolaborasi ide, cerita, dan karya komunitas. Kanal ini dirancang sebagai media alternatif yang lebih dekat dengan suara anggota komunitas.</p><p>Tim editorial akan menampilkan karya terbaik secara berkala, termasuk liputan kegiatan sosial, opini mendalam, dan artikel inspiratif seputar pengembangan diri.</p>',
                'image' => 'https://picsum.photos/seed/al-news-1/1200/700',
                'days_ago' => 1,
            ],
            [
                'title' => 'Rangkaian Kelas Kepemimpinan 2026 Dibuka untuk Penggerak Komunitas',
                'category_slug' => 'inspirasi',
                'content' => '<p>Program kelas kepemimpinan Advanced Leader tahun 2026 resmi dibuka. Program ini membantu anggota baru meningkatkan kemampuan komunikasi, pengambilan keputusan, dan manajemen tim.</p><p>Setiap peserta akan didampingi mentor komunitas serta menyelesaikan proyek nyata agar hasil belajar dapat langsung diterapkan.</p>',
                'image' => 'https://picsum.photos/seed/al-news-2/1200/700',
                'days_ago' => 2,
            ],
            [
                'title' => 'Komunitas Dorong Literasi AI untuk Pelajar dan Mahasiswa Daerah',
                'category_slug' => 'teknologi',
                'content' => '<p>Melalui program literasi digital, komunitas Advanced Leader memperkenalkan dasar pemanfaatan kecerdasan buatan secara etis kepada pelajar dan mahasiswa.</p><p>Materi workshop mencakup pengolahan data sederhana, pemanfaatan AI untuk belajar, dan etika penggunaan teknologi di ruang publik.</p>',
                'image' => 'https://picsum.photos/seed/al-news-3/1200/700',
                'days_ago' => 3,
            ],
            [
                'title' => 'UMKM Binaan Komunitas Catat Pertumbuhan Penjualan Positif',
                'category_slug' => 'ekonomi',
                'content' => '<p>Sejumlah UMKM binaan Advanced Leader melaporkan peningkatan penjualan setelah mengikuti pendampingan branding, pemasaran digital, dan penguatan produk.</p><p>Komunitas menilai konsistensi konten, layanan pelanggan, dan kemitraan lokal menjadi faktor penting dalam pertumbuhan tersebut.</p>',
                'image' => 'https://picsum.photos/seed/al-news-4/1200/700',
                'days_ago' => 5,
            ],
            [
                'title' => 'Aksi Sosial Pekan Ini: Edukasi Karier untuk Siswa SMA dan SMK',
                'category_slug' => 'liputan',
                'content' => '<p>Relawan Advanced Leader menggelar sesi edukasi karier untuk siswa SMA dengan tema pemetaan potensi diri dan perencanaan masa depan.</p><p>Program ini mendapat antusias tinggi karena menghadirkan pembicara dari berbagai profesi dan sesi diskusi interaktif bersama peserta.</p>',
                'image' => 'https://picsum.photos/seed/al-news-5/1200/700',
                'days_ago' => 7,
            ],
            [
                'title' => 'Strategi Komunitas Meningkatkan Dampak Melalui Kolaborasi Regional',
                'category_slug' => 'komunitas',
                'content' => '<p>Advanced Leader memperkuat kolaborasi regional melalui forum komunitas lintas kota untuk berbagi praktik baik, data program, dan sumber daya.</p><p>Langkah ini diharapkan mempercepat replikasi kegiatan berdampak dan membuka peluang jejaring lebih luas bagi anggota.</p>',
                'image' => 'https://picsum.photos/seed/al-news-6/1200/700',
                'days_ago' => 8,
            ],
            [
                'title' => 'Panduan Dasar Personal Branding untuk Aktivis Muda',
                'category_slug' => 'inspirasi',
                'content' => '<p>Tim konten Advanced Leader merilis panduan personal branding untuk aktivis muda agar mampu menyampaikan gagasan secara lebih jelas dan konsisten.</p><p>Panduan membahas identitas, storytelling, serta teknik menyusun profil digital yang kredibel di platform publik.</p>',
                'image' => 'https://picsum.photos/seed/al-news-7/1200/700',
                'days_ago' => 10,
            ],
            [
                'title' => 'Tren Teknologi Komunitas: Otomasi Konten dan Analitik Sederhana',
                'category_slug' => 'teknologi',
                'content' => '<p>Penggunaan otomasi konten dan analitik sederhana mulai diadopsi oleh berbagai komunitas untuk meningkatkan efisiensi publikasi.</p><p>Advanced Leader menekankan bahwa teknologi harus tetap diarahkan untuk memperkuat nilai edukasi dan kebermanfaatan publik.</p>',
                'image' => 'https://picsum.photos/seed/al-news-8/1200/700',
                'days_ago' => 12,
            ],
            [
                'title' => 'Esai Pekan Ini: Menjaga Empati di Era Informasi Super Cepat',
                'category_slug' => 'esai',
                'content' => '<p>Arus informasi yang sangat cepat sering membuat publik bereaksi tanpa sempat memahami konteks. Esai ini mengajak pembaca untuk menata ulang cara konsumsi informasi.</p><p>Empati, verifikasi, dan ketenangan berpikir menjadi tiga sikap dasar agar ruang digital tetap sehat.</p>',
                'image' => 'https://picsum.photos/seed/al-news-9/1200/700',
                'days_ago' => 13,
            ],
            [
                'title' => 'Kreatif Lokal: Komunitas Muda Rilis Program Studio Konten Mini',
                'category_slug' => 'kreatif',
                'content' => '<p>Program studio konten mini dirilis untuk membantu komunitas memproduksi video edukatif berbiaya terjangkau.</p><p>Fasilitas ini dapat digunakan untuk webinar, podcast, dan dokumentasi kegiatan lapangan.</p>',
                'image' => 'https://picsum.photos/seed/al-news-10/1200/700',
                'days_ago' => 14,
            ],
            [
                'title' => 'Liputan Lapangan: Gerakan Literasi Desa Berhasil Jangkau 500 Peserta',
                'category_slug' => 'liputan',
                'content' => '<p>Program literasi desa yang berjalan selama dua bulan berhasil menjangkau lebih dari 500 peserta lintas usia.</p><p>Kegiatan ini meliputi kelas membaca cepat, menulis kreatif, dan pengenalan media digital untuk warga.</p>',
                'image' => 'https://picsum.photos/seed/al-news-11/1200/700',
                'days_ago' => 15,
            ],
            [
                'title' => 'Ekonomi Komunitas: Strategi Pendanaan Program Tanpa Bergantung Sponsor Tunggal',
                'category_slug' => 'ekonomi',
                'content' => '<p>Diversifikasi sumber pendanaan dinilai penting agar program komunitas tetap stabil dalam jangka panjang.</p><p>Advanced Leader merekomendasikan kombinasi produk edukasi, crowdfunding, dan kemitraan nilai.</p>',
                'image' => 'https://picsum.photos/seed/al-news-12/1200/700',
                'days_ago' => 16,
            ],
        ];

        foreach ($posts as $postData) {
            $slug = Str::slug($postData['title']);
            $category = $categories->get($postData['category_slug']);

            Post::query()->updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $postData['title'],
                    'content' => $postData['content'],
                    'image' => $postData['image'] ?? null,
                    'is_published' => true,
                    'category_id' => $category?->id,
                    'created_at' => now()->subDays($postData['days_ago']),
                    'updated_at' => now(),
                ],
            );
        }

        PopupAd::query()->updateOrCreate(
            ['title' => 'Program Komunitas Advanced Leader'],
            [
                'image' => 'https://picsum.photos/seed/al-popup-1/1200/900',
                'external_url' => 'https://lynk.id/leadersadvanced?fbclid=PAdGRleAQHQ7JleHRuA2FlbQIxMQABp5nyFS4Ywf1KZ68Y-s9nIZ-pKf1KVLC85wg_f6Dycm3U5wRrC1qU2gknDhMq_aem_Lr42ocp8gy3UaZsWMfe90Q&utm_source=ig&utm_medium=social&utm_content=link_in_bio',
                'button_label' => 'Kunjungi Produk Kami',
                'delay_seconds' => 2,
                'priority' => 1,
                'is_active' => true,
                'starts_at' => now()->subDay(),
                'ends_at' => now()->addMonths(3),
            ],
        );

        ArticleSubmission::query()->updateOrCreate(
            ['email' => 'kontributor.demo@advancedleader.id', 'title' => 'Contoh Kiriman Artikel Demo'],
            [
                'name' => 'Kontributor Demo',
                'whatsapp' => '081234567890',
                'category_id' => $categories->get('esai')?->id,
                'content' => str_repeat('Ini adalah contoh naskah kiriman komunitas untuk keperluan demo portal Advanced Leader. ', 25),
                'bio' => 'Aktif menulis isu komunitas, pendidikan, dan literasi digital.',
                'status' => ArticleSubmission::STATUS_PENDING,
            ],
        );
    }
}
