<?php
session_start();
$sesi = $_SESSION['level'];
if ( $sesi == "" || $sesi == "user" ){
    header("location:login.php");
}

require 'functions.php';

$bobot = query("SELECT * FROM bobot");
$nilai = query("SELECT * FROM nilai");

?>

<html>
    <head>
        <title>Sistem Pendukung Keputusan</title>
        <link rel="stylesheet" href="css1/style2">
    </head>
    <body>
    <div class="content">
        <div class="menu">
       
            <ul>
                <li id="home"><a href="index.php">Home</a></li>
                <li ><a href="dataguru.php">Data Guru</a></li>
                <li><a href="nilai.php">Kriteria</a></li>
                <li><a href="ubahBobot.php">Perhitungan</a></li>
                <li><a href="report.php">Hasil SPK</a></li>
                <li><a href="logout.php" onclick="return confirm('Apakah anda ingin keluar?');">Logout</a></li>
           
        </nav>
        </div>

        <header>
            <h2 class="judul">Halaman Nilai</h2>
        </header>
        <br></br>

        <table class="table2">
        <tr>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>Jumlah</th>
            <th>Ubah Data</th>
        </tr>


        <?php foreach( $bobot as $row ) : ?>
        <?php $jumlahBobot = $row["c1"] + $row["c2"] + $row["c3"] + $row["c4"];?>    
        <tr>
            <td> <?php echo $row["c1"]; ?> </td>
            <td> <?php echo $row["c2"]; ?> </td>
            <td> <?php echo $row["c3"]; ?> </td>
            <td> <?php echo $row["c4"]; ?> </td>
            <td> <?php echo $jumlahBobot; ?> </td>
            <td> <a href="ubahBobot.php?id=<?= $row["id_bobot"]; ?>" class="button">Ubah</a> </td>
        </tr>
        <?php endforeach; ?>



        
        </table>

        <br>

        <h2>Langkah 1</h2>
        
        <table class="table1">
        
        <tr> 
            <th>W1</th>
            <th>W2</th>
            <th>W3</th>
            <th>W4</th>
        </tr>

        

        <?php 
            $w1 = $row["c1"] / $jumlahBobot;
            $w2 = $row["c2"] / $jumlahBobot;
            $w3 = $row["c3"] / $jumlahBobot;
            $w4 = $row["c4"] / $jumlahBobot;
        ?>
        <tr>
            <td><?php echo $w1; ?></td>
            <td><?php echo $w2; ?></td>
            <td><?php echo $w3; ?></td>
            <td><?php echo $w4; ?></td>
        </tr>
        </table>
        
       <br></br>
    <h2>Langkah 2</h2>

    <table class="table1">
    <tr>
    <th>NO.</th>
    <th>Nama</th>
    <th>Perencanaan Pembelajaran  <br> dan Evaluasi</th>
    <th>Pengembangan dan Peningkatan <br> Kualitas Pembelajaran</th>
    <th>Manajemen Administrasi  <br> Pendidikan</th>
    <th>Pengelolaan Soal dan <br> Materi Pembelajaran</th>
    <th>Hasil dari Langkah 2</th>
    <th>Hasil Kesimpulan</th>
    </tr>
    
    <?php $jumlah = 0; ?>
    <?php foreach ($nilai as $langkah1) :  ?>

    <?php  $langkah1["nama"]; ?>
    <?php  $langkah1["perencanaan"]; ?>
    <?php  $langkah1["pengembangan"]; ?>
    <?php  $langkah1["manajemen"]; ?>
    <?php  $langkah1["pengelolaan"]; ?>
    <?php $hitung2 =  $langkah1["perencanaan"] ** $w1 * 
                    $langkah1["pengembangan"] ** $w2 * 
                    $langkah1["manajemen"] ** $w3 *  
                    $langkah1["pengelolaan"] ** $w4;?>

    <?php $jumlah += $hitung2; ?>
    <?php endforeach; ?>




    <?php $i = 1;?>
    
    <?php foreach ($nilai as $langkah2) :  ?>

    <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $langkah2["nama"]; ?></td>
    <td><?php echo $langkah2["perencanaan"]; ?></td>
    <td><?php echo $langkah2["pengembangan"]; ?></td>
    <td><?php echo $langkah2["manajemen"]; ?></td>
    <td><?php echo $langkah2["pengelolaan"]; ?></td>
    <?php $hitung3 =  $langkah2["perencanaan"] ** $w1 * 
                    $langkah2["pengembangan"] ** $w2 * 
                    $langkah2["manajemen"] ** $w3 *  
                    $langkah2["pengelolaan"] ** $w4;?>
    <td><?php echo $hitung3; ?></td>
    <td> <?php echo $hitung3 / $jumlah; ?> </td>
    
    
    </tr>
    
    <?php $i++; ?>
    <?php endforeach; ?>
    <tr>
    <td colspan="8"></td>
    <td><?php echo $jumlah; ?></td>
    </tr>
    </table>
    <br>
    
    </body>
</html>