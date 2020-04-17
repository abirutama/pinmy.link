<section class="section" style="max-width: 600px; margin:auto">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user') ?>">Homepage</a></li>
            <li><a href="<?= base_url('user') ?>">My Link</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit Pinned Link</a></li>
        </ul>
    </nav>
    <?= $this->session->flashdata('message'); ?>
    <div class="container box has-background-white">
        <h1 class="title is-size-4">Edit Pinned Link</h1>
        <hr>
        <form action="<?= base_url('user/pinned'); ?>" method="post">
            <div class="field">
                <label class="label">Link 1</label>
                <div class="select is-fullwidth">
                    <p class="control is-expanded">
                        <select name="pinned[]">
                        <option value="null">None</option>
                        <?php foreach($card as $cardItem){ ?>
                        <option value="<?= $cardItem['card_id']; ?>" <?php if($cardItem['card_id']===$pinItem[0]){echo ' selected';} ?> ><?= $cardItem['card_title']; ?></option>
                        <?php } ?>
                        </select>
                    </p>
                </div>
                <?= form_error('link-title', '<p class="help is-danger">', '</p>'); ?>
            </div>

            <div class="field">
                <label class="label">Link 2</label>
                <div class="select is-fullwidth">
                    <p class="control is-expanded">
                        <select name="pinned[]">
                        <option value="null">None</option>
                        <?php foreach($card as $cardItem){ ?>
                        <option value="<?= $cardItem['card_id']; ?>" <?php if($cardItem['card_id']===$pinItem[1]){echo ' selected';} ?> ><?= $cardItem['card_title']; ?></option>
                        <?php } ?>
                        </select>
                    </p>
                </div>
                <?= form_error('link-destination', '<p class="help is-danger">', '</p>'); ?>
            </div>

            <div class="field">
                <label class="label">Link 3</label>
                <div class="select is-fullwidth">
                    <p class="control is-expanded">
                        <select name="pinned[]">
                        <option value="null">None</option>
                        <?php foreach($card as $cardItem){ ?>
                        <option value="<?= $cardItem['card_id']; ?>" <?php if($cardItem['card_id']===$pinItem[2]){echo ' selected';} ?> ><?= $cardItem['card_title']; ?></option>
                        <?php } ?>
                        </select>
                    </p>
                </div>
                <?= form_error('link-thumbnail', '<p class="help is-danger">', '</p>'); ?>
            </div>
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