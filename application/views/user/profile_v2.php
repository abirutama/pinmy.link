<?php
    $user_id = $this->session->userdata('ses_id');
?>
<section class="section" style="max-width: 600px; margin:auto">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user') ?>">Homepage</a></li>
            <li class="is-active"><a href="#" aria-current="page">Profile</a></li>
        </ul>
    </nav>
    <?= $this->session->flashdata('message'); ?>
    <div class="container box has-background-white">
        <h1 class="title is-size-4">My Profile</h1>
        <hr>
        <form action="<?= base_url('user/profile'); ?>" method="post">
            <div class="field">
                <label class="label">Twitter</label>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            twitter.com/
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="25" name="social-twitter" type="text"
                            placeholder="Your twitter's username" value="<?= scoup($social['social_twitter']); ?>">
                    </p>
                </div>
                <!--<p class="help is-danger">This username is invalid</p>-->
            </div>

            <div class="field">
                <label class="label">Facebook</label>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            facebook.com/
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="25" name="social-facebook" type="text"
                            placeholder="Your facebook's username" value="<?= scoup($social['social_facebook']); ?>">
                    </p>
                </div>
            </div>

            <div class="field">
                <label class="label">Instagram</label>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            instagram.com/
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="25" name="social-instagram" type="text"
                            placeholder="Your instagram's username" value="<?= scoup($social['social_instagram']); ?>">
                    </p>
                </div>
            </div>

            <hr>
            <div class="field is-grouped">
                <div class="buttons">
                    <div id="save-profile-button" class="button is-success">Save
                        Changes</div>
                    <a href="<?= base_url('user') ?>" class="button is-outlined">Cancel</a>
                </div>
            </div>
            <div id="save-profile-modal" class="modal">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Save any changes?</p>
                    </header>
                    <footer class="modal-card-foot">
                        <button class="button is-danger is-outlined">Save</button>
                        <div class="button save-profile-cancel is-light is-light">Cancel</div>
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