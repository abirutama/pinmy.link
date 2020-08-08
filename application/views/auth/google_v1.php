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
<div class="g-signin2" data-onsuccess="onSignIn"></div>
<a href="#" onclick="signOut();">Signout</a>
<script>
    function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    $.post( "<?= base_url('auth/sign_google') ?>",{email: profile.getEmail()}).done();
    $(location).attr('href',<?= base_url('auth') ?>);
    }

    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
        console.log('User signed out.');
        });
    }
</script>
</body>
</html>