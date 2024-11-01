<?php
// Secret key dari Google reCAPTCHA
$secretKey = "6Ld8s3IqAAAAAMsWtuO3VKUe3uE1k-148wrziGrI"; // Ganti dengan secret key dari Google reCAPTCHA Anda

// Ambil token dari reCAPTCHA
$response = $_POST['g-recaptcha-response'];
$remoteIp = $_SERVER['REMOTE_ADDR'];

// Kirim permintaan verifikasi ke Google
$verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$response}&remoteip={$remoteIp}");
$responseData = json_decode($verifyResponse);

// Cek apakah verifikasi berhasil
if ($responseData->success) {
    // reCAPTCHA berhasil diverifikasi, lanjutkan proses formulir
    // Tambahkan kode untuk memproses data formulir di sini jika perlu

    // Arahkan pengguna ke halaman download.html setelah verifikasi berhasil
    header("Location: ./public/download.html"); // Ganti 'download.html' dengan nama file yang ingin dituju
    exit; // Pastikan untuk memanggil exit setelah header
} else {
    // Jika verifikasi gagal
    echo "Verifikasi reCAPTCHA gagal. Silakan coba lagi.";
}
?>