<?php include __DIR__ . '/_header.php'; ?>

<?php
// Dummy articles (bisa diganti dari DB nanti)
$articles = [
  [
    "title" => "Belajar Dasar PHP untuk Pemula",
    "date" => "2025-10-20",
    "excerpt" => "Panduan lengkap untuk memulai belajar bahasa pemrograman PHP dari dasar. Cocok untuk peserta pelatihan web programming.",
    "image" => "https://images.unsplash.com/photo-1607706189992-eae578626c86?auto=format&fit=crop&q=80&w=1170",
  ],
  [
    "title" => "Apa Itu Tailwind CSS?",
    "date" => "2025-10-18",
    "excerpt" => "Tailwind CSS adalah utility-first framework yang membuat proses styling lebih cepat dan efisien.",
    "image" => "https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=1170",
  ],
  [
    "title" => "Menghubungkan PHP dengan Database MySQL",
    "date" => "2025-10-15",
    "excerpt" => "Tutorial langkah demi langkah cara koneksi PHP ke MySQL menggunakan mysqli dan PDO.",
    "image" => "https://images.unsplash.com/photo-1515879218367-8466d910aaa4?auto=format&fit=crop&q=80&w=1170",
  ],
];
$recent = array_slice($articles, 0, 3);
?>

<!-- HERO: Carousel -->
<section class="mb-12">
  <div class="relative max-w-6xl mx-auto">
    <div id="carousel" class="relative overflow-hidden rounded-lg shadow-lg">
      <!-- Slides -->
      <div class="carousel-slides relative h-[420px] md:h-[520px]">
        <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100" data-index="0" aria-hidden="false">
          <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&q=80&w=1600" alt="Kampus 1" class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/30"></div>
          <div class="absolute inset-0 flex flex-col justify-center items-start md:items-center text-left md:text-center px-6 md:px-12 text-white">
            <h2 class="text-3xl md:text-5xl font-extrabold drop-shadow-lg leading-tight">Selamat Datang di Blog Kampus</h2>
            <p class="mt-4 text-sm md:text-lg text-white/90 max-w-3xl">Platform artikel & pengumuman kampus — tempat berbagi ilmu, pengumuman, dan insight untuk mahasiswa serta dosen.</p>
            <div class="mt-6 flex flex-col sm:flex-row gap-3">
              <a href="articles.php" class="inline-block bg-indigo-600 text-white px-5 py-3 rounded-lg shadow hover:bg-indigo-700">Jelajahi Artikel</a>
              <a href="contact.php" class="inline-block border border-white text-white px-5 py-3 rounded-lg hover:bg-white hover:text-indigo-600 transition">Hubungi Kami</a>
            </div>
          </div>
        </div>

        <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0" data-index="1" aria-hidden="true">
          <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=1600" alt="Kampus 2" class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/30"></div>
          <div class="absolute inset-0 flex flex-col justify-center items-start md:items-center text-left md:text-center px-6 md:px-12 text-white">
            <h2 class="text-3xl md:text-5xl font-extrabold drop-shadow-lg leading-tight">Artikel & Tutorial Terbaru</h2>
            <p class="mt-4 text-sm md:text-lg text-white/90 max-w-3xl">Temukan panduan praktis dan sumber belajar yang dibuat oleh peserta dan pengajar.</p>
            <div class="mt-6 flex flex-col sm:flex-row gap-3">
              <a href="articles.php" class="inline-block bg-indigo-600 text-white px-5 py-3 rounded-lg shadow hover:bg-indigo-700">Lihat Artikel</a>
            </div>
          </div>
        </div>

        <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0" data-index="2" aria-hidden="true">
          <img src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?auto=format&fit=crop&q=80&w=1600" alt="Kampus 3" class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/30"></div>
          <div class="absolute inset-0 flex flex-col justify-center items-start md:items-center text-left md:text-center px-6 md:px-12 text-white">
            <h2 class="text-3xl md:text-5xl font-extrabold drop-shadow-lg leading-tight">Proyek & Pengumuman</h2>
            <p class="mt-4 text-sm md:text-lg text-white/90 max-w-3xl">Pantau pengumuman penting kampus dan proyek peserta pelatihan di sini.</p>
            <div class="mt-6 flex flex-col sm:flex-row gap-3">
              <a href="contact.php" class="inline-block bg-indigo-600 text-white px-5 py-3 rounded-lg shadow hover:bg-indigo-700">Hubungi Panitia</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <button id="prevBtn" class="absolute left-3 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 rounded-full p-2 shadow focus:outline-none" aria-label="Previous slide">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
      </button>
      <button id="nextBtn" class="absolute right-3 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 rounded-full p-2 shadow focus:outline-none" aria-label="Next slide">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </button>

      <!-- Indicators -->
      <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
        <button class="carousel-dot w-3 h-3 rounded-full bg-white/70" data-to="0" aria-label="Slide 1"></button>
        <button class="carousel-dot w-3 h-3 rounded-full bg-white/50" data-to="1" aria-label="Slide 2"></button>
        <button class="carousel-dot w-3 h-3 rounded-full bg-white/50" data-to="2" aria-label="Slide 3"></button>
      </div>
    </div>
  </div>
</section>

<!-- RECENT POSTS (sama seperti sebelumnya) -->
<section class="mb-12">
  <div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">Artikel Terbaru</h2>
    <a href="articles.php" class="text-indigo-600 hover:underline text-sm">Lihat Semua Artikel →</a>
  </div>

  <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    <?php foreach ($recent as $a): ?>
      <article class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
        <a href="#" class="block h-48">
          <img src="<?= htmlspecialchars($a['image']) ?>" alt="<?= htmlspecialchars($a['title']) ?>" class="w-full h-full object-cover">
        </a>
        <div class="p-5">
          <h3 class="text-lg font-semibold text-gray-800 hover:text-indigo-600">
            <a href="#"><?= htmlspecialchars($a['title']) ?></a>
          </h3>
          <p class="text-xs text-gray-500 mt-1"><?= date('d M Y', strtotime($a['date'])) ?></p>
          <p class="text-sm text-gray-600 mt-3 line-clamp-3"><?= htmlspecialchars($a['excerpt']) ?></p>
          <div class="mt-4 flex items-center justify-between">
            <a href="#" class="text-indigo-600 font-medium text-sm hover:underline">Baca Selengkapnya →</a>
            <span class="text-xs text-gray-400">• 3 min read</span>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<!-- ABOUT -->
<section class="mb-12 bg-indigo-50 rounded-lg p-8">
  <div class="max-w-4xl mx-auto text-center">
    <h2 class="text-2xl font-semibold text-indigo-700">Tentang Blog Kampus</h2>
    <p class="mt-3 text-gray-700">
      Blog Kampus dibuat sebagai media belajar dan berbagi ilmu antar mahasiswa dan pengajar.
      Semua artikel ditulis oleh peserta pelatihan sebagai bagian proyek akhir. Di sini kamu dapat menemukan tutorial,
      pengumuman, dan referensi yang mendukung proses belajar pemrograman web.
    </p>
  </div>
</section>

<!-- CALL TO ACTION / Social -->
<section class="mb-16">
  <div class="bg-white rounded-lg shadow-md p-6 flex flex-col md:flex-row items-center justify-between gap-4">
    <div>
      <h3 class="text-lg font-semibold text-gray-800">Tetap Terhubung</h3>
      <p class="text-sm text-gray-600 mt-1">Ikuti update artikel dan pengumuman terbaru—boleh juga kirimkan pertanyaan lewat kontak.</p>
    </div>

    <div class="flex items-center gap-3">
      <!-- Instagram -->
      <a href="https://instagram.com/yourhandle" target="_blank" rel="noopener" class="w-10 h-10 flex items-center justify-center rounded-full  from-pink-500 to-yellow-400 shadow hover:scale-110 transition-transform" aria-label="Instagram">
        <img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" alt="Instagram" class="w-5 h-5">
      </a>

      <!-- WhatsApp -->
      <a href="https://wa.me/6281234567890" target="_blank" rel="noopener" class="w-10 h-10 flex items-center justify-center rounded-full  shadow hover:scale-110 transition-transform" aria-label="WhatsApp">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" class="w-5 h-5">
      </a>

      <!-- Twitter -->
      <a href="https://twitter.com/yourhandle" target="_blank" rel="noopener" class="w-10 h-10 flex items-center justify-center rounded-full shadow hover:scale-110 transition-transform" aria-label="Twitter">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter" class="w-5 h-5">
      </a>

      <!-- Facebook -->
      <a href="https://facebook.com/yourpage" target="_blank" rel="noopener" class="w-10 h-10 flex items-center justify-center rounded-full shadow hover:scale-110 transition-transform" aria-label="Facebook">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" class="w-5 h-5">
      </a>
    </div>
  </div>
</section>

<!-- Carousel script -->
<script>
(function(){
  const slides = Array.from(document.querySelectorAll('#carousel .carousel-item'));
  const dots = Array.from(document.querySelectorAll('#carousel .carousel-dot'));
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');
  let current = 0;
  let timer = null;
  const delay = 3500;

  function show(idx) {
    slides.forEach((s, i) => {
      if (i === idx) {
        s.style.opacity = '1';
        s.setAttribute('aria-hidden','false');
      } else {
        s.style.opacity = '0';
        s.setAttribute('aria-hidden','true');
      }
    });
    dots.forEach((d, i) => {
      d.classList.toggle('bg-white/90', i === idx);
      d.classList.toggle('bg-white/50', i !== idx);
    });
    current = idx;
  }

  function next() { show((current + 1) % slides.length); }
  function prev() { show((current - 1 + slides.length) % slides.length); }

  // auto play
  function startTimer() { timer = setInterval(next, delay); }
  function stopTimer() { if (timer) clearInterval(timer); }

  // events
  nextBtn.addEventListener('click', () => { stopTimer(); next(); startTimer(); });
  prevBtn.addEventListener('click', () => { stopTimer(); prev(); startTimer(); });
  dots.forEach(d => d.addEventListener('click', () => { stopTimer(); show(parseInt(d.getAttribute('data-to'))); startTimer(); }));

  // pause on hover
  const carouselEl = document.getElementById('carousel');
  carouselEl.addEventListener('mouseenter', stopTimer);
  carouselEl.addEventListener('mouseleave', startTimer);

  // init
  show(0);
  startTimer();
})();
</script>

<?php include __DIR__ . '/_footer.php'; ?>
