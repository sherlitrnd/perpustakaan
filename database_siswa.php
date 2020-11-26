<?php
$koneksi = mysqli_connect("localhost","root","","perpustakaan");

if (mysqli_connect_errno()) {
  echo mysqli_connect_error();
}

if (isset($_POST["action"])) {
  $kode = $_POST["kode_buku"];
  $judul = $_POST["judul"];
  $penulis = $_POST["penulis"];
  $stok = $_POST["stok"];
  $tgl = $_POST["tgl_register"];

  if ($_POST["action"] == "insert") {
    // tampung data file
    if (isset($_FILES["image"])) {
      // tampung informasi dari data file
      $path = pathinfo($_FILES["image"]["name"]);
      $ekstensi = $path["extension"];
      // merangkai penamaan file yang disimpan
      $filename = $kode."-".rand(1,1000).".".$ekstensi;
      // rand -> mengambil nilai random 1-1000, exp: 123-800.jpg
      move_uploaded_file($_FILES["image"]["tmp_name"],"image_buku/".$filename);
    }

    $sql = "insert into buku values ('$kode','$judul','$penulis',,'$stok','$tgl', '$filename')";
  } elseif ($_POST["action"] == "update") {
    // mengambil dari database
    $sql = "select * from buku where kode_buku='$kode'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);
    if (!empty($_FILES["image"]["name"])) {
      if (file_exists("image_buku/".$hasil["image"])) {
        unlink("image_buku/".$hasil["image"]);
      }

      $path = pathinfo($_FILES["image"]["name"]);
      $ekstensi = $path["extension"];
      // merangkai penamaan file yang disimpan
      $filename = $kode."-".rand(1,1000).".".$ekstensi;
      // rand -> mengambil nilai random 1-1000, exp: 123-800.jpg
      move_uploaded_file($_FILES["image"]["tmp_name"],"image_buku/".$filename);
      $sql = "update buku set judul='$judul', penulis='$penulis', kategori='$kategori',stok='$stok',image='$filename' where kode_buku='$kode'";
    } else {
      $sql = "update buku set judul='$judul', penulis='$penulis', kategori='$kategori',stok='$stok' where kode_buku='$kode'";
    }

  }

  echo $sql;
  mysqli_query($koneksi,$sql);
  header("location:template.php?page=buku.php");
}
if (isset($_GET["hapus"])) {
  $kode = $_GET["kode_buku"];
  $sql = "select * from buku where kode_buku='$kode'";
  $result = mysqli_query($koneksi,$sql);
  $hasil = mysqli_fetch_array($result);
  if (file_exists("image_buku/".$hasil["image"])) {
    // mengecek keberadaan file
    unlink("image_buku/".$hasil["image"]);
    // menghapus file
  }
  $sql = "delete from buku where kode_buku='$kode'";
  mysqli_query($koneksi,$sql);
  header("location:template.php?page=buku.php");
}
 ?>
