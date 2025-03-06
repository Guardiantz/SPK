<?php

// cetak.php
error_reporting(0);
session_start();

$semester = $_POST["semester"];
$tahun = $_POST["tahun"];
$pimpinan = $_POST["pimpinan"];
$NIP = $_POST["nip"];

$sesi = $_SESSION['level'];
if ($sesi == "" || $sesi == "user") {
    header("location:login.php");
}

require 'functions.php';

$mhs = query("SELECT * FROM bobot ")[0];
$nilai = query("SELECT * FROM nilai2");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perangkingan - Cetak</title>
    <link rel="stylesheet" href="css1/style_hasil1.css"> <!-- Sesuaikan dengan path CSS Anda -->
    <style>
        /* Gaya cetak CSS */
        @media print {
            body {
                font-family: Arial, sans-serif;
                padding: 20px;
            }

            h2, h3 {
                text-align: center;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }

            /* Sembunyikan elemen-elemen yang tidak perlu ditampilkan saat mencetak */
            header, nav, form {
                display: none;
            }
        }
    </style>
</head>
<body>

 <!-- Struktur bagian atas laporan -->
<div style="display: flex; justify-content: center; padding: 10px 20px; border-bottom: 2px solid #000; margin: 10px;">
    <!-- Bagian pertama - Logo 1 -->
    <div style="flex: 1;">
        <img src="tutwuri.png" alt="Logo 1" style="max-width: 80px; max-height: 80px;">
    </div>
    <!-- Bagian kedua - Tulisan SDN 21 dan lainnya -->
    <div style="flex: 1; text-align: center;">
        <h1 style="font-size: 18px; margin-bottom: 10px;">SMK NEGERI 1 JAMBI </h1>
        <p style="font-size: 12px; margin: 0;">Jl. Jend. A. Thalib, Simpang IV Sipin, Kec. Telanaipura, Kota Jambi, Provinsi Jambi.</p>
    </div>
    <!-- Bagian ketiga - Logo 2 -->
    <div style="flex: 1; text-align: right;">
        <img src="solok.png" alt="Logo 2" style="max-width: 80px; max-height: 80px;">
    </div>
</div>


<h1 style="font-weight: bold; font-style: normal; font-size: large; display: flex; justify-content: center; " >Laporan Hasil Penilaian Guru</h1>

<div style="border: 1px solid #000; margin-top: 10px; display: inline-block;">
    <table style="margin: 0;">
        <tr>
            <td style="font-weight: 600;">Tanggal:</td>
            <td><?php echo htmlspecialchars(date("d/m/Y", strtotime($tahun))); ?></td>
        </tr>
        <tr>
            <td style="font-weight: 600;">Semester:</td>
            <td><?php echo htmlspecialchars($semester); ?></td>
        </tr>
    </table>
</div>



    <!-- Tambahkan konten HTML untuk tampilan cetak -->
    <?php if ($mhs["c1"] == 0 || $mhs["c2"] == 0 || $mhs["c3"] == 0 || $mhs["c4"] == 0) : ?>
        <br><br>
    
    <?php else : ?>
       

        <?php $jumlahBobot = $mhs["c1"] + $mhs["c2"] + $mhs["c3"] + $mhs["c4"]; ?>    
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

       

        <table align="center" class="table1" ">
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
                    <?php $kesimpulan = $hitung3 / $jumlah; ?>
                    <td> <?php echo number_format($kesimpulan, 4); ?> </td>
                    <?php $urut[] = number_format($kesimpulan, 4) . " " .  " ( " .  $langkah2["nama"] . " ) "; ?>        
                </tr>
                <?php $i++; ?>
                <?php $j++; ?>
            <?php endforeach; ?>
            </tr>
            <tr>
                <td colspan="6" align="right"> Jumlah </td>
                <td><?php echo number_format($jumlah, 4); ?></td>    
            </tr>
        </table>

        <?php rsort($urut); ?>
        <br>

     <div style=" margin-top: 100px; display: flex; justify-content: space-between; padding: 10px 20px; border-bottom: 2px solid #000;">
    <!-- Bagian pertama - Logo 1 -->
    <div style="flex: 1;">
        <img src="tutwuri.png" alt="Logo 1" style="max-width: 80px; max-height: 80px;">
    </div>
    <!-- Bagian kedua - Tulisan SDN 21 dan lainnya -->
    <div style="flex: 1; text-align: center;">
        <h1 style="font-size: 18px; margin-bottom: 5px;">SDN 21 Gantung Ciri</h1>
        <p style="font-size: 12px; margin: 0;">Jln. Selayo - Gantung Ciri Km 6 (jorong Kampung Baru Gantung Ciri), Kab. Solok</p>
    </div>
    <!-- Bagian ketiga - Logo 2 -->
    <div style="flex: 1; text-align: right;">
        <img src="solok.png" alt="Logo 2" style="max-width: 80px; max-height: 80px;">
    </div>
</div>
      
        <h3 align="center" style="margin-top: 20px;">Hasil Kesimpulan</h3>
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
    <?php endif; ?>

<!-- Bagian Tanda Tangan -->
<!-- Bagian Tanda Tangan -->
<div style="margin-top: 50px; text-align: right;">
    <p>Gantung Ciri, <?php echo date("d/m/Y"); ?></p>
    <br>
    <br>
    <p style="margin-right: 10px;"><?php  echo $pimpinan ?></p>
    <p> <span style="border-top: solid 1px ;"><?php  echo $NIP ?></span></p>
</div>


</body>
</html>

<script>window.print();</script>

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