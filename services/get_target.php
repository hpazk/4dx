<?php
include 'config/database.php';
$lm = $_GET['idlm'];
$up3 = $_GET['up3'];
$ulp = $_GET['up3'];
$tanggal = date('Y-m-d');

$query = mysqli_query($conn, "select * from t_target where idlm='$lm' AND up3='$up3' AND ulp='$ulp' AND tanggal_target='$tanggal' ");
$target = mysqli_fetch_array($query);
$data = array(
            'target'      =>  @$target['target'],
            

//tampil data
echo json_encode($data);