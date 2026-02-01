<?php
session_start();
include 'config/database.php';

$id_booking = $_POST['id_booking'];
$tanggal    = $_POST['tanggal_transfer'];
$jumlah_dp  = $_POST['jumlah_dp'];

// Ambil data booking
$q = mysqli_query($conn, "
    SELECT b.*, u.nama_lengkap 
    FROM bookings b
    JOIN users u ON b.id_user = u.id_user
    WHERE b.id_booking = '$id_booking'
");

$data = mysqli_fetch_assoc($q);

$nama_user = $data['nama_lengkap'];
$paket     = $data['nama_paket'];
$tanggal_acara = date('d-m-Y', strtotime($data['tanggal_acara']));

// Pesan WhatsApp TANPA EMOJI
$pesan = rawurlencode(
"KONFIRMASI PEMBAYARAN WADINMORE\n\n".
"Nama: $nama_user\n".
"Paket: $paket\n".
"Tanggal Acara: $tanggal_acara\n".
"DP: Rp ".number_format($jumlah_dp,0,",",".")."\n\n".
"Saya akan mengirimkan bukti transfer setelah ini."
);

$no_wa = "6285864839525"; // nomor kamu
header("Location: https://wa.me/$no_wa?text=$pesan");
exit;
