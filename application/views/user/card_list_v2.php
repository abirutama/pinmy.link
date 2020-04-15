<?php
    $user_id = $this->session->userdata('ses_id');
    $this->db->order_by('card_id', 'DESC');
    $queryCard = $this->db->get_where('card', array('user_id' => $user_id))->result_array();
?>
<section class="section" style="max-width: 600px; margin:auto">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user') ?>">Homepage</a></li>
            <li class="is-active"><a href="#" aria-current="page">My Link</a></li>
        </ul>
    </nav>
    <?= $this->session->flashdata('message'); ?>
    <div>
        <nav class="panel has-background-white">
            <p class="panel-heading has-background-info has-text-white">
                Pinned Links
            </p>
            <div class="panel-block cupad">
                <a href="<?= base_url('user/addcard'); ?>" class="button is-link is-outlined is-fullwidth">
                    Edit Pinned Link
                </a>
            </div>
            <?php if(count($queryCard) > 0){
            foreach ($queryCard as $listCard){
            ?>
            <div class="panel-block cupad">
                <span style="width:100%">
                    <?= scoup($listCard['card_title']); ?>
                </span>
            </div>
            <?php
            }}
            ?>
        </nav>
        <nav class="panel has-background-white">
            <p class="panel-heading has-background-info has-text-white">
                My Links
            </p>
            <div class="panel-block cupad">
                <a href="<?= base_url('user/addcard'); ?>" class="button is-link is-outlined is-fullwidth">
                    Add New Link
                </a>
            </div>
            <?php if(count($queryCard) > 0){
            foreach ($queryCard as $listCard){
            ?>
            <a href="<?= scoup(base_url('user/editcard/').$listCard['card_id']); ?>" class="panel-block cupad">
                <span style="width:100%">
                    <?= scoup($listCard['card_title']); ?>
                </span>
                <span class="panel-icon" style="margin-right:0px">
                    <i class="fas fa-pencil-alt has-text-info"></i>
                </span>
            </a>
            <?php
            }}
            ?>
        </nav>
    </div>
</section>