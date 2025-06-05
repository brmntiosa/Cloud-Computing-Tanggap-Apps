<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: text/plain");

include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";
if (mysqli_query($conn, $query)) {
    echo "success";
} else {
    echo "error";
}
?>
