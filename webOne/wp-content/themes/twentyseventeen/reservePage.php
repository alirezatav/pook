<?php /* Template Name: customer_reserve */ ?>



<?php
date_default_timezone_set('Asia/Tehran');
global $current_user;
get_currentuserinfo();
$myCusID = $current_user->ID;
$myCusEmail = $current_user->user_email;


// session_start();
// // Checking first page values for empty,If it finds any blank field then redirected to first page.
// if (isset($_POST['name'])){
// if (empty($_POST['name'])
// || empty($_POST['email'])
// || empty($_POST['contact'])
// || empty($_POST['password'])
// || empty($_POST['confirm'])){
// // Setting error message
// $_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
// header("location: page1_form.php"); // Redirecting to first page
// } else {
// // Sanitizing email field to remove unwanted characters.
// $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
// // After sanitization Validation is performed.
// if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
// // Validating Contact Field using regex.
// if (!preg_match("/^[0-9]{10}$/", $_POST['contact'])){
// $_SESSION['error'] = "10 digit contact number is required.";
// header("location: page1_form.php");
// } else {
// if (($_POST['password']) === ($_POST['confirm'])) {
// foreach ($_POST as $key => $value) {
// $_SESSION['post'][$key] = $value;


// $selected_val = $_POST['selectService'];


// }
// } else {
// $_SESSION['error'] = "Password does not match with Confirm Password.";
// header("location: page1_form.php"); //redirecting to first page
// }
// }
// } else {
// $_SESSION['error'] = "Invalid Email Address";
// header("location: page1_form.php");//redirecting to first page
// }
// }
// } else {
// if (empty($_SESSION['error_page2'])) {
// header("location: page1_form.php");//redirecting to first page
// }
// }
?>
<!DOCTYPE HTML>
<html>
<head>
    <script src="http://localhost/webOne/api/persian-date.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/jalali-moment/dist/jalali-moment.browser.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://localhost/webOne/wp-content/themes/twentyseventeen/popper.min.js"></script>
    <script src="http://localhost/webOne/wp-content/themes/twentyseventeen/mdb.min.js"></script>
    <link href="http://localhost/webOne/wp-content/themes/twentyseventeen/mdb.min.css" rel="stylesheet">
    <title>نوبت دهی آنلاین</title>
    <style>
        #myDiv1 {
            overflow: hidden;
            -moz-border-radius: 8px 8px 8px 8px;
            -webkit-border-radius: 10px 10px 10px 10px;
            border-radius: 8px 8px 8px 8px;
            box-shadow: 0px 4px 20px #CACACA;
            background: #E4E4E4;
        }

        #myDiv2 {
            overflow: hidden;
            -moz-border-radius: 8px 8px 8px 8px;
            -webkit-border-radius: 10px 10px 10px 10px;
            border-radius: 8px 8px 8px 8px;
            box-shadow: 0px 4px 20px #CACACA;
            background: #E4E4E4;
        }

        #myDiv3 {
            overflow: hidden;
            -moz-border-radius: 8px 8px 8px 8px;
            -webkit-border-radius: 10px 10px 10px 10px;
            border-radius: 8px 8px 8px 8px;
            box-shadow: 0px 4px 20px #CACACA;
            background: #E4E4E4;
        }

        #myDiv4 {
            overflow: hidden;
            -moz-border-radius: 8px 8px 8px 8px;
            -webkit-border-radius: 10px 10px 10px 10px;
            border-radius: 8px 8px 8px 8px;
            box-shadow: 0px 4px 20px #CACACA;
            background: #E4E4E4;
        }

        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: #f4511e;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 28px;
            padding: 20px;
            width: 200px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }


    </style>
</head>
<body>

<script>persianDate.toLocale('en');

</script>


<div class="main">

                <span id="error">
                    <?php
                    // To show error of page 2.
                    if (!empty($_SESSION['error_page2'])) {
                        echo $_SESSION['error_page2'];
                        unset($_SESSION['error_page2']);
                    }
                    ?>
                </span>


    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"> رزرو آنلاین</div>
            <div class="panel-body">

                <div id="loading-image" hidden="hidden">.........L O A D I N G ..... DONT CLICK !</div>

                <div id="myDiv1" class="form-group">
                    <label for="title" style="color: #555555;"> &nbsp; &nbsp;لطفا یک دسته بندی انتخاب کنید&nbsp;
                        &nbsp;</label>
                    <select name="state" class="mdb-select md-form">
                        <option value="0"> &nbsp;لطفا یک دسته انتخاب کنید&nbsp;</option>


                        <?php


                        define(DB_USER, "root");
                        define(DB_PASSWORD, "");
                        define(DB_DATABASE, "webone");
                        define(DB_HOST, "localhost");


                        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
                        mysqli_set_charset($mysqli, "utf8");


                        $sql = "SELECT id,name FROM wp_ab_categories";
                        $result = $mysqli->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                        }
                        ?>


                    </select>
                </div>


                <div id="myDiv2" class="form-group" style="display:none; color: 555555;">
                    <label for="title">&nbsp;لطفا یک سرویس انتخاب کنید&nbsp;</label>
                    <select id="selectService" name="city" class="form-control" disabled>
                        <option value="0">&nbsp;انتخاب کنید&nbsp;</option>
                    </select>
                </div>

                <div id="myDiv3" class="form-group" style="display:none; color: 555555;">
                    <label for="title">لطفا یک پزشک انتخاب کنید</label>
                    <select id="selectDoctor" name="doctor" class="form-control" disabled>
                        <option value="0">انتخاب کنید</option>
                    </select>
                </div>


                <div id="myDiv4" class="form-group" style="display:none; color: 555555;">
                    <label for="title">&nbsp;چه روزی در هفته باشه ؟&nbsp;</label>
                    <select id="selectDayIndex" name="dayIndex" class="form-control" disabled>
                        <option value="0">&nbsp;انتخاب کنید&nbsp;</option>
                    </select>
                </div>


                <div id="showDate" style="display:none;"></div>

                <div id="showTime" style="display:none;">

                </div>
                <div id="OUT" disabled>

                </div>


            </div>


        </div>
    </div>
</div>


<script>
    //var tt2='<?php $_SESSION['myKey'] = "Some data I need later"; ?>';

    //alert(tt2.toString());
    //  alert(wpMYSTR_TO_DATE('<?php echo date("Y/m/d"); ?>'));
    var MAIN_SERVICE_ID;
    var SELECTED_DATE;
    var MAIN_SERVICE_DUR;
    var MAIN_DOCTOR_SCHL;
    var MAIN_S_DAY_START_TIME;
    var MAIN_S_DAY_END_TIME;
    var MAIN_SERVICE_DET;
    var MAIN_S_TIME;
    var MAIN_STF_ID;
    var MAIN_SELECTED_DATE;
    var MAIN_SELECTED_TIME;
    var APPREOVED_APPS;
    var APPREOVED_APPS_arr = new Array();
    var APPREOVED_APPS_arr_dur = new Array();
    var RESS;
    var MYCDT = " ";
    var TESST;
    var last_app_time;
    testLOG = '';

    var last_app_index;
    $("select[name='state']").change(function () {
        var stateID = $(this).val();
        if (stateID) {


            $('html, body').animate({scrollTop: 550}, 1500);

            $("#myDiv2").css("color", "#555555").slideDown(300);


            $.ajax({
                url: "http://localhost/webOne/api/ajaxpro.php",
                dataType: 'Json',
                data: {'id': stateID},
                success: function (data) {
                    $('select[name="city"]').empty();
                    $('select[name="city"]').append('<option value="0"> انتخاب کنید</option>');
                    $.each(data, function (key, value, dur) {
                        $('select[name="city"]').append('<option value="' + key + '">' + value + '</option>');
                    });

                }
            });
            $('select[name="doctor"]').empty();
            $('select[name="dayIndex"]').empty();
            $('select[name="dayIndex"]').val("empty");

            //location.href = "#selectService";
            // $("#selectService").css("color", "#555555") .slideDown(1500);
            document.getElementById("selectService").disabled = false;


            document.getElementById("selectDoctor").disabled = true;

            document.getElementById("selectDayIndex").disabled = true;


            document.getElementById("showTime").disabled = true;
            $("#showTime").css("color", "#555555").slideUp(1000);

            document.getElementById("showDate").disabled = true;
            $("#showDate").css("color", "#555555").slideUp(1000);

        } else {
            // $('select[name="city"]').empty();
            $('select[name="city"]').val(0);
            document.getElementById("selectService").disabled = true;
        }
    });
    $("select[name='city']").change(function () {
        var Sid = $(this).val();

        $('html, body').animate({scrollTop: 590}, 1500);
        $("#myDiv3").css("color", "#555555").slideDown(300);

        MAIN_SERVICE_ID = Sid;
        if (Sid) {


            $.ajax({
                url: "http://localhost/webOne/api/ajaxpro2.php",
                dataType: 'Json',
                data: {'id': Sid},
                success: function (data) {
                    $('select[name="doctor"]').empty();
                    $('select[name="doctor"]').append('<option value="0"> انتخاب کنید</option>');
                    $.each(data, function (key, value) {
                        $('select[name="doctor"]').append('<option value="' + key + '">' + value + '</option>');
                    });

                }
            });
            $.ajax({
                url: "http://localhost/webOne/api/ajaxpro5.php",
                dataType: 'Json',
                data: {'id': Sid},
                success: function (data) {
                    MAIN_SERVICE_DET = data;
                }
            });
            $('select[name="dayIndex"]').empty();
            document.getElementById("selectDoctor").disabled = false;


            document.getElementById("selectDayIndex").disabled = true;
            document.getElementById("showTime").disabled = true;

            document.getElementById("showDate").disabled = true;

            $("#showTime").css("color", "#555555").slideUp(1000);

            $("#showDate").css("color", "#555555").slideUp(1000);

        } else {
            //$('select[name="doctor"]').empty();
            document.getElementById("selectDoctor").disabled = true;
        }


    });
    $("select[name='doctor']").change(function () {
        var STFid = $(this).val();
        MAIN_STF_ID = STFid;


        $('html, body').animate({scrollTop: 630}, 1500);
        //-------------------------

        $.ajax({
            url: "http://localhost/webOne/api/ajaxprocheck.php",
            type: 'POST',
            dataType: "JSON",
            data: {

                service_id: MAIN_SERVICE_ID,
                staff_id: MAIN_STF_ID


            },
            success: function (sdata) {
                var cc = 0;

                while (sdata.length) {


                    //APPREOVED_APPS_arr.push(sdata[cc].start_date);
                    APPREOVED_APPS_arr[cc] = sdata[cc].start_date;
                    APPREOVED_APPS_arr_dur[cc] = sdata[cc].duration;

                    cc++;
                }


            },
            error: function (a, b, c) {
                $("#showTime").hide();
                alert("دوباره تلاش کنید ");
                return;
            }
        });
        //---------------------------------------------------------


        if (STFid) {


            $.ajax({
                url: "http://localhost/webOne/api/ajaxpro3.php",
                dataType: 'Json',
                data: {'id': STFid},
                success: function (data) {
                    $('select[name="dayIndex"]').empty();
                    $('select[name="dayIndex"]').append('<option value="0"> انتخاب کنید</option>');
                    var DISHOW = " روز ؟";
                    $.each(data, function (MYdayIndex, WOTK_TIME) {

                        switch (MYdayIndex) {
                            case "6":
                                DISHOW = "پنج شنبه";
                                break;
                            case "7":
                                DISHOW = "حمعه";
                                break;
                            case "1":
                                DISHOW = "شنبه";
                                break;
                            case "2":
                                DISHOW = "یکشنبه";
                                break;
                            case "3":
                                DISHOW = "دوشنبه";
                                break;
                            case "4":
                                DISHOW = "سه شنبه";
                                break;
                            case "5":
                                DISHOW = "چهارشنبه";
                        }
                        $('select[name="dayIndex"]').append('<option value="' + MYdayIndex + '">' + DISHOW + '</option>');
                    });
                    $("#myDiv4").css("color", "#555555").slideDown(300);
                }
            });
            $.ajax({
                url: "http://localhost/webOne/api/ajaxpro4.php",
                dataType: 'Json',
                data: {'id': STFid},
                success: function (data) {

                    MAIN_DOCTOR_SCHL = data;
                }
            });

            document.getElementById("selectDayIndex").disabled = false;
            document.getElementById("showTime").disabled = true;

            document.getElementById("showDate").disabled = true;

            $("#showTime").css("color", "#555555").slideUp(1000);
            $("#showDate").css("color", "#555555").slideUp(1000);
        } else {
            $('select[name="dayIndex"]').empty();
        }
    });
    $("select[name='dayIndex']").change(function () {
        $('html, body').animate({scrollTop: 645}, 1500);

        var DI = $(this).val(); //----
        document.getElementById("showDate").innerHTML = " ";
        document.getElementById("showTime").innerHTML = "</br> ";
        MAIN_S_DAY_START_TIME = MAIN_DOCTOR_SCHL[DI - 1].start_time;
        MAIN_S_DAY_END_TIME = MAIN_DOCTOR_SCHL[DI - 1].end_time;

        if (DI) {


            var DATE_COUNTER = new persianDate();


            for (var i = 0; i < 60; i++) { // B U T T O N I N G ...... D A T E .........==================================
                if (DATE_COUNTER.days() == DI) { //check day index


                    var btn = document.createElement("BUTTON");

                    //var myShowP = new persianDate(DATE_COUNTER);
                    //myShowP.formatPersian = true;
                    //  var t = document.createTextNode(DATE_COUNTER.format('YYYY - MMM - DD'));
                    var t = document.createTextNode(new persianDate(DATE_COUNTER).toLocale('fa').format('D  MMMM  YY'));
                    SELECTED_DATE = DATE_COUNTER.format('YYYY-MM-DD');
                    btn.appendChild(t);
                    btn.setAttribute("id", SELECTED_DATE);
                    btn.setAttribute("class", "btn btn-info");
                    btn.setAttribute("style", "width: 350px ; margin-top: 6px ; margin-bottom: 6px ; margin-right: 4px ; margin-left: 8px");


                    btn.onclick = function () { ////..... T I M E .........**** generate time button
                        document.getElementById("showTime").innerHTML = " ";
                        $('html, body').animate({scrollTop: 900}, 1500);

                        $("#showTime").hide();
                        document.getElementById(SELECTED_DATE).disabled = true;

                        $("body").css({"cursor": "wait"});

                        MAIN_SELECTED_DATE = $(this).attr('id');

                        var start_loop_TIME = MYSTR_TO_TIME(MAIN_S_DAY_START_TIME);
                        var end_loop_TIME = MYSTR_TO_TIME(MAIN_S_DAY_END_TIME);


                        while (start_loop_TIME <= end_loop_TIME) {


                            var loop2 = new Date(start_loop_TIME);
                            var start_loop_TIME2 = start_loop_TIME;

                            var inboxFlag = false;
                            loop2.setSeconds(parseInt(MAIN_SERVICE_DET[0].duration))
                            var endwhile = new Date(loop2);


                            console.log(start_loop_TIME + " =-=-=-* " + end_loop_TIME)
                            console.log(start_loop_TIME2 + " *-*-* " + endwhile)

                            while (start_loop_TIME2 < endwhile) //n ta service
                            {
                                var mycurrentHours = start_loop_TIME2.getHours();
                                mycurrentHours = ("0" + mycurrentHours).slice(-2);

                                var mycurrentMinutes = start_loop_TIME2.getMinutes();
                                mycurrentMinutes = ("0" + mycurrentMinutes).slice(-2);

                                MYCDT = MAIN_SELECTED_DATE + " " + mycurrentHours + ":" + mycurrentMinutes + ":" + "00";
                                var aprvdAppId = APPREOVED_APPS_arr.indexOf(MYCDT);

                                if (aprvdAppId != -1) {

                                    var date1 = new Date(start_loop_TIME);
                                    var date2 = new Date(start_loop_TIME2);
                                    var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                                    var diffSec = Math.ceil(timeDiff / (1000 * 3600));

                                    last_app_time = diffSec;
                                    last_app_index = aprvdAppId;
                                    inboxFlag = true;
                                }

                                start_loop_TIME2.setSeconds(300);
                            }

                            var tbtn = document.createElement("BUTTON");
                            start_loop_TIME.setSeconds(-1 * parseInt(MAIN_SERVICE_DET[0].duration))
                            var mycurrentHours = start_loop_TIME.getHours();
                            mycurrentHours = ("0" + mycurrentHours).slice(-2);
                            var mycurrentMinutes = start_loop_TIME.getMinutes();
                            mycurrentMinutes = ("0" + mycurrentMinutes).slice(-2);
                            MYCDT = MAIN_SELECTED_DATE + " " + mycurrentHours + ":" + mycurrentMinutes + ":" + "00";
                            var t2 = document.createTextNode(mycurrentHours + ":" + mycurrentMinutes);

                            if (inboxFlag === false) {

                                // tbtn.setAttribute("class", "btn btn-default");
                                //tbtn.setAttribute('disabled', true);

                                tbtn.appendChild(t2);
                                tbtn.setAttribute("id", MYCDT);
                                tbtn.setAttribute("class", "btn btn-success");
                                tbtn.setAttribute("style", "width: 150px ; margin-top: 10px ; margin-bottom: 10px ; margin-right: 10px ; margin-left: 10px");

                                tbtn.onclick = function () { ////// ON ENDING .................................................
                                    $("body").css({"cursor": "wait"});
                                    MAIN_SELECTED_TIME = $(this).attr('id');

                                    var myEnd0 = MYSTR_TO_TIME(MAIN_SELECTED_TIME);
                                    myEnd0.setSeconds(MAIN_SERVICE_DET[0].duration);


                                    if (confirm(" آیا وقت مورد نظر ثبت شود ؟") == true) {


                                        $.ajax({
                                            type: 'POST',
                                            url: "http://localhost/webOne/api/submitapp.php",
                                            data: {
                                                wp_user_id: <?php echo $myCusID ?> ,
                                                service_id: MAIN_SERVICE_ID,
                                                staff_id: MAIN_STF_ID,
                                                start_date: MAIN_SELECTED_TIME,
                                                //end_date: MAIN_SELECTED_DATE + " " + myEnd0.getHours() + ":" + myEnd0.getMinutes() + ":00"
                                                end_date: "2000-10-10 10:10:00"
                                            },
                                            success: function (data) { //SUCCSESSSSSSSSSS...............................
                                                document.getElementById(MAIN_SELECTED_TIME).disabled = true;
                                                APPREOVED_APPS_arr.push(MAIN_SELECTED_TIME);

                                                <?php  $mailto = $myCusEmail;
                                                $mailsubject = 'نوبت دهی';
                                                $mailbody = 'نوبت شما با موفقیت ثبت شد .' . "</br> زمان رزرو شده" . MYCDT;
                                                $mailheaders = array('Content-Type: text/html; charset=UTF-8');
                                                $mailheaders[] = 'From: Alirezatav.TK <alirezatav@alirezatav.tk>';
                                                wp_mail($mailto, $mailsubject, $mailbody, $mailheaders); ?>
                                                //
                                                alert("SUCSESS . . .YOUR WP ID IS : " + <?php echo $myCusID ?> )
                                                location.reload();
                                            },
                                            error: function (xhr, desc, err) {
                                                alert("err SUBMIT...");
                                            }
                                        });
                                        $("body").css({"cursor": "default"});
                                    }
                                    else {
                                        RESS = "You pressed Cancel!";
                                    }


                                }

                                start_loop_TIME.setSeconds(parseInt(MAIN_SERVICE_DET[0].duration));/// COUNTER THAT SHOULD CHANGE TO dur .....
                                // start_loop_TIME.setSeconds(300);/// CHANGEd TO 5 MIN ! .....
                                document.getElementById("showTime").append("  ");
                                document.getElementById("showTime").appendChild(tbtn);
                                document.getElementById("showTime").append("  ");


                            }
                            else {
                                console.log("start_loop_TIME",start_loop_TIME)
                                console.log("APPREOVED_APPS_arr_dur[last_app_index])",APPREOVED_APPS_arr_dur[last_app_index]);
                                                         console.log("last_app_time",last_app_time)
                                start_loop_TIME.setSeconds(parseInt(APPREOVED_APPS_arr_dur[last_app_index]) + parseInt(last_app_time))

                            }


                        }

                        document.getElementById(SELECTED_DATE).disabled = false;

                        document.getElementById("showDate").disabled = false;
                        $("body").css({"cursor": "default"});
                        document.getElementById("showTime").disabled = false;
                        $("#showTime").css("color", "#555555").slideDown(300);

                    }

                    document.getElementById("showDate").append(" ");
                    document.getElementById("showDate").append(btn);
                    document.getElementById("showDate").append(" ");


                }

                DATE_COUNTER = DATE_COUNTER.add('days', 1);
            }
            $("#showDate").css("color", "#555555").slideDown(300);


            document.getElementById("selectDate").disabled = false;
            alert("full");
        } else {
            alert("ss3");
            document.getElementById("selectDate").disabled = true;
        }
    });


    function MYSTR_TO_DATE(Sdate) {

        const [year, month, day] = Sdate.split("-");
        return new Date(year, month - 1, day);
    }

    function wpMYSTR_TO_DATE(Sdate) {

        const [year, month, day] = Sdate.split("/");
        return new Date(year, month - 1, day);
    }

    function MYSTR_TO_TIME(Stime) {

        const [HH, MM, SS] = Stime.split(":");
        return new Date(2010, 10, 10, HH, MM, 0);
    }


</script>


<input class="btn btn-default" type="reset" value="Reset"/>
<input class="btn btn-default" type="submit" value="Next"/>

</div>

</body>
</html>