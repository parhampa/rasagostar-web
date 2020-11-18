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
$mobile = $ml->set_name("mob")
    ->set_title("شماره تماس")
    ->set_important(true)
    ->post_str();
$price = $ml->set_name("price")
    ->set_title("مبلغ")
    ->set_important(true)
    ->post_str();
$txt = $ml->set_name("txt")
    ->set_title("توضيحات")
    ->set_important(true)
    ->post_str();
$peygiri = $ml->set_name("peygiri")
    ->set_title("کد پيگيري")
    ->set_important(true)
    ->post_str();
$sql = "insert into `sharj` (`mobile`,`price`,`txt`,`peygiri`,`vaz`) VALUES ('$mobile',$price,'$txt','$peygiri',0)";
$db = new database();
$db->connect()->query($sql);
if ($db->res) {
    $ml->json_msg("عمليات با موفقيت انجام شد");
} else {
    $ml->json_msg("اشکال در انجام عمليات");
}
?>