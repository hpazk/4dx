<?php
include 'config/database.php';

echo "<option value=''>Select UP3</option>";

$sql = "SELECT * FROM up3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
  }
} else {
  echo "Tidak ada data";
}

$conn->close();
