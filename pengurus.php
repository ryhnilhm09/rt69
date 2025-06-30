<?php
$pengurus = [
    [
        "nama" => "Rayhan Ilham Alfianto",
        "img" => "images/ryhn.jpg",
        "instagram" => "https://www.instagram.com/rayhan_ilham/",
        "jabatan" => "Ketua RT"
    ],
    [
        "nama" => "M Diaz Pramudya",
        "img" => "images/dias.jpg",
        "instagram" => "https://www.instagram.com/mdiazp20_/",
        "jabatan" => "Wakil Ketua"
    ],
    [
        "nama" => "Janeta Tefa Putra",
        "img" => "images/janet.jpg",
        "instagram" => "https://www.instagram.com/janetaputra/",
        "jabatan" => "Sekretaris"
    ],
    [
        "nama" => "Bimo Febriyanto",
        "img" => "images/bimo.jpg",
        "instagram" => "https://www.instagram.com/bimofebri_/",
        "jabatan" => "Bendahara"
    ],
    [
        "nama" => "Agung Budi Santoso",
        "img" => "images/agung.jpg",
        "instagram" => "https://www.instagram.com/agungbudisants/",
        "jabatan" => "Anggota"
    ],
    [
        "nama" => "Naomi Damelina",
        "img" => "images/nomi.jpg",
        "instagram" => "https://www.instagram.com/nomidmln_/",
        "jabatan" => "Anggota"
    ],
    [
        "nama" => "Ayu Djaenah",
        "img" => "images/ayu.jpg",
        "instagram" => "https://www.instagram.com/honey3pie/",
        "jabatan" => "Anggota"
    ],
    [
        "nama" => "Kevin Apriliano",
        "img" => "images/kevin.jpg",
        "instagram" => "https://www.instagram.com/notabmf/",
        "jabatan" => "Anggota"
    ],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengurus RT 69</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Daftar Pengurus RT 69</h1>
    <p>Kepengurusan Periode 2025</p>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="pengurus.php" class="active">Daftar Pengurus</a></li>
        <li><a href="agenda.php">Agenda Kegiatan</a></li>
        <li><a href="keluhan.php">Form Keluhan</a></li>
        <li><a href="daftar_warga.php">Daftar Warga Baru</a></li>
    </ul>
</nav>

<main>
    <section>
        <h2>Susunan Pengurus RT 69</h2>
        <p class="agenda-intro">
            Berikut adalah susunan pengurus RT 69 yang terpilih dan siap melayani kepentingan warga dengan penuh dedikasi dan tanggung jawab.
        </p>
        
        <div class="pengurus-list">
            <?php foreach ($pengurus as $p): ?>
                <div class="pengurus-item">
                    <div class="pengurus-img-wrap">
                        <img src="<?= htmlspecialchars($p['img']) ?>" alt="Foto <?= htmlspecialchars($p['nama']) ?>">
                        <span class="jabatan"><?= htmlspecialchars($p['jabatan']) ?></span>
                    </div>
                    <div class="pengurus-info">
                        <h3>
                            <a href="<?= htmlspecialchars($p['instagram']) ?>" class="pengurus-link" target="_blank">
                                <?= htmlspecialchars($p['nama']) ?>
                            </a>
                        </h3>
                        <p style="color: #5a6b4f; font-size: 0.9rem; margin-top: 0.5rem;">
                            Klik nama untuk melihat profil
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    
    <section style="background: #f0efea;">
        <h2>Tugas dan Tanggung Jawab</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-top: 1.5rem;">
            <div style="background: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                <h3 style="color: #2d4a22; margin-bottom: 1rem;">Ketua RT</h3>
                <ul style="color: #5a6b4f; line-height: 1.6;">
                    <li>Memimpin dan mengkoordinasikan kegiatan RT</li>
                    <li>Mewakili RT dalam berbagai kegiatan</li>
                    <li>Bertanggung jawab atas kesejahteraan warga</li>
                    <li>Mengambil keputusan strategis untuk RT</li>
                </ul>
            </div>
            
            <div style="background: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                <h3 style="color: #2d4a22; margin-bottom: 1rem;">Wakil Ketua</h3>
                <ul style="color: #5a6b4f; line-height: 1.6;">
                    <li>Membantu tugas-tugas Ketua RT</li>
                    <li>Menggantikan Ketua jika berhalangan</li>
                    <li>Mengkoordinasikan program-program RT</li>
                    <li>Menjadi penghubung dengan warga</li>
                </ul>
            </div>
            
            <div style="background: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                <h3 style="color: #2d4a22; margin-bottom: 1rem;">Sekretaris</h3>
                <ul style="color: #5a6b4f; line-height: 1.6;">
                    <li>Mencatat dan mendokumentasikan kegiatan</li>
                    <li>Mengelola surat-menyurat RT</li>
                    <li>Membuat laporan kegiatan</li>
                    <li>Mengatur administrasi RT</li>
                </ul>
            </div>
            
            <div style="background: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                <h3 style="color: #2d4a22; margin-bottom: 1rem;">Bendahara</h3>
                <ul style="color: #5a6b4f; line-height: 1.6;">
                    <li>Mengelola keuangan RT</li>
                    <li>Membuat laporan keuangan</li>
                    <li>Mengatur kas RT</li>
                    <li>Bertanggung jawab atas transparansi keuangan</li>
                </ul>
            </div>
        </div>
    </section>
    
    <section>
        <h2>Kontak Pengurus</h2>
        <div style="background: #f0efea; padding: 2rem; border-radius: 10px; text-align: center;">
            <h3 style="color: #2d4a22; margin-bottom: 1rem;">Hubungi Kami</h3>
            <p style="color: #5a6b4f; margin-bottom: 1.5rem;">
                Untuk keperluan resmi RT, silakan hubungi pengurus melalui kontak berikut:
            </p>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
                <div style="background: white; padding: 1rem; border-radius: 8px;">
                    <h4 style="color: #2d4a22; margin-bottom: 0.5rem;">Ketua RT</h4>
                    <p style="color: #5a6b4f; font-size: 0.9rem;">Rayhan Ilham Alfianto</p>
                    <a href="https://wa.me/628812028411" style="color: #7ba05b; font-weight: 500;">Untuk urusan umum RT</a>
                </div>
                <div style="background: white; padding: 1rem; border-radius: 8px;">
                    <h4 style="color: #2d4a22; margin-bottom: 0.5rem;">Sekretaris</h4>
                    <p style="color: #5a6b4f; font-size: 0.9rem;">Janeta Tefa Putra</p>
                    <a href ="https://wa.me/6285865752281" style="color: #7ba05b; font-weight: 500;">Untuk urusan administrasi</a>
                </div>
                <div style="background: white; padding: 1rem; border-radius: 8px;">
                    <h4 style="color: #2d4a22; margin-bottom: 0.5rem;">Bendahara</h4>
                    <p style="color: #5a6b4f; font-size: 0.9rem;">Bimo Febriyanto</p>
                    <a href="https://wa.me/6285776155158" style="color: #7ba05b; font-weight: 500;">Untuk urusan keuangan</a>
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