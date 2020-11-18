<?php
/**
 * Created by PhpStorm.
 * User: ormazd
 * Date: 10/8/2020
 * Time: 8:22 PM
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
$sql = "select * from `dastmozd` order by `id` DESC limit 0,1";
$db = new database();
$db->connect()->query($sql);
if ($db->res) {
    $fild = mysqli_fetch_assoc($db->res);
    ?>{"file_plc":"<?php echo($web_url . str_replace("../", "", $fild['file_plc'])); ?>"}<?php
}
?>