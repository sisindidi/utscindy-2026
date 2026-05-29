# 🌐 utscindy - Web Digital Portfolio & Project Documentation System

[![Laravel Version](https://img.shields.io/badge/Laravel-11.x-red.svg)](https://laravel.com)
[![Filament Version](https://img.shields.io/badge/Filament-v3-yellow.svg)](https://filamentphp.com)
[![Docker Support](https://img.shields.io/badge/Docker-Supported-blue.svg)](https://www.docker.com)

**utscindy** adalah aplikasi web personal portfolio modern yang dibangun menggunakan framework **Laravel 11**, **Livewire**, dan **Filament v3**. Proyek ini dirancang sebagai platform portofolio digital interaktif sekaligus sistem manajemen konten (CMS) untuk mendokumentasikan laporan teknis proyek-proyek sistem informasi secara terstruktur.

---

## 🎯 Tujuan Utama Proyek
1. **Pusat Informasi Portofolio:** Menyajikan profil profesional, riwayat proyek, dan formulir kontak interaktif dalam satu kesatuan antarmuka web.
2. **Manajemen Dokumen Teknis:** Mempermudah pengarsipan komponen laporan proyek (Latar Belakang, Analisis Kebutuhan, Spesifikasi Teknologi, hingga Gambar Rancangan ERD) secara dinamis via Back-End Admin.
3. **Standardisasi Lingkungan Docker:** Menyediakan konfigurasi kontainerisasi siap pakai guna memastikan aplikasi berjalan konsisten di lingkungan lokal maupun production menggunakan Docker Compose.

---

## 🚀 Fitur Utama & Struktur Halaman

### 💻 Front-End (Halaman Publik)
* **Home / About:** Menampilkan sambutan personal, deskripsi profil, foto, serta informasi kompetensi mahasiswa Sistem Informasi.
* **Project Grid:** Menampilkan katalog proyek yang dikelompokkan berdasarkan kategori khusus (seperti *Web Development, Database & Info System, Enterprise System*).
* **Dynamic Project Detail:** Halaman khusus yang membedah laporan proyek secara mendalam, mencakup:
  * **A. Latar Belakang:** Deskripsi dan urgensi digitalisasi sistem.
  * **B. Analisis & Kebutuhan Sistem:** Pemaparan analisis masalah dan poin-poin fitur utama.
  * **C. Spesifikasi Teknologi:** Detailing tech stack serta daftar perintah terminal workflow.
  * **D. Rancangan ERD:** Penayangan skema diagram hubungan entitas database.
* **Contact Form:** Form bagi pengunjung untuk mengirimkan pesan atau laporan awal langsung ke database admin.

### ⚙️ Back-End (Filament Admin Panel)
* **Profiles Management:** Mengatur data teks sambutan, nama, bio profil, dan upload foto utama.
* **Contacts & Messages Management:** Menampung dan mengelola feedback atau pesan masuk dari halaman publik.
* **Projects & Projectdetails:** Manajemen CRUD relasional untuk memperbarui katalog proyek dan isi dokumen teknis laporan.
* **Administration & Settings:** Manajemen pengguna, pengaturan Roles (hak akses), serta pencatatan log aktivitas sistem (*Activity Log*).

---

## 🛠️ Spesifikasi Tech Stack
* **Backend Framework:** Laravel 11
* **Frontend Engine:** Blade Templates, Livewire, & Tailwind CSS
* **Admin Panel Engine:** Filament v3
* **Database System:** MariaDB / MySQL
* **Development Env:** Docker Engine & WSL Ubuntu

---

## 🐳 Instruksi Setup & Menjalankan Aplikasi

Proyek ini mendukung penuh kontainerisasi untuk mempermudah proses instalasi.

### Opsi A: Menggunakan Docker Compose (Sangat Direkomendasikan 🚀)

**1. Clone Repository & Masuk ke Folder**
```bash
git clone [https://github.com/sisindidi/utscindy-2026.git](https://github.com/sisindidi/utscindy-2026.git)
cd utscindy-2026