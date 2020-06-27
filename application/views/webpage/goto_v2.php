<!doctype html>
<html>
  <head>
    <?php if($querySeo['gtag_id']){ ?>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=<?= scoup($querySeo['gtag_id']); ?>"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?= scoup($querySeo['gtag_id']); ?>');
      </script>
    <?php } ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= scoup($queryCard['card_title']); ?>">
    <meta name="robots" content="noindex, nofollow">
    <title><?= scoup($queryCard['card_title']); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <meta http-equiv="refresh" content="0;url=<?= scoup($queryCard['card_url']); ?>" />
  </head>
  <body>
  <section class="section" style="max-width:480px; margin:auto;">
    <div class="container box">
        
      <p class="subtitle">
        You'll be redirected...    
      </p>
      <!--
        <h1 class="title is-size-5">
        <?= scoup($queryCard['card_title']); ?>
        </h1>
      <progress class="progress is-small is-primary" max="100">15%</progress>
      -->
      <figure class="image is-square">
        <img src="https://bulma.io/images/placeholders/256x256.png">
        </figure>
    </div>
  </section>
  </body>
</html>