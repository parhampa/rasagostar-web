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
    ->set_important(false)
    ->post_str();
if ($mobile == "") {
    die();
}
$kod_meli = $ml->set_name("sh_meli")
    ->set_title("کد ملی")
    ->set_important(false)
    ->post_str();
if ($kod_meli == "") {
    die();
}
$sql = "select distinct(`sh_meli`) from `sabeghe_bime` where `usermob`='$mobile' and `sh_meli` like '$kod_meli%'";
$db = new database();
$db->connect()->query($sql);
?>
<table class="w3-table-all"><?php
    while ($fild = mysqli_fetch_assoc($db->res)) {
        ?>
        <tr>
        <td>
            <span onclick="document.getElementById('sh_meli').value='<?php echo($fild['sh_meli']); ?>'"><?php echo($fild['sh_meli']); ?></span>
        </td></tr><?php
    }
    ?></table>