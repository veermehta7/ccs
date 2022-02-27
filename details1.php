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
          <a class="navbar-brand" href="#">Edit Contacts                                       </a>
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
<?php


include('dbcon.php');

	$sid=$_GET['sid'];

	$qry="SELECT * FROM public.details where id='$sid'";

	
	$run=pg_query($con,$qry);
	
	$data=pg_fetch_assoc($run);	
?>

  
    <form method="POST">
	 
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="n" name="n" value="<?php echo $data['cname'] ;?>">
      </div>
      <div class="form-group">
        <label for="nickname">Nickname</label>
        <input type="text" class="form-control" id="nn" name="nn" value="<?php echo $data['nickname']; ?>">
      </div>
      <div class="form-group">
        <label for="mobile">Mobile_Number</label>
        <input type="text" class="form-control" id="mno" name="mno" value="<?php echo $data['mobileno']; ?>">
      </div>
      <div class="form-group">
        <label for="pwd">Phone_Number</label>
        <input type="text" class="form-control" id="pno" name="pno" value="<?php echo $data['phoneno']; ?>">
      </div>
      <div class="form-group">
        <label for="pwd">Work</label>
        <input type="text" class="form-control" id="w"  name="w" value="<?php echo $data['work']; ?>">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="e" name="e" value="<?php echo $data['email']; ?>">
      </div>
      <div class="form-group">
        <label for="email">Address</label>
        <input type="text" class="form-control" id="a"  name="a" value="<?php echo $data['address']; ?>">
      </div>
      <div class="form-group">
        <label for="email">Relationship</label>
        <input type="text" class="form-control" id="r" name="r" value="<?php echo $data['relationship']; ?>">
      </div>
      <div class="form-group">
        <label for="gen">Gender</label>
        <input type="text" class="form-control" id="gn" placeholder="Enter Gender" name="gn" value="<?php echo $data['gender']; ?>"> 
      </div>
       <div class="form-group">
        <label for="ev">Event</label>
        <input type="text" class="form-control" id="ev" placeholder="Enter Event" name="ev" value="<?php echo $data['event']; ?>">
      </div>      
       <div class="form-group">
        <label for="event">Eventdate</label>
        <input type="number" class="form-control" id="y" placeholder="Enter Eventdate" name="y" value="<?php echo $data['eventdate']; ?>" >
      </div>
    <div class="form-group">
        <label for="gr">Groups</label>
        <input type="text" class="form-control" id="g" placeholder="Enter Groups" name="g" value="<?php echo $data['groups']; ?>">
      </div>	
	 <div class="form-group">
        <label for="ph">Photo</label>
        <input type="file" class="form-control" id="myfile"  name="myfile" value="<?php echo $data['myfile']; ?>">
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
	$uid=$_SESSION['uid'];
		

	move_uploaded_file($Photoo,"dataimg/$Photo");


	$qry="UPDATE public.details SET cname='$Name',nickname='$Nickname',mobileno='$Mobile_Number',phoneno='$Phone_Number',work='$Work',email='$Email',address='$Address',relationship='$Relationship',gender='$Gender',event='$Event',eventdate='$Event_Date',groups='$Group',photo='$Photo' WHERE id='$sid'";	

	$run=pg_query($con,$qry);
	
	
	if($run==true)
	{

		?>
		<script>
		alert('Record updated successfully!!');
		window.open("update.php","_self");
		</script>
		<?php
	}
	else
	{

		echo $run;
	}
	
}

?>
