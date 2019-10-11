<?php

$attribute_name = $_POST['atnm'];
$data_type = $_POST['dType'];
$Primary_key = $_POST['PK'];
$Auto_Increment = $_POST['AI'];
$Database_name = $_POST['dbnm'];
$Table_name = $_POST['tbnm'];
$NumberOfColumns = $_POST['colnum'];

for ($i=0; $i < $NumberOfColumns; $i++) 
{ 
	$attribute_name[$i].=" ";
	$attribute_name[$i].=$data_type[$i];
	if($Primary_key[$i]=="1")
	{
		$attribute_name[$i].=" PRIMARY KEY";
	}
	if($Auto_Increment[$i]=="1")
	{
		$attribute_name[$i].=" AUTO_INCREMENT";
	}
}

$que = implode(",", $attribute_name);

$con = mysqli_connect('localhost','root','',$Database_name);

if(mysqli_connect_error())
{
	echo "Failed connection"."<br>";
}
else
{
	echo "Connection established"."<br>";
}

$sql = "create table ".$Table_name."(".$que.")";

$result = mysqli_query($con,$sql);

if($result)
{
	echo "data entered"."<br>";
}
else
{
	echo "data not entered"."<br>";
}


?>