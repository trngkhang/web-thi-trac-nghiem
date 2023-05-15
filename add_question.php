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

$id=$_GET["id"];
$exam_category='';
$res = mysqli_query($link,"select * from tb_exam where id=$id");

while($row=mysqli_fetch_array($res))
{
    $exam_name=$row["name"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Thêm câu hỏi cho <?php echo "<font color='red'>" .$exam_name. "</font>"; ?></h1>
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
                        <form name="forml" action="" method="post" enctype="multipart/form-data">
                            <!-- Quest text -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <!-- <div class="card-header"><strong>Thêm câu hỏi loại văn bản</strong></div> -->
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">
                                                Câu hỏi
                                            </label><input type="text" name="question" placeholder="Thêm câu hỏi"
                                                class="form-control"></div>

                                        <!-- op1 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Lựa
                                                chọn 1
                                            </label><input type="text" name="opt1" placeholder="Thêm lựa chọn"
                                                class="form-control"></div>

                                        <!-- op2 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Lựa
                                                chọn 2
                                            </label><input type="text" name="opt2" placeholder="Thêm lựa chọn"
                                                class="form-control"></div>

                                        <!-- op3 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Lựa
                                                chọn 3
                                            </label><input type="text" name="opt3" placeholder="Thêm lựa chọn"
                                                class="form-control"></div>

                                        <!-- op4 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Lựa
                                                chọn 4
                                            </label><input type="text" name="opt4" placeholder="Thêm lựa chọn"
                                                class="form-control"></div>

                                        <!-- Answer -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Câu đáp
                                                án
                                            </label><input type="text" name="answer" placeholder="Thêm đáp án"
                                                class="form-control"></div>

                                        <!-- Add Quest -->
                                        <div class="form-group">
                                            <input type="submit" name="submitl" value="Thêm câu hỏi"
                                                class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                                <!-- </form> -->
                            </div>


                        </form>

                    </div>
                </div>

            </div>
            <!--/.col-->


        </div>


        <!-- Box Questions in bottom -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>
                                    STT
                                </th>
                                <th>
                                    Câu hỏi
                                </th>
                                <th>
                                    Lựa chọn 1
                                </th>
                                <th>
                                    Lựa chọn 2
                                </th>
                                <th>
                                    Lựa chọn 3
                                </th>
                                <th>
                                    Lựa chọn 4
                                </th>
                                <th>
                                    Đáp án
                                </th>
                                <th>Chỉnh sửa</th>
                                <th>Xoá câu hỏi</th>

                            </tr>


                            <?php
                     $res=mysqli_query($link,"select * from tb_question where idExam = '$id' order by question_no asc");
                    while($row=mysqli_fetch_array($res))
                    {
                        echo "<tr>";

                        echo "<td>";
                        echo $row["question_no"];
                        echo "</td>";

                        echo "<td>";
                        echo $row["question"];
                        echo "</td>";

                        // image 1
                        echo "<td>";
                        if(strpos($row["opt1"],'opt_images')!==false)
                            {
                            ?>
                            <img src="<?php echo $row["opt1"];?> " height="50" width="50">
                            <?php
                            }
                            else
                            {
                            echo $row["opt1"];
                            }
                        echo "</td>";

                           
                        // image 2
                        echo "<td>";
                        if(strpos($row["opt2"],'opt_images')!==false)
                            {
                            ?>
                            <img src="<?php echo $row["opt2"];?> " height="50" width="50">
                            <?php
                            }
                            else
                            {
                            echo $row["opt2"];
                            }
                            echo "</td>";



                        // image 3
                        echo "<td>";
                        if(strpos($row["opt3"],'opt_images')!==false)
                            {
                            ?>
                            <img src="<?php echo $row["opt3"];?> " height="50" width="50">
                            <?php
                            }
                            else
                            {
                            echo $row["opt3"];
                            }
                            echo "</td>";

                       // image 4
                        echo "<td>";
                        if(strpos($row["opt4"],'opt_images')!==false)
                            {
                            ?>
                            <img src="<?php echo $row["opt4"];?> " height="50" width="50">
                            <?php
                            }
                            else
                            {
                            echo $row["opt4"];
                            }
                            echo "</td>";
                            
                            //answers
                            echo "<td>";
                            if(strpos($row["answer"],'opt_images')!==false)
                                {
                                ?>
                            <img src="<?php echo $row["answer"];?> " height="50" width="50">
                            <?php
                                }
                                else
                                {
                                echo $row["answer"];
                                }
                                echo "</td>";
                                
                            //Edit text && image
                            echo "<td>";
                            if(strpos($row["opt4"],'opt_images')!==false)
                            {
                            ?>
                            <a href="edit_option_images.php?id=<?php echo $row["id"];?>&idl=<?php echo $id;?>">Chỉnh
                                sửa</a>
                            <?php
                            }
                            else
                            {
                                ?>
                            <a href="edit_option.php?id=<?php echo $row["id"];?>&idl=<?php echo $id;?>">Chỉnh sửa</a>
                            <?php
                            }
                            echo "</td>";

                            // Delete
                            echo "<td>";
                            ?>
                            <a href=" delete_question.php?id=<?php echo $row["id"];?>&idl=<?php echo $id; ?>">Xoá</a>
                            <?php
                            echo "</td>";

                            echo "</tr>";
                            }
                            ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->


<!-- PHP của submit text -->
<?php 
if(isset($_POST["submitl"])){
    $loop=0;

    $count=0;

    $res=mysqli_query($link,"select * from tb_question where idExam='$id' order by id asc") or die(mysqli_error($link));

    $count=mysqli_num_rows($res);

    if($count==0)
    {


    }
    else{

        while($row=mysqli_fetch_array($res))
        {
            $loop=$loop+1;
            mysqli_query($link,"update tb_question set question_no='$loop' where id=$row[id]");
        }
    }
    
    $loop=$loop+1;

    mysqli_query($link,"insert into tb_question values(NULL, '$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$id','$exam_name')")
    or die(mysqli_error($link));

    ?>
<script type="text/javascript">
alert("Thêm câu hỏi thành công");
window.location.href = window.location.href;
</script>
<?php
}
?>