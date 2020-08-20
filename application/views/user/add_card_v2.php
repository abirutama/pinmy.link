<section class="section" style="max-width: 600px; margin:auto">
    <?= $this->session->flashdata('message'); ?>
    <div class="container box has-background-white">
        <h1 class="title is-size-4">Add New Content</h1>
        <hr>
        <form action="<?= base_url('user/addcard'); ?>" method="post">
            <div class="field">
                <label class="label">Content Title</label>
                <div class="field">
                    <p class="control is-expanded">
                        <input class="input" maxlength="120" name="link-title" type="text"
                            placeholder="Link's Title Here" value="<?= set_value('link-title'); ?>" required>
                    </p>
                </div>
                <?= form_error('link-title', '<p class="help is-danger">', '</p>'); ?>
            </div>

            <div class="field">
                <label class="label">URL Destination</label>
                <div class="field">
                    <p class="control is-expanded">
                        <input class="input" name="link-destination" type="text"
                            placeholder="http://your-destinantion.com" value="<?= set_value('link-destination'); ?>" required>
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
                            placeholder="http://source-image.com/thumbnail.jpg" value="<?= set_value('link-thumbnail'); ?>">
                    </p>
                </div>
                <?= form_error('link-thumbnail', '<p class="help is-danger">', '</p>'); ?>
            </div>
            -->
            <hr>
            <div class="field is-grouped">
                <div class="buttons">
                    <button id="save-profile-button" class="button is-success">Submit</button>
                    <a href="<?= base_url('user') ?>" class="button is-outlined">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>