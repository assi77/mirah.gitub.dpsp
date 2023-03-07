<?php 

if(isset($_POST['delete'])){

	$id=$_POST['delete_id'];
	$delete=$_POST['delete1'];
	require "include/connect.php";
	 $suppr = $db->prepare("DELETE FROM `files` WHERE `files`.`id` = ?");
	 $suppr->execute(array($id));
	 
	 $CheminFichier =$delete ;
					if (file_exists($CheminFichier)) {
						if (!unlink($CheminFichier)){echo "Problème lors de l'effacement de $CheminFichier<br />\n";}
						else {echo $CheminFichier," effacé.<br />\n";
						 header('Location: listeArchive.php');

					}
					}
					else {echo "Le fichier $CheminFichier n'a pas été trouvé.<br />\n";
					echo $delete;

				}

		
}





 ?>