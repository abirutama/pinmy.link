<!DOCTYPE html>
<html>
  <head>
    <title>The Best Way to Create Sitemap Across Your Content And Social Media | Pin My Link | Pinmy.link</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="How to make an easy sitemap across your content and social media. Easy to register, find out now!">
    <meta name="robots" content="follow, index">

    <link rel=”canonical” href=”https://pinmy.link/” />
    <link rel=”canonical” href=”https://www.pinmy.link/” />
    <link rel=”canonical” href=”http://pinmy.link/” />
    <link rel=”canonical” href=”http://www.pinmy.link/” />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <!--<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>-->
  </head>
  <body>
  <nav class="navbar is-white" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item has-text-weight-bold" href="#">
        Pinmylink
        <!---<img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">-->
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
        <!--
        <a class="navbar-item">
            Blog
        </a>
        -->
        <a class="navbar-item">
            Features
        </a>
        <a class="navbar-item">
            Help
        </a>
        <a class="navbar-item">
            Support Us
        </a>
        </div>
        </div>

        <div class="navbar-end">
        <div class="navbar-item">
            <div class="buttons">
            <a href="<?= base_url('auth/register'); ?>" class="button is-link">
                <strong>Sign up</strong>
            </a>
            <a href="<?= base_url('auth'); ?>" class="button is-link is-outlined">
                Log in
            </a>
            </div>
        </div>
        </div>
    </div>
    </nav>
    <section class="hero is-light is-medium">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1">
                The Only Link You Needed 
                </h1>
                <h2 class="subtitle">
                It's like a map, one link to go to anywhere!
                </h2>
                <a href="#" class="button is-large">Free Register Here</a>
            </div>
        </div>
    </section>
    <section class="section container">
        <div class="columns is-centered is-variable is-8">
            <div class="column">
                <h4 class="title is-4">Create Your Page</h4>
                <p>Create your own page by registering a free account and choose your username as your page address.</p><br>
                <img class="image" src="<?= base_url('assets/img/frontpage/new/')?>undraw_portfolio_essv.svg" width="220px" alt="">
            </div>
            <div class="column">
                <h4 class="title is-4">Update Your Content</h4>
                <p>Update your page by adding content to it. Write a title, put an article link, and the thumbnail image from related content.</p><br>
                <img class="image" src="<?= base_url('assets/img/frontpage/new/')?>undraw_design_objectives_fy1r.svg" width="220px" alt="">
            </div>
            <div class="column">
                <h4 class="title is-4">Beautify With Themes</h4>
                <p>Choose your favorite theme from ton of prebuilt themes. You don't like it? try the other themes</p><br>
                <img class="image" src="<?= base_url('assets/img/frontpage/new/')?>undraw_work_in_progress_uhmv.svg" width="300px" alt="">
            </div>
            <div class="column">
                <h4 class="title is-4">Embed Your Link</h4>
                <p>If you are ready, embed the only your magic link to all your social account's bio.</p><br>
                <img class="image" src="<?= base_url('assets/img/frontpage/new/')?>undraw_social_expert_07r8.svg" width="300px" alt="">
            </div>
            
        </div>
    </section>
    <footer class="footer">
        <div class="content has-text-centered">
            <p>
            Copyright &copy;2020 <strong>Pin My Link</strong>. Powered by <strong>Bulma</strong> and <strong>Undraw.co</strong>. The website content
            is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
            </p>
        </div>
    </footer>
  </body>
</html>

<script>
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
</script>