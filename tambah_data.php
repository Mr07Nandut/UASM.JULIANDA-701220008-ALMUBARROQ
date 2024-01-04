<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
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

label {
            display: block;
            margin-bottom: 10px;
            /* color: #fff; */
        }

        input,
        select,
        textarea {
            width: 60%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        input[type="checkbox"],
        input[type="radio"] {
            width: auto;
            margin-right: 5px;
            display: none;
        }

        label.checkbox,
        label.radio {
            display: inline-block;
            cursor: pointer;
            margin-right: 10px;
        }

        label.checkbox span,
        label.radio span {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 1px solid #4CAF50;
            border-radius: 50%;
            margin-right: 5px;
        }

        input[type="checkbox"]:checked+label.checkbox span {
            background-color: #4CAF50;
        }

        input[type="radio"]:checked+label.radio span {
            background-color: #4CAF50;
        }

        input[type="submit"] {
            background-color: #008CBA;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="reset"] {
            background-color: #f44336;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #FF00FF;
        }

        input[type="reset"]:hover {
            background-color: red;
        }

        /* Gaya untuk jenis kelamin */
        label.radio span {
            border-radius: 50%;
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

        <form action="cek_tambah_data.php" method="POST" id="tambah" enctype="multipart/form-data">
            <center>

                <h1>Tambah Data </h1>
                <table width="80%" id="tambah">
                    <tr>
                        <td><label for="nama">Nama</label></td>
                        <td><input type="text" name="nama" id="nama" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" name="email" id="email" required></td>
                    </tr>
                    <tr>
                        <td><label for="nohp">Nomor Hp</label></td>
                        <td><input type="text" name="nohp" id="nohp" required></td>
                    </tr>
                    <tr>
                        <td><label for="jabatan">Jabatan</label></td>
                        <td><input type="text" name="jabatan" id="jabatan" required></td>
                    </tr>


                    <tr>
                        <td><label for="pendidikan_terakhir">pendidikan Terakhir:</label></td>
                        <td><select name="pendidikan_terakhir" id="pendidikan_terakhir" required>
                                <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                                <option value="SMA">SMA</option>
                                <option value="SMK">SMK</option>
                                <option value="MAN">MAN</option>
                                <option value="S1">S1</option>
                                <option value="D3">D3</option>
                                <option value="Masih_bersekolah">Masih Bersekolah</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td><label for="alamat">Alamat:</label></td>
                        <td><textarea name="alamat" required style="width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 15px;"></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="tanggal_gabung">Tanggal Bergabung:</label></td>
                        <td><input type="date" name="tgl_gabung" id="tgl_gabung" required></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="minat">Status Karyawan</label>
                        </td>

                        <td>

                            <input type="checkbox" id="aktif" name="status_karyawan[]" value="aktif">
                            <label for="aktif" class="checkbox"><span></span>Aktif</label>

                            <input type="checkbox" id="no-aktif" name="status_karyawan[]" value="non-aktif">
                            <label for="non-aktif" class="checkbox"><span></span>Non-Aktif</label>

                            <input type="checkbox" id="kontrak" name="status_karyawan[]" value="kontrak">
                            <label for="kontrak" class="checkbox"><span></span>Kontrak</label>

                            <input type="checkbox" id="full-time" name="status_karyawan[]" value="full-time">
                            <label for="full-time" class="checkbox"><span></span>Full-time</label>

                            <input type="checkbox" id="part-time" name="status_karyawan[]" value="part-time">
                            <label for="part-time" class="checkbox"><span></span>Part-time</label>

                        </td>

                    </tr>

                    <tr>
                        <td><label for="gambar">Gambar  </label></td>
                        <td><input type="file" name="gambar" id="gambar" </td>
                    </tr>

                </table>

                <button type="submit" name="submit">Tambah</button>
            </center>
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>