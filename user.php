<?php include("config.php"); ?>
<?php session_start(); 


?>
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
       
    </script>
  </head>
  <body>
  <nav class="navbar navbar-expand-md bg-danger navbar-dark sticky-top">
      <a href="#" class="text-white">
      <!-- <img src="logo_putih.png" width="150" alt=""></a> -->
      <h4>TELKOM's LIBRARY</h4>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
      <span class="navbar navbar-toggler-icon"></span></button>

      <div class="collapse navbar-collapse" id="menu">
        <ul class=navbar-nav>
          <li class="nav-item"><a href="template.php?page=buku" class="nav-link">Buku</a></li>
          <li class="nav-item"><a href="user.php?" class="nav-link">User</a></li>
          <li class="nav-item"><a href="logout.php?logout=true" class="nav-link">Logout</a></li>

        </ul>
      </div>
      <h5 class="text-white">Hello, <?php echo $_SESSION["username"]; ?></h5>
    </nav>
    <div class="container">
      <div class="card col-sm-12">
        <div class="card-header bg-warning text-white">
          <h4>Data </h4>
        </div>
        <div class="card-body">
          <?php
          $koneksi = mysqli_connect("localhost","root","","perpustakaan");

          if (mysqli_connect_errno()) {
            echo mysqli_connect_error();
          }

          $sql ="select * from user";
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
                   <td>Id</td>
                   <td>Username</td>
                   <td>Password</td>
                   <td>Level</td>
                   <td>Opsi</td>
                 </tr>
               </thead>
               <tbody>
                 <?php foreach ($result as $hasil): ?>
                   <tr>
                     <td><?php echo $hasil["id"]; ?></td>
                     <td><?php echo $hasil["username"]; ?></td>
                     <td><?php echo $hasil["password"]; ?></td>
                     <td><?php echo $hasil["level"]; ?></td>
                     
                     <td>
                     <a href="hapus.php"
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
        <div class="card-footer" >
          <button type="button" class="btn btn-success"
          data-toggle="modal" data-target="#modal">
          <form action="form-register.php">
          Tambah Data
        </button>
        </form>

        </div>
      </div>
    </div>
        </div>
      </div>
    </div>
  </body>
</html>
