<?php
session_start();
include("../lib/php/lib_include.php");
include("check_admin_session.php");
?>
<!DOCTYPE html>
<html>
<title>خرید و فروش وام</title>
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
        <h5><b><i class="fa fa-dashboard"></i>خرید و فروش وام</b></h5>
    </header>
    <div class="w3-white w3-padding-large w3-margin w3-round-medium w3-right" style="width: 80%;">
        <?php
        $fm = new makeform();
        $fm->set_tbl_key("vam", "id", 1);
        $fm->label("عنوان درخواست", "w3-text-green")
            ->input()
            ->inpname("title")
            ->inpid("title")
            ->inpclasses("w3-input w3-border")
            ->end()
            ->sndform("title", 0, 1, "عنوان درخواست", 1, 1);
        $fm->label("شماره تماس", "w3-text-green")
            ->input()
            ->inptype("number")
            ->inpname("usermob")
            ->inpid("usermob")
            ->inpclasses("w3-input w3-border")
            ->end()
            ->sndform("usermob", 0, 1, "شماره تماس", 1, 1);
        $fm->label("متن درخواست", "w3-text-green")
            ->texarea()
            ->areaclasses("w3-input w3-border")
            ->areaname("txt")
            ->areaid("txt")
            ->end()
            ->sndform("txt", 0, 1, "متن درخواست", 1);
        $fm->label("نوع درخواست")
            ->select()
            ->selectid("ty")
            ->selectname("ty")
            ->selectclasses("w3-select w3-border")
            ->selectaddval("0", "خرید وام")
            ->selectaddval("1", "فروش وام")
            ->end()
            ->sndform("ty", 2, 1, "نوع درخواست", 1, 1);

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