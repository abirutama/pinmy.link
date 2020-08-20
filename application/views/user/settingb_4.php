<section class="section" style="max-width: 600px; margin:auto">
    <?= $this->session->flashdata('message'); ?>
    <div class="container box has-background-white">
    <div class="tabs is-centered">
  <ul>
    <li><a href="<?= base_url('user/setting/profile'); ?>">Profile</a></li>
    <li><a href="<?= base_url('user/setting/website'); ?>">Websites</a></li>
    <li><a href="<?= base_url('user/setting/appearance'); ?>">Theme</a></li>
    <li class="is-active"><a href="<?= base_url('user/setting/seo'); ?>">SEO</a></li>
  </ul>
</div>
        <form action="<?= base_url('user/setting/seo'); ?>" method="post">
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
                            placeholder="UA-xxxxxxxx-x" value="<?= scoup($seo['gtag_id']); ?>">
                    </p>
                </div>
            </div>
            <div class="field">
                <label class="label">Meta</label>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            Title
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="60" name="meta-title" type="text"
                            placeholder="John The Adventurer" value="<?= scoup($seo['meta_title']); ?>">
                    </p>
                </div>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            Description
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="160" name="meta-description" type="text"
                            placeholder="Welcome to the adventure page. On my page, i will show you how to good at traveling and what is important to prepare before traveling." value="<?= scoup($seo['meta_description']); ?>">
                    </p>
                </div>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            Keywords
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="160" name="meta-keyword" type="text"
                            placeholder="traveling, vlog, holiday, backpacker, world tour" value="<?= scoup($seo['meta_keyword']); ?>">
                    </p>
                </div>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            Robots
                        </a>
                    </p>
                    <p class="control is-expanded">
                    <div class="select is-fullwidth">
                        <select name="meta-robot">
                            <option value="0" <?php if($seo['meta_robot']==0){ echo 'selected'; } ?> >Noindex, Nofollow</option>
                            <option value="1" <?php if($seo['meta_robot']==1){ echo 'selected'; } ?> >Index, Follow</option>
                        </select>
                    </div>
                    </p>
                </div>
                <!--<p class="help is-danger">This username is invalid</p>-->
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            Adult Content?
                        </a>
                    </p>
                    <p class="control is-expanded">
                    <div class="select is-fullwidth">
                        <select name="meta-rating">
                            <option value="0" <?php if($seo['meta_rating']==0){ echo 'selected'; } ?> >No</option>
                            <option value="1" <?php if($seo['meta_rating']==1){ echo 'selected'; } ?> >Yes </option>
                        </select>
                    </div>
                    </p>
                </div>
                <!--<p class="help is-danger">This username is invalid</p>-->
            </div>
            <hr>
            <div class="field is-grouped">
                <div class="buttons">
                    <a id="save-confirm-button" class="button is-success">Save Changes</button>
                    <a href="<?= base_url('user') ?>" class="button is-outlined">Cancel</a>
                </div>
            </div>
            <div id="save-confirm-modal" class="modal">
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
//Modal Save
var html_tag = document.documentElement;
var save_button = document.querySelector('#save-confirm-button');
var save_modal = document.querySelector('#save-confirm-modal');
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