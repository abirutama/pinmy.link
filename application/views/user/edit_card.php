<!-- Begin Page Content -->
<div class="container-fluid col-sm-10 col-md-8 col-lg-5 mb-5">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><i class="fas fa-fw fa-pencil-alt"></i> Edit Card</h1>

<div class="list-group">
<form method="post" action="<?= base_url('user/editcard/').$card['card_id']; ?>">
      <div class="input-group">
          <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-fw fa-heading"></i></span>
          </div>
          <input type="text" class="form-control" id="card-title" name="card-title" value="<?= scoup($card['card_title']); ?>" placeholder="Title goes here"> 
    </div>
    <?= form_error('card-title', '<small class="text-danger">', '</small>'); ?>
    <div class="input-group mt-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-fw fa-link"></i></span>
        </div>
        <input type="url" class="form-control" id="card-url" name="card-url" value="<?= scoup($card['card_url']); ?>" placeholder="http://content-url">
    </div>
    <?= form_error('card-url', '<small class="text-danger">', '</small>'); ?>
    <div class="input-group mt-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-fw fa-image"></i></span>
        </div>
        <input type="url" class="form-control" id="card-thumbnail" name="card-thumbnail" value="<?= scoup($card['card_thumbnail']); ?>" placeholder="http://image-url (optional)">
    </div>
    <?= form_error('card-thumbnail', '<small class="text-danger">', '</small>'); ?>
    <div class="mt-5">
        <button type="submit" class="btn btn-primary btn-block">Save Edit</button>
        <a href="<?= base_url('user') ?>" class="btn btn-outline-secondary  btn-block">Cancel</a>
        <a href="#delete" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#deleteModal">Delete Card</a>
    </div>
</form>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalDelete" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalDelete">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Delete" below if you are sure to delete this card.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-outline-danger" href="<?= base_url('user/deletecard/').$card['card_id'] ?>">Delete</a>
      </div>
    </div>
  </div>
</div>

