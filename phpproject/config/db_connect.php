<?php   

// connecting to the database
$conn = mysqli_connect('localhost', 'fathiomer', 'Allah@1(*&scw' ,'hrgpharmacy' );

// Checking if the connection is established
if(!$conn){
	echo 'Connection Error: Connection is not established' . mysqli_connect_error();
}



?>