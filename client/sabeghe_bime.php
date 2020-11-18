<?php
/**
 * Created by PhpStorm.
 * User: ormazd
 * Date: 10/24/2020
 * Time: 1:28 AM
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
$usermob = $ml->set_name("mob")
    ->set_title("شماره تلفن همراه")
    ->set_important(true)
    ->post_str();
$name = $ml->set_name("name")
    ->set_title("نام")
    ->set_important(true)
    ->post_str();
$family = $ml->set_name("family")
    ->set_title("نام خانوادگی")
    ->set_important(true)
    ->post_str();
$sh_sh = $ml->set_name("sh_sh")
    ->set_title("شماره شناسنامه")
    ->set_important(true)
    ->post_str();
$sh_meli = $ml->set_name("sh_meli")
    ->set_title("کد ملی")
    ->set_important(true)
    ->post_str();
$sal_b = $ml->set_name("sal_b")
    ->set_title("سال تولد")
    ->set_important(true)
    ->post_int();
$mah_b = $ml->set_name("mah_b")
    ->set_title("ماه تولد")
    ->set_important(true)
    ->post_int();
$roz_b = $ml->set_name("roz_b")
    ->set_title("روز تولد")
    ->set_important(true)
    ->post_int();
$mob = $ml->set_name("mob2")
    ->set_title("شماره تلفن همراه")
    ->set_important(true)
    ->post_str();
$vaz = 0;
$sql = "insert into `sabeghe_bime` (`usermob`,`name`,`family`,`sh_sh`,`sal_b`,`mah_b`,`roz_b`,`sh_meli`,`mob`,`vaz`)
      VALUES ('$usermob','$name','$family','$sh_sh',$sal_b,$mah_b,$roz_b,'$sh_meli','$mob',$vaz)";
$db = new database();
$db->connect()->query($sql);
if ($db->res) {
    $ml->json_msg("عملیات با موفقیت انجام شد...");
    die();
} else {
    $ml->json_msg("اشکال در انجام عملیات!!!");
    die();
}
?>