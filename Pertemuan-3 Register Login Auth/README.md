# 🧩 Hari 3 — Database Design & User Authentication (Register/Login)

## 🎯 Tujuan Pembelajaran

Setelah sesi ini, peserta diharapkan dapat:

- Mendesain skema database untuk sistem autentikasi sederhana.

- Memahami konsep user authentication menggunakan PHP & MySQL.

- Mengetahui cara kerja password hashing, session handling, dan role-based access control (RBAC).

---

### 🧱 1. Database Design

#### a. Apa itu Database Design?

Database design adalah proses merancang struktur tabel agar data tersimpan dengan efisien dan mudah digunakan.

Langkah umum:

1. Identifikasi entitas (misal: user, artikel, komentar).

2. Tentukan atribut tiap entitas.

3. Definisikan hubungan antar tabel (relasi).

#### b. Contoh Struktur Tabel: users

| Kolom         | Tipe Data            | Keterangan                  |
| ------------- | -------------------- | --------------------------- |
| id            | INT (AI, PK)         | Primary key, auto increment |
| name          | VARCHAR(100)         | Nama lengkap user           |
| email         | VARCHAR(100)         | Email unik user             |
| password_hash | VARCHAR(255)         | Password yang sudah di-hash |
| role          | ENUM('user','admin') | Role untuk hak akses        |
| created_at    | DATETIME             | Waktu pembuatan akun        |

#### c. SQL: Membuat Tabel users

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('user', 'admin') DEFAULT 'user',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

### 🧩 2. Password Hashing

#### a. Mengapa Tidak Menyimpan Password Asli?

Password asli (plaintext) sangat berbahaya jika database bocor.

Solusi: simpan hasil hashing (bukan password asli).

#### b. Fungsi PHP: password_hash() dan password_verify()

Membuat hash saat register:

```php
$password_hash = password_hash($password, PASSWORD_DEFAULT);
```

Memverifikasi password saat login:

```php
if (password_verify($inputPassword, $row['password_hash'])) {
  echo "Login sukses!";
}
```

#### c. Keunggulan Password Hashing

- Otomatis menggunakan algoritma kuat (bcrypt/argon2).

- Termasuk salt otomatis (mencegah rainbow table attack).

### 🧠 3. Session Handling

#### a. Apa itu Session?

Session adalah cara PHP menyimpan data sementara di server untuk mengingat user yang sedang login.

- Data session disimpan di server.

- Browser hanya menyimpan session ID (via cookie).

#### b. Dasar Penggunaan Session

```php
// Mulai session di awal halaman
session_start();

// Menyimpan data
$_SESSION['user_id'] = $user['id'];
$_SESSION['role'] = $user['role'];

// Menghapus data (logout)
session_unset();
session_destroy();
```

### 🔒 4. Middleware Proteksi Halaman

#### a. Apa itu Middleware?

Middleware adalah "lapisan pengaman" yang memeriksa apakah user sudah login sebelum mengakses halaman tertentu.

#### b. Contoh Middleware Sederhana

```php
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
?>
```

Diletakkan di awal file halaman yang butuh proteksi, misalnya `admin.php.`

### 🧑‍💻 5. Role-Based Access Control (RBAC)

#### a. Pengertian

Role-based access control (RBAC) membatasi akses berdasarkan peran user (misalnya admin dan user).

#### b. Contoh Logika Akses

```php
if ($_SESSION['role'] !== 'admin') {
  echo "Akses ditolak.";
  exit;
}
```

#### c. Contoh Penggunaan

- `user` hanya bisa mengedit profilnya.

- `admin` bisa mengelola seluruh data.

### 🧾 6. Logout Mechanism

#### a. Konsep

Logout berarti menghapus session agar user tidak lagi dianggap login.

#### b. Implementasi Dasar

```php
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit;
```

## 📚 Ringkasan

| Konsep            | Inti Pembahasan                                                              |
| ----------------- | ---------------------------------------------------------------------------- |
| Database Design   | Struktur tabel `users` dengan kolom penting (id, email, password_hash, role) |
| Password Hashing  | Gunakan `password_hash()` dan `password_verify()` untuk keamanan             |
| Session Handling  | Menyimpan status login sementara di server                                   |
| Middleware        | Mengecek status login sebelum akses halaman                                  |
| Role-based Access | Mengatur izin berdasarkan peran user                                         |
| Logout            | Menghapus session dan redirect ke halaman login                              |

## Hands On Website Kampus

this is just a note for me

1. buat tabel users di MySQL atau PhpMyAdmin :

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('user','admin') NOT NULL DEFAULT 'user',
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

2. Jalankan file seed_users.php untuk masukin data dummy users :

```php
<?php
// app/seed_users.php
// Jalankan sekali untuk membuat 2 akun: admin@example.com / user@example.com
// Hapus file ini setelah sukses untuk keamanan.

include __DIR__ . '/../config/config.php'; // pastikan path benar

$users = [
  ['name' => 'Admin Kampus', 'email' => 'admin@example.com', 'password' => 'admin123', 'role' => 'admin'],
  ['name' => 'User Biasa',   'email' => 'user@example.com',  'password' => 'user12345', 'role' => 'user'],
];

foreach ($users as $u) {
  // Cek apakah email sudah ada
  $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
  mysqli_stmt_bind_param($stmt, "s", $u['email']);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  if (mysqli_stmt_num_rows($stmt) > 0) {
    echo "User {$u['email']} sudah ada. <br>";
    mysqli_stmt_close($stmt);
    continue;
  }
  mysqli_stmt_close($stmt);

  $hash = password_hash($u['password'], PASSWORD_DEFAULT);
  $stmt = mysqli_prepare($conn, "INSERT INTO users (name, email, password_hash, role) VALUES (?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "ssss", $u['name'], $u['email'], $hash, $u['role']);
  $ok = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  echo $ok ? "Inserted {$u['email']} ({$u['role']})<br>" : "Gagal insert {$u['email']}<br>";
}

mysqli_close($conn);
```

jalanin dengan buka browser dan ketik lokasi file tersebut `http://localhost/Pert3-web-blog/app/seed_users.php`
