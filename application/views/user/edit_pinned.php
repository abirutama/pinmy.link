<section class="section" style="max-width: 600px; margin:auto">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user') ?>">Homepage</a></li>
            <li><a href="<?= base_url('user') ?>">My Link</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit Highlighted Links</a></li>
        </ul>
    </nav>
    <?= $this->session->flashdata('message'); ?>
    <div class="container box has-background-white">
        <h1 class="title is-size-4">Edit Highlighted Links</h1>
        <hr>
        <form action="<?= base_url('user/highlight'); ?>" method="post">
            <div class="field">
                <label class="label">Link 1</label>
                <div class="select is-fullwidth">
                    <p class="control is-expanded">
                        <select name="pinned[0]">
                        <option value="no_pin1">None</option>
                        <?php foreach($card as $cardItem){ ?>
                        <option value="<?= $cardItem['card_id']; ?>" <?php if($cardItem['card_id']===$pinItem[0]){echo ' selected';} ?> ><?= $cardItem['card_title']; ?></option>
                        <?php } ?>
                        </select>
                    </p>
                </div>
                <?= form_error('pinned[0]', '<p class="help is-danger">', '</p>'); ?>
            </div>

            <div class="field">
                <label class="label">Link 2</label>
                <div class="select is-fullwidth">
                    <p class="control is-expanded">
                        <select name="pinned[1]">
                        <option value="no_pin2">None</option>
                        <?php foreach($card as $cardItem){ ?>
                        <option value="<?= $cardItem['card_id']; ?>" <?php if($cardItem['card_id']===$pinItem[1]){echo ' selected';} ?> ><?= $cardItem['card_title']; ?></option>
                        <?php } ?>
                        </select>
                    </p>
                </div>
                <?= form_error('pinned[1]', '<p class="help is-danger">', '</p>'); ?>
            </div>

            <div class="field">
                <label class="label">Link 3</label>
                <div class="select is-fullwidth">
                    <p class="control is-expanded">
                        <select name="pinned[2]">
                        <option value="no_pin3">None</option>
                        <?php foreach($card as $cardItem){ ?>
                        <option value="<?= $cardItem['card_id']; ?>" <?php if($cardItem['card_id']===$pinItem[2]){echo ' selected';} ?> ><?= $cardItem['card_title']; ?></option>
                        <?php } ?>
                        </select>
                    </p>
                </div>
                <?= form_error('pinned[2]', '<p class="help is-danger">', '</p>'); ?>
            </div>

            <div class="field">
                <label class="label">Link 4</label>
                <div class="select is-fullwidth">
                    <p class="control is-expanded">
                        <select name="pinned[3]">
                        <option value="no_pin4">None</option>
                        <?php foreach($card as $cardItem){ ?>
                        <option value="<?= $cardItem['card_id']; ?>" <?php if($cardItem['card_id']===$pinItem[3]){echo ' selected';} ?> ><?= $cardItem['card_title']; ?></option>
                        <?php } ?>
                        </select>
                    </p>
                </div>
                <?= form_error('pinned[3]', '<p class="help is-danger">', '</p>'); ?>
            </div>
            <hr>
            <div class="field is-grouped">
                <div class="buttons">
                    <button id="save-profile-button" class="button is-success">Save Changes</button>
                    <a href="<?= base_url('user') ?>" class="button is-outlined">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>