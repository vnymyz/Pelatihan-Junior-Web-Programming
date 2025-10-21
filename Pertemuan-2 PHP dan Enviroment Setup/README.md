# 🧑‍💻 Hari 2 — PHP Dasar, Environment Setup, dan Struktur Project

## 🎯 Tujuan Pembelajaran

Pada akhir sesi ini peserta diharapkan dapat:

- Menyiapkan environment untuk menjalankan PHP dan MySQL
- Memahami dasar sintaks PHP (variable, array, function, include)
- Membuat struktur project sederhana tanpa framework
- Membuat koneksi PHP ke database MySQL
- Membuat form kontak yang dapat menyimpan data ke database

---

## 🛠️ 1. Persiapan Environment

### A. Instalasi Tools

1. **XAMPP / Laragon **

- Install Laragon atau XAMPP :
  - Laragon (untuk project disimpan dalam folder `\www`) : https://laragon.org/download - Video Link -> https://www.youtube.com/watch?v=61J-8HiV5tU&t=22s
  - XAMPP (untuk project disimpan dalam folder `\htdocs`) : https://www.apachefriends.org/download.html - Video Link -> https://www.youtube.com/watch?v=UjAbsItMPRY
- Pastikan Apache dan MySQL aktif.
- Akses `http://localhost` untuk memeriksa apakah server aktif.

2. **VS Code**
   - Install ekstensi berikut:
     - PHP Intelephense
     - PHP Server (opsional)
     - MySQL (by Jun Han)
3. **Browser**
   - Disarankan: Chrome / Edge / Firefox.

---

## 🗂️ 2. Struktur Folder Project

Kita akan membuat struktur sederhana seperti ini:

```bash
blog-project/
│
├── app/
│ ├── functions.php
│ ├── db.php
│ └── process_contact.php
│
├── config/
│ └── config.php
│
├── public/
│ ├── index.php
│ ├── contact.php
│ ├── about.php
│ └── assets/
│ ├── css/
│ └── js/
│
└── README.md
```

💡 **Catatan:** Folder `public/` akan berisi semua file yang diakses browser.

---

## 🧩 3. Dasar Sintaks PHP

### A. Menulis kode PHP

Buat file baru di `public/index.php`

```php
<?php
  echo "Hello World!";
?>
```

### B. Variable dan Tipe Data

```php
<?php
  $nama = "Budi";
  $umur = 21;
  $is_active = true;

  echo "Nama saya $nama, umur $umur tahun";
?>
```

### C. Array dan Associative Array

```php
<?php
  $buah = ["Apel", "Jeruk", "Mangga"];
  $user = [
    "nama" => "Siti",
    "email" => "siti@example.com"
  ];

  echo $buah[1]; // Jeruk
  echo $user["email"]; // siti@example.com
?>
```

### D. Function

```php
<?php
  function greet($nama) {
    return "Halo, $nama!";
  }

  echo greet("Andi");
?>
```

### E. Include dan Require

Gunakan include agar kode dapat dipisahkan ke beberapa file.

```php
<?php
  include '../app/functions.php';
  include '../config/config.php';
?>
```

## 4. Handling Form (GET dan POST)

### A. Form HTML

Buat file `public/contact.php`

```html
<form action="../app/process_contact.php" method="POST">
  <label>Nama:</label>
  <input type="text" name="nama" required /><br />

  <label>Email:</label>
  <input type="email" name="email" required /><br />

  <label>Pesan:</label>
  <textarea name="pesan" required></textarea><br />

  <button type="submit">Kirim</button>
</form>
```

### B. Proses Form di PHP

Buat file `app/process_contact.php`

```php
<?php
include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = htmlspecialchars($_POST['nama']);
  $email = htmlspecialchars($_POST['email']);
  $pesan = htmlspecialchars($_POST['pesan']);

  $query = "INSERT INTO contacts (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

  if (mysqli_query($conn, $query)) {
    echo "Pesan berhasil dikirim!";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}
?>
```

## 5. Koneksi ke MySQL

### A. Buat Database dan Tabel

Masuk ke phpMyAdmin (http://localhost/phpmyadmin) lalu jalankan SQL berikut:

```sql
CREATE DATABASE blog_project;

USE blog_project;

CREATE TABLE contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100),
  email VARCHAR(100),
  pesan TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### B. File Koneksi (config/config.php)

```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>
```

### 6. Menjalankan Project

1. Simpan folder blog-project di htdocs (jika pakai XAMPP). Di www jika menggunakan laragon.

2. Jalankan Apache dan MySQL.

3. Buka browser dan akses:

```ruby
http://localhost/nama-project/public/contact.php
```

4. Isi form → klik kirim → data tersimpan ke tabel contacts.
