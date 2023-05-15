<?php
session_start();
include "connection.php";
include "header2.php";

if(!isset($_SESSION["username"]))
{
    ?>
<script type="text/javascript">
window.location = "login.php";
</script>
<?php
}


?>



<div class="card">
    <div class="card-header">
        <strong class="card-title">Tất cả đề thi</strong>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên đề thi</th>
                    <th scope="col">Thời gian</th>
                    <th scope="col">Làm bài</th>

                </tr>
            </thead>
            <tbody>

                <?php 
                            $count=0;
                            $res=mysqli_query($link,"select * from tb_exam order by id asc");
                        while($row=mysqli_fetch_array($res))
                        {
                            
        $category_name = $row['name'];
                            $count=$count+1;
                            ?>
                <tr>
                    <th scope="row"><?php echo $count; ?></th>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["time"]; ?></td>
                    <td onclick="set_exam_type_session('<?php echo $category_name; ?>')">Làm bài
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
<script type="text/javascript">
function set_exam_type_session(tb_exam) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            window.location = "do_exam.php";
        }
    };
    xmlhttp.open("GET", "./exam/set_exam_type_session.php?tb_exam=" + tb_exam, true);
    xmlhttp.send(null);
}
</script>