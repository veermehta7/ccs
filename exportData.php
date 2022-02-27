<?php

session_start();
if(isset($_SESSION['uid']))
{
}
else
{
	header('location:/loginform2.php');

}

include 'dbcon.php';
$uid=$_SESSION['uid'];
$qry="SELECT * FROM public.details WHERE sid='$uid'";
$query =pg_query($con,$qry);
$row=pg_num_rows($query);
if($row> 0)
{
    $delimiter = ",";
    $filename = "members_" . date('Y-m-d') . ".csv";
    
    $f = fopen('php://memory', 'w');
    
    
    $fields = array('ID', 'Name', 'Email', 'Phoneno', 'address');
    fputcsv($f, $fields, $delimiter);
    
    
    while($data = pg_fetch_assoc($query))
{
      
        $lineData = array($data['id'], $data['cname'], $data['email'], $data['phoneno'], $data['address']);
        fputcsv($f, $lineData, $delimiter);
}
    
    
    fseek($f, 0);
    
    
    header('Content-Type: text/xls');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
   
    fpassthru($f);
}
exit;
?>
