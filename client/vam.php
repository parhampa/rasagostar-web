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
$ml->check_token("atn", "mob", "token");
$usermob = $ml->set_name("mob")
    ->set_title("شماره تماس")
    ->set_important(true)
    ->post_str();
$title = $ml->set_name("title")
    ->set_title("عنوان درخواست")
    ->set_important(true)
    ->post_str();
$ty = $ml->set_name("ty")
    ->set_title("نوع درخواست")
    ->set_important(true)
    ->post_int();
$txt = $ml->set_name("txt")
    ->set_title("توضيحات")
    ->set_important(true)
    ->post_str();
$vaz = 0;

$sql = "insert into `vam` (`usermob`,`title`,`ty`,`txt`,`vaz`) VALUES ('$usermob','$title',$ty,'$txt',$vaz)";
$db = new database();
$db->connect()->query($sql);
if ($db->res) {
    $ml->json_msg("عمليات با موفقيت انجام شد");
} else {
    $ml->json_msg("اشکال در انجام عمليات");
}
?>