<?php
// app/process_like.php
if (session_status() === PHP_SESSION_NONE) session_start();

// includes: sesuaikan path bila config/db ada di lokasi lain
// koneksi database
require_once __DIR__ . '/..' . '/config/config.php'; // <-- pastikan file config di folder config/
//  helper
require_once __DIR__ . '/functions.php';
// middleware
require_once __DIR__ . '/auth.php';

// hanya POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/'));
  exit;
}

// cek login
// kalau misal kita belum login sebagai user buat fitur like kita diminta buat login
if (empty($_SESSION['user_id'])) {
  header('Location: /public/login.php');
  exit;
}

// CSRF check (fungsi verify_csrf() ada di functions.php)
if (!verify_csrf()) {
  http_response_code(400);
  echo "Invalid CSRF token";
  exit;
}

$user_id = (int)$_SESSION['user_id'];
$article_id = (int)($_POST['article_id'] ?? 0);

// nampilin data artikel nya
if ($article_id <= 0) {
  header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/'));
  exit;
}

// optional: cek artikel ada (boleh dilewati, tapi direkomendasikan)
$stmtChk = $conn->prepare("SELECT id FROM articles WHERE id = ? LIMIT 1");
$stmtChk->bind_param("i", $article_id);
$stmtChk->execute();
$resChk = $stmtChk->get_result();
if ($resChk->num_rows === 0) {
  $stmtChk->close();
  header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/'));
  exit;
}
$stmtChk->close();

// toggle like
// user login dan menghitung likes berdasarkan artikel dan user dengan batasan like itu cuman bisa 1
$stmt = $conn->prepare("SELECT id FROM likes WHERE article_id = ? AND user_id = ? LIMIT 1");
$stmt->bind_param("ii", $article_id, $user_id);
$stmt->execute();
$res = $stmt->get_result();

// like = 1
// unlike = 0
// dia itu bakal nge unlike
if ($res->num_rows > 0) {
  // unlike
  $row = $res->fetch_assoc();
  $stmt->close();
  // connection close atau break

  // delete like berdasarkan id ? article dan juga harus login user atau admin
  $del = $conn->prepare("DELETE FROM likes WHERE id = ?");
  $del->bind_param("i", $row['id']);
  $del->execute();
  $del->close();
} else {

  // like
  // ini buat nambah like
  // create like or add like
  // syntax error
  $stmt->close();
  $ins = $conn->prepare("INSERT INTO likes (article_id, user_id) VALUES (?, ?)");
  $ins->bind_param("ii", $article_id, $user_id);
  $ins->execute();
  $ins->close();
}

// Kembalikan ke halaman asal
// articles
header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/'));
exit;
