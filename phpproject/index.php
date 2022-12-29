<?php 
include('config/db_connect.php');
// kan waa query database 
$sql = 'SELECT id, tabletName, Ttype , Email FROM tabletes' ;
// -- query results
$result = mysqli_query($conn, $sql);

// fetch results  rows as array
$Helay = mysqli_fetch_all($result, MYSQLI_ASSOC);
// $NEW = $result -> fetch_assoc();
// $Helay = $result->fetch_array(MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);

// explode("," , $Helay[0]["Email"]);
// print_r($Helay);
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>
	<div class="container">

	<h4 >DRUG STORE</h4>
		<div class="row">
			<?php foreach ( $Helay as $drug):?>
			<div class="col s6 md3">
				<div class="card z-depth-0">
					<i class="bi bi-capsule"></i>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule center" viewBox="0 0 16 16" >
					<path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
				</svg>
					<div class="card-content center">
						<!-- <h6><?php echo htmlspecialchars($drug['id']);?></h6> -->
						<h6><?php echo htmlspecialchars($drug['tabletName']);?></h6>
						<h6><?php echo htmlspecialchars($drug['Ttype']);?></h6>
						<ul>
							<?php foreach(explode(",", $drug['Email']) as $list) :?></li>
								<li><?php echo htmlspecialchars($list);?> </li>
								<?php endforeach ?>
						</ul>
					</div>
					<div class="card-action text-align">
				  <a class="blue-text" href="details.php?id=<?php echo $drug['id'] ?>">More Info</a>		
				</div>

				</div>
			</div>
			<?php endforeach?>
		</div>
	</div>
	<?php if(count($Helay) >=2) :?>
     <p class="center text-aling">Theirs more then two drugs</p>
		<?php else:?>
		  <p>No more drugs</p>
		<?php endif;?>
	<?php include('templates/footer.php'); ?>

</html>

