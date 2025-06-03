<?php
//hubungkan halaman PHP ke database
require('koneksi.php');

//ambil parameter idMhs pada URL kemudian simpan dalam variebal idMhs
$idMhs = $_GET['idMhs'];

//query DELETE Data
$hapus = "DELETE FROM tbl_mahasiswa WHERE idMhs = '$idMhs'";
$hapusData = mysqli_query($koneksi, $hapus);

$hasilHapusData = mysqli_affected_rows($koneksi);

if($hasilHapusData = 0){
echo "<script>
        alert('Data gagal dihapus');
        document.location.href = 'tampil-data.php';
    </script>";

}else{
echo "<script>
        alert('Data berhasil dihapus');
        document.location.href = 'tampil-data.php';
    </script>";
}

?>