
<?php 
session_start();
if ($_SESSION['level'] == "" || $_SESSION['level'] == "user") {
    header("location:login.php");
}
?>

<html>
<head>
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="css1/style_index4.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .content {
            position: relative;
            text-align: center;
            color: black;
            font-family: Arial, sans-serif;
        }

        .bodycontent {
            background-image: url('sdn21gantungciri.jpg'); /* Replace with the correct image path */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        h1 {
            font-size: 40px;
            margin-bottom: 20px;
            color: yellow;
        }

        .button-mulai {
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="content">
        <header>
            <h2 class="judul">Selamat Datang di SISTEM PENDUKUNG KEPUTUSAN SMK NEGERI 1 JAMBI </h2>
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
        <div class="bodycontent">
            <h1>Selamat Datang di SISTEM PENDUKUNG KEPUTUSAN SMK NEGERI 1 JAMBI</h1>
            <a href="dataguru.php" class="button-mulai">Mulai</a>
        </div>
    </div>
</body>
</html>
