<?php

require '../functions.php';

$guru = query("SELECT * FROM guru");



if( isset($_POST["simpan"]) ){

    if(tambahnilai($_POST) > 0 ){
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            window.location = '../nilai.php';
        </script>
        ";
    }else{
        echo "gagal";
    }

}



?>


<html>
<head>
<title>Coba</title>

<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>From Biodata</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<script src="js/jQuery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/moment.js"></script>
		<script src="js/angular.min.js"></script>
		<script src="js/proses.js"></script>
		<script src="js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>

<br>
		<a href="../nilai.php" class="btn btn-primary">
			<span class="glyphicon glyphicon-home"></span> Kembali
		</a>
    




<form action="" method="post">
<div style="padding-top: 25px;">
                        
<h2 align="center">Penilaian Kinerja Guru</h2>
						
<div class="row">
	<div class='col-sm-3'></div>
		<div class='col-sm-5'>
<table class='table table-bordered'>
    <tr>
        <td>NAMA : </td>
    <td>
        <select name="nama" class="form-control" id="nama">
        <option>-</option>
        <?php foreach ($guru as $row) : ?>
        <option> <?php echo $row["nama"]; ?> </option>
        <?php endforeach; ?>

        </select>
    </td>
    </tr>
    <tr>
       
           
        </td>
    </tr>
</table>
            </div>
</div>
<h4 align="center"> *Keterangan skor <br>
                    1 = Sangat Kurang,
                    2 = Kurang,
                    3 = Baik,
                    4 = Sangat Baik

        </h4>
        <br>		
<div class="row">
	<div class='col-sm-3'></div>
		<div class='col-sm-6'>
        <table class='table table-bordered'>

                <tr>
                    <td align="center">
                        <label for="">Program</label>
                    </td>
                    <td align="center">
                        <label for="">No</label>
                    </td>
                    <td align="center">
                        <label for="">Komponen Penilaian</label>
                    </td>
                    <td colspan="4">
                        <label for="">Skor</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for="">Perencanaan Pembelajaran dan Evaluasi </label>
                    </td>
                    <td>
                        <label for="">1. </label>
                    </td>
                    <td>
                        <label for="">Program Tahunan</label>
                    </td>
                    <td>
                        <input type="radio" name="1" value="1" required> 1
                    </td>
                    <td>
                        <input type="radio" name="1" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="1" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="1" value="4"> 4
                    </td>
                </tr>


                <tr>
                    <td colspan="7">
                        <label for="">-</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">2</label>
                    </td>
                    <td>
                        <label for="">Program Semester</label>
                    </td>
                    <td>
                        <input type="radio" name="2" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="2" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="2" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="2" value="4"> 4
                    </td>
                </tr>

                
                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">3</label>
                    </td>
                    <td>
                        <label for="" hiden>Silabus</label>
                    </td>
                    <td>
                        <input type="radio" name="3" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="3" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="3" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="3" value="4"> 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">4</label>
                    </td>
                    <td>
                        <label for="" hiden> RPP </label>
                    </td>
                    <td>
                        <input type="radio" name="4" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="4" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="4" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="4" value="4"> 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">5</label>
                    </td>
                    <td>
                        <label for="" hiden>Buku Evaluasi</label>
                    </td>
                    <td>
                        <input type="radio" name="5" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="5" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="5" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="5" value="4"> 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">6</label>
                    </td>
                    <td>
                        <label for="" hiden>Daftar Nilai</label>
                    </td>
                    <td>
                        <input type="radio" name="6" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="6" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="6" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="6" value="4"> 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">7</label>
                    </td>
                    <td>
                        <label for="" hiden>Analisis Hasil Evaluasi</label>
                    </td>
                    <td>
                        <input type="radio" name="7" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="7" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="7" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="7" value="4"> 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for="">Pengembangan dan Peningkatan Kualitas Pembelajaran</label>
                    </td>
                    <td>
                        <label for="">8</label>
                    </td>
                    <td>
                        <label for="">Program Perbaikan</label>
                    </td>
                    <td>
                        <input type="radio" name="8" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="8" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="8" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="8" value="4"> 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">9</label>
                    </td>
                    <td>
                        <label for="" hiden>Program Pengayaan</label>
                    </td>
                    <td>
                        <input type="radio" name="9" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="9" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="9" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="9" value="4"> 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">10</label>
                    </td>
                    <td>
                        <label for="" hiden>Buku Bimbingan </label>
                    </td>
                    <td>
                        <input type="radio" name="10" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="10" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="10" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="10" value="4"> 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">11</label>
                    </td>
                    <td>
                        <label for="" hiden>KKM</label>
                    </td>
                    <td>
                        <input type="radio" name="11" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="11" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="11" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="11" value="4"> 4
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <label for="">-</label>
                    </td>
                </tr>
                <tr>
                <td>
                        <label collrow for="">Manajemen Administrasi Pendidikan</label>
                    </td>
                    <td>
                        <label for="">12</label>
                    </td>
                    <td>
                        <label for="">Kalender Pendidikan</label>
                    </td>
                    <td>
                        <input type="radio" name="12" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="12" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="12" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="12" value="4"> 4
                    </td>
                </tr>

                <tr>
                <td>
                        <label collrow for=""></label>
                    </td>
                    <td>
                        <label for="">13</label>
                    </td>
                    <td>
                        <label for="" hiden>Daftar Kelas</label>
                    </td>
                    <td>
                        <input type="radio" name="13" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="13" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="13" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="13" value="4"> 4
                    </td>
                </tr>

                <tr>
                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <td>
                        <label collrow for="">Pengelolaan Soal dan Materi Pembelajaran</label>
                    </td>
                    <td>
                        <label for="">14. </label>
                    </td>
                    <td>
                        <label for="">Tabungan Soal</label>
                    </td>
                    <td>
                        <input type="radio" name="14" value="1"> 1
                    </td>
                    <td>
                        <input type="radio" name="14" value="2"> 2
                    </td>
                    <td>
                        <input type="radio" name="14" value="3"> 3
                    </td>
                    <td>
                        <input type="radio" name="14" value="4"> 4
                    </td>
                </tr>
      
                <tr>
                    <td colspan="7">
                        <label for="">.</label>
                    </td>
                </tr>
                <tr>
                        <td align="center" colspan="6">
                            <button type="submit" name="simpan">
                            <span class="glyphicon glyphicon-plus"></span>Tambah Data</button>
                        </td>
                </tr>
        </table>
        </div>
</div>
<br>


</form>
</div>

</body>
</html>