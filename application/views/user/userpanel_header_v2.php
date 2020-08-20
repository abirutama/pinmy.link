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
    <title>User Panel | Pinmy.link</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>
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
                    My Content
                </a>
                <a href="<?= base_url('user/setting/profile'); ?>" class="navbar-item <?php if($page=='setting'){ echo 'has-text-link'; } ?>">
                    Settings
                </a>
                <!--
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
                -->
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <?php if($this->session->userdata('ses_role')==1){ ?>
                        <a href="<?= base_url('admin/'); ?>" class="button is-link is-outlined">
                            Go to Admin Console
                        </a>
                        <?php } ?>
                        <button id="logout-button" class="button is-danger is-outlined">
                            Sign out
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="notification is-info" style="margin:0">
        Put this to your social media's bio: <a target="_blank"
            href="<?= scoup(base_url('/@'.$user['user_name'])); ?>">pinmy.link/@<?= scoup($user['user_name']); ?></a>
    </div>