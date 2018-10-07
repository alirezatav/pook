<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>
<p id="demo"></p>


<script>
var arr_CUS1=<?php get()?>;

var customer_ID= arr_CUS1.id;

var customer_NAME= arr_CUS1.name;

var customer_START_DATE= arr_CUS1.start_date;

var customer_TOKEN= arr_CUS1.token;
var customer_crtd= arr_CUS1.created;





</script>
<body>
    <div class="invoice-box" id="TDiv">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                   <table>
                        <tr>
                            <td class="title">
                                <img src="https://perang.co/wp-content/uploads/2018/01/logo-default.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
							<div id="qrdiv"></div><script>document.getElementById("qrdiv").innerHTML = '<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2F'+
							customer_TOKEN
							+'%2F&choe=UTF-8" title="کد وقت" />';	</script>
                                شماره #: 123<br>
                                تاریخ : January 1, 2015<br>
                           <h4 id="myHeader11"> </h4><script>document.getElementById("myHeader11").innerHTML =  "زمان صدور :"+customer_crtd; </script>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                               <h2> کلینیک تخصصی پرنگ </h3>
							   <br>
                               
                            </td>
                            
                            <td>
                               <h2>  قبض رادیولوژی </h2>
							   <br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                
                </td>
                
                <td>
                     اطلاعات پذیرش
                </td>
            </tr>
            
            <tr class="details">
                <td>
                  <h3 id="myHeader3"></h3><script>document.getElementById("myHeader3").innerHTML = customer_ID;	</script>
                </td>
                
                <td>
                  <h3 >  کد وقت</h3 >
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    
                </td>
                
                <td>
                    اطلاعات وقت
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    <h3 id="myHeader"></h3><script>document.getElementById("myHeader").innerHTML = customer_NAME;	</script>
                
                <td >
                 <h3 >نام : </h3>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                   <h3 id="myHeader2"></h3><script>document.getElementById("myHeader2").innerHTML = customer_START_DATE;	</script>
                </td>
                
                <td>
                     <h3 >ساعت شروع</h3>
                </td>
            </tr>
            
            <tr class="item last">
                <td>
               ......
                </td>
                
                <td>
                   <h3 id="serviceName">سرویس </h3>
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                
            </tr>
        </table>
    </div>
<button onclick="window.print()"> چاپ </button> 
</body>


</html>
<?php
function get(){
	
	if (isset($_POST['del'])) {
	$p_id = $_POST['del'];
	
}

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webone";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 $conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."</br>");
} 


$sql = "
select  a.id as id, c.name,c.wp_user_id,c.email,c.phone,a.start_date ,a.end_date,s.status as sid,ca.token ,ca.created
from wp_ab_customers c 
inner join wp_ab_customer_appointments ca 
    on c.id = ca.customer_id
right outer join wp_ab_appointments a
    on ca.appointment_id =a.id
left outer join appstatus s 
    on s.app_id=a.id
		WHERE a.id='$p_id'
	
	

	";

	
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
          $date2 = new DateTime($row["start_date"]);
   $row["crtdtime"] = MtoJ(new DateTime($row["created"]))."  ".my_getTime(new DateTime($row["created"]))  ;
    $row["date"] = MtoJ($date2) . " " ;
    $row["start_time"] = my_getTime($date2);
		 $data[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();

$rop1=$data[0];

//echo print_r($rop1, true);
echo
		' {id:"'.$rop1["id"].'",
		   name:"'.$rop1["name"].'",
		   start_date:"'.$rop1["date"].'" ,
                   created:"'.$rop1["crtdtime"].'" ,
		   token:"'.$rop1["token"].'"}'
 ;
}
function my_gregorian_to_jalali($gy, $gm, $gd, $mod = '') {
    $g_d_m = array(0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334);
    if ($gy > 1600) {
        $jy = 979;
        $gy-=1600;
    } else {
        $jy = 0;
        $gy-=621;
    }
    $gy2 = ($gm > 2) ? ($gy + 1) : $gy;
    $days = (365 * $gy) + ((int) (($gy2 + 3) / 4)) - ((int) (($gy2 + 99) / 100)) + ((int) (($gy2 + 399) / 400)) - 80 + $gd + $g_d_m[$gm - 1];
    $jy+=33 * ((int) ($days / 12053));
    $days%=12053;
    $jy+=4 * ((int) ($days / 1461));
    $days%=1461;
    if ($days > 365) {
        $jy+=(int) (($days - 1) / 365);
        $days = ($days - 1) % 365;
    }
    $jm = ($days < 186) ? 1 + (int) ($days / 31) : 7 + (int) (($days - 186) / 30);
    $jd = 1 + (($days < 186) ? ($days % 31) : (($days - 186) % 30));
    return($mod == '') ? array($jy, $jm, $jd) : $jy . $mod . $jm . $mod . $jd;
}

function my_jalali_to_gregorian($jy, $jm, $jd, $mod = '') {
    if ($jy > 979) {
        $gy = 1600;
        $jy-=979;
    } else {
        $gy = 621;
    }
    $days = (365 * $jy) + (((int) ($jy / 33)) * 8) + ((int) ((($jy % 33) + 3) / 4)) + 78 + $jd + (($jm < 7) ? ($jm - 1) * 31 : (($jm - 7) * 30) + 186);
    $gy+=400 * ((int) ($days / 146097));
    $days%=146097;
    if ($days > 36524) {
        $gy+=100 * ((int) ( --$days / 36524));
        $days%=36524;
        if ($days >= 365)
            $days++;
    }
    $gy+=4 * ((int) ($days / 1461));
    $days%=1461;
    if ($days > 365) {
        $gy+=(int) (($days - 1) / 365);
        $days = ($days - 1) % 365;
    }
    $gd = $days + 1;
    foreach (array(0, 31, (($gy % 4 == 0 and $gy % 100 != 0) or ( $gy % 400 == 0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31) as $gm => $v) {
        if ($gd <= $v)
            break;
        $gd-=$v;
    }
    return($mod == '') ? array($gy, $gm, $gd) : $gy . $mod . $gm . $mod . $gd;
}

function MtoJ($date2) {

    $year = $date2->format('Y');
    $mont = $date2->format('m');
    $day = $date2->format('d');
    $j_date_string = my_gregorian_to_jalali($year, $mont, $day, '-');
    return $j_date_string;
}

//-----------------------------------
function my_getTime($date2) {
    return $rtime = $date2->format('H:i:s');
}


?>