<?php
/**
 * Created by PhpStorm.
 * User: ormazd
 * Date: 10/8/2020
 * Time: 4:20 AM
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
$user = $ml->set_name("mob")
    ->set_title("شماره تلفن همراه")
    ->set_important(true)
    ->post_str();
$id = $ml->set_name("id")
    ->set_title("id")
    ->set_important(true)
    ->post_int();
$sql = "delete from `myfish` where `id`=$id and `user`='$user'";
$db = new database();
$db->connect()->query($sql);
if ($db->res) {
    $ml->json_msg("عملیات با موفقیت انجام شد");
    die();
} else {
    $ml->json_msg("اشکال در انجام عملیات");
    die();
}
?>