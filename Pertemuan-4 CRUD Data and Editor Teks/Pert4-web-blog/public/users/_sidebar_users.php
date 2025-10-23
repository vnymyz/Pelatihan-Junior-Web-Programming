<?php
// public/admin/_sidebar.php
// expects session started
?>
<!-- judul sidebar -->
<aside class="w-64 bg-white border-r hidden md:block">
  <div class="p-6">
    <a href="../users/users_dashboard.php" class="text-lg font-semibold text-indigo-600">Kampus Epic</a>
  </div>
  <!-- pilihan sidebar -->
  <nav class="px-4 py-6 space-y-2">
    <a href="users_dashboard.php" class="block px-3 py-2 rounded hover:bg-indigo-50 <?= basename($_SERVER['PHP_SELF']) === 'users_dashboard' ? 'bg-indigo-50 font-semibold' : '' ?>">Dashboard</a>
    <a href="../logout.php" class="block px-3 py-2 rounded hover:bg-indigo-50 text-red-600">Logout</a>
  </nav>
  <!-- user / admin profile -->
  <div class="p-4 border-t text-sm text-gray-600">
    <div>Signed in as</div>
    <!-- get session account -->
    <div class="font-medium mt-1"><?= e($_SESSION['user_name'] ?? '') ?></div>
    <div class="text-xs text-gray-500">Role: <?= e($_SESSION['user_role'] ?? '') ?></div>
  </div>
  <!-- Home atau index.php -->
  <div class="border-t p-4 text-sm text-gray-600 space-y-3">
    <a href="../index.php" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-indigo-50 text-gray-700 transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m0 0l2 2m-2-2v8a2 2 0 01-2 2H7a2 2 0 01-2-2v-8z" />
      </svg>
      <span>Kembali Halaman Utama</span>
    </a>
</aside>
