<?php
$target_dir = "../uploads/";

if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

if (isset($_FILES["foto"])) {
    $foto_name = basename($_FILES["foto"]["name"]);
    $target_file = $target_dir . $foto_name;

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        echo "
        <script>
            localStorage.setItem('pengaduan_foto', '$foto_name');
            window.location.href = '../pages/pengaduan4.html';
        </script>";
    } else {
        echo "Gagal mengunggah gambar.";
    }
} else {
    echo "
    <script>
        localStorage.setItem('pengaduan_foto', '');
        window.location.href = '../pages/pengaduan4.html';
    </script>";
}
?>
