<section class="section" style="max-width: 600px; margin:auto">
    <?= $this->session->flashdata('message'); ?>
    <div class="container box has-background-white">
        <h1 class="title is-size-4">Edit Link</h1>
        <hr>
        <form action="<?= base_url('user/editcard/').$card['card_id']; ?>" method="post">
            <div class="field">
                <label class="label">Title</label>
                <div class="field">
                    <p class="control is-expanded">
                        <input class="input" maxlength="25" name="link-title" type="text"
                            placeholder="Link's Title Here" value="<?= scoup($card['card_title']); ?>" required>
                    </p>
                </div>
                <?= form_error('link-title', '<p class="help is-danger">', '</p>'); ?>
            </div>

            <div class="field">
                <label class="label">URL Destination</label>
                <div class="field">
                    <p class="control is-expanded">
                        <input class="input" maxlength="25" name="link-destination" type="text"
                            placeholder="http://your-destinantion.com" value="<?= scoup($card['card_url']); ?>" required>
                    </p>
                </div>
                <?= form_error('link-destination', '<p class="help is-danger">', '</p>'); ?>
            </div>

            <div class="field">
                <label class="label">URL Thumbnail (Optional)</label>
                <div class="field">
                    <p class="control is-expanded">
                        <input class="input" name="link-thumbnail" maxlength="25" type="text"
                            placeholder="http://source-image.com/thumbnail.jpg" value="<?= scoup($card['card_thumbnail']); ?>">
                    </p>
                </div>
                <?= form_error('link-thumbnail', '<p class="help is-danger">', '</p>'); ?>
            </div>
            <hr>
            <div class="field is-grouped">
                <div class="">
                    <button id="save-profile-button" class="button is-link">Submit</button>
                    <a href="<?= base_url('user') ?>" id="save-profile-button" class="button is-outlined">Cancel</a>
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