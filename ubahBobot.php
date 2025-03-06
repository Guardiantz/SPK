<?php
error_reporting(0);

session_start();
$sesi = $_SESSION['level'];
if( $sesi == "" || $sesi == "user" ){
    header("location:login.php");
}

require 'functions.php';

// ambil data di URL

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM bobot ")[0];
$nilai = query("SELECT * FROM nilai2");
?>

<?php
if( isset($_POST["submit"]) ) {

    if (ubah_bobot($_POST) > 0){
        header("location:ubahBobot.php");
        $text = "bobot diubah";
    }    
}
?>

<?php 
    $text = "* Silahkan ubah bobot jika ingin mengubah bobot, jika tidak bisa tekan proses";
?>


<html>
<head>
        <title>Sistem Pendukung Keputusan</title>
        <link rel="stylesheet" href="css1/spk.css">
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
                <li><a href="dataguru.php">Data Guru</a></li>
                <li><a href="nilai.php">Kriteria</a></li>
                <li><a href="ubahBobot.php">Perhitungan</a></li>
                <li><a href="report.php">Hasil SPK</a></li>
                <li><a href="logout.php" onclick="return confirm('Apakah anda ingin keluar?');">Logout</a></li>
            </ul>
        </nav>
        <header>
            <h3 align="center">Perangkingan Dengan Metode Weighted Product</h3>
        </header>

<br>
<br>
    <form action="" method="post">

        <input type="hidden" name="id" value="<?php echo $mhs["id_bobot"]; ?>">

        <h4 align="center"> *Silahkan ubah bobot, jika sudah tekan tombol ubah bobot kemudian tekan proses <br>
                            *Jika tidak ingin mengubah bobot bisa langsung tekan proses    
        </h4>
        <table border="1px solid" cellspacing="0" cellpadding="2px" align="center"> 
            <tr>
                <th>Indikator</th>
                <th>Kode</th>
                <th>Bobot</th>
            </tr>
            <tr>
                <td>Perecanaan Pembelajaran <br> dan Evaluasi </td>
                <td><label for="c1">C1</label></td>
                <td>    
                    <input type="text" name="c1" id="c1" required value="<?php echo $mhs["c1"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Pengembangan dan Peningkatan<br>Kualitas Pembelajaran</td>
                <td><label for="c2">C2</label></td>
                <td>
                    <input type="text" name="c2" id="c2" required value="<?php echo $mhs["c2"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Manajemen Administrasi <br>Pendidikan</td>
                <td><label for="c3">C3</label></td>
                <td>
                    <input type="text" name="c3" id="c3" required value="<?php echo $mhs["c3"]; ?>">
                </td>
            </tr>
            <tr>
                <td>Pengelolaan Soal dan <br>Materi Pembelajaran</td>
                <td><label for="c4">C4</label></td>
                <td>
                    <input type="text" name="c4" id="c4" required value="<?php echo $mhs["c4"]; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td  align="center" colspan="2"><button type="submit" name="submit">Ubah Data</button></td>
            </tr>
        </table>
        <br>
        <center>
        <button type="submit" name="proses">Proses</button>
        </center>
    </form>
    <hr>

<?php if( isset($_POST["proses"]) ) : ?>

<?php if ($mhs["c1"] == 0) :?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php elseif ($mhs["c2"] == 0) : ?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php elseif ($mhs["c3"] == 0) : ?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php elseif ($mhs["c4"] == 0) : ?>
    <center><span class="blink">Tentukan Semua Bobot Terlebih Dahulu !</span><center>

<?php else : ?>


<?php $jumlahBobot = $mhs["c1"] + $mhs["c2"] + $mhs["c3"] + $mhs["c4"]  ;?>    

<br>
<h2 align="center">Langkah 1</h2>
        <p align="center">Langkah 1 Menentukan tingkat prioritas bobot setiap kriteria</p>
        <table align="center" class="table1">
        
        <tr> 
            <th>W1</th>
            <th>W2</th>
            <th>W3</th>
            <th>W4</th>
        </tr>

        

        <?php 
           $w1 = $mhs["c1"] / $jumlahBobot;
           $w2 = $mhs["c2"] / $jumlahBobot;
           $w3 = $mhs["c3"] / $jumlahBobot;
           $w4 = $mhs["c4"] / $jumlahBobot;
        ?>
        <tr>
            <td><?php echo number_format($w1, 4); ?></td>
            <td><?php echo number_format($w2, 4); ?></td>
            <td><?php echo number_format($w3, 4); ?></td>
            <td><?php echo number_format($w4, 4); ?></td>
        </tr>
        </table>
<br>

    <?php $jumlah = 0; ?>
    <?php foreach ($nilai as $row1) :  ?>
    
    <?php
     $jumlah_k1 = $row1["k1"] + $row1["k2"] + $row1["k3"] + $row1["k4"] + $row1["k5"] + $row1["k6"] + $row1["k7"];    
        $kriteria1 = ($jumlah_k1 / 28) * 100;

    $jumlah_k2 = $row1["k8"] + $row1["k9"] + $row1["k10"] + $row1["k11"];    
    $kriteria2 = ($jumlah_k2 /16) * 100;

    $jumlah_k3 = $row1["k12"] + $row1["k13"];
    $kriteria3 = ($jumlah_k3 / 8) * 100;

    $jumlah_k4 = $row1["k14"];    
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
    <h2 align="center">Langkah 2</h2>
    <p align="center">Langkah 2 menghitung vektor S</p>

    <table align="center" class="table1">
    <tr>
    <th>Kode</th>
    <th>Nama</th>
    <th>C1</th>
    <th>C2</th>
    <th>C3</th>
    <th>C4</th>
    <th>Hasil dari <br> vektor S</th>
    </tr>

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
        <td>A<?php echo $i; ?></td>
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
        
    </tr>

        <?php $i++; ?>
    <?php endforeach; ?>

    <tr>
    <td colspan="8" align="right"> Jumlah </td>
    <td><?php echo number_format($jumlah, 4); ?></td>
    </tr>
</table>

<h2 align="center">Langkah 3</h2>
<p align="center"> Langkah 3 menghitung vektor V</p>

    <table align="center" class="table1">
    <tr>
    <th>Kode</th>
    <th>Nama</th>
    <th>C1</th>
    <th>C2</th>
    <th>C3</th>
    <th>C4</th>
    <th>Hasil dari <br> vektor S</th>
    <th>Hasil dari <br> vektor V</th>
    </tr>
    <?php $j = 0; ?>
    <?php $i=1; ?>
    <?php foreach ($nilai as $langkah3) :  ?>
        <?php 
        $jumlah_k1 = $langkah3["k1"] + $langkah3["k2"] + $langkah3["k3"] + $langkah3["k4"] + $langkah3["k5"] + $langkah3["k6"] + $langkah3["k7"];    
        $kriteria1 = ($jumlah_k1 / 28) * 100;
        
        $jumlah_k2 = $langkah3["k8"] + $langkah3["k9"] + $langkah3["k10"] + $langkah3["k11"];    
        $kriteria2 = ($jumlah_k2 / 16) * 100;

        $jumlah_k3 = $langkah3["k12"] + $langkah3["k13"];
        $kriteria3 = ($jumlah_k3 / 8) * 100;

        $jumlah_k4 = $langkah3["k14"];    
        $kriteria4 = ($jumlah_k4 / 4) * 100;

        // Menambahkan rating berdasarkan rentang nilai
        $rating1 = getRating($kriteria1);
        $rating2 = getRating($kriteria2);
        $rating3 = getRating($kriteria3);
        $rating4 = Rating($kriteria4);

    ?>
    
    <tr>
        <td>A<?php echo $i; ?></td>
        <td><?php echo $langkah3["nama"]; ?></td>
        <td><?php echo $rating1 ?></td>
        <td><?php echo $rating2 ?></td>
        <td><?php echo $rating3 ?></td>
        <td><?php echo $rating4 ?></td>
        <?php $hitung3 = $rating1 ** $w1 * 
                        $rating2 ** $w2 * 
                        $rating3 ** $w3 *  
                        $rating4 ** $w4;?>
        <td><?php echo number_format($hitung3, 4); ?></td>
        <?php $kesimpulan = $hitung3/ $jumlah; ?>
        <td> <?php echo number_format($kesimpulan, 4); ?> </td>
        <?php $urut[] = number_format($kesimpulan, 4) . " " .  " ( " .  $langkah3["nama"] . " ) "; ?>        
    <?php $i++; ?>
    <?php $j++ ?>
    <?php endforeach; ?>
    </tr>
    <tr>
    <td colspan="8" align="right"> Jumlah </td>
    <td><?php echo number_format($jumlah, 4); ?></td>    
    </tr>
</table>

<?php rsort($urut);?>
<h2 align="center">Hasil Kesimpulan</h2>
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
<?php endif; ?>
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