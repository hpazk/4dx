<?php
include 'config/database.php';

echo "<option value=''>Pilih WIG</option>";

$up3 = mysqli_query($conn, "SELECT * FROM wig ORDER BY nama ASC");

while ($row = mysqli_fetch_assoc($up3)) {
  echo "<option value='" . $row['nama'] . "'>" . $row['nama'] . "</option>";
}
mysqli_close($conn);

