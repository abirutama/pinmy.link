<!-- Begin Page Content -->
<div class="container-fluid col-sm-10 col-md-8 col-lg-5 mb-5">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-file-alt"></i> New Card</h1>

<div class="list-group">
<form method="post" action="<?= base_url('user/addcard') ?>">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-fw fa-heading"></i></span>
        </div>
        <input type="text" class="form-control" id="card-title" name="card-title" value="<?= set_value('card-title'); ?>" placeholder="Title goes here">
    </div>
    <?= form_error('card-title', '<small class="text-danger">', '</small>'); ?>
    <div class="input-group mt-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-fw fa-link"></i></span>
        </div>
        <input type="url" class="form-control" id="card-url" name="card-url" value="<?= set_value('card-url'); ?>" placeholder="http://content-url">
    </div>
    <?= form_error('card-url', '<small class="text-danger">', '</small>'); ?>
    <div class="input-group mt-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-fw fa-image"></i></span>
        </div>
        <input type="url" class="form-control" id="card-thumbnail" name="card-thumbnail" value="<?= set_value('card-thumbnail'); ?>" placeholder="http://image-url (optional)">
    </div>
    <?= form_error('card-thumbnail', '<small class="text-danger">', '</small>'); ?>
    <div class="mt-5">
        <button type="submit" class="btn btn-primary btn-block">Create New Card</button>
        <a href="<?= base_url('user') ?>" class="btn btn-secondary btn-block">Cancel</a>
    </div>
</form>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

