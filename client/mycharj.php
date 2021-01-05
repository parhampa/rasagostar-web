<?php
/**
 * Created by PhpStorm.
 * User: ormazd
 * Date: 10/11/2020
 * Time: 5:07 PM
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
$sql = "select * from `sharj` where `mobile`='$mobile' order by id DESC ";
$db = new database();
$db->connect()->query($sql);
?>{"sharj":[<?php
$count = 0;
while ($fild = mysqli_fetch_assoc($db->res)) {
    if ($count > 0) {
        echo(",");
    }
    ?>{"price":"<?php echo($fild['price']); ?>","txt":"<?php echo(preg_replace('/\s\s+/', " ",preg_replace( "/<br>|\n/", " ",$fild['txt']))); ?>","peygiri":"<?php echo($fild['peygiri']); ?>","vaz":"<?php
    if ($fild['vaz'] == 0) {
        echo("در حال بررسي");
    }
    if ($fild['vaz'] == 1) {
        echo("تاييد شده");
    }
    if ($fild['vaz'] == 2) {
        echo("رد شده");
    }
    ?>"}<?php
    $count++;
}
?>]}