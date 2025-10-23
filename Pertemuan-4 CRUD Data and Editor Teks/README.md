# 🧩 Hari 4 — CRUD Artikel (Admin) + Editor Teks

## 🎯 Tujuan Pembelajaran

Setelah sesi ini, peserta diharapkan dapat:

- Memahami konsep CRUD (Create, Read, Update, Delete) dalam konteks web app.

- Mampu merancang fitur manajemen artikel untuk admin.

- Memahami struktur dan alur routing/controller sederhana pada PHP.

- Mengetahui cara mengintegrasikan rich text editor (TinyMCE/CKEditor) ke form artikel.

- Menerapkan validasi input, sanitasi output, dan keamanan XSS dasar.

- Memahami konsep pagination (pembagian halaman) untuk list artikel.

---

### 🧠 1. Konsep CRUD di Web App

CRUD adalah singkatan dari:

| Operasi    | Keterangan                        | Aksi di PHP |
| ---------- | --------------------------------- | ----------- |
| **Create** | Menambahkan data baru ke database | `INSERT`    |
| **Read**   | Menampilkan data dari database    | `SELECT`    |
| **Update** | Mengubah data yang sudah ada      | `UPDATE`    |
| **Delete** | Menghapus data dari database      | `DELETE`    |

Dalam aplikasi web:

- Admin memiliki hak untuk melakukan keempat operasi.

- User (biasa) hanya melihat daftar artikel (READ).

### 🧩 2. Struktur Tabel articles

Sebelum CRUD, pastikan kita punya tabel articles di database.

Contoh struktur tabel dasar:

```sql
CREATE TABLE articles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  featured_image VARCHAR(255) DEFAULT NULL,
  author_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (author_id) REFERENCES users(id)
);
```

### 🧭 3. Routing & Controller Sederhana

Di PHP tanpa framework, kita biasanya menggunakan satu file per aksi (page) atau front controller kecil.

📁 Contoh struktur sederhana:

```css
/public/admin/
 ├── articles_list.php      → tampilkan daftar artikel
 ├── articles_create.php    → form tambah artikel
 ├── articles_edit.php      → form edit artikel
 ├── articles_delete.php    → aksi hapus artikel
 ├── uploads/               → folder upload gambar
```

Setiap file bertanggung jawab atas 1 fungsi CRUD.
Bisa juga digabung dengan `switch` pada satu `index.php` kalau ingin pola front controller.

### 🖋️ 4. Form Create/Edit Artikel

Form berisi:

- Judul (`input type="text"`)

- Isi artikel (`textarea` → diubah jadi editor teks)

- Upload gambar (opsional)

- Tombol submit

Contoh konsep field:

```html
<form method="POST" enctype="multipart/form-data">
  <label>Judul</label>
  <input type="text" name="title" class="border p-2 w-full" required />

  <label>Isi Artikel</label>
  <textarea name="content" id="editor"></textarea>

  <label>Gambar Utama (Opsional)</label>
  <input type="file" name="featured_image" accept="image/*" />

  <button type="submit" class="bg-indigo-600 text-white px-4 py-2 mt-3 rounded">
    Simpan
  </button>
</form>
```

### 🧰 5. Integrasi Rich Text Editor (TinyMCE / CKEditor)

Agar admin bisa menulis artikel dengan format (bold, heading, list, dsb), gunakan editor teks modern.

🔹 Integrasi TinyMCE (contoh)

Tambahkan script CDN di bawah form:

```html
<script
  src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"
  referrerpolicy="origin"
></script>
<script>
  tinymce.init({
    selector: "#editor",
    height: 400,
    plugins: "image link media table code lists",
    toolbar:
      "undo redo | styles | bold italic underline | bullist numlist | link image | code",
    menubar: false,
  });
</script>
```

Dengan ini, `<textarea>` akan otomatis menjadi editor WYSIWYG.

### 🧮 6. Validasi dan Sanitasi Input

Sebelum menyimpan data dari form :

- Pastikan judul dan isi tidak kosong.

- Gunakan prepared statement (mysqli / PDO) untuk mencegah SQL Injection.

- Simpan path gambar bukan file base64.

- Saat menampilkan kembali artikel di frontend:

  - Gunakan `htmlspecialchars()` untuk teks biasa.

  - Untuk konten artikel dari editor, pastikan aman dari XSS (gunakan whitelist tag atau library filter).

Contoh validasi sederhana:

```php
$title = trim($_POST['title']);
$content = trim($_POST['content']);

if (empty($title) || empty($content)) {
    $error = "Judul dan isi artikel wajib diisi!";
} else {
    // proses insert/update ke database
}
```

### 🗂️ 7. Upload Gambar Featured

Gunakan form `enctype="multipart/form-data"` agar bisa upload file.

Langkah umum:

- Cek apakah file dikirim (`$\_FILES['featured_image']`).

- Validasi ekstensi (`jpg`, `png`, `jpeg`).

- Simpan file ke folder `uploads/` dan simpan nama file di database.

contoh :

```php
$targetDir = __DIR__ . "/uploads/";
$fileName = basename($_FILES["featured_image"]["name"]);
$targetFile = $targetDir . $fileName;

move_uploaded_file($_FILES["featured_image"]["tmp_name"], $targetFile);
```

### 📋 8. Pagination Dasar

Kalau jumlah artikel banyak, tampilkan secara bertahap (misal 5 per halaman).

Rumus umum :

```php
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$query = "SELECT * FROM articles ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
```

Untuk tombol navigasi :

```html
<a href="?page=1">1</a> <a href="?page=2">2</a>
```

Gunakan COUNT untuk menghitung total artikel agar bisa menampilkan jumlah halaman total.

### 🔒 9. Keamanan dan Akses

- Pastikan semua file CRUD hanya bisa diakses oleh admin (`require_admin()` dari `Auth.php`).

- Semua aksi (`create`, `edit`, `delete`) harus menggunakan method POST, bukan GET.

- Tambahkan konfirmasi sebelum hapus.

### 🧱 10. Alur CRUD

| Aksi   | File                  | Fungsi                                |
| ------ | --------------------- | ------------------------------------- |
| Create | `articles_create.php` | Form + insert data ke DB              |
| Read   | `articles_list.php`   | Tampilkan daftar artikel + pagination |
| Update | `articles_edit.php`   | Edit data berdasarkan ID              |
| Delete | `articles_delete.php` | Hapus data berdasarkan ID             |

## Kesimpulan

- CRUD adalah dasar semua aplikasi web dinamis.

- Gunakan form HTML, prepared statement, dan validasi input.

- Gunakan editor teks seperti TinyMCE agar konten lebih menarik.

- Selalu perhatikan keamanan (SQL Injection & XSS).

- Pisahkan area publik dan admin agar sistem lebih terstruktur.

### Buat tabel articles untuk CRUD

```sql
CREATE TABLE articles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  slug VARCHAR(255) NOT NULL UNIQUE,
  content MEDIUMTEXT NOT NULL,
  featured_image VARCHAR(255) DEFAULT NULL,
  author_id INT DEFAULT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

- `slug` berguna untuk URL (buat dari judul).

- `featured_image` simpan nama file (path relatif, mis. `uploads/abcd.jpg`).

- `author_id` referensi ke `users` (boleh NULL).
