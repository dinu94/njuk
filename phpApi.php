<?php
require('connection.php');
if(isset($_GET['location']))
{
    
$location = $_GET['location'];
$query=mysqli_query($con,"SELECT DISTINCT(region) AS region from jobs WHERE country=".$location)or die('1');
$result=array();
while($row=mysqli_fetch_array($query))
{
    array_push($result,$row['region']);
}
echo json_encode(array('region'=>$result));
}
if(isset($_GET['remove']))
{
    $query=mysqli_query($con,"SELECT COUNT(DISTINCT(region)) AS c from jobs")or die('1');
    while($row=mysqli_fetch_array($query))
    {
    $result = $row['c'];
    }
echo json_encode(array('count'=>$result));
    
}
?>
