<?php
session_start();
if(isset($_SESSION['uid']))
{
}
else
{
	header('location:/loginform2.php');

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
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
          <a class="navbar-brand" href="#">Add Contacts                                       </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <div class="dropdown">
                  <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                   options
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="admindash.php">Back</a>
                    <a class="dropdown-item" href="index.php">Logout</a>
                   
                  </div>
                </div> 
          </div>  
        </nav>
        <br>
  
    <form method="POST">
	 
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="n" placeholder="Enter name" name="n">
      </div>
      <div class="form-group">
        <label for="nickname">Nickname</label>
        <input type="text" class="form-control" id="nn" placeholder="Enter nickname" name="nn">
      </div>
      <div class="form-group">
        <label for="mobile">Mobile_Number</label>
        <input type="text" class="form-control" id="mno" placeholder="Enter Mobile_Number" name="mno">
      </div>
      <div class="form-group">
        <label for="phone">Phone_Number</label>
        <input type="text" class="form-control" id="pno" placeholder="Enter Phone_Number" name="pno">
      </div>
      <div class="form-group">
        <label for="work">Work</label>
        <input type="text" class="form-control" id="w" placeholder="Enter work" name="w">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="e" placeholder="Enter email" name="e">
      </div>
      <div class="form-group">
        <label for="add">Address</label>
        <input type="text" class="form-control" id="a" placeholder="Enter Address" name="a">
      </div>
       <div class="form-group">
        <label for="relat">Relationship</label>
        <input type="text" class="form-control" id="r" placeholder="Enter Relationship" name="r">
      </div>
       <div class="form-group">
        <label for="gen">Gender</label>
        <input type="text" class="form-control" id="gn" placeholder="Enter Gender" name="gn">
      </div>
       <div class="form-group">
        <label for="ev">Event</label>
        <input type="text" class="form-control" id="ev" placeholder="Enter Event" name="ev">
      </div>      
       <div class="form-group">
        <label for="event">Eventdate</label>
        <input type="number" class="form-control" id="y" placeholder="Enter Eventdate" name="y">
      </div>
    <div class="form-group">
        <label for="gr">Groups</label>
        <input type="text" class="form-control" id="g" placeholder="Enter Groups" name="g">
      </div>	
	 <div class="form-group">
        <label for="ph">Photo</label>
       <input type="file" class="form-control" id="myfile" name="myfile" value="browse">
      </div>
     <br> 
	
	<input type="submit" name="submit1" value="submit">
      <button type="submit" class="btn btn-primary">reset</button>
    </form>
  </div>
  
</body>
</html>
<?php
include('dbcon.php');

if(isset($_POST['submit1']))
{


	
	$Name=$_POST['n'];
	$Nickname=$_POST['nn'];
	$Mobile_Number=$_POST['mno'];
	$Phone_Number=$_POST['pno'];
	$Work=$_POST['w'];
	$Email=$_POST['e'];
	$Address=$_POST['a'];
	$Relationship=$_POST['r'];
	$Gender=$_POST['gn'];
	$Event=$_POST['ev'];
	$Event_Date=$_POST['y'];
	$Groups=$_POST['g'];
	$Photo=$_FILES['myfile'] ['name'];
	$Photoo=$_FILES['myfile'] ['tmp_name'];
	$sid=$_SESSION['uid'];
		

	move_uploaded_file($Photoo,"dataimg/$Photo");


	$qry="INSERT INTO public.details(cname,nickname,mobileno,phoneno,work,email,address, relationship, 
            gender, event,eventdate, groups, photo,sid)VALUES ('$Name','$Nickname','$Mobile_Number','$Phone_Number','$Work','$Email','$Address','$Relationship','$Gender','$Event','$Event_Date','$Groups','$Photo','$sid')";
	



	$run=pg_query($con,$qry);
	echo pg_last_error($run);
	
	
	if($run==true)
	{

		?>
		<script>
		alert('Record inserted successfully!!');
		
		</script>
		<?php
	}
	else
	{

		echo $run;
	}
	
}

?>
