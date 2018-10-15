<?php
$con= mysqli_connect('localhost','root','rafi4203','testdb');



function row_count($result)
{
 
     return mysqli_num_rows($result);

}


function query($query)
{
	global $con;
	return mysqli_query($con,$query);

}


function confirm($result)
{
	global $con;
	if(!$result)
	{

		//die("QUERY FAILED!!!" , mysqli_error($con));
		echo "failed!!";
		die();
	}
	
}

function fetch_array($result)
{
	global $con;

	return mysqli_fetch_array($result);
}



?>