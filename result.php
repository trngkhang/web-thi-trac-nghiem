<?php
session_start();
include "connection.php";
$date = date("H:i d/m/Y");
$_SESSION["end_time"] = date("H:i d/m/Y", strtotime($date . " + $_SESSION[exam_time] minutes"));
include "header.php";
?>

<div>
    <div class="tb">
        <?php
        $correct = 0;
        $wrong = 0;

        if (isset($_SESSION["answer"])) {
            for ($i = 1; $i <= sizeof($_SESSION["answer"]); $i++) {
                $answer = "";
                $res = mysqli_query($link, "select *from tb_question where category='$_SESSION[tb_exam]'
                && question_no=$i");
                while ($row = mysqli_fetch_array($res)) {
                    $answer = $row["answer"];
                }

                if (isset($_SESSION["answer"][$i])) {
                    if ($answer == $_SESSION["answer"][$i]) {
                        $correct = $correct + 1;
                    } else {
                        $wrong = $wrong + 1;
                    }
                } else {
                    $wrong = $wrong + 1;
                }
            }
        }

        $count = 0;
        $res = mysqli_query($link, "select *from tb_question where category='$_SESSION[tb_exam]'");
        $count = mysqli_num_rows($res);
        $wrong = $count - $correct;

        echo "<div class='tb'>";

        echo "<br>";
        echo "<br>";
        echo "<center>";

        echo "Số điểm của bạn: " . $correct . "/" . $count;
        echo "<br>";

        echo "</center>";

        ?>
    </div>

</div>

<?php
if (isset($_SESSION["exam_start"])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');//thời gian tại VN hiện tại

    $date = date("H:i d/m/Y"); //H: là giờ, i: là giây, d/m/y ngày/tháng/năm
    mysqli_query($link, "insert into tb_result(id,username,exam_type,total_question,correct_answer,wrong_answer,exam_time)
    values(NULL,'$_SESSION[username]','$_SESSION[tb_exam]','$count','$correct','$wrong','$date')");
}

if (isset($_SESSION["exam_start"])) {
    unset($_SESSION["exam_start"]);
?>
<script type="text/javascript">
window.location.href = window.location.href;
</script>
<?php
}

?>