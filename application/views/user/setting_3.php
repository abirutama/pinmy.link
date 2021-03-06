<section class="section" style="max-width: 600px; margin:auto">
    <?= $this->session->flashdata('message'); ?>
    <div class="container box has-background-white">
        <div class="tabs is-centered">
            <ul>
                <li><a href="<?= base_url('user/setting/profile'); ?>">Address</a></li>
                <li><a href="<?= base_url('user/setting/website'); ?>">Website</a></li>
                <li class="is-active"><a href="<?= base_url('user/setting/appearance'); ?>">Profile</a></li>
                <li><a href="<?= base_url('user/setting/seo'); ?>">Meta Tag</a></li>
            </ul>
        </div>
        <?php echo form_open_multipart('user/setting/appearance');?>
        <div class="field">
            <label class="label">Profile Avatar</label>
            <figure class="image is-128x128">
                <?php
                        if($appearance['appearance_ava']==null){ 
                            $ava_src = 'https://via.placeholder.com/128/f7b780/fffffff/?text='.strtoupper(substr($user['user_name'],0,1));
                        }else{
                            $ava_src = base_url('assets/img/avatar/').$appearance['appearance_ava'];
                        }
                    ?>
                <img id="avatar-img" style="width:128px; height:128px;" class="" src="<?= $ava_src; ?>">
            </figure>
            <div class="file" style="margin-top:8px; max-width:120px">
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
        <br>
        <div class="field is-grouped">
            <div class="buttons">
                <button name="update-avatar" class="button is-success">Update Avatar</button>
            </div>
        </div>
        </form>
        <hr>
        <?php echo form_open_multipart('user/setting/appearance');?>
        <div class="field">
            <label class="label">Cover Image</label>
            <figure class="image is-16by9" style="margin:auto;">
                <?php
                        if($appearance['appearance_cover']==null){ 
                            $cover_src = base_url('assets/img/layout/').'bg1.webp';
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
        <br>
        <div class="field is-grouped">
            <div class="buttons">
                <button name="update-cover" class="button is-success">Update Cover</button>
            </div>
        </div>
        </form>
    </div>
</section>