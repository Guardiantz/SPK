<?php 
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "spk");


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows=[];
    while($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data){
    global $conn;

    // Ambil data dari tiap elemen form
    $nama = htmlspecialchars($data["nama"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $telpon = htmlspecialchars($data["telpon"]);
    $kelamin = htmlspecialchars($data["kelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $pend_ter = htmlspecialchars($data["pend_ter"]);

    // Gunakan prepared statement untuk keamanan
    $query = "INSERT INTO guru (nama, tanggal, telpon, kelamin, alamat, pend_ter) VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssss", $nama, $tanggal, $telpon, $kelamin, $alamat, $pend_ter);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt);
}



// function tambahNilai($data){
//     global $conn;
//     // ambil data dari tiap elemen form
//     $nama = htmlspecialchars($data["nama"]);
//     $per_pem = htmlspecialchars($data["per_pem"]);
//     $pel_pem = htmlspecialchars($data["pel_pem"]);
//     $pen_pem = htmlspecialchars($data["pen_pem"]);
//     $mel_mem = htmlspecialchars($data["mel_mem"]);
//     $tug_tam = htmlspecialchars($data["tug_tam"]);
//     $peng_keg = htmlspecialchars($data["peng_keg"]);


//     // query insert data
//     $query = "INSERT INTO  nilai
//                 VALUES
//                 ('', '$nama', '$per_pem', '$pel_pem', '$pen_pem', '$mel_mem', '$tug_tam', '$peng_keg')
//                 ";
//     mysqli_query($conn, $query);
//     return mysqli_affected_rows($conn);

// }

function tambah_akun($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $level = htmlspecialchars($data["level"]);

    $query = "INSERT INTO user VALUES
    ( '', '$nama', '$username', '$password', '$level' )
    ";

    mysqli_query( $conn, $query );
    return mysqli_affected_rows($conn);

}

function tambahLain($data){
    global $conn;
    // ambil data dari tiap elemen form

    $nama = $data["nama"];
    
    $nama1 = $data["1"];
    $nama2 = $data["2"];
    $nama3 = $data["3"];
    $nama4 = $data["4"];
    $nama5 = $data["5"];
    $nama6 = $data["6"];
    $nama7 = $data["7"];
    $nama8 = $data["8"];
    $nama9 = $data["9"];
    $nama10 = $data["10"];
    $nama11 = $data["11"];
    $nama12 = $data["12"];
    $nama13 = $data["13"];
    $nama14 = $data["14"];
    


    // query insert data
    $query = "INSERT INTO  nilai2
                VALUES
                ('','$nama', '$nama1', '$nama2', '$nama3', '$nama4', '$nama5', '$nama6', $nama7, $nama8, $nama9, $nama10, 
                            '$nama11', '$nama12', '$nama13', '$nama14'
                )
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function tambahnilai($nilai) {
    global $conn;

    // Pastikan semua key ada sebelum digunakan
    $nama = isset($nilai["nama"]) ? $nilai["nama"] : '';
    $k1 = isset($nilai["1"]) ? $nilai["1"] : '';
    $k2 = isset($nilai["2"]) ? $nilai["2"] : '';
    $k3 = isset($nilai["3"]) ? $nilai["3"] : '';
    $k4 = isset($nilai["4"]) ? $nilai["4"] : '';
    $k5 = isset($nilai["5"]) ? $nilai["5"] : '';
    $k6 = isset($nilai["6"]) ? $nilai["6"] : '';
    $k7 = isset($nilai["7"]) ? $nilai["7"] : '';
    $k8 = isset($nilai["8"]) ? $nilai["8"] : '';
    $k9 = isset($nilai["9"]) ? $nilai["9"] : '';
    $k10 = isset($nilai["10"]) ? $nilai["10"] : '';
    $k11 = isset($nilai["11"]) ? $nilai["11"] : '';
    $k12 = isset($nilai["12"]) ? $nilai["12"] : '';
    $k13 = isset($nilai["13"]) ? $nilai["13"] : '';
    $k14 = isset($nilai["14"]) ? $nilai["14"] : '';

    // Pastikan jumlah kolom sesuai dengan jumlah yang ada di database
    $query = "INSERT INTO nilai2 (nama, k1, k2, k3, k4, k5, k6, k7, k8, k9, k10, k11, k12, k13, k14) 
              VALUES ('$nama', '$k1', '$k2', '$k3', '$k4', '$k5', '$k6', '$k7', '$k8', '$k9', '$k10', '$k11', '$k12', '$k13', '$k14')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function ubahnilai($nilai){
    global $conn;
    
    $id = $nilai["id"];
    $nama = $nilai["nama"];
    $k1 = $nilai["1"];
    $k2 = $nilai["2"];
    $k3 = $nilai["3"];
    $k4 = $nilai["4"];
    $k5 = $nilai["5"];
    $k6 = $nilai["6"];
    $k7 = $nilai["7"];
    $k8 = $nilai["8"];
    $k9 = $nilai["9"];
    $k10 = $nilai["10"];
    $k11 = $nilai["11"];
    $k12 = $nilai["12"];
    $k13 = $nilai["13"];
    $k14 = $nilai["14"];

    $query = " UPDATE nilai2 SET  nama = '$nama', k1 = '$k1', k2 = '$k2', k3 = '$k3', k4 = '$k4', k5 = '$k5', k6 = '$k6', k7 = '$k7', k8 = '$k8', k9 = '$k9', k10 = '$k10',
                                            k11 = '$k11', k12 = '$k12', k13 = '$k13', k14 = '$k14' WHERE id_nilai2 = $id ";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


        function hapus($id){
            global $conn;
            mysqli_query($conn, "DELETE FROM guru WHERE id = $id");
            return mysqli_affected_rows($conn);
        }

        function hapus_user($id){
            global $conn;
            mysqli_query($conn, "DELETE FROM user WHERE id_user = $id");
            return mysqli_affected_rows($conn);
        }

        function hapus_nilai($id){
            global $conn;
            mysqli_query($conn, "DELETE FROM nilai2 WHERE id_nilai2 = $id");
            return mysqli_affected_rows($conn);
        }


function ubah($data){
    global $conn;
    // ambil data dari tiap elemen form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $umur = htmlspecialchars($data["umur"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $kelamin = htmlspecialchars($data["jenis"]);
    $masakerja = htmlspecialchars($data["masakerja"]);
    $pend_ter = htmlspecialchars($data["pendidikan"]);
    


    // query insert data
    $query = "UPDATE guru SET
                nama = '$nama',
                tanggal = '$umur',
                telpon = '$kelamin',
                kelamin = '$jabatan',
                alamat = '$masakerja',
                pend_ter = '$pend_ter'
                WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah_bobot($data){
    global $conn;
    // ambil data dari tiap elemen form
    $id = $data["id"];
    $c1 = htmlspecialchars($data["c1"]);
    $c2 = htmlspecialchars($data["c2"]);
    $c3 = htmlspecialchars($data["c3"]);
    $c4 = htmlspecialchars($data["c4"]);

    
    // query insert data
    $query = "UPDATE bobot SET
                c1 = '$c1',
                c2 = '$c2',
                c3 = '$c3',
                c4 = '$c4'
                WHERE id_bobot = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah_akun($data){
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $username = $data["username"];
    $password = $data["password"];
    $level = $data["level"];

    $query = " UPDATE user SET 
            nama = '$nama',
            username = '$username',
            password = '$password',
            level = '$level'
            WHERE  id_user = $id    
     ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}



        function cari($keyword){
            $query = "SELECT * FROM guru
                    WHERE
                    nama LIKE '%$keyword%'
                    ";
            return query($query);
        }


        function cari2($keyword1){
            $query = "SELECT * FROM user WHERE username = $keyword1";
            return query($query);
        }




function registrasi($data){
    global $conn;

    $userName = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    // cek ussername sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$userName'");
    if( mysqli_fetch_assoc($result) ){
        echo "<script>
                alert('username yang dipilih sudah ada')
            </script>";
        return false;
    }


    // cek konfrimasi password
    if($password !== $password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai');
            </script>";
        return false;    
    }
    // enkripsi terlebih dahulu
    $password = password_hash($password, PASSWORD_DEFAULT);
    

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$userName', '$password')");
    return mysqli_affected_rows($conn);

}

?>