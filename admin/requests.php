<?php
session_start();
include("../lib/php/lib_include.php");
include("check_admin_session.php");
?>
<!DOCTYPE html>
<html>
<title>درخواست ها</title>
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
        <h5><b><i class="fa fa-dashboard"></i>درخواست ها</b></h5>
    </header>
    <div class="w3-white w3-padding-large w3-margin w3-round-medium w3-right" style="width: 80%;">
        <?php
        $fm = new makeform();
        $fm->set_tbl_key("requests", "id", 1);
        $fm->label("شماره تماس کاربر", "w3-text-green")
            ->input()
            ->inptype("text")
            ->inpname("mob")
            ->inpid("mob")
            ->inpclasses("w3-input w3-border")
            ->end()
            ->sndform("mob", 0, 1, "شماره تماس کاربر", 1, 1);
        $fm->label("نوع درخواست", "w3-text-green")
            ->select()
            ->selectname("req_type")
            ->selectid("req_type")
            ->selectclasses("w3-select w3-border")
            ->selectaddval("0", "لیست بیمه")
            ->selectaddval("1", "مالیات")
            ->end()
            ->sndform("req_type", 2, 1, "نوع درخواست", 1, 1);
        //->selectaddval("2", "سابقه کار")
        $fm->label("وضعیت درخواست", "w3-text-green")
            ->select()
            ->selectname("vaz")
            ->selectid("vaz")
            ->selectclasses("w3-select w3-border")
            ->selectaddval("0", "خوانده نشده")
            ->selectaddval("1", "در حال بررسی")
            ->selectaddval("2", "انجام شده")
            ->end()
            ->sndform("vaz", 2, 1, "وضعیت درخواست", 1, 1);
        $fm->label("هزینه درخواست", "w3-text-green")
            ->input()
            ->inptype("number")
            ->inpname("req_price")
            ->inpid("req_price")
            ->inpclasses("w3-input w3-border")
            ->end()
            ->sndform("req_price", 1, 1, "هزینه درخواست", 1);
        $fm->label("متن درخواست", "w3-text-green")
            ->texarea()
            ->areaid("txt")
            ->areaname("txt")
            ->areaclasses("w3-input w3-border")
            ->end()
            ->sndform("txt", 0, 1, "متن درخواست");
        $fm->fileinput("فایل گزارش", "file", "w3-input w3-border", "w3-text-green", 0);
        $fm->submitbtn("ثبت");
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