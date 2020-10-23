<section class="section" style="max-width: 600px; margin:auto">
    <?= $this->session->flashdata('message'); ?>
    <div class="container box has-background-white">
        <h1 class="title is-size-4">Edit Content</h1>
        <hr>
        <form action="<?= base_url('user/editcard/').$card['card_id']; ?>" method="post">
            <div class="field">
                <label class="label">Content Title</label>
                <div class="field">
                    <p class="control is-expanded">
                        <input class="input" maxlength="120" name="link-title" type="text"
                            placeholder="Link's Title Here" value="<?= scoup($card['card_title']); ?>" required>
                    </p>
                </div>
                <?= form_error('link-title', '<p class="help is-danger">', '</p>'); ?>
            </div>

            <div class="field">
                <label class="label">URL Destination</label>
                <div class="field">
                    <p class="control is-expanded">
                        <input class="input" name="link-destination" type="text"
                            placeholder="http://your-destinantion.com" value="<?= scoup($card['card_url']); ?>" required>
                    </p>
                </div>
                <?= form_error('link-destination', '<p class="help is-danger">', '</p>'); ?>
            </div>
            <!--
            <div class="field">
                <label class="label">URL Thumbnail (Optional)</label>
                <div class="field">
                    <p class="control is-expanded">
                        <input class="input" name="link-thumbnail" type="text"
                            placeholder="http://source-image.com/thumbnail.jpg" value="<?= scoup($card['card_thumbnail']); ?>">
                    </p>
                </div>
                <?= form_error('link-thumbnail', '<p class="help is-danger">', '</p>'); ?>
            </div>
            -->
            <hr>
            <div class="field is-grouped">
                <div class="buttons">
                    <a id="save-confirm-button" class="button is-success">Save Changes</a>
                    <a href="<?= base_url('user') ?>" class="button is-outlined">Cancel</a>
                    <a id="save-delete-button" class="button is-danger is-outlined">Delete</a>
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
            <div id="save-delete-modal" class="modal">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Are you sure want to delete?</p>
                    </header>
                    <footer class="modal-card-foot">
                        <a href="<?= base_url('user/deletecard/').$card['card_id']; ?>" class="button is-danger is-outlined">Delete</a>
                        <div class="button save-delete-cancel is-light is-light">Cancel</div>
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

var delete_button = document.querySelector('#save-delete-button');
var delete_modal = document.querySelector('#save-delete-modal');
var delete_cancel = document.querySelector('.save-delete-cancel');

save_button.onclick = function() {
    save_modal.classList.toggle('is-active');
    html_tag.classList.toggle('is-clipped');
}

delete_button.onclick = function() {
    delete_modal.classList.toggle('is-active');
    html_tag.classList.toggle('is-clipped');
}

save_cancel.onclick = function() {
    save_modal.classList.toggle('is-active');
    html_tag.classList.toggle('is-clipped');
}

delete_cancel.onclick = function() {
    delete_modal.classList.toggle('is-active');
    html_tag.classList.toggle('is-clipped');
}
</script>