# Hari ke 6 — Role Management (Admin, Editor, User)

## 🎯 Tujuan Pembelajaran

Setelah mempelajari materi ini peserta mengerti konsep dan mampu merancang role-based access control (RBAC) sederhana untuk aplikasi web berbasis PHP & MySQL. Secara spesifik peserta dapat :

- Menjelaskan perbedaan authentication dan authorization.

- Mendesain skema database untuk menyimpan user, role, dan (opsional) permission.

- Membuat alur login yang mengikat role ke session.

- Menentukan kontrol akses (middleware/check) untuk halaman admin/editor/user.

- Menyusun halaman UI & flow untuk role management (CRUD role + assign role ke user).

- Mengenali isu keamanan umum dan mitigasinya.

---

### 1. authentication vs authorization

- authentication = memverifikasi identitas (login dengan username/email + password).

- authorization = memeriksa apakah user yang sudah terautentikasi boleh melakukan aksi/akses resource tertentu (role/permission) atau proses menentukan apa yang boleh dilakukan user berdasarkan role-nya.

Contoh authorization :

- admin boleh mengubah role pengguna lain.

- editor boleh membuat atau mengedit artikel.

- user hanya bisa membaca artikel dan menulis komentar.

### 2. Role-Based Access Control (RBAC)

- Role = label/kelompok (contoh: admin, editor, user).

- Permission (opsional) = granular action (mis. create_article, edit_article, delete_user).

- Implementasi sederhana: setiap user diberi satu role; role menentukan halaman/menu/aksi yang boleh diakses.

| Role       | Hak Akses                                                   |
| ---------- | ----------------------------------------------------------- |
| **Admin**  | Akses penuh ke semua fitur (user, artikel, komentar, role). |
| **Editor** | Kelola artikel & komentar.                                  |
| **User**   | Baca artikel, komentar, dan ubah profil sendiri.            |

### 3. Struktu Database

Tabel utama yang digunakan adalah `users`:

| Field           | Type                          | Keterangan                                           |
| --------------- | ----------------------------- | ---------------------------------------------------- |
| `id`            | INT                           | Primary key, auto increment                          |
| `name`          | VARCHAR(150)                  | Nama lengkap pengguna                                |
| `email`         | VARCHAR(150)                  | Alamat email unik                                    |
| `password_hash` | VARCHAR(255)                  | Password terenkripsi (menggunakan `password_hash()`) |
| `role`          | ENUM('admin','editor','user') | Menentukan hak akses pengguna                        |
| `created_at`    | DATETIME                      | Waktu registrasi, default `CURRENT_TIMESTAMP`        |

Default role untuk user baru adalah `user`.

### 4. 📁 Integrasi ke Struktur Folder

Struktur yang kita miliki:

```pgsql
app/
  ├── auth.php
  ├── db.php
  ├── process_login.php
  ├── process_register.php
  └── functions.php

public/
  ├── admin/
  │    ├── articles/
  │    ├── komentar.php
  │    ├── role_management.php  ← halaman baru
  │    └── admin_dashboard.php
  └── users/
       ├── users_dashboard.php
       ├── likes.php
       └── comments.php
```

### 5. 🧩 Mekanisme Login dan Session

Ketika user berhasil login:

```php
$_SESSION['user'] = [
  'id' => $user['id'],
  'name' => $user['name'],
  'email' => $user['email'],
  'role' => $user['role']
];
```

Data ini akan digunakan untuk menentukan akses halaman.

### 6. 🔐 Fungsi Helper di app/auth.php

```php
function is_logged_in() {
  return isset($_SESSION['user']);
}

function current_user() {
  return $_SESSION['user'] ?? null;
}

function require_login() {
  if (!is_logged_in()) {
    header('Location: /public/login.php');
    exit;
  }
}

function require_role($role) {
  require_login();
  $user = current_user();
  if ($user['role'] !== $role) {
    http_response_code(403);
    echo "403 Forbidden — Anda tidak memiliki akses ke halaman ini.";
    exit;
  }
}

function require_any_role(array $roles) {
  require_login();
  $user = current_user();
  if (!in_array($user['role'], $roles)) {
    http_response_code(403);
    echo "403 Forbidden — Akses dibatasi.";
    exit;
  }
}

// Shortcut
function require_admin() {
  require_role('admin');
}
```

### 7. 🧱 Halaman Role Management

File: `public/admin/role_management.php`

**Tujuan:**

- Menampilkan daftar semua user dan role-nya.

- Admin dapat mengubah role user lain (misal dari `user` menjadi `editor`).

**Alur:**

- Hanya admin yang bisa membuka halaman ini → gunakan `require_admin()`.

- Tampilkan data user dari tabel `users`.

- Setiap baris memiliki dropdown untuk memilih role (`admin`, `editor`,`user`).

- Saat disimpan, data dikirim ke `app/process_update_role.php`.

### 8. Role Checking Flow

| Halaman                      | Admin | Editor | User |
| ---------------------------- | :---: | :----: | :--: |
| `/admin/admin_dashboard.php` |  ✅   |   ❌   |  ❌  |
| `/admin/articles/create.php` |  ✅   |   ✅   |  ❌  |
| `/admin/role_management.php` |  ✅   |   ❌   |  ❌  |
| `/users/users_dashboard.php` |  ✅   |   ✅   |  ✅  |
