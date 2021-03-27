<?php
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');

//Meta Value
if($appearance['appearance_cover'] != null || $appearance['appearance_cover'] != ""){ $bg_image = base_url().'assets/img/cover/'.$appearance['appearance_cover'];}else{ $bg_image = base_url().'assets/img/layout/bg1.webp'; } 

if($seo['meta_title']){
    $meta_title = $seo['meta_title'];
}else{
    $meta_title = $profile['user_name']."'s Page | Pinmy.link";
}

if($seo['meta_description']){
    $meta_desc = $seo['meta_description'];
}else{
    $meta_desc = "Welcome to my page";
}

if($appearance['appearance_ava']){
    $meta_image =  base_url('assets/img/avatar/').$appearance['appearance_ava']; 
}else{
    $meta_image =  base_url('assets/img/layout/').'lazy-p.webp';
}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />

    <title><?= $meta_title; ?></title>
    <meta name="title" content="<?= $meta_title; ?>">
    <meta name="description" content="<?= $meta_desc; ?>">
    <?php if($seo['meta_keyword']==1){ ?>
    <meta name="keyword" content="<?= scoup($seo['meta_keyword']); ?>">
    <?php } ?>
    <?php if($seo['meta_robot']==0){ ?>
    <meta name="robots" content="noindex, nofollow">
    <?php } ?>
    <?php if($seo['meta_rating']==1){ ?>
    <meta name="rating" content="adult">
    <?php } ?>

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="<?= $meta_title; ?>" />
    <meta property="og:description" content="<?= $meta_desc; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= base_url('u/').$profile['user_name']; ?>" />
    <meta property="og:image" content="<?= $meta_image; ?>" />

    <!-- Twitter -->
    <meta property="twitter:title" content="<?= $meta_title; ?>">
    <meta property="twitter:description" content="<?= $meta_desc; ?>">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= base_url('u/').$profile['user_name']; ?>">
    <meta property="twitter:image" content="<?= $meta_image; ?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/appkit/'); ?>styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/appkit/'); ?>styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/appkit/'); ?>fonts/css/fontawesome-all.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/layout/').'footer.webp';?>">

    <style>
    .crop-text {
        width: 69%;
        overflow: hidden;
        height: 50px;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    </style>
</head>

<body class="theme-light" style="max-width: 480px;margin:auto">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">

        <div class="page-content">

            <div class="mb-0">
                <div class="divider mb-4"></div>
                <div class="d-flex content mt-0 mb-4">
                    <!-- right side of profile. increase image width to increase column size-->
                    <div>
                        <img src="<?= $meta_image; ?>"
                            data-src="<?php if($appearance['appearance_ava']){ echo base_url('assets/img/avatar/').$appearance['appearance_ava']; } ?>"
                            width="70" class="rounded-circle me-3 shadow-s preload-img">
                    </div>
                    <!-- left side of profile -->
                    <div class="flex-grow-1">
                        <h2 class="<?php if($social_button){ echo 'mt-2'; }else{ echo 'mt-4';} ?>">
                            <?= $profile['user_name']; ?><?php if($profile['is_premium']){ ?><i
                                class=" fa fa-check-circle color-blue-dark font-1 ms-1"></i><?php } ?>
                        </h2>
                        <?php if($social_button){ ?>
                        <a href="#" data-menu="menu-share"
                            class="mt-1 btn btn-xs font-600 btn-border border-highlight color-highlight">Other Links</a>
                        <?php } ?>
                    </div>
                </div>

                <div class="splide cusstory-slider slider-no-dots mb-4" id="cusstory-slider">
                    <div class="splide__track">
                        <div class="splide__list">
                            <div class="splide__slide text-center"><a data-menu="menu-story" href="#"><img
                                        src="<?= base_url('assets/appkit/'); ?>images/pictures/1s.jpg" width="60"
                                        class="rounded-circle mx-auto mb-n4 border border-m"><br><span
                                        class="d-block pt-2 font-12 color-theme opacity-60">Story 1</span></a></div>
                            <div class="splide__slide text-center"><a data-menu="menu-story" href="#"><img
                                        src="<?= base_url('assets/appkit/'); ?>images/pictures/1s.jpg" width="60"
                                        class="rounded-circle mx-auto mb-n4 border border-m"><br><span
                                        class="d-block pt-2 font-12 color-theme opacity-60">Story 2</span></a></div>
                            <div class="splide__slide text-center"><a data-menu="menu-story" href="#"><img
                                        src="<?= base_url('assets/appkit/'); ?>images/pictures/1s.jpg" width="60"
                                        class="rounded-circle mx-auto mb-n4 border border-m"><br><span
                                        class="d-block pt-2 font-12 color-theme opacity-60">Story 3</span></a></div>
                                        <div class="splide__slide text-center"><a data-menu="menu-story" href="#"><img
                                        src="<?= base_url('assets/appkit/'); ?>images/pictures/1s.jpg" width="60"
                                        class="rounded-circle mx-auto mb-n4 border border-m"><br><span
                                        class="d-block pt-2 font-12 color-theme opacity-60">Story 4</span></a></div>
                                        <div class="splide__slide text-center"><a data-menu="menu-story" href="#"><img
                                        src="<?= base_url('assets/appkit/'); ?>images/pictures/1s.jpg" width="60"
                                        class="rounded-circle mx-auto mb-n4 border border-m"><br><span
                                        class="d-block pt-2 font-12 color-theme opacity-60">Story 5</span></a></div>
                                        <div class="splide__slide text-center"><a data-menu="menu-story" href="#"><img
                                        src="<?= base_url('assets/appkit/'); ?>images/pictures/1s.jpg" width="60"
                                        class="rounded-circle mx-auto mb-n4 border border-m"><br><span
                                        class="d-block pt-2 font-12 color-theme opacity-60">Story 6</span></a></div>
                        </div>
                    </div>
                </div>
                
                <?php if(count($card) > 0){ ?>
                <div class="bg-white">
                    <div class="content mb-0">
                        <div class="list-group list-custom-large">
                            <?php 
                                foreach($card as $key=>$cardItem){
                            ?>
                            <a title="<?= $cardItem['card_title']; ?>"
                                href="<?= base_url('u/').$profile['user_name'].'/' . $cardItem['card_slug']; ?>?utm_source=pinmylink&utm_medium=content_button&utm_campaign=direct_from_page">
                                <i class="fa font-18 fa-link color-blue-dark"></i>
                                <span class="crop-text"><?= scoup($cardItem['card_title']); ?></span>
                                <strong><?php $url = parse_url($cardItem['card_url'],PHP_URL_HOST); echo $url ?></strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="ms-3 me-3 mb-5 alert alert-small rounded-s shadow-xl bg-gray-dark" role="alert">
                    <span><i class="fa fa-info color-white"></i></span>
                    <strong class="color-white">This user has no content yet.</strong>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- Page content ends here-->

        <!-- Story Menu -->
        <div id="menu-story" class="menu menu-box-modal bg-dark-dark" data-menu-width="cover" data-menu-height="cover"
            style="max-width: 480px;margin:auto">
            <div class="card bg-6 rounded-0 mb-0" data-card-height="cover-full">
                <div class="card-top">
                    <h1 class="color-white font-18 ms-3 mt-4">
                        <img src="<?= $meta_image; ?>" width="30"
                            class="rounded-xl me-2 mt-n1">
                            <?= $profile['user_name']; ?>
                        <a href="#" class="close-menu float-end me-3 mt-0 color-white font-20"><i
                                class="fa fa-times"></i></a>
                    </h1>
                </div>
                <div class="card-center text-center">
                    <h1 class="color-white mb-3 font-50 text-uppercase font-900">Create</h1>
                    <h1 class="color-white mb-3 font-38 text-uppercase font-900">Awesome</h1>
                    <h1 class="color-white mb-0 font-48 text-uppercase font-900">Stories</h1>
                    <p class="color-white boxed-text-l font-16 mt-4">
                        Simulate Stories with ease. It's a great and super easy to use feature.
                    </p>
                    <a href="#"
                        class="btn btn-center-s rounded-s close-menu btn-m font-13 border-gray-light font-700 text-uppercase color-white">Awesome</a>
                </div>
                <div class="card-overlay bg-black opacity-80"></div>
            </div>
        </div>

        <?php if($social_button){ ?>
        <!-- Share Menu-->
        <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-height="325" data-menu-effect="menu-over"
            style="max-width: 480px;margin:auto">
            <div class="menu-title">
                <h1>Other Links</h1>
                <a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
            </div>
            <div class="divider divider-margins mt-3 mb-0"></div>
            <div class="content mt-0">
                <div class="list-group list-custom-small pe-2">
                    <?php if($social['social_facebook']){ ?>
                    <a target="_blank" href="https://facebook.com/<?= scoup($social['social_facebook']) ?>"
                            rel="noreferrer" class="external-link shareToFacebook">
                        <i class="fab fa-facebook-f font-12 bg-facebook color-white shadow-l rounded-l"></i>
                        <span>Facebook</span>
                        <i class="fa fa-angle-right me-2"></i>
                    </a>
                    <?php } if($social['social_twitter']){ ?>
                    <a  target="_blank" href="https://twitter.com/<?= scoup($social['social_twitter']) ?>"
                            rel="noreferrer" class="external-link shareToTwitter">
                        <i class="fab fa-twitter font-12 bg-twitter color-white shadow-l rounded-l"></i>
                        <span>Twitter</span>
                        <i class="fa fa-angle-right me-2"></i>
                    </a>
                    <?php } if($social['social_instagram']){ ?>
                    <a target="_blank" href="https://instagram.com/<?= scoup($social['social_instagram']) ?>"
                            rel="noreferrer" class="external-link shareToWhatsApp">
                        <i class="fab fa-instagram font-12 bg-instagram color-white shadow-l rounded-l"></i>
                        <span>Instagram</span>
                        <i class="fa fa-angle-right me-2"></i>
                    </a>
                    <?php } if($social['other_website']){ ?>
                    <a target="_blank" href="https://<?= scoup($social['other_website']) ?>" rel="noreferrer" class="external-link shareToMail">
                        <i class="fa fa-globe font-12 bg-mail color-white shadow-l rounded-l"></i>
                        <span>Website</span>
                        <i class="fa fa-angle-right me-2"></i>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>

    <script type="text/javascript" src="<?= base_url('assets/appkit/'); ?>scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/appkit/'); ?>scripts/custom.js"></script>
</body>