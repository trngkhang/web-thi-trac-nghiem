<?php

include "header.php";
include "../connection.php";



?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tài khoản</h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <center>
                            <h1 style="margin-bottom: 10px;">Tất cả tài khoản</h1>
                        </center>
                        <?php
        $count=0;
        
$res=mysqli_query($link,"select * from tb_account order by id desc");
$count=mysqli_num_rows($res);

if($count==0)
{
    ?>
                        <center>
                            <h1>Không có tài khoản nào</h1>
                        </center>
                        <?php
}
else{
    echo "<table class='table table-bordered'>";
    echo "<tr style='background-color:#059862; color:white;'>";
    echo "<th style='text-align:center;'>"; echo "Họ tên"; echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Tên đăng nhập"; echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Email"; echo "</th>";
    echo "<th style='text-align:center;'>";echo "Admin(1: có)"; echo "</th>";
    echo "<th style='text-align:center;'>";echo "Xoá tài khoản"; echo "</th>";
    echo "<th style='text-align:center;'>";echo "Cấp quyền admin"; echo "</th>";


    echo "</tr>";

    while($row=mysqli_fetch_array($res))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row["name"]; echo "</td>";
        echo "<td style='text-align:center;'>"; echo $row["username"]; echo "</td>";
        echo "<td>"; echo $row["email"]; echo "</td>";
        echo "<td>"; echo $row["role"]; echo "</td>";
        // Delete
         echo "<td style='text-align:center;'>";
        ?>
                        <a href="delete_acc.php?id=<?php echo $row['id'];?>">Xoá</a>

                        <?php
        echo "</td>";
        // set admin
         echo "<td style='text-align:center;'>";
        ?>
                        <a href="set_admin.php?id=<?php echo $row['id'];?>">Cấp quyền</a>

                        <?php
        echo "</td>";
        
        echo "</tr>";
    }
    

    echo "</table>";

}

?>
                        <strong class="card-title">Tổng số tài khoản: <?php echo $count?></strong>
                    </div>
                </div>

            </div>
            <!--/.col-->


        </div>
    </div><!-- .animated -->
</div><!-- .content -->