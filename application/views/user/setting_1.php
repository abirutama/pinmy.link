<?php
if(stristr($_SERVER['DOCUMENT_ROOT'], 'xampp')===false){
    $if_local='';
}else{
    $if_local='/pinmy.link';
}

$PNG_TEMP_DIR = $_SERVER['DOCUMENT_ROOT'].$if_local.'/assets/qr/temp/';
$user_url = 'https://pinmy.link/@'.$user['user_name'];
//html PNG location prefix
$PNG_WEB_DIR = $_SERVER['DOCUMENT_ROOT'].$if_local.'/assets/qr/temp/';

include ($_SERVER['DOCUMENT_ROOT'].$if_local."/assets/qr/qrlib.php");

//ofcourse we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);

$filename = $PNG_TEMP_DIR.$user['user_name'].'.png';
$errorCorrectionLevel = 'H';
$matrixPointSize = 10;
    //default data
    //echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
QRcode::png($user_url, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
    


?>
<?php
    $user_id = $this->session->userdata('ses_id');
?>
<section class="section" style="max-width: 600px; margin:auto">
    <?= $this->session->flashdata('message'); ?>
    <div class="container box has-background-white">
    <div class="tabs is-centered">
  <ul>
    <li class="is-active"><a href="<?= base_url('user/setting/profile'); ?>">Profile</a></li>
    <li><a href="<?= base_url('user/setting/website'); ?>">Websites</a></li>
    <li><a href="<?= base_url('user/setting/appearance'); ?>">Theme</a></li>
    <li><a href="<?= base_url('user/setting/seo'); ?>">SEO</a></li>
  </ul>
</div>
        <div class="container">
            <img class="box" width="256px" src="<?= base_url('assets').'/qr/temp/'.basename($filename); ?>" alt=""style="margin:auto;">
            <br>
            <div class="notification is-info">
                <p class="is-size-6"><b>Note:</b> This is your QR Page Address. Audience will be redirected to your content page after scan it. <a href="<?= base_url('assets').'/qr/temp/'.basename($filename); ?>" target="_blank">Download here</a></p>
            </div>
        </div>
    </div>
</section>