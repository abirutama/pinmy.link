<!doctype html>
<html class="has-background-light">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90789114-4"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-90789114-4');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Console | Pinmy.link</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha256-aa0xaJgmK/X74WM224KMQeNQC2xYKwlAt08oZqjeF0E=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha256-TQq84xX6vkwR0Qs1qH5ADkP+MvH0W+9E7TdHJsoIQiM=" crossorigin="anonymous"></script>
    <style>
    .cupad {
        padding: 1em
    }
    .round-8{
        border-radius:8px
    }
    </style>
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation" style="border-top:6px #3298dc solid">
        <div class="navbar-brand">
            <span class="navbar-item has-text-weight-bold">
                Admin Console
            </span>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a href="<?= base_url('admin/'); ?>" class="navbar-item <?php if($page=='dashboard'){ echo 'has-text-link'; } ?>">
                    Dashboard
                </a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link <?php if($page=='user'){ echo 'has-text-link'; } ?>">
                        User
                    </a>
                    <div class="navbar-dropdown">
                        <a href="<?= base_url('admin/user/'); ?>" class="navbar-item">
                            List User
                        </a>
                        <hr class="navbar-divider">
                        <a href="<?= base_url('admin/user/add'); ?>" class="navbar-item">
                            Add New User
                        </a>
                    </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link <?php if($page=='setting'){ echo 'has-text-link'; } ?>">
                        Category
                    </a>
                    <div class="navbar-dropdown">
                        <a href="<?= base_url('admin/user/'); ?>" class="navbar-item">
                            List Category
                        </a>
                        <hr class="navbar-divider">
                        <a href="<?= base_url('admin/user/add'); ?>" class="navbar-item">
                            Add New Category
                        </a>
                    </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link <?php if($page=='user'){ echo 'has-text-link'; } ?>">
                        Sponsor
                    </a>
                    <div class="navbar-dropdown">
                        <a href="<?= base_url('admin/user/'); ?>" class="navbar-item">
                            List Sponsor
                        </a>
                        <hr class="navbar-divider">
                        <a href="<?= base_url('admin/user/add'); ?>" class="navbar-item">
                            Add New Sponsor
                        </a>
                    </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Help
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            FAQ
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            Support Us
                        </a>
                    </div>
                </div>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <button id="logout-button" class="button is-danger is-outlined">
                            Sign out
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>