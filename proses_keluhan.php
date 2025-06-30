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
$keluhan = $_POST['keluhan'];

$query = "INSERT INTO keluhan (nama, keluhan) VALUES ('$nama', '$keluhan')";
mysqli_query($conn, $query);

header("Location: keluhan.php");
exit;
?>
