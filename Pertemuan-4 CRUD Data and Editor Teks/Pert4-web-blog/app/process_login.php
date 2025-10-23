<?php
// app/process_login.php
include __DIR__ . '/../config/config.php';
session_start();

// jika kita minta untuk masukin login
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../public/login.php');
  exit;
}

// yang diminta untuk login yaitu email dan password
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// kalau misal email atau password tidak diisi maka dia akan bilang email dan paassword wajib diisi
if ($email === '' || $password === '') {
  header('Location: ../public/login.php?error=' . urlencode('Email & password wajib diisi'));
  exit;
}

// kita disini nge cek apakah email tersebut valid ? jika tidak maka dia bakal bilang email tidak valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header('Location: ../public/login.php?error=' . urlencode('Email tidak valid'));
  exit;
}

// ambil user berdasarkan email
// disini kita cerita nya konek ke mysqli dengan data berikut
// id, password_hash tapi dia berdasarkan email yg kita masuki
// yang penting ada email dan password
$stmt = mysqli_prepare($conn, "SELECT id, name, password_hash, role FROM users WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
// dia nampilin hasil akun yang kita input
mysqli_stmt_bind_result($stmt, $id, $name, $password_hash, $role);
$found = mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// dua logika ini kalau email atau passwordnya salah keluar url tersebut atau header tersebut / message
if (!$found) {
  // jangan jelaskan lebih detil (keamanan)
  header('Location: ../public/login.php?error=' . urlencode('Email atau password salah'));
  exit;
}

if (!password_verify($password, $password_hash)) {
  header('Location: ../public/login.php?error=' . urlencode('Email atau password salah'));
  exit;
}

// login sukses: set session
session_regenerate_id(true);
// dia itu jatuhnya nampung id, name, email dan role untuk sementara sampai kita logout
$_SESSION['user_id'] = $id;
$_SESSION['user_name'] = $name;
$_SESSION['user_email'] = $email;
$_SESSION['user_role'] = $role;

// redirect berdasarkan role
if ($role === 'admin') {
  header('Location: ../public/admin/admin_dashboard.php');
  exit;
} else {
  header('Location: ../public/users/users_dashboard.php');
  exit;
}