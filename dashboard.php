<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
}

require 'connection.php';

$karyawan = query("SELECT * FROM pegawai 
            ORDER BY nama ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-icons/6.15.0/simpleicons.svg">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- <style>
        .content {
            max-width: 800px;
            margin-top: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: rgba(225, 225, 225, 0.2);
            border-radius: 5px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(225, 225, 225, 0.2);
        }
    </style> -->
    <title>Home Admin</title>
</head>

<body>
    <header>
        <div class="left_area">
            <h3>PT KampungKu</h3>
        </div>

        <div class="right_area">
            <i class="fa-solid fa-bars" id="btn"></i>
        </div>
    </header>

    <div class="sidebar">
        <div class="logo_profile">
            <img src="asset/kampung.png " class="logo" alt="" width="200px">
        </div>

        <div class="menu">
            <p id="admin"><i class="fa-solid fa-user"></i><span>Selamat Datang, Admin</span></p>
            <a href="index_login.php" target="_blank"><i class="fa-solid fa-house"></i><span>Homepage</span></a>
            <a href="dashboard.php"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
            <a href="tambah_data.php"><i class="fa-solid fa-plus"></i><span>Tambah Pegawai</span></a>
            <a href="setting_data.php"><i class="fa-sharp fa-solid fa-gear"></i><span>Atur Data</span></a>
            <a href="logout.php" id="logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
        </div>
    </div>



    <div class="content">
        <table border="0" border-collapse="collapse" width="100%" id="tampil">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Tanggal Gabung</th>
                <th>Status</th>
                <th>Pendidikan Terakhir</th>
               
            </thead>

            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($karyawan as $kry) : ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $kry["nama"]; ?></td>
                        <td><?php echo $kry["jabatan"]; ?></td>
                        <td><?php echo $kry["tgl_gabung"]; ?></td>
                        <td><?php echo $kry["status_karyawan"]; ?></td>
                        <td><?php echo $kry["pendidikan_terakhir"]; ?></td>
                        </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>



        </table>

    </div>









    <script src="script.js"></script>
</body>

</html>