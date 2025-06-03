<?php
    //buat koneksi ke database
    require('koneksi.php');

    //simpan data input user
    if(isset($_POST['submit'])){
        $namaLengkap = htmlspecialchars($_POST['namaLengkap']);
        $email = htmlspecialchars($_POST['email']);
        $username = strtolower(htmlspecialchars($_POST['username']));
        $password = htmlspecialchars($_POST['password']);
        $confirmPass = htmlspecialchars($_POST['confirm-password']);

        //cek apakah akun sudah ada atau belum
        $cekuser = "SELECT username FROM tbl_user WHERE username = '$username'";
        $cekuserdata = mysqli_query($koneksi, $cekuser);
        $hasilCekUserData = mysqli_num_rows($cekuserdata);

        if($hasilCekUserData > 0){
            echo "<script>
                    alert('Username sudah ada, gunakan username yang lain');
                    document.location.href = 'buat-akun.php';
                </script>";
            exit;
        }
        
        //cek kesesuaian password (opsional)
        if($password !== $confirmPass){
             echo "<script>
                    alert('Konfirmasi password tidak sama');
                    document.location.href = 'buat-akun.php';
                </script>";
            exit;
        }


        //enkripsi password
        $password = password_hash($password,PASSWORD_DEFAULT);

        //tambah pengguna ke tabel user
        $tambahAkun = "INSERT INTO tbl_user (namaLengkap, email, username, password)
                        VALUES('$namaLengkap', '$email', '$username', '$password')";
                        mysqli_query($koneksi, $tambahAkun);
        $buatAkun = mysqli_affected_rows($koneksi);
        
        if($buatAkun > 0){
            echo "<script>
                    alert('Akun Berhasil dibuat');
                    document.location.href = 'login.php';
                </script>";
            exit;
        }

    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun</title>
    <!-- bootstrap saat offline
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    -->

    <!-- bootstrap saat online menggunakan CDN Links bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script> 

</head>
<body>

    <div class="container">
        <h1>Form Pembuatan Akun</h1>
        <h6>silahkan isi formulir untuk membuat akun pada aplikasi</h6>

        <div>
            <form action="" method="POST" class="row g-3 needs-validation" novalidate>
                <div class="form-floating mb-3">
                    <input type="text" name="namaLengkap" class="form-control" id="floatingInput" placeholder="Nama Lengkap" required>
                    <label for="floatingInput">Nama lengkap</label>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Nama Lengkap tidak boleh kosong</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="contohemail@domain.com" required>
                    <label for="floatingInput">Email</label>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Email tidak boleh kosong</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
                    <label for="floatingInput">Username</label>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Username tidak boleh kosong</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Password tidak boleh kosong</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="confirm-password" class="form-control" id="floatingPassword" placeholder="Konfirmasi Password" required>
                    <label for="floatingPassword">Konfirmasi Password</label>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">konfirmasi password tidak boleh kosong</div>
                </div>            
                <div class="form-floating mb-3">
                    <input type="submit" name ="submit" class="btn btn-primary btn-lg" value="Buat Akun">
                </div>
                
            </form>
        </div>
    </div>

    <script src="valid.js"></script>
    
</body>
</html>
