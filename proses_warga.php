<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "RT69";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$nama = $_POST['nama'];
$nik = $_POST['nik'];
$no_telepon = $_POST['telepon'];

$sql = "INSERT INTO warga (nama, nik, telepon) VALUES ('$nama', '$nik', '$telepon')";

if (mysqli_query($conn, $sql)) {
    header("Location: daftar_warga.php"); // kembali ke form
    exit();
} else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}
?>
