<?php
    if($campaign==null){
        $default_cover = base_url().'assets/img/cover/'.$appearance['appearance_cover'];
    }else{
        $default_cover = base_url('assets').'/img/sponsor/'.$campaign['campaign_image'];

    }
    
?>
<!DOCTYPE html>
<html class="has-background-light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= scoup($seo['meta_title']); ?></title>
    <meta name="description" content="<?= scoup($seo['meta_description']); ?>">
    <meta name="keyword" content="<?= scoup($seo['meta_keyword']); ?>">
    <?php if($seo['meta_robot']==0){ ?>
    <meta name="robots" content="noindex, nofollow">
    <?php } ?>
    <?php if($seo['meta_rating']==1){ ?>
    <meta name="rating" content="adult">
    <?php } ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/5dbbe055c9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url('assets/slick/') ?>slick.css" />
    <link rel="stylesheet" href="<?= base_url('assets/slick/') ?>slick-theme.css" />
    <style>
    .bs {
        box-shadow: 0 0.5em 1em -0.125em rgba(10, 10, 10, .1), 0 0 0 1px rgba(10, 10, 10, .02)
    }
    .blink_me {
    animation: blinker 1.5s linear infinite;
    }

    @keyframes blinker {
    50% {
        opacity: 0;
    }
    }
    </style>
</head>

<body>
    <div class="" style="max-width:640px; padding:0px; margin:auto;border-radius:0px 0px 0px 48px !important">
        <section id="cover" style="margin-bottom:24px">
            <!-- http://localhost/pinmy.link/assets/img/sponsor/nike-ad.jpg -->
            <div id="cover-image" class="has-text-centered"
                style="padding:36px 32px;border-radius:0px 0px 16px 16px !important; background-size:cover; background-position:left; background-image:url('<?= $default_cover; ?>')">
                <figure class="profile-thing image is-128x128" style="margin:auto;">
                <div id="modal-open" class="button bs is-link" style="border-radius:64px; padding:10px; position:absolute; right:0; bottom:0"><i class="fas fa-link is-size-5 blink_me"></i></div>
                    <img class="bs is-rounded lazyload" style="border: 5px solid white; width:128px; height:128px"
                        src="https://via.placeholder.com/128/f7b780/fffffff/?text=<?= scoup(strtoupper(substr($profile['user_name'],0,1))); ?>"
                        data-src="<?php if($appearance['appearance_ava']){ echo base_url('assets/img/avatar/').$appearance['appearance_ava']; } ?>">
                </figure>
                <h2 class="profile-thing title is-size-5 has-text-white" style="margin-top:8px;">
                    @<?= $profile['user_name']; ?></h2>
            </div>
        </section>
        <?php if(count($card) > 7){ if(count($pinned)>0){ ?>
        <section class="" style="padding:0.5em 2em;margin-bottom:4px;border-radius:16px !important;">
            <div class="container" style="">
            </div>
            <div class="columns is-vcentered pinned">
                <?php 
                foreach($pinned as $pinnedItem){ 
                ?>
                <div class="column is-full is-vcentered is-centered" style="padding:8px 20px 20px 12px">
                    <a href="<?= base_url('/@').$profile['user_name'].'/' . $pinnedItem['card_slug']; ?>"
                        class="media box has-background-white"
                        style="border-radius:16px; padding:8px; margin-bottom:0px; display:flex; align-items:center">
                        <figure class="media-left">
                            <p class="image is-64x64">
                                <img class="is-rounded lazyload"
                                    src="https://via.placeholder.com/64/f7b780/fffffff?text=<?= strtoupper(substr($pinnedItem['card_slug'],0,1)); ?>"
                                    data-src="<?= $pinnedItem['card_thumbnail']; ?>" style="width: 64px; height:64px">
                            </p>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <?php
                                    if( strlen($pinnedItem['card_title']) > 45 ){
                                        echo scoup(substr($pinnedItem['card_title'],0,45)).'...'; 
                                    }else{
                                        echo scoup($pinnedItem['card_title']);
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }} ?>
            </div>
        </section>
        <?php } ?>
        <section class=""
            style="max-width:640px; padding:0.5em 2em 0.5em 2em; margin:auto; border-radius:16px !important;">
            <div class="container" style="margin-bottom:0px">
            </div>
            <div class="columns is-vcentered is-multiline">
                <?php 
                if(count($card) > 0){
                    foreach($card as $key=>$cardItem){
                ?>
                <div class="column is-half-tablet is-vcentered is-centered" style="padding:6px 12px">
                    <a href="<?= base_url('/@').$profile['user_name'].'/' . $cardItem['card_slug']; ?>"
                        class="media box has-background-white"
                        style="border-radius:16px; padding:8px; margin-bottom:0px; display:flex; align-items:center">
                        <figure class="media-left">
                            <p class="image is-64x64">
                                <img class="is-rounded lazyload"
                                    src="https://via.placeholder.com/64/f7b780/fffffff?text=<?= strtoupper(substr($cardItem['card_slug'],0,1)); ?>"
                                    data-src="<?= $cardItem['card_thumbnail']; ?>" style="width: 64px; height:64px">
                            </p>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <?php
                                    if( strlen($cardItem['card_title']) > 45 ){
                                        echo scoup(substr($cardItem['card_title'],0,45)).'...'; 
                                    }else{
                                        echo scoup($cardItem['card_title']);
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                    }
                }else{
                ?>
                <div class="column is-full is-vcentered is-centered has-text-centered" style="padding:6px 12px">
                    This user has no links yet.
                </div>
                <?php
                }
                ?>
            </div>
        </section>
        <div id="modal-social" class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Social & Account</p>
                    <button id="modal-close" class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                <div class="buttons">
                <?php if($social['social_twitter']){ ?>
                <a class="button is-fullwidth" target="_blank"
                    href="https://twitter.com/<?= scoup($social['social_twitter']) ?>"><i
                        class="fab fa-fw fa-twitter is-size-4 has-text-grey-dark"></i> Twitter</a>
                <?php } if($social['social_facebook']){ ?>
                <a class="button is-fullwidth" target="_blank"
                    href="https://facebook.com/<?= scoup($social['social_facebook']) ?>"><i
                        class="fab fa-fw fa-facebook-f is-size-4 has-text-grey-dark"></i> Facebook</a>
                <?php } if($social['social_instagram']){ ?>
                <a class="button is-fullwidth" target="_blank"
                    href="https://instagram.com/<?= scoup($social['social_instagram']) ?>"><i
                        class="fab fa-fw fa-instagram is-size-4 has-text-grey-dark"></i> Instagram</a>
                <?php } ?>
            </div>
                </section>
                <footer class="modal-card-foot">
                </footer>
            </div>
        </div>
    </div>
    <figure class="" style="text-align:center; padding:32px">
        <img width="60px" src="<?= base_url('assets/img/layout/') ?>footer.png" alt="">
    </figure>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <?php if($appearance['appearance_cover'] != null){ $bg_image = base_url().'assets/img/cover/'.$appearance['appearance_cover'];}else{ $bg_image = base_url().'assets/img/layout/bg1.jpg'; }  ?>
    <?php if($campaign != null){ ?>
    <style>
    .profile-thing {
        opacity: 0
    }
    </style>
    <script>
    setTimeout(function() {
        $('#cover-image').fadeTo(200, 0);
    }, 3000);
    setTimeout(function() {
        $('#cover-image').css('background-image', 'url(" <?= $bg_image ?> ")').fadeTo(200, 1);
    }, 2200);
    $('.profile-thing').delay(2300).fadeTo(200, 1);
    </script>
    <?php } ?>

    <script src="<?= base_url('assets/slick/') ?>slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script>
    lazyload();
    </script>
</body>
<script>
//Modal Logout
var html_tag = document.documentElement;
var open_modal = document.querySelector('#modal-open');
var modal_container = document.querySelector('#modal-social');
var close_modal = document.querySelector('#modal-close');

open_modal.onclick = function() {
    modal_container.classList.toggle('is-active');
    html_tag.classList.toggle('is-clipped');
}

close_modal.onclick = function() {
    modal_container.classList.toggle('is-active');
    html_tag.classList.toggle('is-clipped');
}

$(document).ready(function() {
    $('.pinned').slick({
        infinite: false,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        responsive: [{
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    infinite: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
});
</script>

</html>