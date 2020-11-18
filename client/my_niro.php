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
$mob = $ml->set_name("mob")
    ->set_title("شماره تلفن همراه")
    ->set_important(true)
    ->post_str();
$sql = "select * from `niro` where `usermob`='$mob' order by id DESC ";
$db = new database();
$db->connect()->query($sql);
if ($db->res) {
    ?>{"userniro":[<?php
    $countmsg = 0;
    while ($fild = mysqli_fetch_assoc($db->res)) {
        if ($countmsg > 0) {
            echo(",");
        }
        ?>{"title":"<?php echo($fild['title']); ?>","txt":"<?php echo($fild['txt']); ?>","address":"<?php echo($fild['address']); ?>","vaz":"<?php
        if ($fild['vaz'] == 0) {
            echo("در حال بررسی");
        } else {
            echo("انجام شده");
        }
        ?>","dastmozd":"<?php echo($fild['dastmozd']); ?>","mazaya":"<?php echo($fild['mazaya']); ?>"}<?php
        $countmsg++;
    }
    ?>]}<?php
}
?>