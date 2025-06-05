<?php
require_once "koneksi.php";

$data = [];
$result = $conn->query("SELECT * FROM pengaduan ORDER BY tanggal DESC");
while ($row = $result->fetch_assoc()) {
    $data[] = [
        'nama' => $row['nama'],
        'tanggal' => $row['tanggal'],
        'isi' => $row['isi'],
        'foto' => $row['foto'],
        'lokasi' => $row['lokasi'] ?? null
    ];
}
echo json_encode($data);
?>
