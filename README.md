# 🚗 Sistem Manajemen Sewa Kendaraan (Web Admin & REST API)

Sebuah sistem manajemen penyewaan kendaraan berbasis Web yang dibangun menggunakan **Laravel** dan database **PostgreSQL**. Sistem ini dirancang untuk memudahkan pengelolaan armada kendaraan (mobil dan motor), kategori, serta melayani data melalui **RESTful API** untuk diintegrasikan dengan aplikasi Mobile (Frontend Flutter).

## 🛠️ Tech Stack yang Digunakan
* **Framework:** Laravel 10/11
* **Database:** PostgreSQL
* **API:** Laravel RESTful API
* **Storage:** Local Storage Linking (untuk manajemen foto kendaraan)

## ✨ Fitur Utama
1. **Web Admin Panel:**
   - Manajemen data kendaraan (Create, Read, Update, Delete).
   - Manajemen kategori kendaraan (Mobil Roda Empat, Motor Roda Dua, dll).
   - Upload dan kelola gambar kendaraan.
2. **RESTful API Endpoint:**
   - Menyediakan endpoint JSON untuk dikonsumsi oleh aplikasi mobile.
   - Endpoint `/api/kendaraan` untuk menampilkan katalog kendaraan beserta relasi kategori dan gambar.

## 🚀 Cara Instalasi & Menjalankan Proyek secara Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer lokal:

1. **Clone repository ini:**
   ```bash
   git clone [https://github.com/krisna-dwipayana/sewa-kendaraan.git](https://github.com/krisna-dwipayana/sewa-kendaraan.git)
