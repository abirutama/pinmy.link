<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/slick/') ?>slick.css" />
    <link rel="stylesheet" href="<?= base_url('assets/slick/') ?>slick-theme.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url('assets/slick/') ?>slick.min.js"></script>
  </head>
  <body>
  <div style="max-width:768px; margin:auto">
    <section id="cover" class="">
        <figure class="image image is-5by3">
            <img src="https://bulma.io/images/placeholders/256x256.png">
        </figure>
    </section>
    <section style="padding:1em">
        <div class="container" style="margin-bottom:16px">
            <h2 class="title is-size-5">
                My Social
            </h2>
        </div>
        <div class="multiple-items">
            <div><img class="image" src="https://via.placeholder.com/140x100" alt=""></div>
            <div><img class="image" src="https://via.placeholder.com/140x100" alt=""></div>
            <div><img class="image" src="https://via.placeholder.com/140x100" alt=""></div>
        </div>
        
    </section>
    <section class="" style="padding:1em; margin-bottom:32px">
        <div class="container" style="margin-bottom:16px">
        <h2 class="title is-size-5">
            Post
        </h2>
        </div>
        <div class="columns is-vcentered is-multiline">
            <div class="column is-half-tablet">
                <article class="media box" style="padding:8px; margin-bottom:0px">
                    <figure class="media-left">
                        <p class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros.
                        </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="column is-half-tablet">
            <article class="media box" style="padding:8px; margin-bottom:0px">
                    <figure class="media-left">
                        <p class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros.
                        </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="column is-half-tablet">
            <article class="media box" style="padding:8px; margin-bottom:0px">
                    <figure class="media-left">
                        <p class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros.
                        </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="column is-half-tablet">
                <article class="media box" style="padding:8px; margin-bottom:0px">
                    <figure class="media-left">
                        <p class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros.
                        </p>
                        </div>
                    </div>  
                </article>
            </div>
            <div class="column is-half-tablet">
                <article class="media box" style="padding:8px; margin-bottom:0px">
                    <figure class="media-left">
                        <p class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros.
                        </p>
                        </div>
                    </div>  
                </article>
            </div>
        </div>
    </section>
  </div>
  </body>
  <script>
  $(document).ready(function() {
    $('.multiple-items').slick({
        infinite: false,
        slidesToShow: 5,
        slidesToScroll: 3,
        arrows:false,
        dots:false,
        responsive: [
    {
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
        centerPadding: '60px'
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