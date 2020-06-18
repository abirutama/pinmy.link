<div id="logout-modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Are you sure want to sign out?</p>
    </header>
    <footer class="modal-card-foot">
      <a href="<?= base_url('auth/logout') ?>" class="button is-danger is-outlined">Sign out</a>
      <button class="button logout-cancel has-background-light is-outlined">Cancel</button>
    </footer>
  </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>
<script>
  //File Name
  function readURL(input, id) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    var id = '#'+id+'-img';
      
    reader.onload = function(e) {
      $(id).attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#avatar-input").change(function() {
  readURL(this,'avatar');
});
$("#cover-input").change(function() {
  readURL(this,'cover');
});

document.addEventListener('DOMContentLoaded', () => {

// Get all "navbar-burger" elements
const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

// Check if there are any navbar burgers
if ($navbarBurgers.length > 0) {

  // Add a click event on each of them
  $navbarBurgers.forEach( el => {
    el.addEventListener('click', () => {

      // Get the target from the "data-target" attribute
      const target = el.dataset.target;
      const $target = document.getElementById(target);

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      el.classList.toggle('is-active');
      $target.classList.toggle('is-active');

    });
  });
}

});




//Modal Logout
var html_tag = document.documentElement;
var logout_button = document.querySelector('#logout-button');
var logout_modal = document.querySelector('#logout-modal');
var logout_cancel = document.querySelector('.logout-cancel');

logout_button.onclick = function() {
  logout_modal.classList.toggle('is-active');
  html_tag.classList.toggle('is-clipped');
}

logout_cancel.onclick = function() {
  logout_modal.classList.toggle('is-active');
  html_tag.classList.toggle('is-clipped');
}
</script>

</body>
</html>