<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function Tambah(){
          document.getElementById("action").value = "insert";
          document.getElementById("kode_buku").value = "";
          document.getElementById("judul").value = "";
          document.getElementById("penulis").value = "";
          document.getElementById("stok").value = "";
          document.getElementById("tgl_register").value = "";


        }
        function Edit(index){
          document.getElementById("action").value = "update";

          var table = document.getElementById("table_buku");
          var kode_buku = table.rows[index].cells[0].innerHTML;
          var judul = table.rows[index].cells[1].innerHTML;
          var penulis = table.rows[index].cells[2].innerHTML;
          var stok = table.rows[index].cells[3].innerHTML;
          var tgl_register = table.rows[index].cells[4].innerHTML;

          document.getElementById("kode_buku").value = kode_buku;
          document.getElementById("judul").value = judul;
          document.getElementById("penulis").value = penulis;
          document.getElementById("stok").value = stok;
          document.getElementById("tgl_register").value = tgl_reister;

        }
    </script>
  </head>
  <body>
    <div class="container">
      <div class="card col-sm-12">
        <div class="card-header bg-warning text-white">
          <h4>Data Buku</h4>
        </div>
        <div class="card-body">
          <?php
          $koneksi = mysqli_connect("localhost","root","","perpustakaan");

          if (mysqli_connect_errno()) {
            echo mysqli_connect_error();
          }

          $sql ="select * from buku";
          $result = mysqli_query($koneksi,$sql);
          $count = mysqli_num_rows($result);
           ?>

           <?php if ($count == 0): ?>
             <div class="alert alert-info">
               Data is empty
             </div>
           <?php else: ?>
             <table class="table" id="table_buku">
               <thead>
                 <tr>
                   <td>Kode Buku</td>
                   <td>Judul</td>
                   <td>Penulis</td>
                   <td>Stok</td>
                   <td>Tgl Register</td>
                   <td>Image</td>
                   <td>Opsi</td>
                 </tr>
               </thead>
               <tbody>
                 <?php foreach ($result as $hasil): ?>
                   <tr>
                     <td><?php echo $hasil["kode_buku"]; ?></td>
                     <td><?php echo $hasil["judul"]; ?></td>
                     <td><?php echo $hasil["penulis"]; ?></td>
                     <td><?php echo $hasil["stok"]; ?></td>
                     <td><?php echo $hasil["tgl_register"];?><?php echo date('l, d-m-Y'); ?></td>
                     <td>
                       <img src="<?php echo "image_buku/".$hasil["image"];?>" id="<?php echo $hasil["kode_buku"]; ?>" class="img" width="100">
                     </td>
                     <td>
                       <button type="button" class="btn btn-primary"
                       data-toggle="modal" data-target="#modal"
                       onclick="Edit(this.parentElement.parentElement.rowIndex)">
                       Edit
                     </button>
                     <a href="database_buku.php?hapus=buku&kode_buku=<?php echo $hasil["kode_buku"]; ?>"
                       onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                       <button type="button" class="btn btn-danger">
                         Hapus
                       </button>
                     </a>
                     </td>
                   </tr>
                 <?php endforeach ?>
               </tbody>
             </table>
           <?php endif ?>


        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-success"
          data-toggle="modal" data-target="#modal" onclick="Tambah()">
          Tambah Data
        </button>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="database_buku.php" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h4>Form Buku</h4>
              <span class="close" data-dismiss="modal">&times;</span>
            </div>
            <div class="modal-body">
              <input type="hidden" name="action" id="action">
              Kode Buku
              <input type="text" name="kode_buku" id="kode_buku" class="form-control">
              Judul
              <input type="text" name="judul" id="judul" class="form-control">
              Penulis
              <input type="text" name="penulis" id="penulis" class="form-control">
              Stok
              <input type="number" name="stok" id="stok" class="form-control">
              Tgl Register
              <input type="text" name="tgl_register" id="kategori" class="form-control">
              Image
              <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">
                Simpan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
