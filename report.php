<?php
error_reporting(0);
session_start();
$sesi = $_SESSION['level'];
if( $sesi == "" || $sesi == "user" ){
    header("location:login.php");
}


require 'functions.php';

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM bobot ")[0];
$nilai = query("SELECT * FROM nilai2");
?>

<html>
<head>
        <title>Hasil Perangkingan</title>
        <link rel="stylesheet" href="css1/style_hasil1.css">
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
                <li ><a href="dataguru.php">Data Guru</a></li>
                <li><a href="nilai.php">Kriteria</a></li>
                <li><a href="ubahBobot.php">Perhitungan</a></li>
                <li><a href="report.php">Hasil SPK</a></li>
                <li><a href="logout.php" onclick="return confirm('Apakah anda ingin keluar?');">Logout</a></li>
            </ul>
        </nav>


        <?php if ($mhs["c1"] == 0 ) : ?>
        <br><br>
        <center><span>Ubahlah Bobot Terlebih Dahulu, Pada Halaman SPK</span><center>
        <?php elseif ($mhs["c2"] == 0 ) : ?>
        <br><br>
        <center><span>Ubahlah Semua Bobot Terlebih Dahulu, Pada Halaman SPK</span><center>
        <?php elseif ($mhs["c3"] == 0 ) : ?>
        <br><br>
        <center><span>Ubahlah Semua Bobot Terlebih Dahulu, Pada Halaman SPK</span><center>
        <?php elseif ($mhs["c4"] == 0 ) : ?>
        <br><br>
        <center><span>Ubahlah Semua Bobot Terlebih Dahulu, Pada Halaman SPK</span><center>

        <?php else : ?>

        <header>
            <h3 align="center">Hasil Perangkingan</h3>
        </header>
    
        <?php $jumlahBobot = $mhs["c1"] + $mhs["c2"] + $mhs["c3"] + $mhs["c4"];?>    
        <?php 
           $w1 = $mhs["c1"] / $jumlahBobot;
           $w2 = $mhs["c2"] / $jumlahBobot;
           $w3 = $mhs["c3"] / $jumlahBobot;
           $w4 = $mhs["c4"] / $jumlahBobot;
        ?>

    <?php $jumlah = 0; ?>
    <?php foreach ($nilai as $langkah1) :  ?>
        <?php 
        $jumlah_k1 = $langkah1["k1"] + $langkah1["k2"] + $langkah1["k3"] + $langkah1["k4"] + $langkah1["k5"] + $langkah1["k6"] + $langkah1["k7"];    
        $kriteria1 = ($jumlah_k1 / 28) * 100;
        
        $jumlah_k2 = $langkah1["k8"] + $langkah1["k9"] + $langkah1["k10"] + $langkah1["k11"];    
        $kriteria2 = ($jumlah_k2 / 16) * 100;

        $jumlah_k3 = $langkah1["k12"] + $langkah1["k13"];
        $kriteria3 = ($jumlah_k3 / 8) * 100;

        $jumlah_k4 = $langkah1["k14"];    
        $kriteria4 = ($jumlah_k4 / 4) * 100;

        $rating1 = getRating($kriteria1);
        $rating2 = getRating($kriteria2);
        $rating3 = getRating($kriteria3);
        $rating4 = Rating($kriteria4);

        
        
    ?>
    
    <?php $hitung2 =  $rating1 ** $w1 * 
                    $rating2 ** $w2 * 
                    $rating3 ** $w3 *  
                    $rating4 ** $w4;?>

    <?php $jumlah += $hitung2; ?>
    <?php endforeach; ?>



<h3 align="center">Tabel Nilai dan Perhitungan</h3>

    <table align="center" class="table1">
    <tr>
        <th rowspan="2">NO.</th>
        <th rowspan="2">Nama</th>
        <th colspan="4">Nilai</th>
        <th colspan="2">Nilai Perhitungan</th>
    </tr>
    <tr>
    <th>Perencanaan Pembelajaran  <br> dan Evaluasi</th>
    <th>Pengembangan dan Peningkatan  <br> Kualitas Pembelajaran</th>
    <th>Manajemen Administrasi  <br> Pendidikan</th>
    <th>Pengelolaan Soal dan <br> Materi Pembelajaran</th>
    <th>Hasil vektor S</th>
    <th>Hasil vektor V</th>
    </tr>
    <?php $j = 0; ?>
    <?php $i=1; ?>
    <?php foreach ($nilai as $langkah2) :  ?>
        <?php 
        $jumlah_k1 = $langkah2["k1"] + $langkah2["k2"] + $langkah2["k3"] + $langkah2["k4"] + $langkah2["k5"] + $langkah2["k6"] + $langkah2["k7"];    
        $kriteria1 = ($jumlah_k1 / 28) * 100;
        
        $jumlah_k2 = $langkah2["k8"] + $langkah2["k9"] + $langkah2["k10"] + $langkah2["k11"];    
        $kriteria2 = ($jumlah_k2 / 16) * 100;

        $jumlah_k3 = $langkah2["k12"] + $langkah2["k13"];
        $kriteria3 = ($jumlah_k3 / 8) * 100;

        $jumlah_k4 = $langkah2["k14"];    
        $kriteria4 = ($jumlah_k4 / 4) * 100;
        
        $rating1 = getRating($kriteria1);
        $rating2 = getRating($kriteria2);
        $rating3 = getRating($kriteria3);
        $rating4 = Rating($kriteria4);
        
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $langkah2["nama"]; ?></td>
        <td><?php echo $rating1 ; ?></td>
        <td><?php echo $rating2 ; ?></td>
        <td><?php echo $rating3 ; ?></td>
        <td><?php echo $rating4 ; ?></td>
        <?php $hitung3 =  $rating1 ** $w1 * 
                        $rating2 ** $w2 * 
                        $rating3 ** $w3 *  
                        $rating4 ** $w4;?>
        <td><?php echo number_format($hitung3, 4); ?></td>
        <?php $kesimpulan = $hitung3/ $jumlah; ?>
        <td> <?php echo number_format($kesimpulan, 4); ?> </td>
        <?php $urut[] = number_format($kesimpulan, 4) . " " .  " ( " .  $langkah2["nama"] . " ) "; ?>        
    <?php $i++; ?>
    <?php $j++ ?>
    <?php endforeach; ?>
    </tr>
    <tr>
    <td colspan="6" align="right"> Jumlah </td>
    <td><?php echo number_format($jumlah, 4); ?></td>    
    </tr>
</table>

<?php rsort($urut); ?>
<br>
<p align="center">Berikut adalah hasil akhir dari perhitungan Metode Weighted Product</p>
<h3 align="center">Hasil Kesimpulan</h3>
<table align="center" class="table1" >

    <tr>
        <th>Peringkat</th>
        <th>Nama dan Hasil Akhir</th>
    </tr>
<?php $c = 1; ?>
<?php $jumlah = $j; ?>
<?php for( $x=0; $x < $jumlah; $x++ ) : ?>
    <tr>
        <td><?php echo $c; ?></td>
        <td><?php echo $urut[$x]; ?></td>
     </tr>
    
<?php $c++ ?>
<?php endfor; ?>
</table>
<br>
<hr>
<p>*Ubah kedalam format pdf</p>
<form action="cetak.php" method="post">
<select class="cari" name="semester" id="" required>
<option value="">Masukkan Semester</option>
<option value="Genap">Genap</option>
<option value="Ganjil">Ganjil</option>
</select>
<input type="date" class="cari" name="tahun" placeholder="Masukkan Tanggal" required>
<input type="text" class="cari" name="pimpinan" placeholder="Masukkan Nama" required>
<input type="text" class="cari" name="nip" placeholder="Masukkan NIP" required>
<button type="submit" target="blank"  class="cari" name="submit" required><a href="cetak.php"></a> Print</button>
</form>
<?php endif ;?>
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