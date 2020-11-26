<script type="text/javascript">
  function Print(){
    var printDocument = document.getElementById('report').innerHTML;
    // ini adalah bagian yang akan dicetak
    var originalDocument = document.body.innerHTML;

    document.body.innerHTML = printDocument;
    window.Print();
    document.body.innerHTML = originalDocument;
  }
</script>
<div id="report" class="card col-sm-12">
  <div class="card-header">
    <h3>Laporan Transaksi</h3>
  </div>
  <div class="card-body">
    <?php
    $koneksi = mysqli_connect("localhost","root","","perpustakaan");
    $sql = "select id_pinjam,kode_barang,username,tanggal_pinajm
    form pinjam inner Join detail_pinajam
    on pinjam.id_pinjam=detail_pinjam.id_pinjam";
    echo $sql;
    $result = mysqli_query($koneksi,$sql);
     ?>
     <table class="table">
       <thead>
         <tr>
           <th>Tanggal</th>
           <th>Id Transaksi</th>
           <th>Nama peminjam</th>
           <th>Option</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($result as $hasil): ?>
           <tr>
             <td><?php echo $hasil["tgl"]; ?><?php echo date('l, d-m-Y'); ?></td>
             <td><?php echo $hasil["id"]; ?></td>
             <td><?php echo $hasil["username"]; ?></td>
             <td>
               <a href="template.php?page=buku&id=<?php echo $hasil["id"];?>">
                 <button type="button" class="btn btn-info">
                   Details
                 </button>
               </a>
             </td>
           </tr>
         <?php endforeach; ?>
       </tbody>
     </table>
  </div>
