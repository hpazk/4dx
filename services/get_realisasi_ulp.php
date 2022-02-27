<?php
include 'config/database.php';
$up3 = $_GET['up3'];
$ulp = $_GET['ulp'];
$wig = $_GET['wig'];
$lm = $_GET['lm'];
$tanggal_awal = $_GET['tanggal_awal'];
$tanggal_akhir = $_GET['tanggal_akhir'];

// $idiwg = "SELECT id FROM wig WHERE nama='$wig'";
// $result = $conn->query($idiwg);

// $lm = "SELECT id FROM t_lm WHERE nama='$lm'";
// $result = $conn->query($idiwg);

// $sql = "SELECT * FROM t_transaksi  WHERE up3 ='$up3' AND ulp ='$ulp' AND wig='$wig' AND lm ='$lm' AND tanggal_insert BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tanggal_insert ASC " ;
$sql = "SELECT up3, 
               ulp, 
               wig, 
               lm,
               status,
               tanggal_insert,
               SUM(target) AS total_target, 
               SUM(realisasi) AS total_realisasi 
               FROM t_transaksi WHERE up3 ='$up3' AND ulp ='$ulp'
               AND wig='$wig'
               AND lm ='$lm' 
               AND tanggal_insert BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
               GROUP BY ulp,wig,lm,tanggal_insert ASC" ;
// $sql = "SELECT up3, ulp, wig, lm, SUM(target) AS total_target, SUM(realisasi) AS total_realisasi FROM t_transaksi WHERE up3 ='$up3'  AND tanggal_insert BETWEEN '2022-02-20' AND '2022-02-26' GROUP BY ulp ASC" ;

$result = $conn->query($sql);
$data = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data[]  =$row;
   
  }
  echo json_encode($data);
} else {
    echo json_encode([]);
}

$conn->close();


