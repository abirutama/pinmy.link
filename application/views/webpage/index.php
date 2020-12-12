<!DOCTYPE html>
<html>

<head>
    <title>Satu Halaman Untuk Semua Kontenmu! | Pinmy.link</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Mudahkan audiens untuk mengakses semua kontenmu dalam satu halaman! Yuk gunakan Pinmy.link sekarang juga!">
    <meta name="robots" content="follow, index">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('assets'); ?>/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url('assets'); ?>/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('assets'); ?>/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets'); ?>/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('assets'); ?>/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('assets'); ?>/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('assets'); ?>/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('assets'); ?>/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets'); ?>/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?= base_url('assets'); ?>/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets'); ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets'); ?>/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets'); ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url('assets'); ?>/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url('assets'); ?>/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="canonical" href="https://pinmy.link/" />
    <link rel=canonical" href="https://www.pinmy.link/" />
    <link rel="canonical" href="http://pinmy.link/" />
    <link rel="canonical" href="http://www.pinmy.link/" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <!--<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90789114-4"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-90789114-4');
    </script>

</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://pinmy.link">
                <img src="<?= base_url('assets'); ?>/img/layout/footer.png"> <strong
                    class="has-text-gray">Pinmy.link</strong>
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a href="https://pinmy.link" class="navbar-item">
                    Home
                </a>
                <a href="https://kb.pinmy.link" class="navbar-item">
                    Panduan
                </a>
                <!--
                

                

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        More
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            About
                        </a>
                        <a class="navbar-item">
                            Jobs
                        </a>
                        <a class="navbar-item">
                            Contact
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            Report an issue
                        </a>
                    </div>
                </div>
            -->
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <?php
                            if($this->session->userdata('ses_email')){
                        ?>
                        <a href="<?= base_url('auth'); ?>" class="button is-danger is-outlined">
                            Ke Halaman User
                        </a>
                        <?php
                            }else{
                        ?>
                        <a href="<?= base_url('auth/register'); ?>" class="button is-link">
                            Daftar
                        </a>
                        <a href="<?= base_url('auth'); ?>" class="button is-outlined">
                            Masuk
                        </a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="hero is-light is-medium"
        style="background-image:url('<?= base_url('assets/img'); ?>/frontpage/new/cover_img.jpg');background-size:contain;background-position: right; background-repeat:no-repeat">
        <div class="hero-body"
            style="background: rgb(255,255,255); background: linear-gradient(115deg, rgba(255,255,255,0.9) 40%, rgba(255,255,255,0.5) 100%);">
            <div class="container">
                <h1 class="title is-1 has-text-weight-bold" style="text-shadow: 1px 1px 3px #fff;">
                    Bantu Kontenmu<br>Lebih Mudah Diakses
                </h1>
                <h2 class="subtitle" style="text-shadow: 1px 1px 3px #fff;">
                    Satu halaman, untuk semua kontenmu
                </h2>
                <a href="<?= base_url('auth/register'); ?>" class="button is-link">Daftar Gratis Yuk</a>
            </div>
        </div>
    </section>
    <section class="section container">
        <div class="columns is-centered is-variable is-8">
            <div class="column"
                style="min-height:219px;background-image:url('<?= base_url('assets/img'); ?>/frontpage/new/people_sit.jpg');background-size:contain; background-repeat:no-repeat; background-position:right">
                <h4 class="title is-4">1. Bikin Halamanmu</h4>
                <p style="margin-right:48px; background:#ffffff70; border-radius:8px">Daftar segera untuk memiliki
                    halaman kamu sendiri dan dapatkan link unik <strong>pinmy.link/milikmu</strong>.</p>
                <br>
            </div>
            <div class="column"
                style="min-height:219px;background-image:url('<?= base_url('assets/img'); ?>/frontpage/new/people_holdphone.jpg');background-size:contain; background-repeat:no-repeat; background-position:right">
                <h4 class="title is-4">2. Masukan Kontenmu</h4>
                <p style="margin-right:48px; background:#ffffff70; border-radius:8px">Masukan konten yang akan kamu
                    sajikan kepada audiens ke dalam halaman kamu. Perbarui konten secara berkala dengan mudah.</p><br>
            </div>
            <div class="column"
                style="min-height:219px;background-image:url('<?= base_url('assets/img'); ?>/frontpage/new/people_ok.jpg');background-size:contain; background-repeat:no-repeat; background-position:right">
                <h4 class="title is-4">3. Pasang di Bio-mu</h4>
                <p style="margin-right:48px; background:#ffffff70; border-radius:8px">Sematkan link unik
                    <strong>pinmy.link/milikmu</strong> di semua bio kanalmu, dan audiens akan mudah akses konten kamu.
                </p><br>
            </div>
        </div>
    </section>
    <section>
        <div>
        </div>
    </section>
    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                Copyright &copy;2020 <strong>Pinmy.link</strong>.<br>
                <span><a href="https://kb.pinmy.link/syarat-dan-ketentuan-layanan/">Syarat & Ketentuan
                        Layanan</a></span> | <span><a href="#">Kebijakan Privasi</a></span>
            </p>
        </div>
    </footer>
</body>

</html>

<script>
document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach(el => {
            el.addEventListener('click', () => {

                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
        });
    }

});
</script>