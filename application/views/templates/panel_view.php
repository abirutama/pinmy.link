<?php
$queryProfile = $this->db->get_where('user', array('user_name' => $preview))->row_array();
$queryCover = $this->db->get_where('cover', array('cover_id' => $queryProfile['user_cover']))->row_array();
$this->db->order_by('card_id', 'DESC');
$queryCard = $this->db->get_where('card', array('user_id' => $queryProfile['user_id']))->result_array();
$querySocial = $this->db->get_where('social', array('user_id' => $queryProfile['user_id']))->row_array();
$querySeo = $this->db->get_where('seo', array('user_id' => $queryProfile['user_id']))->row_array();
if(!$queryProfile){
  redirect('main');
}
?>
<!DOCTYPE html>
<html class="has-background-light">
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
    <title><?= scoup($querySeo['meta_title']) ?> | Pinmy.link</title>
    <meta name="description" content="<?= scoup($querySeo['meta_description']); ?>">
    <meta name="keyword" content="<?= scoup($querySeo['meta_keyword']); ?>">
    <?php if($querySeo['meta_robot']==0){ ?>
      <meta name="robots" content="noindex, nofollow">
    <?php } ?>
    <?php if($querySeo['meta_rating']==1){ ?>
      <meta name="rating" content="adult">
    <?php } ?>
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <style>
      .cupad{padding: 1em}
    </style>
  </head>
  <body>
  <div id="wrapper" class="container has-background-light" style="max-width:600px;padding-bottom:32px">
    <section class="section" style="border-radius: 0px 0px 12px 12px; height:300px; padding-top:32px; margin-bottom:32px; <?php echo "background-image:url('".base_url('assets/img/cover/').$queryCover['cover_filename']."'); background-size:cover"; ?>">
      <div class="container">
        <h1 class="title is-size-3 has-text-white" style="margin-bottom:16px">
          @<?= scoup($queryProfile['user_name']); ?>
        </h1>
        <?php 
          $social_length = $querySocial['social_twitter'] . $querySocial['social_facebook'] . $querySocial['social_instagram'] . $querySocial['social_snapchat'] . $querySocial['social_youtube'];
          //echo strlen($social_length);
          if($querySocial){ 
            if(strlen($social_length) > 0){
        ?>
        <div class="dropdown">
          <div class="dropdown-trigger">
            <button class="button is-size-6" aria-haspopup="true" aria-controls="dropdown-menu3">
              <span class="has-text-weight-semibold">Connect</span>
              <span class="icon is-small">
                <i class="fas fa-angle-down" aria-hidden="true"></i>
              </span>
            </button>
          </div>
          <div class="dropdown-menu" id="dropdown-menu3" role="menu">
            <div class="dropdown-content">
              <?php if($querySocial['social_twitter']){ ?>
              <a href="https://twitter.com/<?= scoup($querySocial['social_twitter']) ?>" target="_blank" class="dropdown-item">
              <i class="fab fa-fw fa-twitter"></i> Twitter
              </a>
              <?php } if($querySocial['social_facebook']){ ?>
              <a href="https://facebook.com/<?= scoup($querySocial['social_facebook']) ?>" target="_blank" class="dropdown-item">
              <i class="fab fa-fw fa-facebook-square"></i> Facebook
              </a>
              <?php } if($querySocial['social_instagram']){ ?>
              <a href="https://instagram.com/<?= scoup($querySocial['social_instagram']) ?>" target="_blank" class="dropdown-item">
              <i class="fab fa-fw fa-instagram"></i> Instagram
              </a>
              <?php } if($querySocial['social_snapchat']){ ?>
              <a href="https://snapchat.com/add/<?= scoup($querySocial['social_snapchat']) ?>" target="_blank" class="dropdown-item">
              <i class="fab fa-fw fa-snapchat-ghost"></i> Snapchat
              </a>
              <?php } if($querySocial['social_youtube']){ ?>
              <a href="<?= scoup($querySocial['social_youtube']) ?>" target="_blank" class="dropdown-item">
              <i class="fab fa-fw fa-youtube"></i> Youtube
              </a>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php }} ?>
      </div>
    </section>
    <section class="section" style="padding: 0px 24px 0px 24px; margin-top:-72px;">
      <nav class="panel is-size-6 has-background-white" style="border-radius:8px">
        <p class="panel-block is-size-5 has-text-grey-light" style="padding:1px !important">
        <i class="fas fa-minus" style="margin:auto"></i>
        </p>
        <?php if(!$queryCard){ ?>
          <div class="panel-block" style="padding: 15px">
            <div class="has-text-centered" style="margin:auto">
              <p class="">
                No Content Yet.
              </p>
            </div>
          </div>
        <?php }else{ foreach ($queryCard as $listCard): ?>
        <a href="<?= base_url('/@').$queryProfile['user_name'].'/'.$listCard['card_slug']; ?>" target="_blank" class="panel-block cupad">
          <span class="has-text-info" style="width:100%"><?= scoup($listCard['card_title']); ?></span>
          <span class="panel-icon" style="margin-right:0px">
          <i class="fas fa-chevron-right has-text-info"></i>
          </span>
        </a>
        <?php endforeach;} ?>
        <footer class="panel-block" style="padding: 15px">
          <div class="has-text-centered is-size-7" style="margin:auto">
            <p class="">
              Powered by <a href="<?= base_url(); ?>">Pinmy.link</a>
            </p>
          </div>
        </footer>
      </nav>
      
    </section>
    
  </div>
  
</body>
<script src="https://bulma.io/vendor/clipboard-1.7.1.min.js"></script>
<script src="https://bulma.io/vendor/js.cookie-2.1.4.min.js"></script>
<script src="https://bulma.io/lib/main.js?v=202003241341"></script>
</html>