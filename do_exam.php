<?php

session_start();

include "./connection.php";
include "header2.php";

// để cho khi chưa đăng nhập mà vẫn bấm vào link được
if(!isset($_SESSION["username"]))
{
    ?>
<script type="text/javascript">
window.location = "login.php";
</script>
<?php
}

?>

<div class="tableOption">

    <!-- Start editing -->
    <br>
    <div class="timez" id="countdowntimer" style="display: block; float:left; margin-left:10px"></div>

    <br>
    <div class="timemin">
        <div style="float:right; font-weight: bold;">Số câu: &nbsp;</div>
        <div id="current_que" style="float:right; font-weight: bold;">0</div>
        <div style="float:right; font-weight: bold;"> &nbsp;/ &nbsp;</div>

        <div id="total_que" style="float:right; font-weight: bold;">0</div>

    </div>
    <div id="load_questions"></div>

    <div class="button-container">
        <input type="button" class="buttonnext" value="Câu trước" onclick="load_previous();">&nbsp;
        <input type="button" class="buttonprev" value="Câu tiếp theo" onclick="load_next();">
    </div>


    <!-- end editing -->
</div>



<script type="text/javascript">
function load_total_que() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("total_que").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "./exam/load_total_que.php", true);
    xmlhttp.send(null);

}


var questionno = "1";
load_questions(questionno);

function load_questions(questionno) {

    document.getElementById("current_que").innerHTML = questionno;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (xmlhttp.responseText == "over") {
                window.location = "result.php";
            } else {
                document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                load_total_que();
            }

        }
    };
    xmlhttp.open("GET", "./exam/load_questions.php? questionno=" + questionno, true);
    xmlhttp.send(null);
}

function radioclick(radiovalue, questionno) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        }
    };
    xmlhttp.open("GET", "./exam/save_answer_in_session.php?questionno=" + questionno + "&value1=" + radiovalue, true);
    xmlhttp.send(null);

}

function load_previous() {
    if (questionno == "1") {
        load_questions(questionno);
    } else {
        questionno = eval(questionno) - 1;
        load_questions(questionno);
    }
}

function load_next() {

    questionno = eval(questionno) + 1;
    load_questions(questionno);

}
</script>