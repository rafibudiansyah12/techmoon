<?php

namespace Database\Seeders;

use App\Models\{Event, Pillar, Product, Portfolio, Testimonial, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@techmoon.test')],
            ['name' => env('ADMIN_NAME', 'Admin TechMoon'), 'password' => Hash::make(env('ADMIN_PASSWORD', 'password')), 'role' => 'admin']
        );

        $pillars = [
            ['Layanan IT & Digital', 'layanan-it-digital', 'web-development', 'Website, desain, dan pengelolaan media sosial untuk bisnis yang ingin berkembang.'],
            ['Ritel Hardware', 'ritel-hardware', 'box', 'Perangkat komputer pilihan, komponen, dan aksesoris dengan harga bersahabat.'],
            ['Inovasi Interaktif', 'inovasi-interaktif', 'qrcode', 'QR cerdas, gamifikasi, dan aplikasi praktis untuk pengalaman pelanggan.'],
            ['Edukasi Teknologi', 'edukasi-teknologi', 'chalkboard-user', 'Kelas dan program intensif untuk membangun keterampilan digital masa depan.'],
        ];
        foreach ($pillars as [$name, $slug, $icon, $description]) {
            Pillar::updateOrCreate(['slug' => $slug], compact('name', 'icon', 'description'));
        }

        $products = [
            ['Website Company Profile', 'layanan-it-digital', 4500000, 'tetap', true, null, 'Website profesional yang memperkenalkan bisnis, layanan, dan cerita brand dengan jelas.'],
            ['Landing Page Kampanye', 'layanan-it-digital', 1800000, 'mulai_dari', false, null, 'Halaman kampanye cepat dan fokus untuk mengubah pengunjung menjadi pelanggan.'],
            ['Undangan Digital', 'layanan-it-digital', 250000, 'mulai_dari', true, null, 'Undangan modern yang mudah dibagikan, lengkap dengan RSVP dan informasi acara.'],
            ['CV Digital Profesional', 'layanan-it-digital', 150000, 'mulai_dari', false, null, 'Portofolio personal yang rapi untuk membantu talenta tampil lebih percaya diri.'],
            ['Branding & Desain Grafis', 'layanan-it-digital', 750000, 'mulai_dari', true, null, 'Identitas visual konsisten untuk membuat brand mudah dikenal dan diingat.'],
            ['Manajemen Media Sosial', 'layanan-it-digital', 1500000, 'mulai_dari', false, null, 'Kalender konten, desain, dan pengelolaan media sosial dalam satu layanan.'],
            ['Laptop Produktivitas Hemat', 'ritel-hardware', 4250000, 'mulai_dari', true, 8, 'Laptop pilihan untuk belajar, bekerja, dan mengelola bisnis harian.'],
            ['Paket Instalasi LAN', 'ritel-hardware', 1200000, 'mulai_dari', false, 10, 'Perencanaan dan pemasangan jaringan kabel untuk kantor, sekolah, dan toko.'],
            ['Flashdisk & Aksesoris', 'ritel-hardware', 35000, 'tetap', false, 40, 'Flashdisk dan aksesoris esensial untuk menyimpan serta memindahkan data.'],
            ['Keyboard & Mouse Wireless', 'ritel-hardware', 175000, 'tetap', false, 16, 'Paket keyboard dan mouse nirkabel yang nyaman untuk meja kerja modern.'],
            ['SSD Upgrade Komputer', 'ritel-hardware', 325000, 'mulai_dari', true, 12, 'Upgrade penyimpanan SSD untuk waktu boot lebih singkat dan kerja lebih lancar.'],
            ['PC Rakitan untuk UMKM', 'ritel-hardware', 5200000, 'mulai_dari', false, 5, 'Komputer rakitan sesuai anggaran untuk kasir, administrasi, dan desain ringan.'],
            ['Web Kasir UMKM', 'inovasi-interaktif', 1500000, 'mulai_dari', true, null, 'Kasir berbasis web untuk mencatat transaksi dan memantau penjualan harian.'],
            ['Menu Digital QR', 'inovasi-interaktif', 500000, 'mulai_dari', false, null, 'Menu digital cepat diakses pelanggan dengan scan QR tanpa instal aplikasi.'],
            ['Loyalty Stamp QR', 'inovasi-interaktif', 850000, 'mulai_dari', false, null, 'Program loyalitas digital yang sederhana untuk mendorong kunjungan berulang.'],
            ['Mini Game Produk F&B', 'inovasi-interaktif', 2000000, 'negosiasi', true, null, 'Aktivasi brand melalui permainan ringan yang menyenangkan dan mudah dibagikan.'],
            ['Gamifikasi Produk & Promosi', 'inovasi-interaktif', 2500000, 'negosiasi', false, null, 'Pengalaman interaktif untuk program promosi, hadiah, dan peluncuran produk.'],
            ['Katalog Pintar dengan QR', 'inovasi-interaktif', 650000, 'mulai_dari', false, null, 'Katalog produk digital yang mudah diperbarui dan dibuka dari satu kode QR.'],
            ['Bootcamp Web Dasar', 'edukasi-teknologi', 0, 'negosiasi', true, null, 'Belajar HTML, CSS, dan dasar website melalui latihan langsung dan proyek mini.'],
            ['Bootcamp UI/UX Pemula', 'edukasi-teknologi', 0, 'negosiasi', false, null, 'Kenali riset pengguna, wireframe, dan prototipe produk digital dari awal.'],
            ['Kelas Excel untuk Kerja', 'edukasi-teknologi', 175000, 'tetap', false, null, 'Kelas praktis formula dan pengolahan data untuk kerja dan administrasi sehari-hari.'],
            ['Seminar Teknologi UMKM', 'edukasi-teknologi', 50000, 'tetap', false, null, 'Seminar ringan tentang teknologi yang bisa langsung membantu operasional UMKM.'],
            ['Mentoring Karier IT', 'edukasi-teknologi', 250000, 'tetap', false, null, 'Sesi mentoring untuk menyusun jalur belajar dan portofolio karier teknologi.'],
            ['Modul Belajar Coding', 'edukasi-teknologi', 95000, 'tetap', false, null, 'Materi belajar mandiri dengan latihan terstruktur untuk mulai mengenal coding.'],
        ];
        foreach ($products as [$name, $pillarSlug, $price, $priceType, $featured, $stock, $description]) {
            $slug = Str::slug($name);
            Product::updateOrCreate(['slug' => $slug], [
                'pillar_id' => Pillar::where('slug', $pillarSlug)->value('id'),
                'name' => $name,
                'description' => $description,
                'price' => $price ?: null,
                'price_type' => $priceType,
                'stock' => $stock,
                'is_active' => true,
                'is_featured' => $featured,
                'image' => 'https://placehold.co/900x650/0f172a/38bdf8?text='.urlencode($name),
            ]);
        }

        $educationId = Pillar::where('slug', 'edukasi-teknologi')->value('id');
        $events = [
            ['Bootcamp Web Dasar: Bangun Website Pertama', 'bootcamp', 10, 20, 250000, 'TechMoon Hub, Jakarta', 'Buat website responsif pertamamu lewat sesi praktik HTML, CSS, dan pengenalan JavaScript. Cocok untuk pemula.'],
            ['Seminar Teknologi Praktis untuk UMKM', 'seminar', 18, 60, 50000, 'Aula Kreatif, Bandung', 'Temukan cara sederhana memakai kasir digital, katalog QR, dan media sosial untuk usaha sehari-hari.'],
            ['Kelas UI/UX: Dari Ide ke Prototipe', 'bootcamp', 26, 18, 175000, 'TechMoon Hub, Jakarta', 'Pelajari alur desain produk digital dan buat prototipe yang bisa diuji langsung.'],
            ['Workshop Bangun Web Kasir Sederhana', 'bootcamp', 34, 16, 225000, 'Ruang Kolaborasi, Depok', 'Latihan membangun alur transaksi dasar dan dashboard penjualan untuk usaha kecil.'],
            ['Seminar Karier dan Portofolio Digital', 'seminar', 42, 80, 0, 'Auditorium Cendekia, Bogor', 'Kenali jalur karier teknologi, susun portofolio, dan dengarkan pengalaman praktisi.'],
            ['Kelas QR Interaktif untuk Bisnis', 'bootcamp', 52, 24, 125000, 'TechMoon Hub, Jakarta', 'Rancang pengalaman QR untuk katalog, promosi, dan interaksi pelanggan yang lebih menarik.'],
        ];
        foreach ($events as [$title, $type, $days, $quota, $fee, $location, $description]) {
            Event::updateOrCreate(['title' => $title], [
                'pillar_id' => $educationId,
                'type' => $type,
                'description' => $description,
                'start_at' => now()->addDays($days)->setTime(9, 0),
                'location' => $location,
                'quota' => $quota,
                'fee' => $fee,
                'status' => 'buka',
                'image' => 'https://placehold.co/900x600/111c33/67e8f9?text='.urlencode($title),
            ]);
        }

        $portfolios = [
            ['Website UMKM Kopi Kita', 'Kopi Kita', 'Website profil dan katalog digital untuk membantu pelanggan mengenal menu dan lokasi kedai.', 'https://placehold.co/900x650/172554/93c5fd?text=Kopi+Kita'],
            ['Sistem Menu QR Rasa Nusantara', 'Rasa Nusantara', 'Menu digital cepat dibuka pelanggan dengan QR dan tampilan yang nyaman di ponsel.', 'https://placehold.co/900x650/164e63/67e8f9?text=Menu+QR'],
            ['Digitalisasi Sekolah Cendekia', 'Sekolah Cendekia', 'Website informasi sekolah dengan struktur konten yang mudah dikelola oleh staf.', 'https://placehold.co/900x650/312e81/c4b5fd?text=Sekolah+Cendekia'],
            ['Kampanye Digital Festival Kota', 'Festival Kota', 'Landing page kampanye acara dengan jadwal, peta, dan pendaftaran peserta.', 'https://placehold.co/900x650/7c2d12/fde68a?text=Festival+Kota'],
            ['Dashboard Kasir Kedai Roti', 'Roti Pagi', 'Pencatatan transaksi dan ringkasan penjualan yang mudah digunakan oleh tim kedai.', 'https://placehold.co/900x650/713f12/fed7aa?text=Kasir+Digital'],
            ['Katalog Produk Lokal Berbasis QR', 'Pasar Lokal', 'Katalog interaktif yang menyatukan informasi produk dari sejumlah pelaku UMKM.', 'https://placehold.co/900x650/14532d/bbefc4?text=Katalog+QR'],
        ];
        foreach ($portfolios as [$title, $client, $description, $image]) {
            Portfolio::updateOrCreate(['title' => $title], compact('description') + ['client_name' => $client, 'image' => $image]);
        }

        $testimonials = [
            ['Dewi Lestari', 'Pemahaman tim TechMoon membuat digitalisasi usaha kami terasa mudah. Website dan menu QR-nya langsung membantu pelanggan.', 5],
            ['Bima Pratama', 'Pelatihannya praktis, suasananya ramah pemula, dan saya pulang membawa website yang benar-benar bisa dipakai.', 5],
            ['Siti Rahma', 'Komunikasinya jelas dari awal. Hasil akhirnya rapi dan sesuai kebutuhan sekolah kami.', 5],
            ['Andi Saputra', 'Web kasirnya membantu tim kami lebih tertib mencatat transaksi setiap hari.', 5],
            ['Nadia Putri', 'Suka karena solusinya disesuaikan dengan ukuran usaha kami, bukan dibuat rumit.', 5],
            ['Rizky Maulana', 'Seminar TechMoon membuka wawasan tentang cara sederhana memakai teknologi untuk UMKM.', 4],
        ];
        foreach ($testimonials as [$name, $content, $rating]) {
            Testimonial::updateOrCreate(['name' => $name], compact('content', 'rating') + ['is_published' => true]);
        }
    }
}
