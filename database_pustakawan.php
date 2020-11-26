<?php
$koneksi = mysqli_connect("localhost","root","","perpustakaan");

if (mysqli_connect_errno()) {
  echo mysqli_connect_error();
}

if (isset($_POST["action"])) {
  $nip = $_POST["nip"];
  $nama = $_POST["nama"];
  $kontak = $_POST["kontak"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  if ($_POST["action"] == "insert") {
    if (isset($_FILES["image"])) {
      // tampung informasi dari data file
      $path = pathinfo($_FILES["image"]["name"]);
      $ekstensi = $path["extension"];
      // merangkai penamaan file yang disimpan
      $filename = $kode."-".rand(1,1000).".".$ekstensi;
      // rand -> mengambil nilai random 1-1000, exp: 123-800.jpg
      move_uploaded_file($_FILES["image"]["tmp_name"],"image_pustakawan/".$filename);
    }
    $sql = "insert into pustakawan values ('$nip','$nama','$kontak','$username','$password','$filename')";
  } elseif ($_POST["action"] == "update") {
    $sql = "select * from pustakawan where nip='$nip'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);
    if (!empty($_FILES["image"]["name"])) {
      if (file_exists("image_pustakawan/".$hasil["image"])) {
        unlink("image_pustakawan/".$hasil["image"]);
      }

      $path = pathinfo($_FILES["image"]["name"]);
      $ekstensi = $path["extension"];
      // merangkai penamaan file yang disimpan
      $filename = $kode."-".rand(1,1000).".".$ekstensi;
      // rand -> mengambil nilai random 1-1000, exp: 123-800.jpg
      move_uploaded_file($_FILES["image"]["tmp_name"],"image_pustakawan/".$filename);
      $sql = "update pustakawan set nama='$nama', kontak='$kontak', username='$username', password='$password', image='$filename' where nip='$nip'";
    } else {
      $sql = "update pustakawan set nama='$nama', kontak='$kontak', username='$username', password='$password' where nip='$nip'";
    }

  }
  mysqli_query($koneksi,$sql);
  header("location:template.php?page=pustakawan.php");
}
if (isset($_GET["hapus"])) {
  $nip = $_GET["nip"];
  $sql = "select * from pustakawan where nip='$nip'";
  $result = mysqli_query($koneksi,$sql);
  $hasil = mysqli_fetch_array($result);
  if (file_exists("image_pustakawan/".$hasil["image"])) {
    // mengecek keberadaan file
    unlink("image_pustakawan/".$hasil["image"]);
    // menghapus file
  }
  $sql = "delete from pustakawan where nip='$nip'";
  mysqli_query($koneksi,$sql);
  header("location:template.php?page=pustakawan.php");
}
 ?>
