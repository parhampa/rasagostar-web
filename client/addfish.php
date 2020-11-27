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
$url = $ml->set_name("url")
    ->set_title("تصویر")
    ->set_important(true)
    ->post_str();
$kod_meli = "";
$kod_meli = $ml->set_name("id")
    ->set_title("کد ملی")
    ->set_important(false)
    ->post_str();
$db = new database();
if ($kod_meli != "") {
    $tarikh = date("Y-m-d");
    $filename = md5($mobile . $kod_meli . $tarikh . ".jpg");
    $fileaddr = "uploads/" . $filename . ".jpg";
    //die($url);
    $url = "http://www.0004320.ir/rasa/get-fish.php?id=" . $kod_meli . "&ver=" . rand(0, 999999999);
    copy($url, "../" . $fileaddr);
    $sql = "insert into `myfish` (`user`,`file`,`tarikh`,`kod_meli`) VALUES ('$mobile','$fileaddr','$tarikh','$kod_meli')";
    $db->connect()->query($sql);
}
$sql = "select * from `myfish` where `user`='$mobile' order by id desc";
$db->connect()->query($sql);
?>{"req":[<?php
$count = 0;
while ($fild = mysqli_fetch_assoc($db->res)) {
    if ($count > 0) {
        echo(",");
    }
    $dt = new date_man();
    //$tarikhtxt = $dt->roz_pish($fild['tarikh'], $tarikh);
    list($gy, $gm, $gd) = explode('-', $fild['tarikh']);
    $tarikhtxt = gregorian_to_jalali($gy, $gm, $gd, '/');
    ?>{"id":"<?php echo($fild['id']); ?>","tarikh":"<?php echo($tarikhtxt); ?>","file":"<?php echo("http://mob.0004320.ir/" . $fild['file']); ?>"}<?php

    $count++;
}
?>]}