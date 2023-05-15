<?php

include "header.php";
include "../connection.php";



?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Đề thi</h1>
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
                                    <div class="card-header">
                                        <strong class="card-title">Tất cả đề thi</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Chủ đề</th>
                                                    <th scope="col">Thời gian</th>
                                                    <th scope="col">Xoá câu hỏi</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php 
                                                $count=0;
                                            $res=mysqli_query($link,"select * from tb_exam");
                                            while($row=mysqli_fetch_array($res))
                                            {
                                                $count=$count+1;
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $count; ?></th>
                                                    <td><?php echo $row["name"]; ?></td>
                                                    <td><?php echo $row["time"]; ?></td>
                                                    <td><a href="delete_exam.php?id=<?php echo $row["id"]; ?>">Xoá</a>
                                                    </td>

                                                </tr>
                                                <?php
                                            }
                                            ?>



                                            </tbody>
                                        </table>
                                        <strong class="card-title">Tổng số đề thi: <?php echo $count?></strong>
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

    //logo
    $fnm1=$_FILES["logoi"]["name"];
    $dst1="./logoimg/".$tm.$fnm1;
    $dst_db = "logoimg/".$tm.$fnm1;
    move_uploaded_file($_FILES["logoi"]["tmp_name"],$dst1);

    mysqli_query($link,"insert into exam_category value(NULL, '$_POST[examname]','$_POST[examtime]','$dst_db')") or die(mysqli_error($link));

    ?>
<script type="text/javascript">
alert("Thêm chủ đề thành công");
window.location.href = window.location.href;
</script>
<?php

}

?>