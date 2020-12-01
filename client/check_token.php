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
$mob = $ml->set_name("mob")
    ->set_title("mob")
    ->set_important(true)
    ->post_str();
$token = $ml->set_name("token")
    ->set_title("token")
    ->set_important(true)
    ->post_str();
$sql = "select * from `atn` where `mob`='$mob' and `token`='$token' order by `id` limit 0,1";
$db = new database();
$db->connect()->query($sql);
if (mysqli_num_rows($db->res) == 1) {
    $ml->json_msg("1");
    die();
} else {
    $ml->json_msg("0");
    die();
}
?>