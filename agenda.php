<?php
$kegiatan = [
	["gambar" => "images/pengurus.jpg"],
    ["gambar" => "images/makan_makan.jpg"],
    ["gambar" => "images/bukber.jpg"],
    ["gambar" => "images/makrab.jpg"],
	["gambar" => "images/liburan.jpg"],
	["gambar" => "images/ngumpul_bareng.jpg"],
    ["gambar" => "images/olahraga.jpg"],
];
$vidio_kegiatan = [
	"vidio/bakar-bakar.mp4",
    "vidio/liburan2.mp4",
    "vidio/liburan3.mp4",
    "vidio/kenangan.mp4",
];	
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Kegiatan RT 69</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Agenda Kegiatan RT 69</h1>
    <p>Dokumentasi Kegiatan dan Program RT</p>
</header>

<nav>
    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="pengurus.php">Daftar Pengurus</a></li>
        <li><a href="agenda.php" class="active">Agenda Kegiatan</a></li>
        <li><a href="keluhan.php">Form Keluhan</a></li>
        <li><a href="daftar_warga.php">Daftar Warga Baru</a></li>
    </ul>
</nav>

<main>
    <section>
        <h2>Galeri Kegiatan RT 69</h2>
        <p class="agenda-intro">
            Berikut adalah dokumentasi berbagai kegiatan yang telah dilaksanakan oleh RT 69. Semua kegiatan ini bertujuan untuk mempererat tali silaturahmi antar warga dan membangun komunitas yang solid.
        </p>
        <div class="agenda-slider-no-desc">
            <?php foreach ($kegiatan as $k): ?>
                <div class="agenda-slide-no-desc">
                    <img src="<?= htmlspecialchars($k['gambar']) ?>" alt="Kegiatan RT 69">
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    
    <section style="background: #f0efea;">
        <h2>Video Kegiatan RT 69</h2>
        <p class="agenda-intro">
            Saksikan momen-momen berharga kegiatan RT 69 melalui video dokumentasi berikut ini.
        </p>
		<div class="vidio-container">
			<?php foreach ($vidio_kegiatan as $video): ?>
			 <video controls class="video-kegiatan">
				<source src="<?= htmlspecialchars($video) ?>" type="video/mp4">
				Browser Anda tidak mendukung pemutaran video.
            </video>
            <?php endforeach; ?>
		</div>	
    </section>
    
    <section>
        <h2>Agenda Kegiatan Mendatang</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-top: 1.5rem;">
            <div style="background: #f0efea; padding: 1.5rem; border-radius: 10px; border-left: 4px solid #7ba05b;">
                <h3 style="color: #2d4a22; margin-bottom: 1rem;">Rapat Bulanan</h3>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Tanggal:</strong> Setiap minggu pertama bulan</p>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Waktu:</strong> 19:00 - 21:00 WIB</p>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Tempat:</strong> Balai RT 69</p>
                <p style="color: #5a6b4f;">Pembahasan program kerja dan evaluasi kegiatan RT</p>
            </div>
            
            <div style="background: #f0efea; padding: 1.5rem; border-radius: 10px; border-left: 4px solid #7ba05b;">
                <h3 style="color: #2d4a22; margin-bottom: 1rem;">Kerja Bakti</h3>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Tanggal:</strong> Setiap minggu kedua bulan</p>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Waktu:</strong> 07:00 - 10:00 WIB</p>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Tempat:</strong> Lingkungan RT 69</p>
                <p style="color: #5a6b4f;">Gotong royong membersihkan lingkungan bersama</p>
            </div>
            
            <div style="background: #f0efea; padding: 1.5rem; border-radius: 10px; border-left: 4px solid #7ba05b;">
                <h3 style="color: #2d4a22; margin-bottom: 1rem;">Arisan RT</h3>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Tanggal:</strong> Setiap minggu ketiga bulan</p>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Waktu:</strong> 19:30 - 22:00 WIB</p>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Tempat:</strong> Rumah anggota bergantian</p>
                <p style="color: #5a6b4f;">Kegiatan arisan bulanan untuk mempererat silaturahmi</p>
            </div>
            
            <div style="background: #f0efea; padding: 1.5rem; border-radius: 10px; border-left: 4px solid #7ba05b;">
                <h3 style="color: #2d4a22; margin-bottom: 1rem;">Senam Sehat</h3>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Tanggal:</strong> Setiap Jumat pagi</p>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Waktu:</strong> 06:00 - 07:00 WIB</p>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Tempat:</strong> Lapangan RT 69</p>
                <p style="color: #5a6b4f;">Olahraga bersama untuk menjaga kesehatan warga</p>
            </div>
            
            <div style="background: #f0efea; padding: 1.5rem; border-radius: 10px; border-left: 4px solid #7ba05b;">
                <h3 style="color: #2d4a22; margin-bottom: 1rem;">Posyandu</h3>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Tanggal:</strong> Setiap tanggal 20</p>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Waktu:</strong> 08:00 - 11:00 WIB</p>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Tempat:</strong> Balai RT 69</p>
                <p style="color: #5a6b4f;">Pelayanan kesehatan untuk ibu dan anak</p>
            </div>
            
            <div style="background: #f0efea; padding: 1.5rem; border-radius: 10px; border-left: 4px solid #7ba05b;">
                <h3 style="color: #2d4a22; margin-bottom: 1rem;">Pengajian Rutin</h3>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Tanggal:</strong> Setiap Selasa malam</p>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Waktu:</strong> 19:00 - 21:00 WIB</p>
                <p style="color: #5a6b4f; margin-bottom: 0.5rem;"><strong>Tempat:</strong> Masjid setempat</p>
                <p style="color: #5a6b4f;">Kegiatan keagamaan untuk meningkatkan iman</p>
            </div>
        </div>
    </section>
    
    <section style="background: #f0efea;">
        <h2>Program Tahunan RT 69</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-top: 1.5rem;">
            <div style="background: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); text-align: center;">
                <div style="font-size: 2.5rem; color: #7ba05b; margin-bottom: 1rem;">🎉</div>
                <h3 style="color: #2d4a22; margin-bottom: 0.8rem;">HUT RI</h3>
                <p style="color: #5a6b4f;">Perayaan Hari Kemerdekaan dengan berbagai lomba dan kegiatan menarik</p>
            </div>
            
            <div style="background: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); text-align: center;">
                <div style="font-size: 2.5rem; color: #7ba05b; margin-bottom: 1rem;">🍽️</div>
                <h3 style="color: #2d4a22; margin-bottom: 0.8rem;">Buka Bersama</h3>
                <p style="color: #5a6b4f;">Kegiatan berbuka puasa bersama di bulan Ramadhan</p>
            </div>
            
            <div style="background: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); text-align: center;">
                <div style="font-size: 2.5rem; color: #7ba05b; margin-bottom: 1rem;">🎂</div>
                <h3 style="color: #2d4a22; margin-bottom: 0.8rem;">HUT RT</h3>
                <p style="color: #5a6b4f;">Perayaan ulang tahun RT dengan acara hiburan dan doorprize</p>
            </div>
            
            <div style="background: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); text-align: center;">
                <div style="font-size: 2.5rem; color: #7ba05b; margin-bottom: 1rem;">🏕️</div>
                <h3 style="color: #2d4a22; margin-bottom: 0.8rem;">Family Gathering</h3>
                <p style="color: #5a6b4f;">Rekreasi bersama keluarga untuk mempererat hubungan antar warga</p>
            </div>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 Sistem Informasi RT 69. kelompok 2 terkeren di bumi.</p>
</footer>

</body>
</html>