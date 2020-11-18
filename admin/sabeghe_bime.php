<?php
session_start();
include("../lib/php/lib_include.php");
include("check_admin_session.php");
?>
<!DOCTYPE html>
<html>
<title>سابقه بیمه</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html, body, h1, h2, h3, h4, h5 {
        font-family: Tahoma;
    }

    body {
        font-size: 12px;
    }
</style>
<body class="w3-light-grey" style="direction: rtl;">

<!-- Top container -->
<?php
include("top.php");
?>
<!-- Sidebar/menu -->
<?php
include("nav.php");
?>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
     title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-right:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-dashboard"></i>سابقه بیمه</b></h5>
    </header>
    <div class="w3-white w3-padding-large w3-margin w3-round-medium w3-right" style="width: 80%;">
        <?php
        $fm = new makeform();
        $fm->set_tbl_key("sabeghe_bime", "id", 1);
        $fm->label("کاربر", "w3-text-green")
            ->input()
            ->inptype("number")
            ->inpname("usermob")
            ->inpid("usermob")
            ->inpclasses("w3-input w3-border")
            ->end()
            ->sndform("usermob", 0, 1, "کاربر", 0, 1);
        $fm->label("نام", "w3-text-green")
            ->input()
            ->inptype("text")
            ->inpname("name")
            ->inpid("name")
            ->inpclasses("w3-input w3-border")
            ->end()
            ->sndform("name", 0, 1, "نام", 1, 1);
        $fm->label("نام خانوادگی", "w3-text-green")
            ->input()
            ->inptype("text")
            ->inpname("family")
            ->inpid("family")
            ->inpclasses("w3-input w3-border")
            ->end()
            ->sndform("family", 0, 1, "نام خانوادگی", 1, 1);
        $fm->label("شماره شناسنامه", "w3-text-green")
            ->input()
            ->inptype("text")
            ->inpname("sh_sh")
            ->inpid("sh_sh")
            ->inpclasses("w3-input w3-border")
            ->end()
            ->sndform("sh_sh", 0, 1, "شماره شناسنامه", 0, 1);
        $fm->label("شماره ملی", "w3-text-green")
            ->input()
            ->inptype("text")
            ->inpname("sh_meli")
            ->inpid("sh_meli")
            ->inpclasses("w3-input w3-border")
            ->end()
            ->sndform("sh_meli", 0, 1, "شماره ملی", 0, 1);
        $fm->label("شماره موبایل", "w3-text-green")
            ->input()
            ->inptype("number")
            ->inpname("mob")
            ->inpid("mob")
            ->inpclasses("w3-input w3-border")
            ->end()
            ->sndform("mob", 1, 1, "شماره موبایل", 1, 1);
        $fm->label("سال تولد", "w3-text-green")
            ->input()
            ->inptype("number")
            ->inpname("sal_b")
            ->inpid("sal_b")
            ->inpclasses("w3-input w3-border")
            ->end()
            ->sndform("sal_b", 1, 1, "سال تولد");
        $fm->label("ماه تولد", "w3-text-green")
            ->select()
            ->selectname("mah_b")
            ->selectid("mah_b")
            ->selectclasses("w3-input w3-border");
        for ($i = 1; $i < 13; $i++) {
            $fm->selectaddval($i, $i);
        }
        $fm->end()
            ->sndform("mah_b", 2, 1, "ماه تولد");
        $fm->label("روز تولد", "w3-text-green")
            ->select()
            ->selectname("roz_b")
            ->selectid("roz_b")
            ->selectclasses("w3-input w3-border");
        for ($i = 1; $i < 32; $i++) {
            $fm->selectaddval($i, $i);
        }
        $fm->end()
            ->sndform("roz_b", 2, 1, "روز");
        $fm->fileinput("فایل گزارش", "file", "w3-input w3-border", "w3-text-green", 0);
        $fm->label("وضعیت")
            ->select()
            ->selectid("vaz")
            ->selectname("vaz")
            ->selectclasses("w3-select w3-border")
            ->selectaddval("0", "تایید نشده")
            ->selectaddval("1", "تایید شده")
            ->end()
            ->sndform("vaz", 2, 1, "وضعیت", 1, 1);
        $fm->input()
            ->inptype("submit")
            ->inpval("ثبت")
            ->inpclasses("w3-btn w3-green w3-round w3-margin")
            ->end();
        $fm->addform()
            ->show();
        ?>
    </div>
    <!-- End page content -->
</div>
<?php
include("footer.php");
?>
</body>
</html>