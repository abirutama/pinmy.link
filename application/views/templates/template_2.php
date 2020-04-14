<!DOCTYPE html>
<html class="has-background-light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= scoup(strtolower($profile['user_name']).'\'s Page'); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/slick/') ?>slick.css" />
    <link rel="stylesheet" href="<?= base_url('assets/slick/') ?>slick-theme.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url('assets/slick/') ?>slick.min.js"></script>
    <style>
    .bs{box-shadow: 0 0.5em 1em -0.125em rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.02)}
    </style>
</head>

<body>
    <div class="has-background-white box" style="max-width:600px; padding:0px; margin:auto;border-radius:0px 0px 0px 48px !important; padding-bottom:16px; margin-bottom:16px">
        <section id="cover" class="">
            <div class="has-text-centered" style="padding:64px 32px;border-radius:0px 0px 0px 128px !important; background-size:cover;<?= 'background-image:url(\''.base_url().'/assets/img/layout/bg1.jpg\')';  ?>">
                <figure class="image is-128x128" style="margin:auto;">
                    <img class="bs is-rounded" src="https://via.placeholder.com/128/?text=<?= scoup(strtoupper(substr($profile['user_name'],0,1))); ?>">
                </figure>
                <h2 class="title is-size-5 has-text-white" style="margin-top:8px"><?= $profile['user_name']; ?></h2>
            </div>
            
        </section>
        <section style="margin-top:16px">
            <div class="multiple-items">
                <?php if($social['social_twitter']){ ?>
                <a target="_blank" href="https://twitter.com/<?= scoup($social['social_twitter']) ?>"><img class="image bs" width="110px" style="border-radius:32px" src="<?= base_url('assets/img/social-btn/') ?>btn-twitter.png" alt=""></a>
                <?php } if($social['social_facebook']){ ?>
                <a target="_blank" href="https://facebook.com/<?= scoup($social['social_facebook']) ?>"><img class="image bs" width="110px" style="border-radius:32px" src="<?= base_url('assets/img/social-btn/') ?>btn-fb.png" alt=""></a>
                <?php } if($social['social_instagram']){ ?>
                <a  target="_blank"href="https://instagram.com/<?= scoup($social['social_instagram']) ?>"><img class="image bs" width="110px" style="border-radius:32px" src="<?= base_url('assets/img/social-btn/') ?>btn-ig.png" alt=""></a>
                <?php } if($social['social_snapchat']){ ?>
                <a target="_blank" href="https://snapchat.com/add/<?= scoup($social['social_snapchat']) ?>"><img class="image bs" width="110px" style="border-radius:32px" src="<?= base_url('assets/img/social-btn/') ?>btn-sc.png" alt=""></a>
                <?php } ?>
            </div>
        </section>
        <section class="" style="padding:1em; margin-bottom:32px">
            <div class="container" style="margin-bottom:24px">
                <h2 class="title is-size-5">
                    My Links
                </h2>
            </div>
            <div class="columns is-vcentered is-multiline">
                <?php foreach($card as $cardItem){ ?>
                <div class="column is-half-tablet is-vcentered is-centered" style="padding:6px 12px">
                    <a href="<?= base_url('/@').$profile['user_name'].'/' . $cardItem['card_slug']; ?>" class="media box has-background-white" style="border-radius:64px; padding:8px; margin-bottom:0px; display:flex; align-items:center">
                        <figure class="media-left">
                            <?php if($cardItem['card_thumbnail']!== null){ ?>
                            <p class="image is-64x64">
                                <img class="is-rounded" src="https://via.placeholder.com/80/f7b780/fffffff?text=<?= strtoupper(substr($cardItem['card_slug'],0,1)); ?>" data-src="<?= $cardItem['card_thumbnail']; ?>">
                            </p>
                            <?php } ?>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <?php
                                    if( strlen($cardItem['card_title']) > 50 ){
                                        echo scoup(substr($cardItem['card_title'],0,50)).'...'; 
                                    }else{
                                        echo scoup($cardItem['card_title']);
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
    </div>
</body>
<script>
$(document).ready(function() {
    $('.multiple-items').slick({
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
                    slidesToShow: 2,
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
});
</script>

</html>