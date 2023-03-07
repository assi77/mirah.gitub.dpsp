
<?php
$mysqli = new mysqli("localhost","root", "", "tuto");

$query = $mysqli->prepare("SELECT * FROM files");
$query->execute();
$query->store_result();

$rows = $query->num_rows;

echo $rows;


 ?>