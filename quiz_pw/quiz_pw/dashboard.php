<?php
    require_once 'koneksi.php';
    session_start();
    if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
        header("location:index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php
        echo $_SESSION['nama']." <a href='logout.php'>LOGOUT</a><br>";

        $q = mysqli_query($konek,"SELECT * FROM mhs");
        ?>
        <a href="tambah.php">+ Tambah</a>
        <table border="1">
            <thead>
                <th>NAMA</th>
                <th>NIM</th>
            </thead>
        <?php while ($data = $q->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $data['nim']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                </tr>
    <?php
        }
    ?>
        </table>
</body>
</html>
