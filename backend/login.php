<?php
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
        echo "success";
    } else {
        echo "wrong_password";
    }
} else {
    echo "user_not_found";
}
?>
