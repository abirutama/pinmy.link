<!DOCTYPE html>
<html>

<head>
    <title>The Best Way to Create Sitemap Across Your Content And Social Media | Pin My Link | Pinmy.link</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="How to make an easy sitemap across your content and social media. Easy to register, find out now!">
    <meta name="robots" content="follow, index">

    <link rel=”canonical” href=”https://pinmy.link/” />
    <link rel=”canonical” href=”https://www.pinmy.link/” />
    <link rel=”canonical” href=”http://pinmy.link/” />
    <link rel=”canonical” href=”http://www.pinmy.link/” />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <!--<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>-->
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://pinmy.link">
                <img src="<?= base_url('assets'); ?>/img/layout/footer.png"> <strong class="has-text-gray">Pinmy.link</strong>
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
            <!--
                <a class="navbar-item">
                    Home
                </a>

                <a class="navbar-item">
                    Documentation
                </a>

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
                            Go to User Panel
                        </a>
                        <?php
                            }else{
                        ?>
                        <a href="<?= base_url('auth/register'); ?>" class="button is-link is-outlined">
                            Sign up
                        </a>
                        <a href="<?= base_url('auth'); ?>" class="button is-link is-outlined">
                            Log in
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
        style="background-image:url('<?= base_url('assets/img'); ?>/frontpage/new/untitled.svg');background-size:cover">
        <div class="hero-body" style="background: rgb(255,255,255); background: linear-gradient(115deg, rgba(255,255,255,0.9) 40%, rgba(255,255,255,0.5) 100%);">
            <div class="container">
                <h1 class="title is-1 has-text-weight-bold" style="text-shadow: 1px 1px 3px #fff;">
                    Navigate Your Content
                </h1>
                <h2 class="subtitle" style="text-shadow: 1px 1px 3px #fff;">
                    It's like a map, one link to go to anywhere!
                </h2>
                <a href="<?= base_url('auth/register'); ?>" class="button is-large is-link">Free Register Here</a>
            </div>
        </div>
    </section>
    <section class="section container">
        <div class="columns is-centered is-variable is-8">
            <div class="column">
                <h4 class="title is-4">Create Your Page</h4>
                <p>Create your own page by registering a free account and choose your username as your page address.</p>
                <br>
            </div>
            <div class="column">
                <h4 class="title is-4">Update Your Content</h4>
                <p>Update your page by adding content to it. Write a title, put an article link, and the thumbnail image
                    from related content.</p><br>
            </div>
            <div class="column">
                <h4 class="title is-4">Embed Your Link</h4>
                <p>If you are ready, embed the only your magic link to all your social account's bio.</p><br>
            </div>

        </div>
    </section>
    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                Copyright &copy;2020 <strong>Pinmy.link</strong>. Powered by <strong>Bulma</strong> and
                <strong>Undraw.co</strong>. The website content
                is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
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