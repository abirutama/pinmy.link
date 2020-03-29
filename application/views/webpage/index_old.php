
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Pin My Link | pinmy.link</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/carousel/">

    <!-- Bootstrap core CSS -->
<link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
        .marketing h2{line-height: 1.4;}
    </style>
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/') ?>css/carousel.css" rel="stylesheet">
  </head>
  <body>
    <header>
  <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light p-3">
    <a class="navbar-brand font-weight-bold" href="#">Pinmylink</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Help</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Support Us</a>
        </li>
      </ul>
      <span class="form-inline mt-2 mt-md-0">
        <a href="<?= base_url('auth') ?>" class="btn btn-outline-primary my-2 my-sm-0">Login</a>
        <a href="<?= base_url('auth/register') ?>" class="btn btn-primary my-2 my-sm-0 ml-3">Sign Up Free</a>
      </span>
    </div>
  </nav>
</header>

<main role="main" style="margin-top:90px">
  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->
  
  <div class="container marketing">
    <!-- START THE FEATURETTES -->
    <div class="d-none d-sm-none d-lg-block" style="height:100px"></div>
    <div class="row featurette mb-3">
      <div class="col-md-7 order-md-2 mb-3">
        <h2 class="featurette-heading" style="margin-top: 38px"><span class="text-muted">The Only Multi Purpose</span> Needed Link</h2>
        <p class="lead">Connect everything with one link only.</p>
        <a href="<?= base_url('auth/register') ?>" class="btn btn-lg btn-success">Getting Started For Free</a>
      </div>
      <div class="col-md-5 order-md-1">
      <img src="<?= base_url('assets/img/frontpage/') ?>main.png" alt="Beautify Your Page With Prebuilt Themes" style="width:100%; max-width:400px">
      </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette mb-3">
      <div class="col-md-7">
        <h2 class="featurette-heading">Just One Link <span class="text-muted">For All Your Social Account</span></h2>
        <p class="lead">No need to bother changing various links on each of your social accounts. Be simple and easy!</p>
      </div>
      <div class="col-md-5">
        <img src="<?= base_url('assets/img/frontpage/') ?>socials.png" alt="Just One Link For All Your Social Account" style="width:100%; max-width:400px">
      </div>
    </div>

    <div class="row featurette mb-5">
      <div class="col-md-7 order-md-2 mb-3">
        <h2 class="featurette-heading">Beautify Your Page With <span class="text-muted">Prebuilt Themes</span></h2>
        <p class="lead">Lots of choices of prebuilt layouts, themes, and colors that are both beautiful and elegant, everything is there, you choose.</p>
      </div>
      <div class="col-md-5 order-md-1">
      <img src="<?= base_url('assets/img/frontpage/') ?>themes.png" alt="Beautify Your Page With Prebuilt Themes" style="width:100%; max-width:400px">
      </div>
    </div>
    
    <div class="row featurette mb-5">
      <div class="col-md-7 mb-3">
        <h2 class="featurette-heading">Wherever You Go, <span class="text-muted"> You Decide!</span></h2>
        <p class="lead">Put links on you page easily, quickly and without hassle. Add thumbnail images to make it more eye catching.</p>
      </div>
      <div class="col-md-5">
      <img src="<?= base_url('assets/img/frontpage/') ?>links.png" alt="Wherever You Go, You Decide!" style="width:100%; max-width:400px">
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p>&copy;2020 Pin My Link <!--| <a href="#">Privacy</a> &middot; <a href="#">Terms</a>--></p>
  </footer>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
      <script>window.jQuery || document.write('<script src="<?= base_url('assets/') ?>js/jquery.slim.min.js"><\/script>')</script><script src="<?= base_url('assets/') ?>js/bootstrap.bundle.min.js"></script></body>
</html>
