<?php
$base = '/Pert4-web-blog/public'; // sesuaikan dengan folder public di URL-mu
?>
<aside class="w-64 bg-white border-r hidden md:block">
  <div class="p-6">
    <a href="<?= $base ?>/admin/admin_dashboard.php" class="text-lg font-semibold text-indigo-600">Kampus Epic — Admin</a>
  </div>

  <nav class="px-4 py-6 space-y-2">
    <a href="<?= $base ?>/admin/admin_dashboard.php" class="block px-3 py-2 rounded hover:bg-indigo-50 <?= basename($_SERVER['PHP_SELF']) === 'admin_dashboard.php' ? 'bg-indigo-50 font-semibold' : '' ?>">Dashboard</a>
    <a href="<?= $base ?>/admin/articles/index.php" class="block px-3 py-2 rounded hover:bg-indigo-50">Kelola Artikel</a>
    <a href="#" class="block px-3 py-2 rounded hover:bg-indigo-50">Komentar</a>
    <a href="<?= $base ?>/logout.php" class="block px-3 py-2 rounded hover:bg-indigo-50 text-red-600">Logout</a>
  </nav>

  <div class="p-4 border-t text-sm text-gray-600">
    <div>Signed in as</div>
    <div class="font-medium mt-1"><?= e($_SESSION['user_name'] ?? '') ?></div>
    <div class="text-xs text-gray-500">Role: <?= e($_SESSION['user_role'] ?? '') ?></div>
  </div>

  <div class="border-t p-4 text-sm text-gray-600 space-y-3">
    <a href="<?= $base ?>/index.php" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-indigo-50 text-gray-700 transition">
      <!-- svg -->
      <span>Kembali Halaman Utama</span>
    </a>
  </div>
</aside>
