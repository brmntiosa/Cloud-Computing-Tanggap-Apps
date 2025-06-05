<?php
$host = "34.50.105.105";  // dari Cloud SQL
$user = "tanggapuser";
$pass = "tanggapuser123";
$db   = "tanggap";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
