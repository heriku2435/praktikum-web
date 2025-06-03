<!DOCTYPE html>
<head> 
    <title>Halaman Tambah Data</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="POST">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" required>

        <label for="npm">Nomor Pokok Mahasiswa (NPM)</label>
        <input type="text" id="npm" name="npm" required>

        <label for="prodi">Program Studi</label>
        <select name="prodi" id="prodi">
            <option value="Pendidikan Informatika">Pendidikan Informatika</option>
            <option value="Pendidikan Biologi">Pendidikan Biologi</option>
        </select>
        <br>

        <label for="email">Surel / Email</label>
        <input type="email" id="email" name="email" required>

        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" required>

        <input type="submit" name="submit" value="Tambah Data">
        <input type="reset" value="reset">
        <input type="button" onclick="document.location.href= 'index.php'" value="Batal">

    </form>
    
    <!-- Script PHP untuk mengirim form POST ke database -->
    <?php
    /* memanggil file koneks.php agar terhubung ke database */
    require("koneksi.php");
        
    /*jika menekan tombol Tambah Data, maka data tersimpan ke database */
    if(isset($_POST["submit"])){
        /* data yang diinput kita simpan dalam variabel */
        $nama = $_POST["nama"];
        $npm = $_POST["npm"];
        $prodi = $_POST["prodi"];
        $email = $_POST["email"];
        $alamat = $_POST["alamat"];

        /* query yang mengirim data ke database */
        $kirim = "INSERT INTO tbl_mahasiswa (npm, nama, prodi, email, alamat)
        VALUES ('$npm', '$nama', '$prodi', '$email', '$alamat')";
        mysqli_query($koneksi, $kirim);

        /*notifikasi apakah data terkirim atau tidak */
        $hasil = mysqli_affected_rows($koneksi);

            if($hasil = 0){
                echo "<script>
                alert('Data Gagal Tersimpan')
                </script>";
            }else{
                echo "<script>
                alert('Data Tersimpan')
                </script>";
            }

    
    

    }
    ?>
</body>
</html>