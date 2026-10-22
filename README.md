# TechMoon

Website perusahaan TechMoon MVP dengan Laravel 11, Blade, Tailwind, Alpine/Vite, dan MySQL. Seluruh antarmuka menggunakan Bahasa Indonesia.

## Tahap implementasi dan pemeriksaan

1. **Setup** — Laravel 11, Breeze Blade untuk login admin, konfigurasi Vite dan contoh `.env` tersedia. Jalankan `composer install`, `npm install`, dan `npm run build`.
2. **Database** — migration seluruh tabel MVP, relasi model, scopes, dan seeder tersedia. Pemeriksaan lokal: `php artisan migrate:fresh --seed`.
3. **Layout publik & beranda** — navbar sticky, footer, tombol WhatsApp, pilar, segmen, produk, event, testimoni, CTA.
4. **Produk, portofolio, tentang** — daftar dan pencarian produk, detail berbasis slug, portofolio, dan profil tim.
5. **Inquiry** — formulir menyimpan customer dan inquiry, email notifikasi menggunakan driver `log`.
6. **Event** — daftar dan detail event, pendaftaran dengan validasi status, kuota, dan email duplikat.
7–8. **Admin** — login admin, dashboard, CRUD produk/event/portofolio/testimoni, kelola inquiry, status dan catatan internal, daftar pendaftar serta ekspor CSV.
9. **Keamanan & SEO** — role middleware, tanpa registrasi publik, CSRF, rate limit, honeypot, validasi file, sitemap, robots, meta/OG, alt dan lazy loading.
10. **Feature test** — `php artisan test --testsuite=Feature --filter=PublicFlowsTest`.
11. **Panduan deploy** — petunjuk di bawah.

## Instalasi lokal

Persyaratan: PHP 8.2+, Composer, Node.js 20+, dan MySQL 8+ (ekstensi PHP `pdo_mysql`, `fileinfo`, `mbstring`, `openssl`).

```sh
composer install
cp .env.example .env
php artisan key:generate
```

Buat database `techmoon`, lalu isi `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di `.env`. Atur `WHATSAPP_NUMBER`, akun admin, serta konfigurasi `MAIL_*`. Email menggunakan `MAIL_MAILER=log` secara default dan dapat dibaca di `storage/logs/laravel.log`.

```sh
php artisan migrate:fresh --seed
php artisan storage:link
npm install
npm run build
php artisan serve
```

Buka `/` untuk situs publik dan `/login` untuk admin. Akun awal (ganti segera setelah instalasi):

- Email: `admin@techmoon.test`
- Kata sandi: `password`

Seeder membaca `ADMIN_NAME`, `ADMIN_EMAIL`, dan `ADMIN_PASSWORD` dari environment. Pastikan password khusus produksi ditetapkan sebelum menjalankan seeder.

## Deploy

Set `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL`, rahasia admin, koneksi MySQL, `MAIL_*`, dan nomor WhatsApp. Jalankan `composer install --no-dev --optimize-autoloader`, `npm ci && npm run build`, `php artisan migrate --force`, `php artisan storage:link`, `php artisan config:cache`, `php artisan route:cache`, dan `php artisan view:cache`. Web server harus mengarah ke direktori `public/`; beri izin tulis pada `storage/` dan `bootstrap/cache/`, aktifkan HTTPS, dan siapkan backup database serta media.

## Keputusan MVP

- Tidak ada checkout, cart, pembayaran, akun pelanggan, atau blog.
- Placeholder visual memakai `placehold.co`; gambar yang diunggah admin disimpan pada disk public dan dibatasi JPG/PNG/WebP hingga 2 MB.
- Produk/event memakai identifier numerik pada halaman detail kecuali produk yang memakai slug, mengikuti kebutuhan MVP.
- Pelanggan dicocokkan berdasarkan email. Jika pendaftar event membatalkan status, kuota tersedia kembali.
- CSS dibangun lokal dengan Vite; Inter dimuat dari Google Fonts.
- Proyek dipertahankan di Laravel 11 sesuai brief. Masa pembaruan keamanan Laravel 11 berakhir pada 12 Maret 2026 menurut [jadwal rilis Laravel](https://laravel.com/framework/docs/releases). Composer memblokir paket lini ini karena security advisory; `audit.block-insecure=false` diperlukan untuk mereproduksi versi yang diminta. Upgrade ke lini Laravel yang masih didukung sebelum deployment internet produksi.
- Vite dinaikkan ke 6.4.4 agar dependency esbuild memakai versi yang sudah diperbaiki. `npm audit --omit=dev` tidak melaporkan kerentanan runtime; audit lengkap masih menemukan advisory pada dependency build Tailwind 3. `npm audit fix --force` akan menaikkan Tailwind ke v4 dan memerlukan migrasi konfigurasi.

## Fitur yang tersedia

Admin mengelola data dari `/admin`. Role `admin` dan `manajer` dapat masuk ke area admin; role `staf` tidak dapat. Registrasi publik dan route profil akun bawaan Breeze tidak diaktifkan.
