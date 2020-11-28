<?php
/**
 * Created by PhpStorm.
 * User: ormazd
 * Date: 10/10/2020
 * Time: 11:06 PM
 */
header('Access-Control-Allow-Origin: *');
header("Pragma-directive: no-cache");
header("Cache-directive: no-cache");
header("Cache-control: no-cache");
header("Pragma: no-cache");
header("Expires: 0");
include("../lib/php/lib_include.php");
$ml = new mobile_input();
$mob = $ml->set_name("mob")
    ->set_title("شماره تماس")
    ->set_important(true)
    ->post_str();
$token = rand(100000, 999999);
$sql = "insert into `atn` (`mob`,`token`) VALUES ('$mob','$token')";
$db = new database();
$db->connect()->query($sql);
if ($db->res) {
    $url = "http://smspanel.Trez.ir/SendMessageWithUrl.ashx?Username=user&Password=pass&PhoneNumber=line&MessageBody=" . $token . "&RecNumber=" . $mob . "&Smsclass=1";
    copy($url, "tmp.tmp");
    $ml->json_msg("1");
} else {
    $ml->json_msg("0");;
}
?>
