<?php
include 'config/database.php';
$up3 = $_GET['up3id'];

echo "<option value=''>Select ULP</option>";

$sql = "SELECT * FROM ulp WHERE id_up3='$up3'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
  }
} else {
  echo "Tidak ada data";
}

$conn->close();
