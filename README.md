<p align="center"><img src="si-obe.svg" width="400"></p>

## Tentang si-OBE

si-OBE adalah aplikasi web yang digunakan untuk mengelola nilai berbasis Outcame Based Education (OBE)

## Instalasi

Untuk instalasi silahkan ikuti langkah-langkah berikut:
1. Clone repository ini
2. Buka sebuah terminal dan jalankan perintah `composer install`
3. Copy file `.env.example` menjadi `.env`
4. Jalankan perintah `php artisan key:generate`
5. Buat database baru, misalkan dengan nama `si-obe`
6. Konfigurasi database di file `.env`
    - `DB_CONNECTION=mysql`
    - `DB_HOST=127.0.0.1`
    - `DB_PORT=3306`
    - `DB_DATABASE=si-obe`
    - `DB_USERNAME=username_database`
    - `DB_PASSWORD=password_database`
7. Jalankan perintah `php artisan migrate`
8. Jalankan perintah `php artisan serve` untuk menjalankan server PHP
9. Setelah berhasil menjalankan server PHP, buka terminal baru dan jalankan perintah `npm install` untuk menginstall semua dependensi yang dibutuhkan oleh aplikasi ini.
10. Kemudian jalankan perintah `npm run dev` untuk mengkompilasi semua file yang dibutuhkan oleh aplikasi ini. 
11. Buka browser dan akses `http://localhost:8000`

## Lisensi

Aplikasi si-OBE adalah sebuah perangkat lunak open-source dibawah lisensi [MIT license](https://github.com/andrisan/si-obe/blob/main/LICENSE).
