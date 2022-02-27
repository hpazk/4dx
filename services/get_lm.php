<?php
include 'config/database.php';
$wigid = $_GET['wigid'];

echo "<option value=''>Pilih LM</option>";

$ulp = mysqli_query($conn, "SELECT * FROM t_lm WHERE id_wig='$wigid' ORDER BY nama ASC");

while ($row = mysqli_fetch_assoc($ulp)) {
  echo "<option value='" . $row['nama'] . "'>" . $row['nama'] . "</option>";
}
mysqli_close($conn);