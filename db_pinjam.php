<?php
session_start();
if (isset($_GET["pinjam"])) {
  $koneksi = mysqli_connect("localhost","root","","perpustakaan");
  $kode = $_GET["kode_buku"];
  $sql = "select * from buku where kode_buku='$kode'";
  $result = mysqli_query($koneksi,$sql);
  $hasil = mysqli_fetch_array($result);
  // memasukkan ke keranjang
  array_push($_SESSION["session_pinjam"],$hasil);
  // session_pinjam -> keranjang
  header("location:template_siswa.php?page=list_buku");
}

if (isset($_GET["checkout"])) {
  $koneksi = mysqli_connect("localhost","root","","perpustakaan");
  // siapkan data untuk table Pinjam
  $id_pinjam = rand(1,1000)."-".rand(1,1000);
  $nisn = $_SESSION["session_siswa"]["nisn"];
  $tgl_pinjam = date("Y-m-d");
  $sql = "insert into pinjam values('$nisn','$id_pinjam','$tgl_pinjam')";
  mysqli_query($koneksi,$sql);

  $total_buku = sizeof($_SESSION["session_pinjam"]);
  // insert ke table detail_pinjam
  foreach ($_SESSION["session_pinjam"] as $hasil) {
    $sql2 = "insert into detail_pinjam values ('$id_pinjam','".$hasil["kode_buku"]."',". $total_buku .")";
    
    if (!mysqli_query($koneksi,$sql2)) {
      echo "Error -->" . mysqli_error($koneksi);
      die();
    }
  }

  $_SESSION["session_pinjam"] = array();
  header("location:template_siswa.php?page=list_buku");
}
 ?>
