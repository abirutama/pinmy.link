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
    <meta http-equiv="refresh" content="1;url=<?= scoup($queryCard['card_url']); ?>" />
  </head>
  <body>
  <section class="section" style="max-width:480px; margin:auto;">
    <div class="container">
      <p class="subtitle has-text-centered">
        You'll be redirected,<br>
        Please wait... 
      </p>
      <figure class="image">
        <img src="<?= base_url('assets/img'); ?>/layout/redirect.webp">
      </figure>
    </div>
  </section>
  </body>
</html>