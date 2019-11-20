<?php
    require_once 'koneksi.php';
    session_start();
    if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
        header("location:index.php");
        exit();
    }
?>
    <form method="POST">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input type="number" name="nim" required></td>
            </tr>
        </table>
        <input type="submit" name="tambah" value="Tambah"><br>
    </form>
    <a href="dashboard.php">Back</a>
    <?php
        if (isset($_POST['tambah'])) {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];

            $q = mysqli_query($konek,"INSERT INTO mhs (nama,nim) VALUES ('$nama','$nim')");
            if ($q) {
                echo "<script>alert('Berhasil Menambah!');</script>";
            } else {
                echo "<script>alert('Gagal Menambah!');</script>";
            }
        }
    ?>