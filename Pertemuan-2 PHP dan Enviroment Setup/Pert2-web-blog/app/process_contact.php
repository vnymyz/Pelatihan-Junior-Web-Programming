<?php
// app/process_contact.php
include __DIR__ . '/../config/config.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('Location: ../public/contact.php');
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$pesan = trim($_POST['pesan'] ?? '');

if ($nama === '' || $email === '' || $pesan === '') {
    header('Location: ../public/contact.php?error=' . urlencode('Semua field wajib diisi'));
    exit;
}

// basic sanitize (you already use prepared statements, but keep safe)
$nama = htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$pesan = htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8');

$stmt = mysqli_prepare($conn, "INSERT INTO contacts (nama, email, pesan) VALUES (?, ?, ?)");
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($ok) {
        header('Location: ../public/contact.php?success=1');
        exit;
    } else {
        header('Location: ../public/contact.php?success=2');
        exit;
    }
} else {
    header('Location: ../public/contact.php?success=2');
    exit;
}

mysqli_close($conn);
