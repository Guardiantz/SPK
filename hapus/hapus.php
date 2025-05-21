<?php
require '../functions.php';

$id = $_GET["id"];

if( hapus($id) > 0){
    echo "
    <script>
        alert('data berhasil dihapus!');
        window.location= '../dataguru.php';
    </script>
    ";
}else{
    echo "
    <script>
        alert('data gagal dihapus!');
        window.location= '../dataguru.php';
    </script>
    ";
}

?>