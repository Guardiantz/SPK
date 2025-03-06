<?php
error_reporting(0);
require '../functions.php';

// Mendapatkan ID dari parameter URL
$data_id = $_GET["id"];

// Mengambil data nilai berdasarkan ID
$nilai = query("SELECT * FROM nilai2 WHERE id_nilai2 = $data_id");

// Jika tombol simpan diklik
if (isset($_POST["simpan"])) {
    // Memanggil fungsi untuk mengubah nilai
    if (ubahnilai($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil diubah!');
            window.location = '../nilai.php';
        </script>
        ";
    } else {
        echo "gagal";
    }
}
?>

<html>

<head>
    <title>Ubah Data Nilai</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jQuery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

    <br>
    <a href="../nilai.php" class="btn btn-primary">
        <span class="glyphicon glyphicon-home"></span> Kembali
    </a>

    <form action="" method="post">
        <div style="padding-top: 25px;">
            <h2 align="center">Ubah Nilai Kinerja Guru</h2>

            <div class="row">
                <div class='col-sm-3'></div>
                <div class='col-sm-5'>
                    <?php foreach ($nilai as $row) : ?>
                        <input type="hidden" name="id" value="<?php echo $row["id_nilai2"] ?>">
                        <table class='table table-bordered'>
                            <tr>
                                <td>NAMA : </td>
                                <td>
                                    <input type="text" name="nama" class="form-control" id="nama" readonly
                                           value="<?php echo $row["nama"]; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>KELAS : </td>
                                <td>
                                    <select class="form-control" name="kelas">
                                        <option value="II/SLBB: A" <?php if ($row["kelas"] == "II/SLBB: A") echo 'selected'; ?>>
                                            II/SLBB: A
                                        </option>
                                        <option value="II/SLBB: B" <?php if ($row["kelas"] == "II/SLBB: B") echo 'selected'; ?>>
                                            II/SLBB: B
                                        </option>
                                    </select>
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
                        <?php
                        // Daftar komponen penilaian beserta skornya
                        $komponen_penilaian = array(
                            array("1", "Menggunakan Kalender Ajaran", "k1"),
                            array("2", "Menyusun Program Tahunan", "k2"),
                            array("3", "Menyusun Program Semester", "k3"),
                            array("4", "Memperbaiki Silabus", "k4"),
                            array("5", "Mengembangkan RPP", "k5"),
                            array("6", "Menetapkan KKM", "k6"),
                            array("7", "Menggunkan Agenda Harian", "k7"),
                            array("8", "Memiliki Jadwal Tetap", "k8"),
                            array("9", "Mengelola Buku Absensi", "k9"),
                            array("10", "Mengelola Buku Nilai", "k10"),
                            array("11", "Mengkondisikan Kelas", "k11"),
                            array("12", "Memfasilitasi Siswa", "k12"),
                            array("13", "Mengembangkan pengalaman mengelaborasi informasi", "k13"),
                            array("14", "Mengembangkan pengalaman belajar mengkonfirmasi informasi", "k14")
                        );

                        foreach ($komponen_penilaian as $komponen) {
                            ?>
                            <tr>
                                <td><?php echo $komponen[1]; ?></td>
                                <td><?php echo $komponen[0]; ?></td>
                                <td></td>
                                <td>
                                    <input type="radio" name="<?php echo $komponen[2]; ?>" value="1"
                                           <?php if ($row[$komponen[2]] == "1") echo 'checked' ?>> 1
                                </td>
                                <td>
                                    <input type="radio" name="<?php echo $komponen[2]; ?>" value="2"
                                           <?php if ($row[$komponen[2]] == "2") echo 'checked' ?>> 2
                                </td>
                                <td>
                                    <input type="radio" name="<?php echo $komponen[2]; ?>" value="3"
                                           <?php if ($row[$komponen[2]] == "3") echo 'checked' ?>> 3
                                </td>
                                <td>
                                    <input type="radio" name="<?php echo $komponen[2]; ?>" value="4"
                                           <?php if ($row[$komponen[2]] == "4") echo 'checked' ?>> 4
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td colspan="7">
                                <label for="">-</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7" align="center">
                                <button type="submit" name="simpan" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span> Ubah Data
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </form>
</body>

</html>
