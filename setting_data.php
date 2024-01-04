<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
}

include 'connection.php';


$karyawan = query("SELECT * FROM pegawai ORDER BY nama ASC");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $detailKaryawan = query("SELECT * FROM pegawai WHERE id = $id")[0];
}
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
    <style>
       
        .detail {
            margin-top: 30px;
        }

        .detail div {
            margin-bottom: 20px;
        }
        .foto {
            max-width: 15%;
            float: left;
            padding-right: 5%;
            height: auto;
            display: block;
            margin: 10px auto;
            border-radius: 8px;
            
        }
        strong {
            font-weight: bold;
        }
        
        #tbl-kembali {
            background-color: #3498db;
            color: #fff;
            padding: 4px 10px;
            border: none;
            border-radius: 5px;
            /* font-size: 14px; */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #tbl-kembali:hover {
            background-color: #2980b9;
        }
    </style>
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
            <img src="asset/kampung.png " class="logo" alt="" width="200px" >
        </div>
            
        <div class="menu">
            <p id="admin"><i class="fa-solid fa-user"></i><span>Selamat Datang, Admin</span></p>
            <a href="index_login.php" target="_blank"><i class="fa-solid fa-house"></i><span>Homepage</span></a>
            <a href="dashboard.php"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
            <a href="tambah_data.php"><i class="fa-solid fa-plus"></i><span>Tambah Pegawai</span></a>
            <a href=""><i class="fa-sharp fa-solid fa-gear"></i><span>Atur Data</span></a>
            <a href="logout.php" id="logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>  
        </div> 
    </div>

    <div class="content">
        <?php if (isset($detailKaryawan)) : ?>
            <h2>Detail Karyawan</h2>
            <div class="detail"> 
                <div>
                    <img src="img/<?php echo $detailKaryawan["gambar"]; ?>" class="foto">
                </div>
                <div><strong>Nama:&nbsp;</strong> <?php echo  $detailKaryawan["nama"]; ?></div>
                <div><strong>Email:&nbsp;</strong> <?php echo $detailKaryawan["email"]; ?></div>
                <div><strong>Jabatan:&nbsp;</strong> <?php echo $detailKaryawan["jabatan"]; ?></div>
                <div><strong>Pendidikan Terakhir: &nbsp;</strong> <?php echo $detailKaryawan["pendidikan_terakhir"]; ?></div>
                <div><strong>Alamat:&nbsp;</strong> <?php echo $detailKaryawan["alamat"]; ?></div>
                <div><strong>tanggal Bergabung:&nbsp;</strong> <?php echo $detailKaryawan["tgl_gabung"]; ?></div>
                <div><strong>Status:&nbsp;</strong> <?php echo $detailKaryawan["status_karyawan"]; ?></div>
            </div>
            <br>
            <a href="ubah.php?id=<?php echo $detailKaryawan["id"]; ?>" id="tbl-ubah"><i class="fa-solid fa-pen-to-square"></i>Ubah</a>
            <a href="hapus.php?id=<?php echo $detailKaryawan["id"]; ?>" id="tbl-hapus"><i class="fa-solid fa-trash-can"></i>Hapus</a>
            <a href="setting_data.php" id="tbl-kembali"><i class="fa-solid fa-arrow-left"></i>Kembali</a>
            <a href="cetak.php?id=<?php echo $detailKaryawan["id"]; ?>" id="tbl-cetak"><i class="fa-solid fa-print"></i>Cetak</a>

            <?php else : ?>
            <h2>Data Karyawan</h2>
            <table border="0" border-collapse="collapse" width="100%" id="tampil">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th >Jabatan</th>
                    <th>Status</th>
                    <th style="text-align:center">Aksi</th>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                    <?php foreach($karyawan as $kry) : ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $kry["nama"];?></td>
                            <td><?php echo $kry["email"];?></td>
                            <td><?php echo $kry["jabatan"]; ?></td>
                            <td><?php echo $kry["status_karyawan"]; ?></td>
                            <td class="tabel_aksi">
                                <a href="setting_data.php?id=<?php echo $kry["id"]; ?>"><i class="fa-solid fa-eye"></i>Detail</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <script src="script.js"></script>
</body>
</html>



<!-- <?php 

session_start();
if(!isset($_SESSION["login"])){
    header("location:login.php");
    exit;
}

include 'connection.php';

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
            <img src="asset/kampung.png " class="logo" alt="" width="200px" >
        </div>
            
        <div class="menu">
            <p id="admin"><i class="fa-solid fa-user"></i><span>Selamat Datang, Admin</span></p>
            <a href="index_login.php" target="_blank"><i class="fa-solid fa-house"></i><span>Homepage</span></a>
            <a href="dashboard.php"><i class="fa-solid fa-gauge"></i><span>Dashboard</span></a>
            <a href="tambah_data.php"><i class="fa-solid fa-plus"></i><span>Tambah Pegawai</span></a>
            <a href=""><i class="fa-sharp fa-solid fa-gear"></i><span>Atur Data</span></a>
            <a href="logout.php" id="logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>  
        </div> 
    </div>



    <div class="content">
      <table border="0" border-collapse="collapse" width="100%" id="tampil">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th style="text-align:center"> Jabatan</th>
            <th>Status</th>
            <th style="text-align:center">Aksi</th>
        </thead>

        <tbody>
            <?php $i=1 ?>
            <?php foreach($karyawan as $kry) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $kry["nama"];?></td>
                <td><?php echo $kry["email"];?></td>
                <td><?php echo $kry["jabatan"]; ?></td>
                <td><?php echo $kry["status_karyawan"]; ?></td>
                
                
                <td  class="tabel_aksi">
                    <a href="ubah.php?id=<?php echo $kry["id"]; ?>" id="tbl-ubah"><i class="fa-solid fa-pen-to-square"></i>Ubah</a>
                    <a href="hapus.php?id=<?php echo $kry["id"]; ?>" id="tbl-hapus"><i class="fa-solid fa-trash-can"></i>Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>



      </table>
     
    </div>
    
  







    <script src="script.js"></script>
</body>
</html> -->