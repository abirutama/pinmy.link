<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="google-signin-client_id" content="63811034298-fa6j1c341e1tsr6noaigm8nj1p1n8alf.apps.googleusercontent.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>Test Google Login</title>
</head>
<body>
<div class="g-signin2" onclick="onSignIn();"></div>
<script>
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        var urlr = "<?= base_url('user') ?>";
        $.post( "<?= base_url('auth/sign_google') ?>",{email: profile.getEmail()}).done(function(data){
            $(location).attr('href', urlr);
            //alert(data);
        });
    }
</script>
</body>
</html>