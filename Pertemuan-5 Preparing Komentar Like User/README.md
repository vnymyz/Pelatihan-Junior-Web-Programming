# 🧭 Hari 5 — Halaman Publik: Blog List, Detail, Search & Frontend Polish

## 🎯 Tujuan Pembelajaran

Setelah sesi ini, peserta mampu:

- Memahami konsep pengambilan data (query) dari database MySQL untuk ditampilkan ke halaman publik.

- Menampilkan artikel di homepage, list artikel, dan halaman detail artikel.

- Membuat fitur pencarian artikel menggunakan LIKE.

- Menerapkan pagination (limit dan offset) agar tampilan artikel rapi dan efisien.

- Mengetahui dasar SEO dan URL friendly (slug).

- Memahami integrasi dengan Tailwind CSS untuk desain responsif dan profesional.

### 🧩 1. Konsep Halaman Publik Blog

Sebuah blog atau artikel publik umumnya memiliki tiga komponen utama :
| Halaman | Deskripsi | Contoh fitur |
| ----------------------------- | ------------------------------------------------------------------------- | ----------------------------------------------------- |
| **Home** | Halaman utama website, biasanya menampilkan artikel terbaru atau populer. | Highlight artikel terbaru, tombol “Baca Selengkapnya” |
| **Blog List (Articles Page)** | Menampilkan daftar artikel yang diambil dari database. | Pencarian (`search`), pagination |
| **Article Detail** | Menampilkan isi artikel berdasarkan `id` atau `slug`. | Tanggal, penulis, isi HTML aman, form komentar |

Semua halaman ini bersumber dari tabel articles di MySQL, misalnya :

```sql
CREATE TABLE articles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  slug VARCHAR(255),
  body TEXT,
  author VARCHAR(100),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

### 🧠 2. Query MySQL untuk Halaman Publik

#### a. Menampilkan List Artikel

Konsep:

- Gunakan SELECT untuk mengambil beberapa baris data.

- Urutkan berdasarkan waktu terbaru (ORDER BY created_at DESC).

- Batasi jumlah data per halaman (LIMIT).

Contoh Query :

```sql
SELECT * FROM articles
ORDER BY created_at DESC
LIMIT 9;
```

#### b. Pagination (Limit dan Offset)

Pagination memungkinkan pengguna melihat data sedikit demi sedikit.

Rumus umum:

```ini
OFFSET = (page - 1) * perPage
```

Contoh :

```sql
SELECT * FROM articles
ORDER BY created_at DESC
LIMIT 9 OFFSET 18;  -- artinya tampilkan mulai artikel ke-19
```

#### c. Menampilkan Detail Artikel

Untuk halaman artikel tunggal :

```sql
SELECT * FROM articles WHERE id = 5;
```

Atau jika menggunakan slug (URL friendly) :

```sql
SELECT * FROM articles WHERE slug = 'belajar-php-untuk-pemula';
```

#### d. Pencarian Artikel (Search)

Konsep :

- Gunakan operator LIKE untuk mencari kata kunci pada kolom title atau body.

Contoh :

```sql
SELECT * FROM articles
WHERE title LIKE '%php%'
ORDER BY created_at DESC;
```

Gunakan `%` di depan dan belakang keyword agar pencarian fleksibel.
Hindari query langsung dari input tanpa filter — nanti kita bahas prepared statements.

### 🌐 3. SEO Dasar & URL Friendly (Slug)

#### a. Apa itu Slug?

Slug adalah versi ramah-URL dari judul artikel.

Contoh :

| Judul Asli               | Slug                   |
| ------------------------ | ---------------------- |
| Belajar PHP Dasar        | belajar-php-dasar      |
| Tips & Trik Tailwind CSS | tips-trik-tailwind-css |

Slug:

- Tidak boleh ada spasi.

- Huruf kecil semua.

- Gunakan tanda - sebagai pemisah.

#### b. Meta Tags untuk SEO

Di setiap halaman artikel, sertakan:

```html
<meta
  name="description"
  content="Belajar PHP dasar dengan contoh kode sederhana."
/>
<meta name="keywords" content="PHP, tutorial, pemrograman web" />
<meta property="og:title" content="Belajar PHP Dasar" />
<meta property="og:type" content="article" />
```

Tujuannya agar halaman mudah ditemukan di Google dan tampil bagus saat dibagikan di media sosial.

### 🎨 4. Integrasi UI Framework: Tailwind CSS

#### a. Mengapa Tailwind?

Tailwind CSS membantu membuat tampilan cepat dan konsisten dengan utility classes tanpa menulis CSS dari nol.

Contoh card artikel:

```html
<div
  class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition"
>
  <img src="cover.jpg" alt="cover" class="w-full h-48 object-cover" />
  <div class="p-4">
    <h3 class="text-xl font-semibold mb-2">Belajar PHP Dasar</h3>
    <p class="text-gray-600 text-sm mb-3">
      Pelajari dasar-dasar pemrograman PHP...
    </p>
    <a
      href="article-detail.php?slug=belajar-php-dasar"
      class="text-indigo-600 font-medium hover:underline"
      >Baca Selengkapnya</a
    >
  </div>
</div>
```

#### b. Elemen UI yang akan digunakan:

- Navbar → navigasi ke Home, Articles, About, Contact.

- Cards → untuk daftar artikel.

- Search bar → input keyword.

- Pagination UI → tombol navigasi antar halaman.

- Responsive layout → grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3.

### 🧱 5. Struktur Halaman Frontend

#### a. Home Page

- Tampilkan highlight artikel terbaru (1-3 artikel teratas).

- Sisanya di bawah dalam bentuk card grid.

- CTA: “Baca Selengkapnya”.

#### b. Blog List Page

- Tampilkan daftar artikel lengkap.

- Ada search bar di atas.

- Gunakan pagination.

- Tiap artikel punya tombol detail.

#### c. Article Detail Page

- Tampilkan judul, tanggal, author, isi artikel.

- Render isi artikel yang disimpan dalam format HTML.

- Tambahkan form komentar (UI saja dulu).

Contoh struktur dasar :

```html
<article class="max-w-3xl mx-auto mt-10">
  <h1 class="text-3xl font-bold mb-2">Judul Artikel</h1>
  <p class="text-gray-500 mb-6">Oleh Admin • 24 Oktober 2025</p>
  <div class="prose max-w-none">
    <!-- isi artikel di sini -->
  </div>

  <hr class="my-8" />

  <form class="mt-6">
    <h3 class="text-lg font-semibold mb-3">Tinggalkan Komentar</h3>
    <textarea
      class="w-full border rounded-lg p-3"
      rows="4"
      placeholder="Tulis komentar..."
    ></textarea>
    <button
      class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700"
    >
      Kirim
    </button>
  </form>
</article>
```

### 🧩 6. Alur Data dari Backend ke Frontend

1. PHP mengambil data dari MySQL menggunakan mysqli / PDO.

2. Data disimpan dalam array associative.

3. Data di-loop dalam HTML menggunakan foreach.

4. Tailwind digunakan untuk styling.

Gambaran :

```php
<?php
require_once '../config/config.php';

$result = $conn->query("SELECT * FROM articles ORDER BY created_at DESC LIMIT 6");
$articles = $result->fetch_all(MYSQLI_ASSOC);
?>
```

Kemudian di HTML :

```html
<?php foreach ($articles as $a): ?>
<div class="card">
  <h3><?= htmlspecialchars($a['title']) ?></h3>
  <p><?= substr(strip_tags($a['body']), 0, 100) ?>...</p>
</div>
<?php endforeach; ?>
```

### 🧭 7. Kesimpulan

| Konsep                          | Tujuan                     | Contoh                  |
| ------------------------------- | -------------------------- | ----------------------- |
| `SELECT ... ORDER BY ... LIMIT` | Menampilkan daftar artikel | List blog               |
| `OFFSET`                        | Pagination                 | Halaman berikutnya      |
| `LIKE '%keyword%'`              | Search sederhana           | Pencarian artikel       |
| `slug`                          | URL friendly               | `/articles/belajar-php` |
| Tailwind                        | Styling cepat              | Grid, card, form        |

## Hands On Komentar dan Like for User

tabel untuk likes user :

```sql
-- tabel likes: simpan like per (article_id, user_id)
CREATE TABLE IF NOT EXISTS likes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  article_id INT NOT NULL,
  user_id INT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uniq_article_user (article_id, user_id),
  INDEX idx_article (article_id),
  INDEX idx_user (user_id),
  FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

tabel untuk komentar user :

```sql
CREATE TABLE IF NOT EXISTS comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  article_id INT NOT NULL,
  user_id INT NULL,
  body TEXT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  is_approved TINYINT(1) DEFAULT 1,
  FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
  INDEX idx_article (article_id),
  INDEX idx_user (user_id)
);
```
