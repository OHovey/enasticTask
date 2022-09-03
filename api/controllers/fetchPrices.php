<?php 

$prices = $conn->query('SELECT * FROM prices')->fetch_all(MYSQLI_ASSOC);

echo json_encode(['data' => $prices]);
