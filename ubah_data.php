<?php 
    include "koneksi.php";    
    $bubah = "UPDATE tiuran SET 
                          nama ='$_POST[tnama]',
                          alamat ='$_POST[talamat]',
                          nominal ='$_POST[tnominal]',
                          keterangan ='$_POST[tketerangan]'                           
                     WHERE id_iuran='$_POST[id_iuran]'";    
    $query = mysqli_query($koneksi,$bubah);
    'index.php';

    if ($bubah) {
          echo "<script>
          alert('Ubah data sukses');
          document.location='index.php';
          </script>";
        
        }else {
          echo "<script>
          alert('Ubah data gagal');
          document.location='index.php';
          </script>";
        
        }
        
?>