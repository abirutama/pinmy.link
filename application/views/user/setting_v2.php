<section class="section" style="max-width: 600px; margin:auto">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user') ?>">Homepage</a></li>
            <li class="is-active"><a href="#">Settings</a></li>
            <li class="is-active"><a href="#" aria-current="page">Appearance</a></li>
        </ul>
    </nav>
    <?= $this->session->flashdata('message'); ?>
    <div class="container box has-background-white">
        <h1 class="title is-size-4">Settings > Appearance</h1>
        <hr>
        <?php echo form_open_multipart('user/setting/appearance');?>
            <div class="field">
                <label class="label">Profile Avatar</label>
                <figure class="image is-128x128" style="margin:auto;">
                    <?php
                        if($appearance['appearance_ava']==null){ 
                            $ava_src = 'https://via.placeholder.com/128/f7b780/fffffff/?text='.strtoupper(substr($user['user_name'],0,1));
                        }else{
                            $ava_src = base_url('assets/img/avatar/').$appearance['appearance_ava'];
                        }
                    ?>
                    <img id="avatar-img" style="width:128px; height:128px;" class="is-rounded" src="<?= $ava_src; ?>">
                </figure>
                <div class="file" style="margin:auto; margin-top:8px; max-width:120px">
                    <label class="file-label">
                        <input id="avatar-input" class="file-input" type="file" name="avatar-input">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <spanclass="file-label">
                                Browse...
                            </span>
                        </span>
                    </label>
                </div>
            </div>
            <p class="help is-danger">*Maximum file size: 300 kb</p>
            <p class="help is-danger">*Allowed image extension: jpg & jpeg</p>
            <p class="help is-danger">*Image resolution will be shrinked to 128x128 pixels (1:1 ratio)</p>
            <hr>
            <!-- 
            <div class="field">
                <label class="label">Cover Image</label>
                <figure class="image is-16by9" style="margin:auto;">
                    <?php
                        if($appearance['appearance_cover']==null){ 
                            $cover_src = base_url('assets/img/layout/').'bg1.jpg';
                        }else{
                            $cover_src = base_url('assets/img/cover/').$appearance['appearance_cover'];
                        }
                    ?>
                    <img id="cover-img" class="image" src="<?= $cover_src; ?>">
                </figure>
                <div class="file" style="margin-top:8px; max-width:160.63px">
                    <label class="file-label">
                        <input id="cover-input" class="file-input" type="file" name="cover-input">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Browse...
                            </span>
                        </span>
                    </label>
                </div>
            </div>
            <p class="help is-danger">*Maximum file size: 500 kb</p>
            <p class="help is-danger">*Allowed image extension: jpg & jpeg</p>
            <p class="help is-danger">*Image resolution is 640x230 pixels</p>
            <hr>
            THIS FEATURE UNDER DEVELOPMENT
            <div class="field">
                <label class="label">Text Color</label>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            #
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="160" name="text-color-input" type="text" placeholder="000000"
                            value="">
                    </p>
                </div>
                <label class="label">Accent Color</label>
                <div class="field has-addons">
                    <p class="control">
                        <a class="button is-static" style="justify-content:left;">
                            #
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" maxlength="160" name="accent-color-input" type="text" placeholder="f7b780"
                            value="">
                    </p>
                </div>
            </div>
            <hr>
            -->
            <div class="field is-grouped">
                <div class="buttons">
                    <button id="save-confirm-button" class="button is-success">Save Changes</button>
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
//Modal Save Setting
var html_tag = document.documentElement;
var save_button = document.querySelector('#save-setting-button');
var save_modal = document.querySelector('#save-setting-modal');
var save_cancel = document.querySelector('.save-setting-cancel');

save_button.onclick = function() {
    save_modal.classList.toggle('is-active');
    html_tag.classList.toggle('is-clipped');
}

save_cancel.onclick = function() {
    save_modal.classList.toggle('is-active');
    html_tag.classList.toggle('is-clipped');
}
</script>