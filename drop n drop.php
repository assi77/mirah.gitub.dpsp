

<?php  
require 'include/connect.php';
$filename = "";

if(isset($_POST['save']))
{
	$erreur="";
	$filename = $_FILES['file']['name'];

	$destination = 'files/'.$filename;

	$extension = pathinfo($filename,PATHINFO_EXTENSION);

	$file =$_FILES['file']['tmp_name'];

	$size = $_FILES['file']['size'];

	if(!in_array($extension, ['zip','pdf','png','docx','txt','xlsx']))
	{
		$erreur='seul les ficher .zip, .pdf, .docx, .txt, .png, .xlsx';

	}elseif($_FILES['file']['size']>1000000*1024) 
	{
		$erreur= "ficher volumineux (-76 MO)";
	}
	else
	{
		if(move_uploaded_file($file, $destination))
		{
			$req = $db->prepare('INSERT INTO files(name, file_url) VALUES(?, ?) ');
			$req->execute(array($filename,$destination));
			     if($req)
			     {
			     	$erreur= "ficher importer avec succes...";
			     }else{
			     	$erreur="fichier echec !!!";
			     }
		}
	}
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>drop</title>

	<link rel="stylesheet" type="text/css" href="css/drop.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script type="text/javascript"  defer src=""></script>
</head>
<body class="body">
  <div class="champ-drag">
  	<?php 
  			
  			if(isset($erreur)){
  				echo $erreur ; 
  			}
  		?>
  	<div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
  	<h3>Importer les fichiers</h3>
  	<span><?php echo $filename; ?></span>
  	<form method="POST" action="" enctype="multipart/form-data">
  	<input type="file"  name="file" class="input" id="file">
  	<label for="file"><i class="fas fa-upload"></i> charger un fichier</label><br>
  	<button type="submit" name="save">ENVOYER</button>
  	</form>
  </div>
</body>
</html>