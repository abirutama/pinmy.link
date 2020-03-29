<!-- Begin Page Content -->
<div class="container-fluid col-sm-10 col-md-8 col-lg-5 mb-5">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><i class="far fa-fw fa-user-circle"></i> My Profile</h1>
<?= $this->session->flashdata('message'); ?>
<div class="list-group">
	<div class="input-group mb-3">
    <span class="mr-2 font-weight-bolder text-primary">My Page: </span><a href="https://pinmy.link/a1/u/<?= scoup($user['user_name']); ?>" target="_blank" id="btn-share" title="Click to Copy" class="" data-clipboard-text="https://pinmy.link/a1/u/<?= scoup($user['user_name']); ?>">https://pinmy.link/a1/u/<?= scoup($user['user_name']); ?></a>
	</div>
    <form method="post" action="<?= base_url('user/profile') ?>">
        <label for="inputAddress">Theme Settings:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Theme</span>
            </div>
            <select class="form-control" name="profile-theme">
            <?php foreach ($theme as $listTheme): ?>
                <option value="<?= $listTheme['theme_id']; ?>" <?php if($user['user_theme']==$listTheme['theme_id']){ echo 'selected';} ?>><?= $listTheme['theme_name']; ?></option>
            <?php endforeach ?>
            </select>
        </div>
        <div class="input-group mt-2 mb-4">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Layout</span>
            </div>
            <select class="form-control" name="profile-layout">
            <?php foreach ($layout as $listLayout): ?>
                <option value="<?= $listLayout['layout_id']; ?>" <?php if($user['user_layout']==$listLayout['layout_id']){ echo 'selected';} ?> ><?= $listLayout['layout_name']; ?> View</option>
            <?php endforeach ?>
            </select>
        </div>
        <?php
            if($social){
                $value_twitter = $social['social_twitter'];
                $value_facebook = $social['social_facebook'];
                $value_instagram = $social['social_instagram'];
                $value_snapchat = $social['social_snapchat'];
                $value_youtube = $social['social_youtube'];
            }else{
                $value_twitter = '';
                $value_facebook = '';
                $value_instagram = '';
                $value_snapchat = '';
                $value_youtube = '';
            }
        ?>
        <label for="inputAddress">Social Media: </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fab fa-fw fa-twitter"></i></div>
            </div>
            <input type="text" name="social-twitter" class="form-control" id="inlineFormInputGroup" placeholder="Just type your username" value="<?= scoup($value_twitter); ?>">
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fab fa-fw fa-facebook-f"></i></div>
            </div>
            <input type="text" name="social-facebook" class="form-control" id="inlineFormInputGroup" placeholder="Just type your username" value="<?= scoup($value_facebook); ?>">
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fab fa-fw fa-instagram"></i></div>
            </div>
            <input type="text" name="social-instagram" class="form-control" id="inlineFormInputGroup" placeholder="Just type your username" value="<?= scoup($value_instagram); ?>">
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fab fa-fw fa-snapchat-ghost"></i></div>
            </div>
            <input type="text" name="social-snapchat" class="form-control" id="inlineFormInputGroup" placeholder="Just type your username" value="<?= scoup($value_snapchat); ?>">
        </div>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fab fa-fw fa-youtube"></i></div>
            </div>
            <input type="text" name="social-youtube" class="form-control" id="inlineFormInputGroup" placeholder="Paste your channel url" value="<?= scoup($value_youtube); ?>">
        </div>
        <div class="mt-5">
            <a href="#saveprofile" class="btn btn-primary btn-block" data-toggle="modal" data-target="#saveProfileModal">Save Changes</a>
            <a href="<?= base_url('user') ?>" class="btn btn-secondary btn-block">Back to My Cards</a>
        </div>
        <div class="modal fade" id="saveProfileModal" tabindex="-1" role="dialog" aria-labelledby="ModalSaveProfile" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalSaveProfile">Save Any Changes?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Save" below if you are sure to save any profile changes.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-outline-success">Save</button>
            </div>
            </div>
        </div>
        </div>
        
    </form>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url('assets/') ?>js/clipboard.min.js"></script>
<script type="text/javascript">
	var btn = document.getElementById('btn-share');
    var clipboard = new ClipboardJS(btn);
    clipboard.on('success', function(e) {
        console.log(e);
    });
    clipboard.on('error', function(e) {
        console.log(e);
    });
</script>



