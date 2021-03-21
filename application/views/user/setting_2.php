<section class="section" style="max-width: 600px; margin:auto">
    <?= $this->session->flashdata('message'); ?>
    <div class="container box has-background-white">
        <div class="tabs is-centered">
            <ul>
                <li><a href="<?= base_url('user/setting/profile'); ?>">Address</a></li>
                <li class="is-active"><a href="<?= base_url('user/setting/website'); ?>">Website</a></li>
                <li><a href="<?= base_url('user/setting/appearance'); ?>">Profile</a></li>
                <li><a href="<?= base_url('user/setting/seo'); ?>">Meta Tag</a></li>
            </ul>
        </div>
        <form action="<?= base_url('user/setting/website'); ?>" method="post">
        <div class="field">
                <label class="label">Other Website (Optional)</label>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            https://
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="64" name="other-website" type="text"
                            placeholder="yourdomain.com ( without https:// )" value="<?= scoup($social['other_website']); ?>">
                    </p>
                </div>
            </div>
            <hr>
            <div class="field">
                <label class="label">E-Commerce (Optional)</label>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            bukalapak.com/u/
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="64" name="ecom-bukalapak" type="text"
                            placeholder="username" value="<?= scoup($social['ecom_bukalapak']); ?>">
                    </p>
                </div>
            </div>
            <div class="field">
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            lazada.co.id/shop/
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="64" name="ecom-lazada" type="text"
                            placeholder="username" value="<?= scoup($social['ecom_lazada']); ?>">
                    </p>
                </div>
            </div>
            <div class="field">
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            shopee.com/
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="64" name="ecom-shopee" type="text"
                            placeholder="username" value="<?= scoup($social['ecom_shopee']); ?>">
                    </p>
                </div>
            </div>
            <div class="field">
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            tokopedia.com/
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="64" name="ecom-tokopedia" type="text"
                            placeholder="username" value="<?= scoup($social['ecom_tokopedia']); ?>">
                    </p>
                </div>
            </div>
            <hr>
            <div class="field">
            <label class="label">Social Media (Optional)</label>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            twitter.com/
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="64" name="social-twitter" type="text"
                            placeholder="username" value="<?= scoup($social['social_twitter']); ?>">
                    </p>
                </div>
            </div>

            <div class="field">
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            facebook.com/
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="64" name="social-facebook" type="text"
                            placeholder="username" value="<?= scoup($social['social_facebook']); ?>">
                    </p>
                </div>
            </div>

            <div class="field">
                
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            instagram.com/
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="64" name="social-instagram" type="text"
                            placeholder="username" value="<?= scoup($social['social_instagram']); ?>">
                    </p>
                </div>
            </div>

            <hr>
            <div class="field is-grouped">
                <div class="buttons">
                    <div id="save-profile-button" class="button is-success">Save
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