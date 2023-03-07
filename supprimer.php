<?php

if(isset($_GET['id'])){
	require "include/connect.php";
	$suprim_id=$_GET['id'];
	 $suppr = $db->prepare("DELETE FROM `files` WHERE `files`.`id` = ?");
	 $suppr->execute(array($suprim_id));
	 header('Location: listeArchive.php');
	  
			//ctrl+g pour accéder à la dite ligne avec notepad++	     
		     
}
?>