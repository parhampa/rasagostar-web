<?php
/**
 * Created by PhpStorm.
 * User: ormazd
 * Date: 10/10/2020
 * Time: 3:13 PM
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
$id = $ml->set_name("id")
    ->set_title("کد مطلب")
    ->set_important(true)
    ->post_int();
$sql = "select * from `posts` where `id`=$id order by id DESC ";
$db = new database();
$db->connect()->query($sql);
$fild = mysqli_fetch_assoc($db->res);
?>{"title":"<?php echo($fild['title']); ?>","txt":"<?php echo($fild['txt']); ?>","pic":"<?php
echo(str_replace("../", $web_url, $fild['pic'])); ?>","videolink":"<?php echo($fild['videolink']); ?>"}