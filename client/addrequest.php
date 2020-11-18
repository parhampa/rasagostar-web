<?php
/**
 * Created by PhpStorm.
 * User: ormazd
 * Date: 10/9/2020
 * Time: 4:54 PM
 */
header('Access-Control-Allow-Origin: *');
header("Pragma-directive: no-cache");
header("Cache-directive: no-cache");
header("Cache-control: no-cache");
header("Pragma: no-cache");
header("Expires: 0");
include("../lib/php/lib_include.php");
$ml = new mobile_input();
$ml->check_token("atn", "mob", "token");
$mob = $ml->set_name("mob")
    ->set_title("شماره تماس")
    ->set_important(true)
    ->post_str();
$req_type = $ml->set_name("req_type")
    ->set_title("نوع درخواست")
    ->set_important(true)
    ->post_int();
$txt = $ml->set_name("txt")
    ->set_title("متن درخواست")
    ->set_important(true)
    ->post_str();
$vaz = 0;

$sql = "insert into `requests` (`mob`,`req_type`,`txt`,`vaz`) VALUES ('$mob',$req_type,'$txt',$vaz)";
$db = new database();
$db->connect()->query($sql);
if ($db->res) {
    $ml->json_msg("درخواست شما با موفقيت ثبت شد");
} else {
    $ml->json_msg("اشکال در انجام عمليات");
}
?>