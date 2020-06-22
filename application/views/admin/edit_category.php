<section class="section" style="max-width: 600px; margin:auto">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="<?= base_url('admin') ?>">Dashboard</a></li>
            <li><a href="<?= base_url('admin/list/category') ?>">List Category</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit Category</a></li>
        </ul>
    </nav>
    <?= $this->session->flashdata('message'); ?>
    <div class="container box has-background-white">
        <h1 class="title is-size-4">Edit Category</h1>
        <hr>
        <form action="" method="post">
            <div class="field">
                <label class="label">Category Name</label>
                <div class="field">
                    <p class="control is-expanded">
                        <input class="input" maxlength="120" name="cat-name" type="text"
                            placeholder="Foods / Traveling / Holiday" value="<?= $category['category_name']; ?>" required>
                    </p>
                </div>
                <?= form_error('cat-name', '<p class="help is-danger">', '</p>'); ?>
            </div>

            <div class="field">
                <label class="checkbox">
                    is Active?
                    <input name="cat-status" type="checkbox" <?php if($category['is_active']==1){echo ' checked';} ?>>
                </label>
            </div>
            <hr>
            <div class="field is-grouped">
                <div class="buttons">
                    <a id="save-confirm-button" class="button is-success">Save Changes</a>
                    <a href="<?= base_url('admin/list/category') ?>" class="button is-outlined">Cancel</a>
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