<?php
session_start();
include 'connection.php';

if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
}

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
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #3498db;
        }

        .detail {
            margin-top: 20px;
        }

        .detail div {
            margin-bottom: 10px;
        }

        .foto {
            max-width: 25%;
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
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }

        #tbl-cetak {
            background-color: #2ecc71;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }


        #tbl-kembali:hover,
        #tbl-cetak:hover {
            background-color: #2980b9;
        }

        @media print {

            #tbl-kembali,
            #tbl-cetak {
                display: none;
            }
        }
    </style>
    <title>Cetak Biodata Karyawan</title>
</head>

<body>
    <div class="container">
        <?php if (isset($detailKaryawan)) : ?>
            <h2>Detail Karyawan</h2>
            <div class="detail">

                <div>
                    <img src="img/<?php echo $detailKaryawan["gambar"]; ?>" class="foto">
                </div>

                <div><strong>Nama:&nbsp;</strong> <?php echo $detailKaryawan["nama"]; ?></div>
                <div><strong>Email:&nbsp;</strong> <?php echo $detailKaryawan["email"]; ?></div>
                <div><strong>Jabatan:&nbsp;</strong> <?php echo $detailKaryawan["jabatan"]; ?></div>
                <div><strong>Status:&nbsp;</strong> <?php echo $detailKaryawan["status_karyawan"]; ?></div>
            </div>
            <br>
            <a href="setting_data.php" id="tbl-kembali"><i class="fa-solid fa-arrow-left"></i>Kembali</a>
            <a href="#" id="tbl-cetak" onclick="window.print()"><i class="fa-solid fa-print"></i>Cetak</a>
        <?php endif; ?>
    </div>
</body>

</html>