<aside class="w-56 bg-white border-r hidden md:block">
  <div class="p-4">
    <div class="text-sm text-gray-500">Halo,</div>
    <div class="font-semibold"><?= e($_SESSION['user_name'] ?? '') ?></div>
  </div>
  <nav class="px-4 py-4 space-y-2">
    <a href="users_dashboard.php" class="block px-3 py-2 rounded hover:bg-indigo-50">Dashboard</a>
    <a href="../logout.php" class="block px-3 py-2 rounded hover:bg-indigo-50 text-red-600">Logout</a>
  </nav>
</aside>
