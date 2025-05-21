<?php
error_reporting(0);
session_start();
$sesi = $_SESSION['level'];
if ($sesi == "" || $sesi == "user") {
    header("location:login.php");
}

require 'functions.php';

$nilai = query("SELECT * FROM nilai2 ORDER BY id_nilai2");
$sus = count($nilai);

if ($sus == 0) {
    $jadi = 1;
} else {
    $jadi = 2;
}

?>

<html>
<head>
<title>Halaman Nilai</title>
<link rel="stylesheet" href="css1/nilai_style.css">
</head>
<body>

<div class="content">
    <header>
        <h2 class="judul">Selamat Datang di SISTEM PENDUKUNG KEPUTUSAN SMK NEGERI 1 JAMBI</h2>
        <p align="center">Jl. Jend. A. Thalib, Simpang IV Sipin, Kec. Telanaipura, Kota Jambi, Provinsi Jambi.</p>
    </header>
    <nav>
        <ul>
            <li id="home"><a href="index.php">Home</a></li>
            <li id="home"><a href="dataguru.php">Data Guru</a></li>
            <li><a href="nilai.php">Kriteria</a></li>
            <li><a href="ubahBobot.php">Perhitungan</a></li>
            <li><a href="report.php">Hasil SPK</a></li>
            <li><a href="logout.php" onclick="return confirm('Apakah anda ingin keluar?');">Logout</a></li>
        </ul>
    </nav>

    <header>
        <h3 align="center">Halaman Nilai</h3>
    </header>
    <br></br>

    <a href="tambah/coba.php" class="button">Tambah Nilai Guru</a>

    <hr>

    <?php if ($jadi == 1) : ?>
        <center><span class="blink">Data Kosong, Silahkan Klik Tambah Nilai</span></center>
    <?php else : ?>
        <center>
            <table cellspacing="0">
                <tr>
                    <th>NO.</th>
                    <th>Nama</th>
                    <th>Perencanaan Pembelajaran <br> dan Evaluasi</th>
                    <th>Pengembangan dan Peningkatan <br> Kualitas Pembelajaran</th>
                    <th>Manajemen Administrasi <br> Pendidikan</th>
                    <th>Pengelolaan Soal dan <br> Materi Pembelajaran</th>
                    <th colspan="2">AKSI</th>
                </tr>

                <?php $i = 1; ?>
                <?php foreach ($nilai as $row) : ?>
                    <?php
                    // logika untuk menentukan nilai 

                    $jumlah_k1 = $row["k1"] + $row["k2"] + $row["k3"] + $row["k4"] + $row["k5"] + $row["k6"] + $row["k7"];
                    $kriteria1 = ($jumlah_k1 / 28) * 100;

                    $jumlah_k2 = $row["k8"] + $row["k9"] + $row["k10"] + $row["k11"];
                    $kriteria2 = ($jumlah_k2 / 16) * 100;

                    $jumlah_k3 = $row["k12"] + $row["k13"];
                    $kriteria3 = ($jumlah_k3 / 8) * 100;

                    $jumlah_k4 = $row["k14"];
                    $kriteria4 = ($jumlah_k4 / 4) * 100;

                    // Menambahkan rating berdasarkan rentang nilai
                    $rating1 = getRating($kriteria1);
                    $rating2 = getRating($kriteria2);
                    $rating3 = getRating($kriteria3);
                    $rating4 = Rating($kriteria4);
                    ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["nama"]; ?></td>
                        <td><?php echo $rating1; ?></td>
                        <td><?php echo $rating2; ?></td>
                        <td><?php echo $rating3; ?></td>
                        <td><?php echo $rating4; ?></td>
                        <td>
                            <a href="tambah/ubah_nilai.php?id=<?= $row["id_nilai2"]; ?>" class="aksi">Ubah</a> |
                            <a href="hapus/hapus_nilai.php?id=<?= $row["id_nilai2"]; ?>" class="aksi" onclick="return confirm('yakin ingin menghapus?');">hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </center>
    <?php endif; ?>
</div>

</body>
</html>

<?php
// Fungsi untuk mendapatkan rating berdasarkan rentang nilai
function getRating($nilai)
{
    if ($nilai >= 85 && $nilai <= 100) {
        return "4";
    } elseif ($nilai >= 70 && $nilai < 85) {
        return "3";
    } elseif ($nilai >= 50 && $nilai < 70) {
        return "2";
    } else {
        return "1";
    }
}

function Rating($nilai)
{
    if ($nilai == 100) {
        return "4";
    } elseif ($nilai == 75) {
        return "3";
    } elseif ($nilai == 50) {
        return "2";
    } else {
        return "1";
    }
}
?>
