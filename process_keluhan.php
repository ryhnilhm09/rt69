<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $keluhan = $_POST['keluhan'];

    $sql = "INSERT INTO keluhan (nama, keluhan) VALUES ('$nama', '$keluhan')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Keluhan berhasil dikirim!'); window.location.href='keluhan.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>