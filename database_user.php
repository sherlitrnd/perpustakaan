<?php
$koneksi = mysqli_connect("localhost","root","","perpustakaan");

if (mysqli_connect_errno()) {
  echo mysqli_connect_error();
}

if (isset($_POST["action"])) {
  $kode = $_POST["id"];
  $judul = $_POST["username"];
  $penulis = $_POST["password"];
  $stok = $_POST["level"];


  if (isset($_GET["hapus"])) {
    $kode = $_GET["id"];
    $sql = "select * from user where id='$id'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);
 
      // menghapus file
    }
    $sql = "delete from user where id='$id'";
    mysqli_query($koneksi,$sql);
    header("location:template.php?page=user.php");
  }