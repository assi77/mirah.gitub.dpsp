
<?php
$mysqli = new mysqli("localhost","root", "", "connexion");

$query = $mysqli->prepare("SELECT * FROM utilisateur");
$query->execute();
$query->store_result();

$rows = $query->num_rows;

echo $rows;


 ?>