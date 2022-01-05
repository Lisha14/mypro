<?php
$con=mysqli_connect("localhost","root","");
if($con)
{
    echo"connection successful<br>";
}
else{
    die("connection unsuccessful<br>".mysqli_connection_error($con));
}
/*$sql="create database assign";
if(mysqli_query($con,$sql))
{
    echo"database created<br>";

}
else
{
    die("database are not created<br>".mysqli_error($con));
}*/
mysqli_select_db($con,"assign");
$sql="create table animal(Name VARCHAR(50) NOT NULL,Category VARCHAR(40) NOT NULL,Image VARCHAR(50),Description VARCHAR(100),Lifeexpectancy VARCHAR(40),Date_of_submission DATE )";
if(mysqli_query($con,$sql))
{
    echo"table created";
}
else
{
    die("table is not created<br>".mysqli_error($con));
}
?>