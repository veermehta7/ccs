<?php
$cons=("host=localhost dbname=ccs port=5432 user=postgres password=sakshee");
$con=pg_connect($cons);
if($con==false)
{
	echo "Database not connected";
}
else
{
	echo "db";
}
?>
