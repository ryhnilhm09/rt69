<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $telepon = $_POST['telepon'];

    $sql = "INSERT INTO warga (nama, nik, telepon) VALUES ('$nama', '$nik', '$telepon')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pendaftaran berhasil!'); window.location.href='daftar_warga.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>