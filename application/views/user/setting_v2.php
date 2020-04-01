<link rel="stylesheet" href="<?=base_url('assets/vendor/owl-carousel/')?>owl.carousel.min.css">
<link rel="stylesheet" href="<?=base_url('assets/vendor/owl-carousel/')?>owl.theme.default.min.css">

<style>
[type='radio'].thumbnail-select {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
    border-radius: 8px;
}

/* IMAGE STYLES */
[type='radio'].thumbnail-select+img {
    cursor: pointer;
    border-radius: 8px;
}

/* CHECKED STYLES */
[type='radio'].thumbnail-select:checked+img {
    border: 2px solid #f00;
    border-radius: 8px;
}
</style>
<section class="section" style="max-width: 600px; margin:auto">
    <?= $this->session->flashdata('message'); ?>
    <div class="container box has-background-white">
        <h1 class="title is-size-4">Settings > Theme</h1>
        <hr>
        <form action="<?= base_url('user/setting'); ?>" method="post">
            <h1 class="label">Cover Image</h1>
            <!-- Set up your HTML -->
            <div id="carousel1" class="owl-carousel container">
                <?php 
                    if($cover){
                        foreach($cover as $coverList){
                ?>
                <div>
                    <label data-hash="<?= $coverList['cover_id'] ?>">
                        <input type="radio" class="thumbnail-select" name="setting-cover"
                            value="<?= $coverList['cover_id'] ?>"
                            <?php if($user['user_cover']==$coverList['cover_id']){ echo 'checked'; } ?>>
                        <img class="image round-8"
                            style="width:360; height:202px; background-size:cover; <?= "background-image:url('".base_url('assets/img/cover/').$coverList['cover_thumbnail']."');" ?>">
                    </label>
                    Credit: <a href="<?= $coverList['cover_credit_url'] ?>"
                        target="_blank"><?= $coverList['cover_credit']; ?></a>
                </div>
                <?php
                        }
                    }
                ?>
            </div>
            <hr>
            <h1 class="label">Layout Template</h1>
            <div id="carousel2" class="owl-carousel container">
                <?php 
                    if($layout){
                        foreach($layout as $layoutList){
                ?>
                <div>
                    <label data-hash="<?= $layoutList['layout_id'] ?>">
                        <input type="radio" class="thumbnail-select" name="setting-layout" value="<?= $layoutList['layout_id'] ?>" <?php if($user['user_layout']==$layoutList['layout_id']){ echo 'checked'; } ?>>
                        <img class="image round-8" src="<?= base_url('assets/img/layout/').$layoutList['layout_thumbnail'] ?>"
                            alt="<?= $layoutList['layout_name'] ?>" style="height:200px; width:auto">
                    </label>
                    <p><?= $layoutList['layout_name'] ?> View</p>
                </div>
                <?php 
                    }
                }
                ?>
            </div>
            <hr>
            <h1 class="label">Theme</h1>
            <div id="carousel3" class="owl-carousel container">
                <div>
                    <label data-hash="1">
                        <input type="radio" class="thumbnail-select" name="setting-theme" value="small">
                        <img class="image round-8" src="https://bulma.io/images/placeholders/320x480.png"
                            alt="Placeholder image" style="height:200px; width:auto">
                    </label>
                    <p>Light Theme</p>
                </div>
            </div>
            <hr>
            <div class="field is-grouped">
                <div class="">
                    <div id="save-profile-button" class="button is-link">Save
                        Changes</div>
                </div>
            </div>
            <div id="save-profile-modal" class="modal">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Save any changes?</p>
                    </header>
                    <footer class="modal-card-foot">
                        <button class="button is-success">Save</button>
                        <div class="button save-profile-cancel is-outlined has-background-light">Cancel</div>
                    </footer>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
//Modal Save Profile
var html_tag = document.documentElement;
var save_button = document.querySelector('#save-profile-button');
var save_modal = document.querySelector('#save-profile-modal');
var save_cancel = document.querySelector('.save-profile-cancel');

save_button.onclick = function() {
    save_modal.classList.toggle('is-active');
    html_tag.classList.toggle('is-clipped');
}

save_cancel.onclick = function() {
    save_modal.classList.toggle('is-active');
    html_tag.classList.toggle('is-clipped');
}
</script>
<script src="<?=base_url('assets/vendor/owl-carousel/')?>jquery.min.js"></script>
<script src="<?=base_url('assets/vendor/owl-carousel/')?>owl.carousel.min.js"></script>
<script src="<?=base_url('assets/vendor/owl-carousel/')?>jquery.mousewheel.min.js"></script>
<script>
$(document).ready(function() {
    var owl = $('#carousel1');
    owl.owlCarousel({
        items: 2,
        stagePadding: 20,
        responsiveClass: true,
        dots:false,
        nav: false,
        loop: false,
        center: false,
        margin: 8,
        URLhashListener: true,
        startPosition: 'URLHash',
        responsive: {
            // breakpoint from 0 up
            0: {
                items: 1
            },
            // breakpoint from 480 up
            480: {
                items: 2
            }
        }
    });
    var owl2 = $('#carousel2');
    owl2.owlCarousel({
        items: 2,
        stagePadding: 20,
        responsiveClass: true,
        nav: false,
        loop: false,
        center: false,
        margin: 8,
        URLhashListener: true,
        startPosition: 'URLHash',
        responsive: {
            // breakpoint from 0 up
            0: {
                items: 2
            },
            // breakpoint from 480 up
            480: {
                items: 3
            }
        }
    });
    var owl3 = $('#carousel3');
    owl3.owlCarousel({
        items: 2,
        stagePadding: 20,
        responsiveClass: true,
        nav: false,
        loop: false,
        center: false,
        margin: 8,
        URLhashListener: true,
        startPosition: 'URLHash',
        responsive: {
            // breakpoint from 0 up
            0: {
                items: 2
            },
            // breakpoint from 480 up
            480: {
                items: 3
            }
        }
    });
    owl.on('mousewheel', '.owl-stage', function(e) {
        if (e.deltaY > 0) {
            owl.trigger('next.owl');
        } else {
            owl.trigger('prev.owl');
        }
        e.preventDefault();
    });
    owl2.on('mousewheel', '.owl-stage', function(e) {
        if (e.deltaY > 0) {
            owl2.trigger('next.owl');
        } else {
            owl2.trigger('prev.owl');
        }
        e.preventDefault();
    });
    owl3.on('mousewheel', '.owl-stage', function(e) {
        if (e.deltaY > 0) {
            owl3.trigger('next.owl');
        } else {
            owl3.trigger('prev.owl');
        }
        e.preventDefault();
    });
});
</script>