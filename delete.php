
<?php
session_start();
if(isset($_SESSION['uid']))
{
}
else
{
	header('location:loginform2.php');

}
?>
<!DOCTYPE html>
<html>
<head>
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
  
      <a class="navbar-brand" href="#">Delete Contacts</a>
   
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
  
        <span class="navbar-toggler-icon"></span>
 
       </button>
      
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
      
    </div>
          
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  
              <form class="form-inline" method=POST >

                  <input class="form-control mr-sm-2" type="text" placeholder="Search">
      
           <font color="blue"> <input type=submit name="submit2" value="Search"></font>
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
     
           </form>
      
        </nav> 
   
      
      </nav>
    
  <br>


<?php

	if(isset($_POST['submit2']))
	{
		?>

                
  
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
		
			<th>srno</th>
			<th></th>
           		<th>Name</th>
			<th>Nickname</th>
			<th>Mobile_Number</th>
			<th>Phone_Number</th>
			<th>Work</th>
			<th>Email</th>
			<th>Address</th>
			<th>Relationship</th>
			<th>Gender</th>
			<th>Event</th>
			<th>Event_Date</th>
			<th>Group</th>
			<th>Photo</th>	
			
			<th>   </th>
        </tr>
      </thead>

<?php
	include('dbcon.php');
	$uid=$_SESSION['uid'];
	$sql="SELECT * FROM public.details where sid='$uid'";

	$run=pg_query($con,$sql);

	if(pg_num_rows($run)<1)		
	{
		echo"<tr><td colspan='5'> no records found</td></tr>";
	
	}
	
	else		
	{

		$count=0;	
		while($data=pg_fetch_assoc($run))
		{
			$count++;
				
?>
				
<tr>
					


  				
  
    	
      <tbody>
        <tr>
							
							<td><?php echo $count ;?></td>
								<td><a href="delete1.php?sid=<?php echo  $data['id']; ?>">delete</td>
							 <td><?php echo $data['cname']; ?></td>
							<td><?php echo $data['nickname']; ?></td>
							<td><?php echo $data['mobileno']; ?></td>
   						    <td><?php echo $data['phoneno']; ?></td>
       						<td><?php echo $data['work']; ?></td>
     						<td><?php echo $data['email']; ?></td>
							<td><?php echo $data['address']; ?></td>
       						<td><?php echo $data['relationship']; ?></td>
							<td><?php echo $data['gender']; ?></td>
     						<td><?php echo $data['event']; ?></td>
       						 <td><?php echo $data['eventdate']; ?></td>
							<td><?php echo $data['groups']; ?></td>
			<td><font color="white"><img src="dataimg/<?php echo $data['photo']; ?>" style="max-width:50px;" /></font></td>
							
								

        
        			</tr>
     
  </div>
</div>
<?php
	}
			
		}
	}
	?>
<tbody>
</table>
</body>
</html>

