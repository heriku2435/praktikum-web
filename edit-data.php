<!DOCTYPE html>
<head> 
    <title>Halaman Ubah Data</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>

   

    <h1>Ubah Data Mahasiswa</h1>
    <?php 
    //menghubungkan halaman dengan database
    require("koneksi.php");

    //ambil idMhs pada URL kemudian disimpan dalam sebuah variabel idMhs
    $idMhs = $_GET['idMhs'];

    //ambil dan tampilkan data yang akan diubah
    $dataUbah = "SELECT * FROM tbl_mahasiswa WHERE idMhs = $idMhs";
    $lihatUbah = mysqli_query($koneksi, $dataUbah);
    $data = mysqli_fetch_assoc($lihatUbah);


    ?>
    <form action="" method="POST">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" value = "<?= $data['nama']; ?>" required>

        <label for="npm">Nomor Pokok Mahasiswa (NPM)</label>
        <input type="text" id="npm" name="npm" value = "<?= $data['npm']; ?>" size="8" required>

        <label for="prodi">Program Studi</label>
        <select name="prodi" id="prodi">
            <option value="Pendidikan Informatika" <?php if($data['prodi']=="Pendidikan Informatika"){echo "selected";}?>>Pendidikan Informatika</option>
            <option value="Pendidikan Biologi" <?php if($data['prodi']=="Pendidikan Biologi"){echo "selected";}?>>Pendidikan Biologi</option>
        </select>
        <br>

        <label for="email">Surel / Email</label>
        <input type="email" id="email" name="email" value = "<?= $data['email']; ?>" required>

        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" value = "<?= $data['alamat']; ?>" required>

        <input type="submit" name="submit" value="Ubah Data">
        <input type="reset" value="reset">
        <input type="button" onclick="document.location.href= 'tampil-data.php'" value="Batal">

    </form>
    
    <!-- Script PHP untuk mengirim form POST ke database -->
    <?php
    
        
    /*jika menekan tombol Tambah Data, maka data tersimpan ke database */
    if(isset($_POST["submit"])){
        /* data yang diinput kita simpan dalam variabel */
        $nama = $_POST["nama"];
        $npm = $_POST["npm"];
        $prodi = $_POST["prodi"];
        $email = $_POST["email"];
        $alamat = $_POST["alamat"];

        /* query yang mengirim data ke database */
        $ubahData = "UPDATE tbl_mahasiswa SET
                    npm = '$npm',
                    nama = '$nama',
                    prodi = '$prodi',
                    email = '$email',
                    alamat = '$alamat'
                    WHERE idMhs = '$idMhs'";
                    mysqli_query($koneksi,$ubahData);

        /*notifikasi apakah data terkirim atau tidak */
        $hasilUbah = mysqli_affected_rows($koneksi);
            if($hasilUbah = 0){
                echo "<script>
                alert('Data Gagal diubah');
                document.location.href = 'edit-data.php';
                </script>";
            }else{
                echo "<script>
                alert('Data berhasil diubah');
                document.location.href = 'tampil-data.php';
                </script>";
            }

    
    

    }
    ?>
</body>
</html>