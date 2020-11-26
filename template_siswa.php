<?php include("config.php"); ?>
<?php session_start(); 
if($_SESSION['level']==""){
  header("location:form-login.php?pesan=gagal");
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telkom's Library</title>
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
     
      </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-secondary navbar-dark sticky-top">
      <a href="#" class="text-white">
      <!-- <img src="logo_putih.png" width="150" alt=""></a> -->
      <h4>TELKOM's LIBRARY</h4>
    </a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
      <span class="navbar navbar-toggler-icon"></span></button>

      <div class="collapse navbar-collapse" id="menu">
        <ul class=navbar-nav>
          <li class="nav-item"><a href="template_siswa.php?page=list_buku" class="nav-link">Buku</a></li>
          <li class="nav-item"><a href="logout.php?logout=true" class="nav-link">Logout</a></li>
        </ul>
      </div>

      <a href="template_siswa.php?page=list_pinjam">
        <b class="text-white">Pinjam: <?php echo count($_SESSION["session_pinjam"]); ?></b>
      </a>
    </nav>
    

    <div class="container my-2">
      <?php if (isset($_GET["page"])): ?>
        <?php if ((@include $_GET["page"].".php") === true): ?>
          <?php include $_GET["page"].".php"; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </body>
</html>
