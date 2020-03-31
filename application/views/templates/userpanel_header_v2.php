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
    <title>User Panel | Pinmy.link</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
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
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <span class="navbar-item has-text-weight-bold">
                User Panel
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
                <a href="<?= base_url('user/'); ?>" class="navbar-item <?php if($page=='link'){ echo 'has-text-link'; } ?>">
                    My Links
                </a>
                <a href="<?= base_url('user/profile'); ?>" class="navbar-item <?php if($page=='profile'){ echo 'has-text-link'; } ?>">
                    Profile
                </a>
                <a href="<?= base_url('user/setting'); ?>" class="navbar-item <?php if($page=='setting'){ echo 'has-text-link'; } ?>">
                    Settings
                </a>
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
                            Log out
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="notification is-warning" style="margin:0">
        Embed this link to your social media's bio: <a style=""
            href="<?= scoup(base_url('/@'.$user['user_name'])); ?>">pinmy.link/@<?= scoup($user['user_name']); ?></a>
    </div>