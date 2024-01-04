<?php
session_start();

if (isset($_SESSION["login"])) {
  header("location:index_login.php");
  exit;
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style_homepage.css">



</head>

<body>

  <div class="medsos">
    <div class="container">

    </div>
  </div>

  <header>
    <div class="container">
      <h1>KAMPOENG-KU</h1>
      <ul>
        <li class="active"><a href="index.html">HOME</a></li>
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#tempat">GALERY</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="login.php">LOGIN</a></li>
      </ul>
    </div>
  </header>


  <section class="banner">
    <h2>SELAMAT DATANG DI WEBSITE KAMI</h2>
  </section>


  <!--about-->
  <section id="about">
    <div class="container">
      <h3>ABOUT</h3>
      <p>PT. KampungKu adalah Perusahaan Retail yang sedang mengembangkan usaha di Seberang Kota Jambi dan Sekitarnya. Konsumen dimanjakan dengan pelayanan Online dan pengantaran barang langsung ke depan Rumah. Konsep ini sangat cocok bagi ibu-ibu rumah tangga yang sibuk dan banyak kegiatan.
        Adapun visi dan misi dari PT. KampungKu adalah untuk mencerdaskan semua lapisan masyarakat yang pada akhirnya memajukan dan menjadikan yakni untuk memberikan kemudahan bagi para pelanggan dalam memenuhi kebutuhan sehari-hari, baik pelanggan personal, rumah tangga, maupun perusahaan</p>
      <p><i>"Kami menjual ikan, daging, sayur, buah, makanan olahan dan berbagai produk lainnya dengan harga bersaing dan melayani pengiriman seputar kota Jambi."</i></p>
      <p>KampungKu.id adalah platform belanja online kota Jambi yang menyediakan berbagai macam barang. Mulai dari buah dan sayur, makanan, minuman, susu, peralatan rumah tangga, hingga alat tulis kantor.</p>
    </div>
  </section>

  <center>
    <section id="tempat">
      <h3>Galeri Foto</h3>
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/jumaku5.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/jumaku6.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/jumaku8.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
  </center>


  <section id="contact">
    <div class="container">
      <h3>CONTACT INFO</h3>
      <div class="box">
        <div class="col-4">
          <h4>Address</h4>
          <p>Jl. KH Rozali, Tj. Raden, Kec. Danau Tlk., Kota Jambi, Jambi 36361</p>
        </div>
        <div class="col-4">
          <h4>Email</h4>
          <p>nandut@gmail.com</p>
        </div>
        <div class="col-4">
          <h4>Telp.</h4>
          <p>088287750497</p>
        </div>
        <div class="col-4">
          <h4>Instagram</h4>
          <p>@mubarroqal_</p>
        </div>
      </div>

      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.1464522019116!2d103.5806121888982!3d-1.584415374809296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e25899961f91669%3A0xae4d452649639678!2sNew%20Office%20Kel.%20Tanjung%20Raden!5e0!3m2!1sid!2sid!4v1702635773910!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section>


  <!--footer-->
  <footer>
    <div class="container">
      <small>Copyright &copy; 2023 - Julianda_Nandut. All Right Reserved.</small>
    </div>
  </footer>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>