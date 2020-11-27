<?php
/**
 * Created by PhpStorm.
 * User: ormazd
 * Date: 10/11/2020
 * Time: 4:39 PM
 */
header('Access-Control-Allow-Origin: *');
header("Pragma-directive: no-cache");
header("Cache-directive: no-cache");
header("Cache-control: no-cache");
header("Pragma: no-cache");
header("Expires: 0");
include("../lib/php/lib_include.php");
$ml = new mobile_input();
$mobile = $ml->set_name("mob")
    ->set_title("شماره تماس")
    ->set_important(true)
    ->get_str();
$id = $ml->set_name("id")
    ->set_title("id")
    ->set_important(true)
    ->get_int();
$sql = "select * from `myfish` where `user`='$mobile' and `id`=$id";
$db = new database();
$db->connect()->query($sql);
$fild = mysqli_fetch_assoc($db->res);
?>
<html>
<head></head>
<body style="direction: rtl;">
<br><br>
<img src="../<?php echo($fild['file']); ?>" style="width: 100%;">
<div style="text-align: right; width: 100%;">
    <div style="width: 50%; margin-right: 50%;">
        <h2 style="font-family: Tahoma; font-weight: bold;">جهت پرداخت فیش بیمه
            <br>
            شماره شناسه برگ پرداخت
            <br>
            مبلغ پرداختی
            <br>
            یاد داشت کنید
            <br>
            وارد مرحله پرداخت شوید</h2>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>
