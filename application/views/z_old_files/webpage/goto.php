<!doctype html>
<html lang="en">
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= scoup($queryCard['card_title']); ?>">
    <meta name="robots" content="noindex, nofollow">
    <title><?= scoup($queryCard['card_title']); ?> | Pinmy.link</title>
    <meta http-equiv="refresh" content="3;url=<?= scoup($queryCard['card_url']); ?>" />
</head>
<body>
    <h2>You will redirected to: <?= scoup($queryCard['card_title']); ?><h2>
</body>
</html>