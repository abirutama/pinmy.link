<!-- Begin Page Content -->
<div class="container-fluid col-sm-10 col-md-8 col-lg-5 mb-5">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><i class="fab fa-fw fa-buffer"></i> My Cards</h1>
<div class="input-group mb-3">
        <span class="mr-2 font-weight-bolder text-primary">My Page: </span><a href="https://pinmy.link/a1/u/<?= scoup($user['user_name']); ?>" target="_blank" id="btn-share" title="Click to Copy" class="" data-clipboard-text="https://pinmy.link/a1/u/<?= scoup($user['user_name']); ?>">https://pinmy.link/a1/u/<?= scoup($user['user_name']); ?></a>
	</div>
<a href="<?= base_url('user/addcard'); ?>" class="btn btn-primary mb-4">
  Add New Card
</a>

<?php
$path_asset = base_url('assets/img/');
$user_id = $this->session->userdata('ses_id');
$this->db->order_by('card_id', 'DESC');
$queryCard = $this->db->get_where('card', array('user_id' => $user_id))->result_array();
?>

<?= $this->session->flashdata('message'); ?>
<div class="list-group">
	<?php 

	if(count($queryCard) > 0){
		foreach ($queryCard as $listCard){
	?>
	<a href="<?= scoup(base_url('user/editcard/').$listCard['card_id']); ?>" class="list-group-item list-group-item-action">
	<div class="d-flex w-100 justify-content-between">
	  <h5 class="mb-1"><?= scoup($listCard['card_title']); ?></h5>
	</div>
	<div>
		<small class="badge badge-light"><i class="fas fa-fw fa-link"></i> <?= scoup(parse_url($listCard['card_url'])['host']); ?></small>
		<small class="badge badge-light"><i class="fas fa-fw fa-image"></i> <?php if(strlen($listCard['card_thumbnail'])>0){ echo scoup(parse_url($listCard['card_thumbnail'])['host']);}else{ echo 'no image';} ?></small>
	</div>
	<div>
		
		<small class="badge badge-light"><i class="fas fa-fw fa-chart-line"></i> <?= scoup('0 Clicks'); ?> </small>
		<small class="badge badge-light"><i class="fas fa-fw fa-clock"></i> <?= scoup(date("d-m-Y", $listCard['date_created'])); ?></small>
	</div>
	</a>
	<?php

		}
	}else{
	?>	
	<div class="list-group-item">
		<div class="mx-auto" style="max-width:400px">
		<img src="<?= base_url('assets/img/')?>undraw_share_online_r87b.svg" alt="no card found" width="100%" class="mx-auto mt-3">
		<p class="mt-3 mb-3">You don't have any cards yet. Would be nice if you try to <a href="<?= base_url('user/addcard'); ?>">adding new one</a>?</small>
		</div>
	</div>
	<?php
	}
	?>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

