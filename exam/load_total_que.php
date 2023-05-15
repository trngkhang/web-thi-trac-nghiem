<?php 
session_start();
include "../connection.php";
$total_que=0;
$res1=mysqli_query($link,"select * from tb_question where category='$_SESSION[tb_exam]'");
$total_que=mysqli_num_rows($res1);
echo $total_que;
?>