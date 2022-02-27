
<?php
session_start();
if(isset($_SESSION['uid']))
{
	echo $_SESSION['uid'];

}
else
{
	header('location:loginform2.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
<img src="iStock1.jpg" alt="" class="mr-3 mt-3 rounded-circle" style="width:40px;">
        <a class="navbar-brand" href="#">CONTACT COLLECTION SYSTEM                                     </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        
                 <div class="collapse navbar-collapse" id="collapsibleNavbar"> 
				  <a class="nav-link" href=""></a>
				   <a class="nav-link" href=""></a>
				    <a class="nav-link" href=""></a>
				   <a class="nav-link" href=""></a>
			     <a class="nav-link" href=""></a>
				   <a class="nav-link" href=""></a>
				   <a class="nav-link" href=""></a>
				   <a class="nav-link" href=""></a>
				   <a class="nav-link" href=""></a>
				   <a class="nav-link" href="about us.php">About us</a>
				   <a class="nav-link" href="help.php">Help</a>
				   <a class="nav-link" href="index.php">Logout</a>

             
             
        
        </div>  
      </nav>
      <br>
  
  
      <div class="card-deck">
          
             <a href="details.php" class="card bg-primary">
            <div class="card-body text-center">
            <p class="card-text"> <p class="text-body">ADD CONTACT </p></p>
            </div>
          </a>
       
          <a href="view3.php" class="card bg-warning">
            <div class="card-body text-center">
              <p class="card-text"> <p class="text-body">VIEW CONTACT </p></p>
            </div>
          </a>
          <a href="update.php" class="card bg-success">
            <div class="card-body text-center">
              <p class="card-text"> <p class="text-body">UPDATE CONTACT</p></p>
            </div>
          </a>
          <a href="delete.php"class="card bg-danger">
            <div class="card-body text-center">
              <p class="card-text"> <p class="text-body">DELETE CONTACT</p></p>
            </div>
          </a>
        </div>
  
 
  
</div>

</body>
</html>
<?php

	echo "    ";
?>
