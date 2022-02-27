<?php
include 'config/database.php';

$up3 = $_POST['up3'];
$ulp = $_POST['ulp'];
$wig = $_POST['wig'];
$lm = $_POST['lm'];
$target = $_POST['target'];
$realisasi = $_POST['realisasi'];
$tanggal_insert = $_POST['tanggal'];

if ($realisasi > $target){
  $status="MENANG";
}else{
  $status="KALAH";
}

$cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM t_transaksi WHERE up3='$up3' 
                                    AND ulp='$ulp'
                                    AND wig='$wig'
                                    AND lm='$lm'
                                    AND tanggal_insert='$tanggal_insert'
                                    "));
    if ($cek > 0){
    echo "<script>window.alert('data yang anda masukan sudah ada')
    window.location='tambah.html'</script>";
    }else{
$sql = "INSERT INTO t_transaksi(up3, ulp, wig, lm, target, realisasi, tanggal_insert, status) VALUES ('$up3','$ulp','$wig','$lm','$target','$realisasi','$tanggal_insert','$status')";

if ($conn->query($sql) === TRUE) {
  echo "success";
} else {
  echo "error";
}
    }
$conn->close();
