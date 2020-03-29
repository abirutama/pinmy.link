<?php
$queryProfile = $this->db->get_where('user', array('user_name' => $preview))->row_array();
$this->db->order_by('card_id', 'DESC');
$queryCard = $this->db->get_where('card', array('user_id' => $queryProfile['user_id']))->result_array();
$queryTheme = $this->db->get_where('theme', array('theme_id' => $queryProfile['user_theme']))->row_array();

if(!$queryProfile){
  redirect('main');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
    	.text-shd{text-shadow: 2px 2px 6px #000000;}
    	.overlay{box-shadow:inset 0 0 0 500px rgba(0, 0, 0, 0.3);}
      .overlay-sm{box-shadow:inset 0 0 0 500px rgba(0, 0, 0, 0.2);}
    	.bottom-text{position: absolute; margin-right: 15px; bottom: 15px}
    </style>
    <title><?= $queryProfile['user_name'] ?> | Pin My Link</title>
  </head>
  <body class="<?= $queryTheme['style_body']; ?>" style="<?php echo "background-image:url('".base_url('assets/img/theme/bg/').$queryTheme['style_img_body']."'); background-attachment:fixed"; ?>">

    <div class="container" style="max-width: 768px; margin-bottom: 16px">
		<div id="profile-section" class="container pt-5 pb-4">
			<div class="row">
				<!--
				<div class="col-sm-4"><img src="img/ava.png" class="rounded-circle" width="60px"></div>
		    	-->
		    	<div class="col-sm-8">
		    		<div class="row">
						<div class="col-sm-12 mb-2"><span class="h3 <?= $queryTheme['style_text_username']; ?>"><?= $queryProfile['user_name'] ?></span></div>
            <?php if($queryProfile['is_verified']==1){ ?><div class="ml-3 badge <?= $queryTheme['style_badge']; ?>">Verified Account <i class="fas fa-check"></i></div><?php } ?>
					</div>
		    	</div>  
			</div>
		</div>

    <?php if($queryProfile['user_layout']==1){ ?>
		<div id="card-section" class="container">
        <div class="row row-cols-2 row-cols-sm-3">
          <?php if(!$queryCard){ ?>
          <div class="col col-12" style="padding: 5px">
            <div class="mt-3">
              <div class="btn <?= $queryTheme['style_card']; ?> btn-block rounded-lg">No Content</div>
            </div>
          </div>
          <?php }else{ ?>
            <?php foreach ($queryCard as $listCard): ?>
            <div class="col" style="padding: 5px">
              <?php 
                if(strlen($listCard['card_thumbnail']) > 15){
                  $overlay = 'overlay';
                  $url_img = $listCard['card_thumbnail'];
                  $bg_img = "background-image:url('".$url_img."'); background-size: cover; background-position: center;'";
                }else{
                  $overlay = 'overlay-sm';
                  $bg_img = "background-image:url('".base_url('assets/img/theme/pattern/').$queryTheme['style_img_card']."');";
                }
              
              ?>
              <div class="card text-white <?= $overlay; ?> border <?= $queryTheme['style_card']; ?>" style="<?= $bg_img ?> ">
                <a href="<?= scoup($listCard['card_url']); ?>" target="_blank" class="card-img text-white" style="height: 240px">
                  <div class="card-img-overlay">
                    <?php if(strlen($listCard['card_title'])>60) { ?>
                      <h6 class="card-title text-shd bottom-text"><?= scoup(substr($listCard['card_title'],0,60)).'...'; ?></h5>
                    <?php }else{ ?>
                      <h6 class="card-title text-shd bottom-text"><?= scoup($listCard['card_title']); ?></h5>
                    <?php }?>
                  </div>
                </a>
              </div>
            </div>
            <?php endforeach ?>
          <?php } ?>
        </div>
    </div>
    <?php }else if($queryProfile['user_layout']==2){ ?>
      <?php if(!$queryCard){ ?>
        <div class="mt-3">
          <div class="btn <?= $queryTheme['style_card']; ?> <?= $queryTheme['style_text_card']; ?> btn-block rounded-lg p-3">No Content</div>
        </div>
      <?php }else{ ?>
        <?php foreach ($queryCard as $listCard): ?>
          <div class="mt-3">
            <a href="<?= scoup($listCard['card_url']); ?>" target="_blank" class="btn <?= $queryTheme['style_card']; ?> <?= $queryTheme['style_text_card']; ?> btn-block p-3 rounded-lg"><?= scoup($listCard['card_title']); ?></a>
          </div>
        <?php endforeach ?>
        <?php } ?>
    <?php } ?>
    
      <div class="container mt-5 mb-5 mx-auto">
        <!--
  			<div class="mb-3" style="min-width: 100px; display: inline-block; font-size: 24pt;">
          <a href="https://instagram.com/abirutama" target="_blank"><i class="fab fa-sm fa-fw fa-instagram <?= $queryTheme['style_text_footer']; ?> mr-2"></i></a>
          <a href="https://instagram.com/abirutama" target="_blank"><i class="fab fa-sm fa-fw fa-twitter <?= $queryTheme['style_text_footer']; ?> mr-2"></i></a>
          <a href="https://instagram.com/abirutama" target="_blank"><i class="fab fa-sm fa-fw fa-facebook-f <?= $queryTheme['style_text_footer']; ?> mr-2"></i></a>
  			</div><br>
        -->
      	<a href="<?= base_url(); ?>" class="<?= $queryTheme['style_text_footer']; ?> h6">Pinmy.link</a>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5dbbe055c9.js" crossorigin="anonymous"></script>
  </body>
</html>