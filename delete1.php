<?php

	include ('dbcon.php');
	$sid=$_REQUEST['sid'];
	$qry="DELETE FROM public.details where id='$sid'";
	$run=pg_query($con,$qry);
	
	
	if($run==true)
	{
		?>
		<script>
		alert('Record delete successfully!!');
		window.open('delete.php','_self');
		</script>
		<?php
	}
	else
	{
		echo $run;
	}
	
?>	
