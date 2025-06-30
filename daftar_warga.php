<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "RT69";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses hapus data
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query_delete = "DELETE FROM warga WHERE id = '$id'";
    mysqli_query($conn, $query_delete);
    header("Location: daftar_warga.php");
    exit();
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $telepon = $_POST['telepon'];
    
    if (!empty($nama) && !empty($nik) && !empty($telepon)) {
        $query_update = "UPDATE warga SET nama='$nama', nik='$nik', telepon='$telepon' WHERE id='$id'";
        mysqli_query($conn, $query_update);
        header("Location: daftar_warga.php");
        exit();
    }
}

// Proses simpan data baru
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['action'])) {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $telepon = $_POST['telepon'];

    if (!empty($nama) && !empty($nik) && !empty($telepon)) {
        $query_insert = "INSERT INTO warga (nama, nik, telepon) VALUES ('$nama', '$nik', '$telepon')";
        mysqli_query($conn, $query_insert);
        header("Location: daftar_warga.php");
        exit();
    }
}

// Ambil data untuk edit
$edit_data = null;
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query_edit = "SELECT * FROM warga WHERE id = '$id'";
    $result_edit = mysqli_query($conn, $query_edit);
    if ($result_edit && mysqli_num_rows($result_edit) > 0) {
        $edit_data = mysqli_fetch_assoc($result_edit);
    }
}

// Proses pencarian
$search = isset($_GET['search']) ? $_GET['search'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Warga Baru RT 69</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .search-box {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.08);
            border: 1px solid #e8e6d9;
            margin-bottom: 2rem;
        }
        
        .search-form {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .search-input {
            flex: 1;
            min-width: 250px;
            padding: 0.8rem;
            border: 2px solid #e8e6d9;
            border-radius: 6px;
            font-size: 0.95rem;
        }
        
        .search-btn {
            background-color: #7ba05b;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .search-btn:hover {
            background-color: #2d4a22;
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
        }
        
        .btn-edit {
            background-color: #d4952b;
            color: white;
            padding: 0.4rem 0.8rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.8rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-edit:hover {
            background-color: #b8811f;
        }
        
        .btn-delete {
            background-color: #dc3545;
            color: white;
            padding: 0.4rem 0.8rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.8rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-delete:hover {
            background-color: #c82333;
        }
        
        .edit-form {
            background: #f0efea;
            padding: 2rem;
            border-radius: 10px;
            margin-top: 1rem;
            border-left: 4px solid #d4952b;
        }
        
        .form-inline {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            align-items: end;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
        }
        
        .form-group label {
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #2d4a22;
        }
        
        .form-group input {
            padding: 0.8rem;
            border: 2px solid #e8e6d9;
            border-radius: 6px;
            font-size: 0.95rem;
            background: white;
        }
        
        .form-buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
            justify-content: flex-start;
            margin-top: 1rem;
        }
        
        .btn-cancel {
            background-color: #6c757d;
            color: white;
            padding: 0.8rem 1.2rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-cancel:hover {
            background-color: #5a6268;
        }
        
        .btn-update {
            background-color: #d4952b;
            color: white;
            padding: 0.8rem 1.2rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-update:hover {
            background-color: #b8811f;
        }
        
        /* Table responsiveness */
        .table-container {
            overflow-x: auto;
            margin-top: 1rem;
        }
        
        table {
            min-width: 100%;
        }
        
        @media (max-width: 768px) {
            .search-form {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-input {
                min-width: auto;
                margin-bottom: 0.5rem;
            }
            
            .form-inline {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 0.3rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Pendaftaran Warga Baru RT 69</h1>
        <p>Sistem Pendaftaran dan Data Warga</p>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="pengurus.php">Daftar Pengurus</a></li>
            <li><a href="agenda.php">Agenda Kegiatan</a></li>
            <li><a href="keluhan.php">Form Keluhan</a></li>
            <li><a href="daftar_warga.php" class="active">Daftar Warga Baru</a></li>
        </ul>
    </nav>

    <main>
        <!-- Form Pendaftaran -->
        <section>
            <h2><?= $edit_data ? 'Edit Data Warga' : 'Form Pendaftaran Warga Baru' ?></h2>
            <p style="color: #5a6b4f; margin-bottom: 1.5rem; text-align: center;">
                <?= $edit_data ? 'Perbarui data warga yang sudah terdaftar.' : 'Silakan lengkapi formulir berikut untuk mendaftarkan diri sebagai warga baru RT 69.' ?>
            </p>
            
            <?php if ($edit_data): ?>
                <div class="edit-form">
                    <h3 style="color: #2d4a22; margin-bottom: 1.5rem;">Form Edit Data Warga</h3>
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
                        
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap:</label>
                                <input type="text" name="nama" id="nama" required value="<?= htmlspecialchars($edit_data['nama']) ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="nik">NIK:</label>
                                <input type="text" name="nik" id="nik" required value="<?= htmlspecialchars($edit_data['nik']) ?>" maxlength="16" pattern="[0-9]{16}">
                            </div>
                            
                            <div class="form-group">
                                <label for="telepon">No. Telepon:</label>
                                <input type="text" name="telepon" id="telepon" required value="<?= htmlspecialchars($edit_data['telepon']) ?>">
                            </div>
                        </div>
                        
                        <div class="form-buttons">
                            <button type="submit" class="btn-update">Update Data</button>
                            <a href="daftar_warga.php" class="btn-cancel">Batal</a>
                        </div>
                    </form>
                </div>
            <?php else: ?>
                <form action="" method="POST">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" name="nama" id="nama" required placeholder="Masukkan nama lengkap sesuai KTP">

                    <label for="nik">Nomor Induk Kependudukan (NIK):</label>
                    <input type="text" name="nik" id="nik" required placeholder="Masukkan 16 digit NIK" maxlength="16" pattern="[0-9]{16}">

                    <label for="telepon">Nomor Telepon/WhatsApp:</label>
                    <input type="text" name="telepon" id="telepon" required placeholder="Contoh: 081234567890">

                    <button type="submit">Daftar Sebagai Warga Baru</button>
                </form>
                
                <div style="background: #f0efea; padding: 1.5rem; border-radius: 10px; margin-top: 2rem;">
                    <h4 style="color: #2d4a22; margin-bottom: 1rem;">Persyaratan Pendaftaran:</h4>
                    <ul style="color: #5a6b4f; font-size: 0.9rem; line-height: 1.6;">
                        <li>Fotokopi KTP yang masih berlaku</li>
                        <li>Fotokopi Kartu Keluarga (KK)</li>
                        <li>Surat pindah (jika dari luar daerah)</li>
                        <li>Pas foto 3x4 sebanyak 2 lembar</li>
                    </ul>
                </div>
            <?php endif; ?>
        </section>

        <!-- Search Box dan Tabel Data Warga -->
        <section>
            <h2>Data Warga Terdaftar</h2>
            
            <!-- Search Box -->
            <div class="search-box">
                <form method="GET" class="search-form">
                    <input type="text" 
                           name="search" 
                           class="search-input" 
                           placeholder="Cari berdasarkan nama warga..." 
                           value="<?= htmlspecialchars($search) ?>">
                    <button type="submit" class="search-btn">🔍 Cari</button>
                    <?php if ($search): ?>
                        <a href="daftar_warga.php" class="btn-cancel">✖ Reset</a>
                    <?php endif; ?>
                </form>
                <?php if ($search): ?>
                    <p style="color: #5a6b4f; margin-top: 1rem; font-size: 0.9rem;">
                        Hasil pencarian untuk: "<strong><?= htmlspecialchars($search) ?></strong>"
                    </p>
                <?php endif; ?>
            </div>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 50px; text-align: center;">No</th>
                            <th style="min-width: 200px;">Nama Lengkap</th>
                            <th style="min-width: 150px;">NIK</th>
                            <th style="min-width: 130px;">No. Telepon</th>
                            <th style="width: 120px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        
                        // Query dengan pencarian
                        if ($search) {
                            $query = "SELECT * FROM warga WHERE nama LIKE '%$search%' ORDER BY id DESC";
                        } else {
                            $query = "SELECT * FROM warga ORDER BY id DESC";
                        }
                        
                        $result = mysqli_query($conn, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Highlight nama jika ada pencarian
                                $nama_display = $row['nama'];
                                if ($search) {
                                    $nama_display = str_ireplace($search, '<mark style="background: #fff3cd; padding: 2px 4px; border-radius: 3px;">' . $search . '</mark>', $nama_display);
                                }
                                
                                echo "<tr>
                                        <td style='text-align: center;'>{$no}</td>
                                        <td>{$nama_display}</td>
                                        <td>{$row['nik']}</td>
                                        <td>{$row['telepon']}</td>
                                        <td style='text-align: center;'>
                                            <div class='action-buttons'>
                                                <a href='?action=edit&id={$row['id']}' class='btn-edit'>✏️ Edit</a>
                                                <a href='?action=delete&id={$row['id']}' class='btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data {$row['nama']}?\")'>🗑️ Hapus</a>
                                            </div>
                                        </td>
                                      </tr>";
                                $no++;
                            }
                        } else {
                            $colspan = 5;
                            $message = $search ? "Tidak ada data warga dengan nama '$search'" : "Belum ada data warga terdaftar";
                            echo "<tr><td colspan='$colspan' style='text-align: center; color: #5a6b4f; font-style: italic; padding: 2rem;'>$message</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        
        <!-- Informasi Tambahan -->
        <section style="background: #f0efea;">
            <h2>Alur Pendaftaran Warga Baru</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 2rem; margin-top: 2rem;">
                <div style="text-align: center; padding: 1.5rem;">
                    <div style="background: #7ba05b; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-weight: bold; font-size: 1.2rem;">1</div>
                    <h4 style="color: #2d4a22; margin-bottom: 0.8rem;">Isi Formulir</h4>
                    <p style="color: #5a6b4f; font-size: 0.9rem; line-height: 1.5;">Lengkapi formulir pendaftaran dengan data yang valid dan sesuai KTP</p>
                </div>
                
                <div style="text-align: center; padding: 1.5rem;">
                    <div style="background: #7ba05b; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-weight: bold; font-size: 1.2rem;">2</div>
                    <h4 style="color: #2d4a22; margin-bottom: 0.8rem;">Verifikasi Data</h4>
                    <p style="color: #5a6b4f; font-size: 0.9rem; line-height: 1.5;">Pengurus akan memverifikasi data yang telah diinput oleh calon warga</p>
                </div>
                
                <div style="text-align: center; padding: 1.5rem;">
                    <div style="background: #7ba05b; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-weight: bold; font-size: 1.2rem;">3</div>
                    <h4 style="color: #2d4a22; margin-bottom: 0.8rem;">Serahkan Berkas</h4>
                    <p style="color: #5a6b4f; font-size: 0.9rem; line-height: 1.5;">Serahkan berkas fisik ke ketua RT untuk finalisasi pendaftaran</p>
                </div>
                
                <div style="text-align: center; padding: 1.5rem;">
                    <div style="background: #7ba05b; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-weight: bold; font-size: 1.2rem;">4</div>
                    <h4 style="color: #2d4a22; margin-bottom: 0.8rem;">Warga Terdaftar</h4>
                    <p style="color: #5a6b4f; font-size: 0.9rem; line-height: 1.5;">Selamat! Anda resmi menjadi warga RT 69</p>
                </div>
            </div>
        </section>
        
        <section>
            <h2>Kontak untuk Bantuan</h2>
            <div style="background: #f0efea; padding: 2rem; border-radius: 10px; text-align: center;">
                <h3 style="color: #2d4a22; margin-bottom: 1rem;">Butuh Bantuan Pendaftaran?</h3>
                <p style="color: #5a6b4f; margin-bottom: 2rem;">
                    Jika mengalami kesulitan dalam proses pendaftaran, silakan hubungi:
                </p>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; max-width: 600px; margin: 0 auto;">
                    <div style="background: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                        <h4 style="color: #2d4a22; margin-bottom: 0.8rem;">Ketua RT</h4>
                        <p style="color: #5a6b4f; font-size: 1rem; margin-bottom: 0.5rem;">Rayhan Ilham Alfianto</p>
                        <a href="https://wa.me/628812028411" style="color: #7ba05b; font-weight: 500; font-size: 0.9rem;">Pendaftaran & Informasi Umum</a>
                    </div>
                    
                    <div style="background: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                        <h4 style="color: #2d4a22; margin-bottom: 0.8rem;">Sekretaris</h4>
                        <p style="color: #5a6b4f; font-size: 1rem; margin-bottom: 0.5rem;">Janeta Tefa Putra</p>
                        <a href ="https://wa.me/6285865752281" style="color: #7ba05b; font-weight: 500; font-size: 0.9rem;">Administrasi & Berkas</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Sistem Informasi RT 69. kelompok 2 terkeren di bumi.</p>
    </footer>

    <script>
        // Auto focus pada search input jika ada parameter search
        <?php if ($search): ?>
        document.querySelector('.search-input').focus();
        <?php endif; ?>
    </script>
</body>
</html>