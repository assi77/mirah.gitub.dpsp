<?php 
@$keyword=$_GET['keyword'];
@$valider=$_GET['valider'];
if(isset($valider) && !empty(trim($keyword))){
    include ("include/connect.php");
    $req=$db->prepare("select id, name ,file_url from files where name like '%$keyword%'");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute();
    $tab=$req->fetchAll();
    $afficher='oui';
}


?>
<?php include "header.php";  ?>

				<div class="search-wrapper">
					<span class="las la-search"></span>
					<form method="get" action="">
					<input type="search" name="keyword" placeholder="search here">
					<input type="submit" name="valider" value="search" hidden>
				    </form>
			</div><br>

 <div class="table-section">
 <?php if(@$afficher=='oui'){ ?>
  <div class="resultats">
      <div class="nbr"><?= count($tab)." ".(count($tab)>1?"resultats trouvés":"resultat trouvé") ?></div>
          <?php for($i=0;$i<count($tab);$i++){  ?>
          	<table>
          	<tbody>
                 <tr>
                 	<td><img src="image/doc.png"> </td>
                    <td><?php echo $tab[$i]['name'] ?></td>
                    <td><?= '<a href="'.$tab[$i]['file_url'].'">telecharger</a>' ?></td>
                    <td>
                    	<form method="post" action="supp.php">	
   						<input type="text" name="delete_id" value="<?=$tab[$i]['id'] ; ?>" hidden>
				   		<input type="text" name="delete1" value="<?=$tab[$i]['file_url'] ; ?>"hidden >
				   		<button type="submit" name="delete"><i class="fa-solid fa-trash"></i></button></td>
				   		</form>
                    </td> 
                  </tr>
                  </tbody>
                  </table>
        <?php }?>
  </div>
  <?php  } ?>
</div>
 <div class="header-table">
 		<p>Fichiers reccents</p>
 	</div>
 <div class="table-section">
 	
<table>
	<thead>
		<tr>
			<th>IMAGE</th>
			<th>FILE NAME</th>
			<th>DOWNLOAD</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>

		<?php 
require 'include/connect.php';
$req = $db->query('SELECT id, name, file_url FROM files');
while($data= $req->fetch()){
	?>
   <tr>
   	<td><img src="image/doc.png"></td>
   	<td><?=$data['name']?></td>
   	<td><?='<a href="'.$data['file_url'].'">telecharger</a>'?></td>
   	<td>
   		<form method="post" action="supp.php">	
   		<input type="text" name="delete_id" value="<?=$data['id'] ; ?>" hidden>
   		<input type="text" name="delete1" value="<?=$data['file_url'] ; ?>"hidden >
   		<button type="submit" name="delete"><i class="fa-solid fa-trash"></i></button></td>
   		</form>
   		
   </tr>
	<?php
}
 ?>
	</tbody>

 </table>
</div>
<br>
<br>
<br>
<br>
<?php include "footer.php";  ?>