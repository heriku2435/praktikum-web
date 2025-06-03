<!DOCTYPE html>
<head>
    
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    
    <a href="index.php">Beranda</a>
    <a href="tambah-data.php">Tambah Data</a>
    <h1>Data Mahasiswa Universitas Hamzanwadi</h1>

    <?php 
        require("koneksi.php");

        $dataTabel = "SELECT * FROM tbl_mahasiswa";
        $dataTampil = mysqli_query($koneksi, $dataTabel);
    ?>

 
    <table>
        <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php 
    
        $penomoranData = 1;
        while($data = mysqli_fetch_array($dataTampil)){;  
        
        ?>
        <tr>
            <td><?php echo $penomoranData ?></td>
            <td><?php echo $data["npm"]; ?></td>
            <td><?php echo $data["nama"]; ?></td>
            <td><?php echo $data["prodi"]; ?></td>
            <td><?php echo $data["email"]; ?></td>
            <td><?php echo $data["alamat"]; ?></td>
            <td>
                <a href="edit-data.php?idMhs=<?= $data['idMhs']; ?>">Edit</a> | 
                <a href="hapus-data.php?idMhs=<?= $data['idMhs']; ?>">Hapus</a>
            </td>
        </tr>
        <?php $penomoranData++; ?>
        <?php } ?>
              

    </table>
</body>
</html>