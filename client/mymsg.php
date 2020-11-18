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
$sql = "select * from `msgtbl` where `mob`='$mob' order by id DESC ";
$db = new database();
$db->connect()->query($sql);
if ($db->res) {
    ?>{"usermsg":[<?php
    $countmsg = 0;
    while ($fild = mysqli_fetch_assoc($db->res)) {
        if ($countmsg > 0) {
            echo(",");
        }
        ?>{"txt":"<?php echo($fild['txt']); ?>","vaz":"<?php
        switch ($fild['vaz']) {
            case 0:
                echo("خوانده نشده");
                break;
            case 1:
                echo("در حال بررسی");
                break;
            case 2:
                echo("پاسخ داده شده");
                break;
        }
        ?>","ty":"<?php
        if ($fild['ty'] == 0) {
            echo("پیام ارسالی");
        } else {
            echo("پیام دریافتی");
        }
        ?>"}<?php
        $countmsg++;
    }
    ?>]}<?php
}
?>