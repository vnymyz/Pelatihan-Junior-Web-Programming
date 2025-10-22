<?php
// app/process_register.php
include __DIR__ . '/../config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../public/register.php');
  exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($name === '' || $email === '' || $password === '') {
  header('Location: ../public/register.php?error=' . urlencode('Semua field wajib diisi'));
  exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header('Location: ../public/register.php?error=' . urlencode('Email tidak valid'));
  exit;
}

if (strlen($password) < 6) {
  header('Location: ../public/register.php?error=' . urlencode('Password minimal 6 karakter'));
  exit;
}

// cek apakah email sudah terdaftar
$stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
if (mysqli_stmt_num_rows($stmt) > 0) {
  mysqli_stmt_close($stmt);
  header('Location: ../public/register.php?error=' . urlencode('Email sudah terdaftar'));
  exit;
}
mysqli_stmt_close($stmt);

// simpan user
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = mysqli_prepare($conn, "INSERT INTO users (name, email, password_hash, role) VALUES (?, ?, ?, 'user')");
if (!$stmt) {
  header('Location: ../public/register.php?error=' . urlencode('Terjadi kesalahan server'));
  exit;
}
mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password_hash);
$ok = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

if ($ok) {
  header('Location: ../public/login.php?registered=1');
  exit;
} else {
  header('Location: ../public/register.php?error=' . urlencode('Gagal membuat akun'));
  exit;
}
