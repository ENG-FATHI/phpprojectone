<?php 
include ('config/db_connect.php');
 $tabletName = $type = $co= $email ="";
$errors = array('email' => '', 'co-tablet' => '', 'type' => '', 'tablet_name' => '');
if(isset($_POST['submit'])){
 
        if(empty($_POST['email'])){
          $errors['email']= "Please write the  Email <br />" ;
          
        }else{  
          $email = $_POST['email'];
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] ="Please make sure you have  write valid email address";
        }
        }
        if(empty($_POST['tablet_name'])){
          $errors['tablet_name'] = "Please write the correct name <br />" ;
          
        }else{  
          $tabletName = $_POST['tablet_name'];
          if(!preg_match("/^[a-zA-Z0]+$/", $tabletName)){
            $errors['tablet_name'] = "Please make sure you write the correct name!";
        }
        }

        if(empty($_POST['type'])){
          $errors['type'] = "Please write invalid taype <br />" ;
          
        }else{  
          $type = $_POST['type'];
          if(!preg_match("/^[a-zA-Z0]+$/", $type)){
            $errors['type'] = "Please make sure you write the correct Type!";
        }
        }
        if(empty($_POST['co-tablet'])){
          $errors['co-tablet'] = "Please write invalid taype <br />" ;
          
        }else{  
        $co = $_POST['co-tablet'] ;
        if(!preg_match("/^[a-zA-Z0]+$/", $co)){
        $errors['co-tablet'] = "Please make sure you write the correct Type!";
}

  if(array_filter($errors)){
    echo 'WAXBA KHALDAN';
  }else{
      
    // 
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $tabletName = mysqli_real_escape_string($conn, $_POST['tablet_name']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
  
    // creating sql

    $sql = "INSERT INTO tabletes(tabletName, Ttype, Email) VALUES ('$tabletName','$type', '$email')";
 
    // saving to the database and checking

    if(mysqli_query($conn, $sql)){
      // echo "Data Inserted Successfully";
     header('location: index.php');
    }else{
      echo "Error" . mysqli_error($conn);
    }

  }
}
}
?>

<!DOCTYPE html>
<html>
  

	<?php include('templates/header.php'); ?>
  <section class="container  dark-blue-text">
    
    <h4 class= "center">Add Tablet</h4>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="class">
      <label>Tablet Name:</label>
      <input type="text" name="tablet_name" placeholder="Tablet Name" value="<?php echo $tabletName ?>">
      <div class=red-text><?php echo $errors['tablet_name'];?></div>
      <label>Type:</label>
      <input type="text" name="type" placeholder="Tablet Type" value= "<?php echo $type ?>">
      <div class=red-text><?php echo $errors['type'];?></div>
      <label>Tablet Company:</label>
      <input type="text" name="co-tablet" placeholder="Tablet company" value="<?php echo $co ?>" >
      <div class=red-text><?php echo $errors['co-tablet'];?></div>
      <label>Email:</label>
      <input type="text" name="email" placeholder="Please write your Email" value = "<?php echo $email ?>">
      <div class=red-text><?php echo $errors['email'];?></div>
      <div>
        <input type="submit" value="Submit" name="submit" class="btn brand z-depth-0">
      </div>
    </form>
  </section>
	<?php include('templates/footer.php'); ?> 


</html>