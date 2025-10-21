<?php include __DIR__ . '/_header.php'; ?>

<?php
// ---------------------------
// Dummy data (sementara, nanti diganti dari database)
// ---------------------------
$articles = [
  [
    "title" => "Belajar Dasar PHP untuk Pemula",
    "date" => "2025-10-20",
    "excerpt" => "Panduan lengkap untuk memulai belajar bahasa pemrograman PHP dari dasar. Cocok untuk peserta pelatihan web programming.",
    // random image dengan tema code/php
    "image" => "https://images.unsplash.com/photo-1607706189992-eae578626c86?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170",
  ],
  [
    "title" => "Apa Itu Tailwind CSS?",
    "date" => "2025-10-18",
    "excerpt" => "Tailwind CSS adalah utility-first framework yang membuat proses styling lebih cepat dan efisien.",
    "image" => "https://images.unsplash.com/photo-1607706189992-eae578626c86?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170",
  ],
  [
    "title" => "Menghubungkan PHP dengan Database MySQL",
    "date" => "2025-10-15",
    "excerpt" => "Tutorial langkah demi langkah cara koneksi PHP ke MySQL menggunakan mysqli dan PDO.",
    "image" => "https://images.unsplash.com/photo-1607706189992-eae578626c86?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170",
  ],
   [
    "title" => "I dont know what to write but I have to fill this space",
    "date" => "2025-10-15",
    "excerpt" => "Tutorial langkah demi langkah cara koneksi PHP ke MySQL menggunakan mysqli dan PDO.",
    "image" => "https://comicbook.com/wp-content/uploads/sites/4/2025/02/Is-This-a-pigeon-anime-meme.jpg?resize=2000,1125",
  ],
   [
    "title" => "again another article to fill the space",
    "date" => "2025-10-15",
    "excerpt" => "Tutorial langkah demi langkah cara koneksi PHP ke MySQL menggunakan mysqli dan PDO.",
    "image" => "https://static.icy-veins.com/wp/wp-content/uploads/2025/07/honkaidan-heng-sp.webp",
  ],
   [
    "title" => "YES YES YES",
    "date" => "2025-10-15",
    "excerpt" => "Tutorial langkah demi langkah cara koneksi PHP ke MySQL menggunakan mysqli dan PDO.",
    "image" => "https://i.pinimg.com/1200x/ff/25/f9/ff25f99d150d79837bcc0f0e324751ff.jpg",
  ],
   [
    "title" => "again another article to fill the space",
    "date" => "2025-10-15",
    "excerpt" => "Tutorial langkah demi langkah cara koneksi PHP ke MySQL menggunakan mysqli dan PDO.",
    "image" => "https://static.icy-veins.com/wp/wp-content/uploads/2025/07/honkaidan-heng-sp.webp",
  ],
   [
    "title" => "again another article to fill the space",
    "date" => "2025-10-15",
    "excerpt" => "Tutorial langkah demi langkah cara koneksi PHP ke MySQL menggunakan mysqli dan PDO.",
    "image" => "https://static.icy-veins.com/wp/wp-content/uploads/2025/07/honkaidan-heng-sp.webp",
  ],
   [
    "title" => "again another article to fill the space",
    "date" => "2025-10-15",
    "excerpt" => "Tutorial langkah demi langkah cara koneksi PHP ke MySQL menggunakan mysqli dan PDO.",
    "image" => "https://static.icy-veins.com/wp/wp-content/uploads/2025/07/honkaidan-heng-sp.webp",
  ],
];

// ---------------------------
// Fitur search
// ---------------------------
$searchQuery = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : '';
$filtered = $articles;

if ($searchQuery !== '') {
  $filtered = array_filter($articles, function ($a) use ($searchQuery) {
    return str_contains(strtolower($a['title']), $searchQuery) ||
           str_contains(strtolower($a['excerpt']), $searchQuery);
  });
}

// pagination config
$perPage = 3; // <-- tampilkan 3 artikel per halaman
$totalItems = count($filtered);
$totalPages = (int) max(1, ceil($totalItems / $perPage));

// current page (sanitize)
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
if ($page < 1) $page = 1;
if ($page > $totalPages) $page = $totalPages;

// slice array untuk halaman sekarang (reindex dulu)
$filteredValues = array_values($filtered);
$start = ($page - 1) * $perPage;
$articlesPage = array_slice($filteredValues, $start, $perPage);

// helper buat preserve query params (search)
function build_page_url($pageNumber) {
  $params = $_GET;
  $params['page'] = $pageNumber;
  return htmlspecialchars($_SERVER['PHP_SELF'] . '?' . http_build_query($params));
}
?>

<!-- search section -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
  <h2 class="text-2xl font-semibold text-gray-800">Artikel</h2>

  <form method="GET" action="articles.php" class="flex gap-2 w-full md:w-auto">
    <input 
      type="search" 
      name="q" 
      value="<?= htmlspecialchars($searchQuery) ?>" 
      placeholder="Cari artikel..." 
      class="flex-grow md:flex-none px-4 py-2 rounded-lg border border-gray-300 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 text-gray-700 placeholder-gray-400 transition"
    />
    <button 
      class="bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 text-white px-5 py-2 rounded-lg shadow-md font-medium transition">
      Cari
    </button>
  </form>
</div>
<!-- end search section -->

<!-- article card -->
<div class="mt-8 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
  <?php if (count($articlesPage) > 0): ?>
    <?php foreach ($articlesPage as $article): ?>
      <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition border border-gray-100">
        <img 
          src="<?= $article['image'] ?>" 
          alt="<?= htmlspecialchars($article['title']) ?>" 
          class="w-full h-44 object-cover rounded-t-xl">
        <div class="p-5">
          <h3 class="text-lg font-semibold text-gray-800 hover:text-indigo-600 transition">
            <?= htmlspecialchars($article['title']) ?>
          </h3>
          <p class="text-sm text-gray-500 mt-1">
            <?= date('d M Y', strtotime($article['date'])) ?>
          </p>
          <p class="text-sm text-gray-600 mt-3 line-clamp-3">
            <?= htmlspecialchars($article['excerpt']) ?>
          </p>
          <a href="#" class="inline-block mt-4 text-indigo-600 font-medium hover:underline text-sm">
            Baca Selengkapnya →
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="col-span-full bg-white p-6 rounded-xl text-center shadow border border-gray-100">
      <h3 class="text-lg font-medium text-gray-800">Tidak ada artikel ditemukan</h3>
      <p class="mt-2 text-sm text-gray-600">Coba ubah kata kunci pencarian atau tunggu admin menambahkan artikel baru.</p>
    </div>
  <?php endif; ?>
</div>
<!-- end article card -->

<!-- Pagination -->
<?php if ($totalPages > 1): ?>
  <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 mt-10">
    <div class="flex flex-1 justify-between sm:hidden">
      <a href="<?= $page > 1 ? build_page_url($page - 1) : '#' ?>" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 <?= $page <= 1 ? 'opacity-50 pointer-events-none' : '' ?>">Previous</a>
      <a href="<?= $page < $totalPages ? build_page_url($page + 1) : '#' ?>" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 <?= $page >= $totalPages ? 'opacity-50 pointer-events-none' : '' ?>">Next</a>
    </div>

    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Showing
          <span class="font-medium"><?= $start + 1 ?></span>
          to
          <span class="font-medium"><?= min($start + $perPage, $totalItems) ?></span>
          of
          <span class="font-medium"><?= $totalItems ?></span>
          results
        </p>
      </div>

      <div>
        <nav aria-label="Pagination" class="isolate inline-flex -space-x-px rounded-md shadow-sm">
          <!-- Prev icon -->
          <a href="<?= $page > 1 ? build_page_url($page - 1) : '#' ?>" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 <?= $page <= 1 ? 'pointer-events-none opacity-50' : 'hover:bg-gray-50' ?>" aria-disabled="<?= $page <= 1 ? 'true' : 'false' ?>">
            <span class="sr-only">Previous</span>
            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" aria-hidden="true">
              <path d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" fill-rule="evenodd" />
            </svg>
          </a>

          <!-- page numbers -->
          <?php
            // windowed pagination: show up to 5 numbers centered on current page
            $window = 2;
            $startPage = max(1, $page - $window);
            $endPage = min($totalPages, $page + $window);
            if ($page <= 3) { $endPage = min(5, $totalPages); }
            if ($page > $totalPages - 3) { $startPage = max(1, $totalPages - 4); }
            for ($p = $startPage; $p <= $endPage; $p++):
          ?>
            <a href="<?= build_page_url($p) ?>" aria-current="<?= $p === $page ? 'page' : 'false' ?>" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold <?= $p === $page ? 'z-10 bg-indigo-600 text-white' : 'text-gray-900 bg-white hover:bg-gray-50' ?>"><?= $p ?></a>
          <?php endfor; ?>

          <!-- Next icon -->
          <a href="<?= $page < $totalPages ? build_page_url($page + 1) : '#' ?>" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 <?= $page >= $totalPages ? 'pointer-events-none opacity-50' : 'hover:bg-gray-50' ?>" aria-disabled="<?= $page >= $totalPages ? 'true' : 'false' ?>">
            <span class="sr-only">Next</span>
            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" aria-hidden="true">
              <path d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
            </svg>
          </a>
        </nav>
      </div>
    </div>
  </div>
<?php endif; ?>
<!-- end of pagination -->

<?php include __DIR__ . '/_footer.php'; ?>
