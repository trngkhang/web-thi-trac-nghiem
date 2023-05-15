<?php
session_start();
include "header2.php";
include "connection.php";

if(!isset($_SESSION["username"]))
{
    ?>
<script type="text/javascript">
window.location = "login.php";
</script>
<?php
}


?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tạo đề thi</h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form name="forml" action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Đề thi</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">Thêm đề
                                                mới</label><input type="text" name="examname" placeholder="Nhập chủ đề"
                                                class="form-control"></div>

                                        <div class="form-group"><label for="vat" class=" form-control-label">Thời
                                                gian làm bài</label><input type="text" placeholder="Nhập thời gian"
                                                class="form-control" name="examtime"></div>

                                        <div class="form-group">
                                            <input type="submit" name="submitl" value="Thêm chủ đề"
                                                class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Đề thi bạn đã thêm</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Chủ đề</th>
                                                    <th scope="col">Thời gian</th>
                                                    <th scope="col">Chỉnh sửa</th>
                                                    <th scope="col">Xoá câu hỏi</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php 
                                                $count=0;
                                                $tmp2=$_SESSION["username"];
                                            $res=mysqli_query($link,"select * from tb_exam where userMake='$tmp2'");
                                            while($row=mysqli_fetch_array($res))
                                            {
                                                $count=$count+1;
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $count; ?></th>
                                                    <td><?php echo $row["name"]; ?></td>
                                                    <td><?php echo $row["time"]; ?></td>

                                                    <td><a href="add_question.php?id=<?php echo $row["id"]; ?>"> Chỉnh
                                                            sửa
                                                        </a>
                                                    </td>
                                                    <td><a
                                                            href="./admin/delete_exam.php?id=<?php echo $row["id"]; ?>">Xoá</a>
                                                    </td>

                                                </tr>
                                                <?php
                                            }
                                            ?>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!--/.col-->


        </div>
    </div><!-- .animated -->
</div><!-- .content -->



<?php 
if(isset($_POST["submitl"])){

    
    $tm=md5 (time());
    $tmp=$_SESSION["username"];
    echo($tmp);

    mysqli_query($link,"insert into tb_exam value(NULL, '$_POST[examname]','$_POST[examtime]','$tmp')") or die(mysqli_error($link));

    ?>
<script type="text/javascript">
alert("Thêm chủ đề thành công");
window.location.href = window.location.href;
</script>
<?php

}

?>