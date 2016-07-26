<?php 
$a=$_GET["rating"];
$b=$_GET["id"];
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'valencebond';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("mydb") or die(mysql_error());
$result = mysql_query("SELECT * FROM teacherscs WHERE id='$b'")
or die(mysql_error());
$numrows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$c=$row["no"];
$d=$row["rating"];
if($c==NULL)
{
$c=0;
}
else 
{$c++;
$a=($d+$a)/2;
}
$sql = "UPDATE teacherscs SET rating='$a', no='$c' WHERE id='$b'";
mysql_select_db('mydb');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
else
header('Location: cse.html');










?>

