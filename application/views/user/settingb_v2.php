<section class="section" style="max-width: 600px; margin:auto">
    <?= $this->session->flashdata('message'); ?>
    <div class="container box has-background-white">
        <h1 class="title is-size-4">Settings > SEO</h1>
        <hr>
        <form action="<?= base_url('user/setting'); ?>" method="post">
            <div class="field">
                <label class="label">Meta Tags</label>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            Title
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="25" name="meta-title" type="text"
                            placeholder="John The Adventurer" value="">
                    </p>
                </div>
                <!--<p class="help is-danger">This username is invalid</p>-->
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            Description
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="25" name="meta-title" type="text"
                            placeholder="Happy to travel around the round, everyday is holiday." value="">
                    </p>
                </div>
                <!--<p class="help is-danger">This username is invalid</p>-->
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            Keywords
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="25" name="meta-title" type="text"
                            placeholder="traveling, vlog, holiday, backpacker, world tour" value="">
                    </p>
                </div>
                <!--<p class="help is-danger">This username is invalid</p>-->
            </div>
            <div class="field">
                <label class="label">Google Analytics</label>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            Tracking ID
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="16" name="ga-tracking-id" type="text"
                            placeholder="UA-xxxxxxxx-x" value="<?= $user['user_gtag'] ?>">
                    </p>
                </div>
                <!--<p class="help is-danger">This username is invalid</p>-->
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