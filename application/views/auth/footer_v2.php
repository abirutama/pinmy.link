<figure class="" style="text-align:center; margin-bottom:32px">
    <img width="60px" src="<?= base_url('assets/img/layout/') ?>footer.png" alt="">
</figure>
</body>
<script>
gapi.load('auth2',function(){
    gapi.auth2.init();
});
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  //alert(profile.getName());
  $(location).attr('href','https://pinmy.link/user');
}
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script>
</html>