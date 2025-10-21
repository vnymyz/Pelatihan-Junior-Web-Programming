<?php
// _header.php - Tailwind
$current = basename($_SERVER['PHP_SELF']); // deteksi file aktif
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Blog Kampus Epic</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
      .page-container { max-width: 1100px; margin-left: auto; margin-right: auto; }
    </style>
  </head>
  <body class="min-h-screen flex flex-col bg-gray-50 text-gray-800">
    <header class="bg-indigo-600 text-white shadow">
      <div class="page-container px-4 py-4 flex items-center justify-between">
        <a href="index.php" class="text-xl font-semibold">Kampus Epic</a>

        <nav class="space-x-4">
          <a href="index.php"
             class="<?= $current === 'index.php' ? 'font-semibold  text-white' : 'hover: opacity-90' ?>">
            Beranda
          </a>

          <a href="articles.php"
             class="<?= $current === 'articles.php' ? 'font-semibold  text-white' : 'hover: opacity-90' ?>">
            Artikel
          </a>

          <a href="about.php"
             class="<?= $current === 'about.php' ? 'font-semibold  text-white' : 'hover: opacity-90' ?>">
            Tentang
          </a>

          <a href="contact.php"
             class="<?= $current === 'contact.php' ? 'font-semibold  text-white' : 'hover: opacity-90' ?>">
            Kontak
          </a>
          
          <!-- login register (auth) -->
            <a href="register.php" class="<?= $current === 'register.php' ? 'font-semibold text-white' : 'hover:opacity-90' ?>">Daftar</a>
            <a href="login.php" class="<?= $current === 'login.php' ? 'font-semibold text-white' : 'hover:opacity-90' ?>">Login</a>
        </nav>
      </div>
    </header>

    <main class="flex-grow page-container px-4 py-8">
