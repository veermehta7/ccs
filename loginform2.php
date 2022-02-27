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
<img src="iStock1.jpg" alt="" class="mr-3 mt-3 rounded-circle" style="width:45px;">
                <a class="navbar-brand" href="#">Contact Collection System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                 
                   
                </div>  
              </nav>
              <br>
              <form  class="was-validated" method=POST>
              <div class="form-group">
                <label for="uname">Username:</label>
                <input type="text" class="form-control" id="u" placeholder="Enter username" name="u" required>
                <div class="valid-feedback">filled</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="p" placeholder="Enter password" name="p" required>
                <div class="valid-feedback">filled.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <input type="submit" name="login" value="Login" >
	<td><a href="forgot.php" name="submit0">Forgot your password???</a></td>
             </form> 
</div>

</body>
</html>



<?php
include('dbcon.php');
if(isset($_POST['login']))
{
	$username=$_POST['u'];
	$password=$_POST['p'];
	$qry="SELECT * FROM  public.login  WHERE  username='$username'  AND  password='$password' ";
	$run=pg_query($con,$qry);
	$row=pg_num_rows($run);
	if($row<1)
	{
		?>
		<script>
		alert('Username or Password not match !!');
		window.open('loginform2.php','_self');
		</script>
		<?php
	}
	else
	{
		$data=pg_fetch_assoc($run);
		$id=$data['id'];
		session_start();
		$_SESSION['uid']=$id;
		header('location:admindash.php');
	}
}

?>
