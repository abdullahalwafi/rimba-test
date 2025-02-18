# User API

API ini dibuat menggunakan Laravel 11 untuk mengelola data pengguna. API ini mendukung operasi CRUD (Create, Read, Update, Delete) dan telah dilengkapi dengan dokumentasi menggunakan Swagger.

## 🚀 **Fitur API**
- **GET /api/users** → Mendapatkan daftar semua pengguna.
- **POST /api/users** → Menambahkan pengguna baru.
- **GET /api/users/{id}** → Mendapatkan detail pengguna berdasarkan ID.
- **PUT /api/users/{id}** → Memperbarui data pengguna.
- **DELETE /api/users/{id}** → Menghapus pengguna.

## 📜 **Dokumentasi API**
Dokumentasi Swagger tersedia di:  
🔗 **[API Documentation](https://rimba.alwafisysdev.tech/api/documentation)**

## 🌍 **Deploy API**
API ini telah dideploy ke Vercel dan dapat diakses melalui:  
🔗 **[User API Live](https://rimba.alwafisysdev.tech)**

---

## 💻 **Cara Menjalankan Secara Lokal**
Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lokal.

### 1️⃣ **Clone Repository**
```sh
git clone https://github.com/abdullahalwafi/rimba-test.git
cd rimba-test
cp .env.example .env
php artisan key:generate
composer install

```

### 2️⃣ **Konfigurasi Environment**
Buat file .env dan sesuaikan konfigurasi database:
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```
