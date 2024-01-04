<?php 
$server = "localhost";
$user = "root";
$pass = "";
$db = "perusahaan";

$conn = mysqli_connect($server, $user, $pass, $db);

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tgl_gabung = htmlspecialchars($data["tgl_gabung"]);
    $status_karyawan = isset($data['status_karyawan']) && is_array($data['status_karyawan']) ? implode(", ", $data['status_karyawan']) : '';
    $pendidikan_terakhir = $data["pendidikan_terakhir"];
    
	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

    $query = "INSERT INTO pegawai
                VALUES
                ('','$nama','$email','$nohp','$jabatan', '$alamat', '$tgl_gabung', '$status_karyawan', '$pendidikan_terakhir', '$gambar')";
    mysqli_query($conn, $query);


	return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}
 



?>