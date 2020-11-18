<?php
/**
 * Created by PhpStorm.
 * User: ormazd
 * Date: 10/9/2020
 * Time: 5:33 PM
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
$sql = "select * from `requests` where `mob`='$mob' order by `id` DESC ";
$db = new database();
$db->connect()->query($sql);
?>{"list":[<?php
$count = 0;
while ($fild = mysqli_fetch_assoc($db->res)) {
    if ($count > 0) {
        echo(",");
    }
    ?>{"req_type":"<?php
    if ($fild['req_type'] == 0) {
        echo("لیست بیمه");
    }
    if ($fild['req_type'] == 1) {
        echo("مالیات");
    }
    if ($fild['req_type'] == 2) {
        echo("سابقه کار");
    }
    ?>","vaz":"<?php
    if ($fild['vaz'] == 0) {
        echo("خوانده نشده");
    }
    if ($fild['vaz'] == 1) {
        echo("در حال بررسی");
    }
    if ($fild['vaz'] == 2) {
        echo("انجام شده");
    }
    $file = str_replace("../", $web_url . "/", $fild['file']);
    ?>","txt":"<?php echo($fild['txt']); ?>","req_price":"<?php echo($fild['req_price']); ?>","file":"<?php echo($file); ?>"}<?php
    $count++;
}
?>]}