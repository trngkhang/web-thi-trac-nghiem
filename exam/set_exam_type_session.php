<?php
session_start();
include "../connection.php";
$tb_exam=$_GET["tb_exam"];
$_SESSION["tb_exam"]=$tb_exam;

$res=mysqli_query($link,"select * from tb_exam where category='$tb_exam'");
while($row=mysqli_fetch_array($res))
{
    $_SESSION["exam_time"]=$row["exam_time_in_minutes"];
}
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"]="yes";
?>