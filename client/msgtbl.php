<?php
/**
 * Created by PhpStorm.
 * User: ormazd
 * Date: 10/7/2020
 * Time: 7:38 PM
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
    ->set_title("شماره تلفن همراه")
    ->set_important(true)
    ->post_str();
$txt = $ml->set_name("txt")
    ->set_title("متن درخواست")
    ->set_important(true)
    ->post_str();
$vaz = 0;
$ty = 0;
$sql = "insert into `msgtbl` (`mob`,`txt`,`vaz`,`ty`) VALUES ('$mob','$txt',$vaz,$ty)";
$db = new database();
$db->connect()->query($sql);
if ($db->res) {
    $ml->json_msg("عمليات با موفقيت انجام شد.");
} else {
    $ml->json_msg("اشکال در انجام عمليات");
}
?>