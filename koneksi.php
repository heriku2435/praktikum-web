
<?php
    /*mysqli connect - prosedural
    sintaknya adalah
    mysql_connect(namaserver, username, password)
    */

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_praktikmkweb5a';

    /* query 

    mysqli_connect($host, $user, $pass, $db);
    kita simpan dalam variabel $koneksi

    */
    $koneksi = mysqli_connect($host, $user, $pass, $db);

?>
    
