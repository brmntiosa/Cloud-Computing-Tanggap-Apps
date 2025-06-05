<?php
header("Content-Type: text/plain");

$input = file_get_contents("php://input");
$data = json_decode($input, true);

if (!$data) {
    echo "Gagal membaca data JSON";
    exit;
}

$nama = $data["nama"] ?? null;
$judul = $data["judul"] ?? null;
$uraian = $data["uraian"] ?? null;
$lokasi = $data["lokasi"] ?? null;
$foto = $data["foto_name"] ?? null;

if (!$nama || !$judul || !$uraian || !$lokasi) {
    echo "Data tidak lengkap.";
    exit;
}

// GUNAKAN koneksi.php
require_once "koneksi.php";

$sql = "INSERT INTO pengaduan (nama, judul, isi, lokasi, foto, tanggal)
        VALUES (?, ?, ?, ?, ?, NOW())";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nama, $judul, $uraian, $lokasi, $foto);

if ($stmt->execute()) {
    echo "Success";
} else {
    echo "Error saat menyimpan ke database: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
