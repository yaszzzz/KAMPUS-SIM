# Kampus SIM

Kampus SIM adalah aplikasi web sederhana untuk mengelola data akademik kampus. Aplikasi ini dibuat dengan Laravel 12, Blade, Vite, dan Tailwind CSS.

## Fitur

- Dashboard ringkasan jumlah mahasiswa, program studi, mata kuliah, dan KRS.
- Manajemen program studi.
- Manajemen mata kuliah berdasarkan program studi.
- Manajemen data mahasiswa.
- Manajemen KRS mahasiswa, termasuk tambah dan hapus detail mata kuliah.
- Cetak KRS.
- Autentikasi sederhana dengan akun admin hasil seeder.

## Teknologi

- PHP 8.2 atau lebih baru
- Laravel 12
- SQLite secara default, bisa diganti ke MySQL/MariaDB/PostgreSQL/SQL Server melalui `.env`
- Node.js dan npm
- Vite
- Tailwind CSS 4

## Persyaratan

Pastikan sudah tersedia:

- PHP 8.2+
- Composer
- Node.js dan npm
- Ekstensi PHP yang umum dibutuhkan Laravel, termasuk `pdo`, `mbstring`, `openssl`, `tokenizer`, `xml`, dan `ctype`

## Instalasi

Clone repository, lalu masuk ke folder proyek.

```bash
git clone <url-repository>
cd kampus-sim
```

Install dependency PHP dan JavaScript.

```bash
composer install
npm install
```

Salin konfigurasi environment dan buat application key.

```bash
cp .env.example .env
php artisan key:generate
```

Jika menggunakan SQLite, buat file database.

```bash
touch database/database.sqlite
```

Jalankan migration dan seeder.

```bash
php artisan migrate --seed
```

Jalankan aplikasi.

```bash
php artisan serve
npm run dev
```

Aplikasi dapat dibuka di:

```text
http://127.0.0.1:8000
```

## Akun Login

Seeder membuat akun admin berikut:

```text
Email    : admin@kampus.ac.id
Password : password
```

Halaman utama menyediakan simulasi login yang otomatis masuk sebagai admin jika akun tersebut tersedia.

## Perintah Penting

Menjalankan server Laravel:

```bash
php artisan serve
```

Menjalankan Vite untuk development:

```bash
npm run dev
```

Build asset production:

```bash
npm run build
```

Menjalankan test:

```bash
php artisan test
```

Menjalankan semua proses development dari script Composer:

```bash
composer run dev
```

## Struktur Proyek

```text
app/Http/Controllers/     Controller untuk Prodi, Mata Kuliah, Mahasiswa, dan KRS
app/Models/               Model Eloquent aplikasi
database/migrations/      Skema tabel database
database/factories/       Factory data dummy
database/seeders/         Seeder data awal
resources/views/          Template Blade
routes/web.php            Definisi rute web
public/images/            Asset gambar publik
```

## Rute Utama

| Rute | Keterangan |
| --- | --- |
| `/` | Halaman awal |
| `/dashboard` | Dashboard setelah login |
| `/prodis` | Data program studi |
| `/mata-kuliah` | Data mata kuliah |
| `/mahasiswas` | Data mahasiswa |
| `/krs` | Data KRS |
| `/krs/{krs}/print` | Cetak KRS |

Sebagian besar rute aplikasi berada di dalam middleware `auth`, sehingga pengguna harus login terlebih dahulu.

## Catatan Database

Konfigurasi default Laravel di proyek ini memakai SQLite:

```env
DB_CONNECTION=sqlite
```

Untuk memakai database lain, ubah nilai koneksi di `.env`, lalu sesuaikan `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD`.

## Lisensi

Proyek ini menggunakan lisensi MIT. Lihat file `LICENSE` untuk detail.
