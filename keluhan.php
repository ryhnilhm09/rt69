<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Keluhan Warga RT 69</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "RT69";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<header>
    <h1>Form Keluhan Warga RT 69</h1>
    <p>Saluran Aspirasi dan Keluhan Warga</p>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="pengurus.php">Daftar Pengurus</a></li>
        <li><a href="agenda.php">Agenda Kegiatan</a></li>
        <li><a href="keluhan.php" class="active">Form Keluhan</a></li>
        <li><a href="daftar_warga.php">Daftar Warga Baru</a></li>
    </ul>
</nav>

<main>
    <div class="container">
        <!-- Form Input Keluhan -->
        <section>
            <h2>Sampaikan Keluhan Anda</h2>
            <p style="color: #5a6b4f; margin-bottom: 1.5rem; text-align: center;">
                Kami menghargai setiap masukan dan keluhan dari warga. Silakan sampaikan dengan sopan dan jelas.
            </p>
            <form action="process_keluhan.php" method="POST">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama" required placeholder="Masukkan nama lengkap Anda">
                
                <label for="keluhan">Isi Keluhan atau Saran:</label>
                <textarea id="keluhan" name="keluhan" rows="6" required placeholder="Jelaskan keluhan atau saran Anda dengan detail"></textarea>
                
                <button type="submit">Kirim Keluhan</button>
            </form>
        </section>

        <!-- Tabel Daftar Keluhan -->
        <section>
            <h2>Daftar Keluhan Warga</h2>
            <p style="color: #5a6b4f; margin-bottom: 1rem; text-align: center; font-size: 0.9rem;">
                Berikut adalah keluhan yang telah masuk dan sedang ditindaklanjuti oleh pengurus RT.
            </p>
            <table>
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 150px;">Nama</th>
                        <th>Keluhan</th>
                        <th style="width: 100px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = "SELECT * FROM keluhan ORDER BY id DESC";
                    $result = mysqli_query($conn, $query);

                    // Cek jika query gagal
                    if (!$result) {
                        echo "<tr><td colspan='4' style='text-align: center; color: #7ba05b;'>Gagal mengambil data: " . mysqli_error($conn) . "</td></tr>";
                    } else {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $status = ($no % 3 == 1) ? "Ditindaklanjuti" : (($no % 3 == 2) ? "Dalam Proses" : "Selesai");
                                $statusColor = ($status == "Selesai") ? "#7ba05b" : (($status == "Dalam Proses") ? "#d4952b" : "#5a6b4f");
                                
                                echo "<tr>
                                        <td style='text-align: center;'>" . $no . "</td>
                                        <td>" . htmlspecialchars($row['nama']) . "</td>
                                        <td>" . htmlspecialchars($row['keluhan']) . "</td>
                                        <td style='text-align: center;'>
                                            <span style='background: " . $statusColor . "; color: white; padding: 0.3rem 0.6rem; border-radius: 12px; font-size: 0.8rem;'>" . $status . "</span>
                                        </td>
                                      </tr>";
                                $no++;
                            }
                        } else {
                            echo "<tr><td colspan='4' style='text-align: center; color: #5a6b4f; font-style: italic;'>Belum ada keluhan yang masuk</td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
    
    <!-- Informasi Tambahan -->
    <section style="background: #f0efea;">
        <h2>Panduan Pengajuan Keluhan</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-top: 1.5rem;">
            <div style="text-align: center; padding: 1rem;">
                <div style="font-size: 2.5rem; color: #7ba05b; margin-bottom: 0.8rem;">📝</div>
                <h4 style="color: #2d4a22; margin-bottom: 0.5rem;">Jelas dan Sopan</h4>
                <p style="color: #5a6b4f; font-size: 0.9rem;">Sampaikan keluhan dengan bahasa yang jelas, sopan, dan mudah dipahami</p>
            </div>
            
            <div style="text-align: center; padding: 1rem;">
                <div style="font-size: 2.5rem; color: #7ba05b; margin-bottom: 0.8rem;">🎯</div>
                <h4 style="color: #2d4a22; margin-bottom: 0.5rem;">Spesifik</h4>
                <p style="color: #5a6b4f; font-size: 0.9rem;">Berikan detail yang spesifik mengenai masalah yang dihadapi</p>
            </div>
            
            <div style="text-align: center; padding: 1rem;">
                <div style="font-size: 2.5rem; color: #7ba05b; margin-bottom: 0.8rem;">💡</div>
                <h4 style="color: #2d4a22; margin-bottom: 0.5rem;">Saran Solusi</h4>
                <p style="color: #5a6b4f; font-size: 0.9rem;">Jika memungkinkan, berikan saran solusi untuk mengatasi masalah</p>
            </div>
            
            <div style="text-align: center; padding: 1rem;">
                <div style="font-size: 2.5rem; color: #7ba05b; margin-bottom: 0.8rem;">⏰</div>
                <h4 style="color: #2d4a22; margin-bottom: 0.5rem;">Respon Cepat</h4>
                <p style="color: #5a6b4f; font-size: 0.9rem;">Keluhan akan ditindaklanjuti maksimal 3x24 jam setelah diterima</p>
            </div>
        </div>
    </section>
    
    <section>
        <h2>Kontak Langsung</h2>
        <div style="background: #f0efea; padding: 2rem; border-radius: 10px; text-align: center;">
            <h3 style="color: #2d4a22; margin-bottom: 1rem;">Butuh Bantuan Segera?</h3>
            <p style="color: #5a6b4f; margin-bottom: 1.5rem;">
                Untuk keluhan yang memerlukan penanganan segera, silakan hubungi langsung:
            </p>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; max-width: 600px; margin: 0 auto;">
                <div style="background: white; padding: 1rem; border-radius: 8px;">
                    <h4 style="color: #2d4a22; margin-bottom: 0.5rem;">Ketua RT</h4>
                    <p style="color: #5a6b4f; font-size: 0.9rem; margin-bottom: 0.3rem;">Rayhan Ilham Alfianto</p>
                    <a href="https://wa.me/628812028411" style="color: #7ba05b; font-weight: 500; font-size: 0.8rem;">Keluhan Umum</a>
                </div>
                
                <div style="background: white; padding: 1rem; border-radius: 8px;">
                    <h4 style="color: #2d4a22; margin-bottom: 0.5rem;">Wakil Ketua</h4>
                    <p style="color: #5a6b4f; font-size: 0.9rem; margin-bottom: 0.3rem;">Diaz</p>
                    <a href="http://wa.me/6289509443607" style="color: #7ba05b; font-weight: 500; font-size: 0.8rem; text-decoration: none;">Keluhan Mendesak</a>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 Sistem Informasi RT 69. kelompok 2 terkeren di bumi.</p>
</footer>

</body>
</html>