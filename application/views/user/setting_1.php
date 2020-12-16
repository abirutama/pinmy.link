<?php
if(stristr($_SERVER['DOCUMENT_ROOT'], 'xampp')===false){
    $if_local='';
}else{
    $if_local='/pinmy.link';
}

$PNG_TEMP_DIR = $_SERVER['DOCUMENT_ROOT'].$if_local.'/assets/qr/temp/';
$user_url = 'https://pinmy.link/@'.$user['user_name'].'?utm_source=pinmylink&utm_medium=qrcode&utm_campaign=qr_profile_share';
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
                <li class="is-active"><a href="<?= base_url('user/setting/profile'); ?>">Address</a></li>
                <li><a href="<?= base_url('user/setting/website'); ?>">Website</a></li>
                <li><a href="<?= base_url('user/setting/appearance'); ?>">Profile</a></li>
                <li><a href="<?= base_url('user/setting/seo'); ?>">Meta Tag</a></li>
            </ul>
        </div>
        <div class="container">
            <img class="box" width="256px" src="<?= base_url('assets').'/qr/temp/'.basename($filename); ?>"
                style="margin:auto;">
            <div class="field has-addons" style="justify-content:center;margin-top:8px">
                <div class="control">
                    <input id="address" class="input is-fullwidth" type="text"
                        value="pinmy.link/@<?= scoup($user['user_name']); ?>" readonly>
                </div>
                <div class="control">
                    <a class="button is-success btncopy" data-clipboard-target="#address">
                        <i class="far fa-copy"></i>
                    </a>
                </div>
            </div>
            <div class="has-text-centered">
                <a href="<?= base_url('assets').'/qr/temp/'.basename($filename); ?>" target="_blank"
                    class="button is-success is-outlined">Download QR Code</a>
            </div>
            <br>
            <div class="notification is-warning">
                <p class="is-size-6"><b>Note:</b> Audience will be redirected to your page after scan the QR Code or
                    visit the link.</p>
            </div>
        </div>
    </div>
</section>
<script>
var clipboard = new ClipboardJS('.btncopy');

clipboard.on('success', function(e) {
    Toast.fire({
        icon: 'success',
        title: 'Copied Successfully!'
    });
});

clipboard.on('error', function(e) {
    console.log(e);
});
</script>