<?php  
//  db connection required
 include ('config/db_connect.php');

//  Delete items from database
if(isset($_POST['delete'])){
   $idToDelet = mysqli_real_escape_string( $conn, $_POST['ID_DEL']);

   $sql = "DELETE FROM tabletes where id = $idToDelet";

   if(mysqli_query($conn , $sql)){
         header("Location: index.php");
      }
      else{
         echo "<div class='alert alert-danger'>Error deleting item</div>";
      }

}
//  check if the id is in get url
if (isset($_GET['id'])){
  $id = mysqli_real_escape_string($conn, $_GET['id']);	
  // make sql
  $sql =  "SELECT * FROM tabletes where id = '$id'";
  // GET THE RESULT FROM THE DB
  $result = mysqli_query($conn, $sql);

  // FETCH RESULT IN ARRAY FORMT
  $drugs = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  
  mysqli_close($conn);
  // print_r($drugs);
}
?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>
   <h2 class="Blue-text center" > Details </h2>
   <div class=" container center">
   <?php if($drugs): ?>
     <h4><?php echo htmlspecialchars($drugs['tabletName']) ?> </h4>
     <h5>Type of Drug : </br><?php echo htmlspecialchars($drugs['Ttype']) ?> </h5>
     <p>Email:  </p>
     <ul>
							<?php foreach(explode(",", $drugs['Email']) as $list) :?></li>
								<li><?php echo htmlspecialchars($list);?> </li>
								<?php endforeach ?>
						</ul>
     <p>Created Time: </br><?php echo htmlspecialchars($drugs['Date']) ?> </p>
     <!-- Deleting Desing -->
     <form action="details.php" method="POST">
      <input type="hidden" name="ID_DEL" value="<?php echo $drugs['ID']  ?>">
      <input type="submit" value="Delete" name="delete" class="btn brand z-depth-0">
    <?php else: ?>
      <h3 class="center">Not Exist Majiro:😁🤦‍♀️🤷‍♂️</h3>


    <?php endif; ?>


   </div>
<?php include('templates/footer.php'); ?>
</html>