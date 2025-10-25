-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 25, 2025 at 01:18 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuliah_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `content`, `featured_image`, `author_id`, `created_at`, `updated_at`) VALUES
(3, 'Cats on the train', 'wawwww-breaking-news', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</p>', 'uploads/img_68f9c94e3557a.jpg', 1, '2025-10-23 13:21:02', '2025-10-23 19:51:53'),
(4, 'Test Artikel 20', 'test-artikel-20', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</p>', 'uploads/img_68f9ce671b7c5.jpg', 1, '2025-10-23 13:42:47', '2025-10-23 13:42:47'),
(5, 'Tips Sukses Kuliah Sambil Magang di Perusahaan Teknologi', 'tips-sukses-kuliah-sambil-magang-di-perusahaan-teknologi', '<p data-start=\"513\" data-end=\"739\">Kuliah sambil magang di perusahaan teknologi bisa jadi pengalaman yang sangat berharga. Namun, hal ini juga menuntut kemampuan manajemen waktu dan komitmen yang tinggi. Berikut beberapa tips agar kamu bisa sukses menjalaninya:</p>\r\n<h4 data-start=\"741\" data-end=\"773\">1. Atur Waktu dengan Baik</h4>\r\n<p data-start=\"774\" data-end=\"968\">Buat jadwal mingguan yang jelas antara kegiatan kuliah dan jam kerja magang. Gunakan aplikasi kalender seperti Google Calendar agar tidak bentrok antara deadline tugas dan jadwal meeting kantor.</p>\r\n<h4 data-start=\"970\" data-end=\"1014\">2. Komunikasi dengan Dosen dan Atasan</h4>\r\n<p data-start=\"1015\" data-end=\"1196\">Sampaikan sejak awal bahwa kamu sedang mengikuti program magang. Dengan begitu, dosen maupun atasan bisa lebih fleksibel jika ada situasi mendesak, seperti ujian atau proyek kampus.</p>\r\n<h4 data-start=\"1198\" data-end=\"1244\">3. Prioritaskan Kesehatan dan Istirahat</h4>\r\n<p data-start=\"1245\" data-end=\"1393\">Kesibukan kuliah dan magang sering membuat mahasiswa lupa beristirahat. Pastikan kamu tetap tidur cukup dan menjaga pola makan agar tetap produktif.</p>\r\n<h4 data-start=\"1395\" data-end=\"1438\">4. Gunakan Waktu Luang untuk Belajar</h4>\r\n<p data-start=\"1439\" data-end=\"1618\">Manfaatkan kesempatan di tempat magang untuk belajar hal-hal baru. Tanyakan hal-hal teknis pada mentor, pahami alur kerja tim, dan catat hal penting untuk referensi di masa depan.</p>\r\n<h4 data-start=\"1620\" data-end=\"1655\">5. Kelola Stres dengan Bijak</h4>\r\n<p data-start=\"1656\" data-end=\"1833\">Jika mulai merasa kewalahan, jangan ragu untuk istirahat sejenak atau berbagi cerita dengan teman. Menjaga keseimbangan mental sangat penting agar kamu tetap semangat dan fokus.</p>\r\n<h4 data-start=\"1835\" data-end=\"1872\">6. Dokumentasikan Pengalamanmu</h4>\r\n<p data-start=\"1873\" data-end=\"2062\">Catat apa yang kamu pelajari selama magang: proyek apa yang dikerjakan, teknologi yang digunakan, dan pengalaman kerja tim. Catatan ini bisa kamu masukkan ke dalam portofolio atau CV nanti.</p>\r\n<p data-start=\"1873\" data-end=\"2062\">&nbsp;</p>\r\n<p data-start=\"1873\" data-end=\"2062\"><strong data-start=\"2069\" data-end=\"2084\">Kesimpulan:</strong><br data-start=\"2084\" data-end=\"2087\">Kuliah sambil magang bukan hal yang mustahil dilakukan. Dengan disiplin, komunikasi yang baik, dan manajemen waktu yang tepat, kamu bisa mendapatkan pengalaman berharga tanpa mengorbankan nilai akademik.</p>', 'uploads/img_68f9d6666b793.jpg', 1, '2025-10-23 14:16:54', '2025-10-23 14:16:54'),
(6, 'Pentingnya Membangun Personal Branding di Dunia Digital', 'pentingnya-membangun-personal-branding-di-dunia-digital', '<p data-start=\"1702\" data-end=\"1880\">Personal branding menjadi salah satu kunci sukses di era digital. Mahasiswa kini tidak hanya bersaing dengan nilai akademik, tetapi juga bagaimana mereka dikenal di dunia online.</p>\r\n<p data-start=\"1882\" data-end=\"2096\"><strong data-start=\"1882\" data-end=\"1926\">1. Manfaatkan Media Sosial dengan Cerdas</strong><br data-start=\"1926\" data-end=\"1929\">Gunakan platform seperti LinkedIn, Instagram, atau X (Twitter) untuk menampilkan karya, proyek, dan ide. Hindari konten negatif yang dapat merusak citra profesionalmu.</p>\r\n<p data-start=\"2098\" data-end=\"2267\"><strong data-start=\"2098\" data-end=\"2128\">2. Buat Portofolio Digital</strong><br data-start=\"2128\" data-end=\"2131\">Bangun website atau halaman pribadi berisi hasil karya, artikel, dan pengalaman organisasi. Ini bisa jadi nilai plus saat melamar kerja.</p>\r\n<p data-start=\"2269\" data-end=\"2427\"><strong data-start=\"2269\" data-end=\"2306\">3. Konsisten dalam Gaya dan Pesan</strong><br data-start=\"2306\" data-end=\"2309\">Gunakan tone dan gaya komunikasi yang konsisten agar orang mudah mengenali siapa kamu dan bidang apa yang kamu kuasai.</p>\r\n<p data-start=\"2429\" data-end=\"2607\"><strong data-start=\"2429\" data-end=\"2456\">4. Jaga Reputasi Online</strong><br data-start=\"2456\" data-end=\"2459\">Apa yang kamu posting bisa memengaruhi pandangan orang lain. Pastikan semua yang tampil di akun publik mendukung citra profesional yang kamu bangun.</p>', 'uploads/img_68f9d69dadfb2.jpg', 1, '2025-10-23 14:17:49', '2025-10-23 14:17:49'),
(7, 'Belajar Dasar Pemrograman Web: HTML, CSS, dan JavaScript', 'belajar-dasar-pemrograman-web-html-css-dan-javascript', '<p data-start=\"2685\" data-end=\"2831\">Menjadi web developer dimulai dari memahami dasar-dasarnya. Tiga teknologi utama yang wajib dikuasai adalah <strong data-start=\"2793\" data-end=\"2801\">HTML</strong>, <strong data-start=\"2803\" data-end=\"2810\">CSS</strong>, dan <strong data-start=\"2816\" data-end=\"2830\">JavaScript</strong>.</p>\r\n<p data-start=\"2833\" data-end=\"2955\"><strong data-start=\"2833\" data-end=\"2862\">1. HTML: Struktur Halaman</strong><br data-start=\"2862\" data-end=\"2865\">HTML digunakan untuk membuat kerangka dasar website, seperti header, paragraf, dan gambar.</p>\r\n<p data-start=\"2957\" data-end=\"3079\"><strong data-start=\"2957\" data-end=\"2985\">2. CSS: Tampilan Menarik</strong><br data-start=\"2985\" data-end=\"2988\">CSS membuat tampilan website lebih indah dengan warna, ukuran, dan tata letak yang menarik.</p>\r\n<p data-start=\"3081\" data-end=\"3208\"><strong data-start=\"3081\" data-end=\"3114\">3. JavaScript: Interaktivitas</strong><br data-start=\"3114\" data-end=\"3117\">JavaScript menambahkan logika dan interaksi &mdash; seperti tombol yang bisa diklik atau animasi.</p>\r\n<p data-start=\"3210\" data-end=\"3379\"><strong data-start=\"3210\" data-end=\"3235\">4. Tips Belajar Cepat</strong><br data-start=\"3235\" data-end=\"3238\">Mulailah dengan membuat proyek sederhana seperti halaman profil, lalu pelajari framework seperti Tailwind CSS atau React setelah paham dasar.</p>', 'uploads/img_68f9d6dd5689a.jpg', 1, '2025-10-23 14:18:53', '2025-10-23 14:18:53'),
(8, 'Panduan Membuat CV Menarik untuk Fresh Graduate', 'panduan-membuat-cv-menarik-untuk-fresh-graduate', '<p data-start=\"3448\" data-end=\"3594\">Curriculum Vitae (CV) adalah kesan pertama yang akan dilihat oleh recruiter. Maka dari itu, penting untuk menyusunnya dengan baik dan profesional.</p>\r\n<p data-start=\"3596\" data-end=\"3729\"><strong data-start=\"3596\" data-end=\"3627\">1. Gunakan Desain Sederhana</strong><br data-start=\"3627\" data-end=\"3630\">Hindari warna mencolok dan gunakan layout yang mudah dibaca. Canva bisa jadi alat bantu yang bagus.</p>\r\n<p data-start=\"3731\" data-end=\"3863\"><strong data-start=\"3731\" data-end=\"3760\">2. Fokus pada Hal Relevan</strong><br data-start=\"3760\" data-end=\"3763\">Tulis pengalaman magang, proyek, dan kegiatan organisasi yang relevan dengan posisi yang kamu lamar.</p>\r\n<p data-start=\"3865\" data-end=\"3975\"><strong data-start=\"3865\" data-end=\"3909\">3. Tampilkan Skill Teknis dan Soft Skill</strong><br data-start=\"3909\" data-end=\"3912\">Misalnya: HTML, CSS, komunikasi, teamwork, dan problem solving.</p>\r\n<p data-start=\"3977\" data-end=\"4144\"><strong data-start=\"3977\" data-end=\"4016\">4. Tambahkan Portofolio atau GitHub</strong><br data-start=\"4016\" data-end=\"4019\">Jika kamu melamar di bidang teknologi, tautkan proyek-proyekmu di GitHub agar recruiter bisa melihat bukti nyata kemampuanmu.</p>', 'uploads/img_68f9d73868565.jpg', 1, '2025-10-23 14:20:24', '2025-10-23 14:20:24'),
(9, 'Kiat Menjaga Kesehatan Mental Selama Kuliah Online', 'kiat-menjaga-kesehatan-mental-selama-kuliah-online', '<p data-start=\"4216\" data-end=\"4328\">Kuliah online memberikan fleksibilitas, tapi juga tantangan tersendiri, terutama dalam menjaga kesehatan mental.</p>\r\n<p data-start=\"4330\" data-end=\"4438\"><strong data-start=\"4330\" data-end=\"4362\">1. Tetapkan Rutinitas Harian</strong><br data-start=\"4362\" data-end=\"4365\">Bangun dan tidur di waktu yang sama setiap hari agar tubuh tetap teratur.</p>\r\n<p data-start=\"4440\" data-end=\"4561\"><strong data-start=\"4440\" data-end=\"4477\">2. Buat Ruang Belajar yang Nyaman</strong><br data-start=\"4477\" data-end=\"4480\">Tempat belajar yang rapi dan bersih bisa meningkatkan fokus dan semangat belajar.</p>\r\n<p data-start=\"4563\" data-end=\"4678\"><strong data-start=\"4563\" data-end=\"4590\">3. Istirahatkan Pikiran</strong><br data-start=\"4590\" data-end=\"4593\">Ambil jeda di antara sesi kuliah online, jalan sebentar, atau dengarkan musik santai.</p>\r\n<p data-start=\"4680\" data-end=\"4817\"><strong data-start=\"4680\" data-end=\"4707\">4. Tetap Bersosialisasi</strong><br data-start=\"4707\" data-end=\"4710\">Jaga komunikasi dengan teman lewat chat, video call, atau main game bareng untuk menghindari rasa kesepian.</p>\r\n<p data-start=\"4819\" data-end=\"4949\"><strong data-start=\"4819\" data-end=\"4854\">5. Cari Bantuan Jika Diperlukan</strong><br data-start=\"4854\" data-end=\"4857\">Jika merasa stres berlebihan, jangan ragu bicara dengan konselor kampus atau teman terdekat.</p>', 'uploads/img_68f9d770e03e9.jpg', 1, '2025-10-23 14:21:20', '2025-10-23 14:21:20'),
(10, 'Belajar Git dan GitHub untuk Pemulaaa', 'belajar-git-dan-github-untuk-pemula', '<p data-start=\"249\" data-end=\"500\">Git dan GitHub adalah dua alat penting yang wajib dikuasai oleh siapa pun yang ingin menjadi developer profesional. Dengan memahami Git, kamu bisa mengelola kode dengan lebih efisien dan bekerja sama dengan tim tanpa khawatir kehilangan versi program.</p>\r\n<p data-start=\"502\" data-end=\"705\"><strong data-start=\"502\" data-end=\"521\">1. Apa Itu Git?</strong><br data-start=\"521\" data-end=\"524\">Git adalah sistem kontrol versi yang digunakan untuk melacak perubahan dalam proyek. Dengan Git, kamu bisa membuat &ldquo;snapshot&rdquo; dari kode kamu setiap kali melakukan perubahan penting.</p>\r\n<p data-start=\"707\" data-end=\"898\"><strong data-start=\"707\" data-end=\"748\">2. GitHub Sebagai Platform Kolaborasi</strong><br data-start=\"748\" data-end=\"751\">GitHub adalah tempat untuk menyimpan repository Git secara online. Kamu bisa berbagi proyekmu dengan orang lain atau berkolaborasi dalam tim besar.</p>\r\n<p data-start=\"900\" data-end=\"1065\"><strong data-start=\"900\" data-end=\"942\">3. Perintah Dasar yang Wajib Diketahui</strong><br data-start=\"942\" data-end=\"945\">Mulailah dengan memahami perintah penting seperti <code data-start=\"995\" data-end=\"1005\">git init</code>, <code data-start=\"1007\" data-end=\"1016\">git add</code>, <code data-start=\"1018\" data-end=\"1030\">git commit</code>, dan <code data-start=\"1036\" data-end=\"1046\">git push</code>.<br data-start=\"1047\" data-end=\"1050\">Contoh alurnya:</p>\r\n<p data-start=\"900\" data-end=\"1065\">git init<br>git add .<br>git commit -m \"Initial commit\"<br>git push origin main</p>\r\n<p data-start=\"900\" data-end=\"1065\">&nbsp;</p>\r\n<p data-start=\"1146\" data-end=\"1328\"><strong data-start=\"1146\" data-end=\"1178\">4. Kontribusi ke Open Source</strong><br data-start=\"1178\" data-end=\"1181\">Setelah paham dasar GitHub, cobalah berkontribusi ke proyek open source. Selain menambah pengalaman, ini juga memperluas jaringan profesional kamu.</p>\r\n<p data-start=\"1330\" data-end=\"1511\"><strong data-start=\"1330\" data-end=\"1357\">5. Tips Belajar Efektif</strong><br data-start=\"1357\" data-end=\"1360\">Gunakan Git setiap kali kamu mengerjakan proyek &mdash; bahkan proyek kecil. Semakin sering kamu praktek, semakin mudah kamu memahami konsep version control.</p>', 'uploads/img_68f9d7f8229ba.jpg', 1, '2025-10-23 14:23:36', '2025-10-23 15:27:19'),
(11, 'Mengatur Keuangan Mahasiswa dengan Mudah', 'mengatur-keuangan-mahasiswa-dengan-mudah', '<p data-start=\"1573\" data-end=\"1729\">Banyak mahasiswa kesulitan mengatur keuangan bulanan. Padahal, kemampuan finansial pribadi sangat penting agar kehidupan kuliah berjalan lancar tanpa stres.</p>\r\n<p data-start=\"1731\" data-end=\"1879\"><strong data-start=\"1731\" data-end=\"1759\">1. Buat Anggaran Bulanan</strong><br data-start=\"1759\" data-end=\"1762\">Catat semua pengeluaran tetap seperti kos, makan, dan transportasi. Tentukan juga batas untuk hiburan atau nongkrong.</p>\r\n<p data-start=\"1881\" data-end=\"2071\"><strong data-start=\"1881\" data-end=\"1921\">2. Pisahkan Uang Tabungan dan Harian</strong><br data-start=\"1921\" data-end=\"1924\">Gunakan dua rekening atau aplikasi e-wallet yang berbeda. Dengan begitu, kamu tidak tergoda menggunakan uang tabungan untuk hal yang tidak penting.</p>\r\n<p data-start=\"2073\" data-end=\"2233\"><strong data-start=\"2073\" data-end=\"2105\">3. Gunakan Aplikasi Keuangan</strong><br data-start=\"2105\" data-end=\"2108\">Aplikasi seperti Money Lover atau Catatan Keuangan bisa membantu kamu melacak pengeluaran dan menganalisis kebiasaan belanja.</p>\r\n<p data-start=\"2235\" data-end=\"2447\"><strong data-start=\"2235\" data-end=\"2267\">4. Cari Penghasilan Tambahan</strong><br data-start=\"2267\" data-end=\"2270\">Kamu bisa mencoba freelance kecil-kecilan seperti desain grafis, menulis artikel, atau membuat website sederhana. Selain menambah uang jajan, ini juga menambah pengalaman kerja.</p>\r\n<p data-start=\"2449\" data-end=\"2629\"><strong data-start=\"2449\" data-end=\"2482\">5. Belajar Disiplin Finansial</strong><br data-start=\"2482\" data-end=\"2485\">Jangan takut untuk menolak ajakan yang tidak sesuai dengan kondisi keuanganmu. Hidup hemat bukan berarti pelit &mdash; tapi bijak mengelola prioritas.</p>', 'uploads/img_68f9d81695c9f.jpg', 1, '2025-10-23 14:24:06', '2025-10-23 14:24:06'),
(12, 'NO NO NO', 'yes-yes-yes', '<p>DIO: Tsugi wa Jotaro, kisama da!</p>\r\n<p>&nbsp;</p>\r\n<p>Jotaro: Yarou&hellip; DIO!</p>\r\n<p>&nbsp;</p>\r\n<p>DIO: Ho&hellip; mukatta kuruno ka? Nigetsu ni kono DIO ni chikazuite kuruno ka? Sekkaku sofu no Josefu ga watashi no Za Warudo no shotai wo. Shiken shuryu chaimu chokuzen made mondai yo toitte iru jukensee ne you na? Kisshi koita kibun de wo shietekure ta to yuu no ni?</p>\r\n<p>&nbsp;</p>\r\n<p>Jotaro: Chikadzu kanaka teme wo buchi no me tenain de na.</p>\r\n<p>&nbsp;</p>\r\n<p>DIO: Hoho! Dewa juubun chikazukanai youi.</p>\r\n<p>&nbsp;</p>\r\n<p>Jotaro: Ora!</p>\r\n<p>&nbsp;</p>\r\n<p>DIO: Noroi, noroi! Za Warudo wa saikyou no Sutando da. Jikan wa tomezetomo, supiido to paowa to te omae no Suta Purachina yoryuu enna no towa!</p>\r\n<p>&nbsp;</p>\r\n<p>Jotaro: Ore no Suta Purachina to onaji taipu wo Sutando nara. Enkyori enai kenai da, paowa to semitsu na bokina dekiru</p>', 'uploads/img_68f9f2e4bb92c.jpg', 1, '2025-10-23 16:18:28', '2025-10-24 19:38:56'),
(15, 'Test 123 Boom', 'test-123-boom', '<p>123456</p>', 'uploads/img_68fb73855adb8.jpg', 1, '2025-10-24 19:39:33', '2025-10-24 19:39:33'),
(16, 'Tips Belajar Efektif untuk Mahasiswa Baru', 'tips-belajar-efektif-untuk-mahasiswa-baru', '<p data-start=\"257\" data-end=\"597\">Menjadi mahasiswa berarti kita perlu lebih mandiri dalam mengatur waktu belajar. Hal yang paling penting adalah membuat jadwal belajar yang konsisten. Cobalah luangkan waktu khusus setiap hari untuk membaca materi atau mengerjakan tugas, meskipun hanya 30 menit. Rutinitas kecil ini akan membantu kamu lebih siap saat ujian atau presentasi.</p>\r\n<p data-start=\"599\" data-end=\"828\">Selain itu, jangan hanya mengandalkan materi dari kelas. Manfaatkan juga bahan tambahan seperti jurnal, video pembelajaran, atau diskusi dengan teman. Belajar bareng seringkali membuat kita lebih mudah memahami konsep yang sulit.</p>\r\n<p data-start=\"830\" data-end=\"985\">Dan yang tidak kalah penting: jaga kesehatan. Tidur cukup, makan teratur, dan jangan lupa istirahat. Pikiran yang segar membuat belajar jadi lebih gampang.</p>', 'uploads/img_68fc9435c49d4.jpg', 3, '2025-10-25 16:11:17', '2025-10-25 16:11:17'),
(17, '1914 translation by H. Rackham', '1914-translation-by-h-rackham', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.&nbsp;</p>', 'uploads/img_68fcc6cce92f5.jpg', 12, '2025-10-25 19:47:08', '2025-10-25 19:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `article_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `body` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_approved` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `user_id`, `body`, `created_at`, `is_approved`) VALUES
(1, 12, 5, 'Wow i like Jojo Bizzare Adventure <3', '2025-10-24 15:49:58', 1),
(5, 12, 5, 'awdawdawd', '2025-10-24 15:51:41', 1),
(6, 12, 5, 'asdasdadasdasd', '2025-10-24 15:51:44', 1),
(8, 12, 8, 'GG', '2025-10-24 19:31:51', 1),
(9, 6, 1, 'this is comment', '2025-10-24 19:54:31', 1),
(10, 15, 9, 'the cat is on fire', '2025-10-24 20:12:41', 1),
(11, 10, 9, 'wow now i know how to learn github', '2025-10-24 20:13:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pesan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `nama`, `email`, `pesan`, `created_at`) VALUES
(1, 'Vanya Mayazura', 'mayazurav@gmail.com', 'asdasdausdawdasdawd', '2025-10-21 06:53:01'),
(2, 'Ibnu Sudarman', 'Ibnu@gmail.com', 'ibnu awawadawd', '2025-10-21 06:58:24'),
(3, 'Dionisius Jordi', 'diongei@gmail.com', 'gw ganteng', '2025-10-21 07:07:41'),
(4, 'Makoto Yuki', 'edan@gmail.com', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa mantap', '2025-10-21 09:40:48'),
(5, 'Haruka Nanase', 'haruka@gmail.com', 'Ini adalah pesan yang saya kirim', '2025-10-21 12:56:56'),
(6, 'Nama', 'nama@email.com', 'halooo', '2025-10-24 04:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int NOT NULL,
  `article_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `article_id`, `user_id`, `created_at`) VALUES
(6, 10, 7, '2025-10-24 14:22:29'),
(7, 12, 7, '2025-10-24 14:37:11'),
(8, 9, 7, '2025-10-24 14:37:14'),
(9, 11, 7, '2025-10-24 15:13:30'),
(11, 11, 5, '2025-10-24 15:16:51'),
(13, 8, 5, '2025-10-24 15:16:56'),
(14, 9, 5, '2025-10-24 15:16:58'),
(15, 7, 5, '2025-10-24 15:17:01'),
(16, 12, 5, '2025-10-24 19:29:56'),
(17, 12, 8, '2025-10-24 19:32:04'),
(18, 11, 8, '2025-10-24 19:32:06'),
(19, 10, 8, '2025-10-24 19:32:09'),
(20, 9, 8, '2025-10-24 19:32:11'),
(21, 15, 9, '2025-10-24 20:12:21'),
(22, 12, 9, '2025-10-24 20:12:23'),
(23, 11, 9, '2025-10-24 20:12:25'),
(24, 9, 9, '2025-10-24 20:12:28'),
(25, 8, 9, '2025-10-24 20:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_changes`
--

CREATE TABLE `role_changes` (
  `id` int NOT NULL,
  `admin_id` int NOT NULL,
  `user_id` int NOT NULL,
  `old_role` enum('admin','editor','user') NOT NULL,
  `new_role` enum('admin','editor','user') NOT NULL,
  `changed_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role_changes`
--

INSERT INTO `role_changes` (`id`, `admin_id`, `user_id`, `old_role`, `new_role`, `changed_at`) VALUES
(1, 1, 3, 'user', 'admin', '2025-10-25 15:55:43'),
(2, 1, 4, 'user', 'editor', '2025-10-25 15:56:22'),
(3, 1, 6, 'user', 'admin', '2025-10-25 16:04:05'),
(4, 11, 8, 'user', 'admin', '2025-10-25 19:42:55'),
(5, 11, 12, 'admin', 'editor', '2025-10-25 19:43:56'),
(6, 11, 12, 'editor', 'user', '2025-10-25 19:44:01'),
(7, 11, 12, 'user', 'admin', '2025-10-25 19:45:19'),
(8, 11, 10, 'admin', 'user', '2025-10-25 19:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','editor','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password_hash`, `role`, `created_at`) VALUES
(1, 'Admin Kampus', 'admin@example.com', '$2y$10$u6gvptMENeT2d1HEwsg0N.wwdUyI4mBVV.Ks05evQ9VDq0NF.d4v.', 'admin', '2025-10-22 11:55:38'),
(2, 'User Biasa', 'user@example.com', '$2y$10$.hkLxlKyrMwufm8CRSn8Wu/wsgFqm0riOXQo5Z/Vk4Kz8HWkCPvLG', 'user', '2025-10-22 11:55:38'),
(3, 'ichiyan zuraku', 'ichiyan@gmail.com', '$2y$10$W6elfLmBxF9RvmcxhXnppOu3G.5Bex2t9614SsykrN0khntN9YqE6', 'admin', '2025-10-22 12:09:47'),
(4, 'Vanya Mayazura', 'vanya@gmail.com', '$2y$10$I8TTrkrilk6egrRQH8SNT.YIzB1RXfEqI4oJ9DEWDjVuMt8sVveoe', 'editor', '2025-10-22 19:15:01'),
(5, 'Makoto yuki', 'yuki@gmail.com', '$2y$10$/0tHw5agMBQitUFAe2TKnOmCAsTkUMmRUliZS38FliBCp5SeHewim', 'user', '2025-10-22 19:34:11'),
(6, 'Jordi', 'jordi@gmail.com', '$2y$10$gY5DOA24zYLRUm4dMkcLHuACZkxo.6.qrgQGtSBSow0H0RSOuVlA2', 'admin', '2025-10-22 20:08:27'),
(7, 'Vanya Mayazura', 'mayazurav@gmail.com', '$2y$10$g8dlYdm/Z1uZZFuCVw4dlOrOm1U4JxwVyprLsj.RliIGfJPRpjuFm', 'user', '2025-10-24 13:39:55'),
(8, 'Amelia Evita', 'amelia@gmail.com', '$2y$10$tDVScu1lLEeMhculXalxe.BzB2sRh1VYu/5AWbrHxzk19b.fGNLJi', 'admin', '2025-10-24 19:31:15'),
(9, 'Vanessa', 'vane@gmail.com', '$2y$10$4qiK5./NUmqamaWuWnLgDeCECU7M9cIMHzql7fEgRThmyaee6HQn2', 'user', '2025-10-24 20:04:54'),
(10, 'Civago', 'civa@gmail.com', '$2y$10$O5Pa6UDRPERWCREL7zaIueRQivDTB2BZUS4ZK0wltpl2wpv/M45R.', 'user', '2025-10-25 16:39:29'),
(11, 'Jotaro Kujou', 'jotaro@gmail.com', '$2y$10$hns22xW6fDwUrDo89Dp1YOL3M0OTuHj5fQnlNaSzllVPjkMBcofea', 'admin', '2025-10-25 17:42:19'),
(12, 'Ice Bear', 'icebear@gmail.com', '$2y$10$UsOKds/EfAkb77C6RSa08OF.Y0mF6cGXBa3L9eWm.ee73yR7a5mM.', 'admin', '2025-10-25 19:43:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_article` (`article_id`),
  ADD KEY `idx_user` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_article_user` (`article_id`,`user_id`),
  ADD KEY `idx_article` (`article_id`),
  ADD KEY `idx_user` (`user_id`);

--
-- Indexes for table `role_changes`
--
ALTER TABLE `role_changes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `role_changes`
--
ALTER TABLE `role_changes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
