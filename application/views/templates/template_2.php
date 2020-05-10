<!DOCTYPE html>
<html class="has-background-light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= scoup(strtolower($profile['user_name']).'\'s Page'); ?></title>
    <meta name="description" content="<?= scoup($seo['meta_description']); ?>">
    <meta name="keyword" content="<?= scoup($seo['meta_keyword']); ?>">
    <?php if($seo['meta_robot']==0){ ?>
    <meta name="robots" content="noindex, nofollow">
    <?php } ?>
    <?php if($seo['meta_rating']==1){ ?>
    <meta name="rating" content="adult">
    <?php } ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/slick/') ?>slick.css" />
    <link rel="stylesheet" href="<?= base_url('assets/slick/') ?>slick-theme.css" />
    <style>
    .bs {
        box-shadow: 0 0.5em 1em -0.125em rgba(10, 10, 10, .1), 0 0 0 1px rgba(10, 10, 10, .02)
    }
    </style>
</head>

<body>
    <div class="" style="max-width:640px; padding:0px; margin:auto;border-radius:0px 0px 0px 48px !important">
        <section id="cover" class="">
            <div class="has-text-centered"
                style="padding:36px 32px;border-radius:0px 0px 256px 256px !important; background-size:cover;<?= 'background-image:url(\''.base_url().'/assets/img/layout/bg1.jpg\')';  ?>">
                <figure class="image is-128x128" style="margin:auto;">
                    <img class="bs is-rounded lazyload" style="border: 5px solid white"
                        src="https://via.placeholder.com/128/f7b780/fffffff/?text=<?= scoup(strtoupper(substr($profile['user_name'],0,1))); ?>" data-src="<?= base_url('assets/img/avatar/').$appearance['appearance_ava']; ?>">
                </figure>
                <h2 class="title is-size-5 has-text-white" style="margin-top:8px"><?= $profile['user_name']; ?></h2>
            </div>
        </section>
        <section class="" style="margin-top:16px;">
            <div class="socmed">
                <?php if($social['social_twitter']){ ?>
                <a class="button is-rounded" style="padding:0.5em; margin:0px 4px" target="_blank"
                    href="https://twitter.com/<?= scoup($social['social_twitter']) ?>"><i
                        class="fab fa-fw fa-twitter is-size-4 has-text-grey-dark"></i></a>
                <?php } if($social['social_facebook']){ ?>
                <a class="button is-rounded" style="padding:0.5em; margin:0px 4px" target="_blank"
                    href="https://facebook.com/<?= scoup($social['social_facebook']) ?>"><i
                        class="fab fa-fw fa-facebook-f is-size-4 has-text-grey-dark"></i></a>
                <?php } if($social['social_instagram']){ ?>
                <a class="button is-rounded" style="padding:0.5em; margin:0px 4px" target="_blank"
                    href="https://instagram.com/<?= scoup($social['social_instagram']) ?>"><i
                        class="fab fa-fw fa-instagram is-size-4 has-text-grey-dark"></i></a>
                <?php } ?>
            </div>
        </section>
        <?php if(count($pinned)>0){ ?>
        <section class="has-background-white" style="padding:2em 2em;margin-top:16px;border-radius:16px !important;">
            <div class="container" style="margin-bottom:24px">
                <h2 class="title is-size-5">
                    Highlighted
                </h2>
            </div>
            <div class="columns is-vcentered pinned">
                <?php 
                foreach($pinned as $pinnedItem){ 
                ?>
                <div class="column is-full is-vcentered is-centered" style="padding:8px 20px 20px 12px">
                    <a href="<?= base_url('/@').$profile['user_name'].'/' . $pinnedItem['card_slug']; ?>"
                        class="media box has-background-white"
                        style="border-radius:64px; padding:8px; margin-bottom:0px; display:flex; align-items:center">
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
                <?php } ?>
            </div>
        </section>
        <?php } ?>
        <section class="has-background-white"
            style="margin-top:16px;padding:2em 2em 3em 2em; border-radius:16px !important;">
            <div class="container" style="margin-bottom:24px">
                <h2 class="title is-size-5">
                    My Links
                </h2>
            </div>
            <div class="columns is-vcentered is-multiline">
                <?php 
                if(count($card) > 0){
                    foreach($card as $key=>$cardItem){
                ?>
                <div class="column is-half-tablet is-vcentered is-centered" style="padding:6px 12px">
                    <a href="<?= base_url('/@').$profile['user_name'].'/' . $cardItem['card_slug']; ?>"
                        class="media box has-background-white"
                        style="border-radius:64px; padding:8px; margin-bottom:0px; display:flex; align-items:center">
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

    </div>
    <figure class="" style="text-align:center; padding:32px">
        <img width="60px" src="<?= base_url('assets/img/layout/') ?>footer.png" alt="">
    </figure>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url('assets/slick/') ?>slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script>lazyload();</script>
</body>
<script>
$(document).ready(function() {
    $('.socmed').slick({
        infinite: false,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 5,
        slidesToScroll: 3,
        arrows: false,
        dots: false,
        responsive: [{
                breakpoint: 600,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    centerMode: true,
                    centerPadding: '80px'
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
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
                    infinite: true,
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