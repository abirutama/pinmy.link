<section class="section" style="max-width: 600px; margin:auto">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="<?= base_url('user') ?>">Homepage</a></li>
            <li class="is-active"><a href="#" aria-current="page">My Link</a></li>
        </ul>
    </nav>
    <?= $this->session->flashdata('message'); ?>
    <div>
        <?php if(count($card) >= 8){ ?>
        <nav class="panel has-background-white">
            <p class="panel-heading has-background-info has-text-white">
                Highlighted Links 
            </p>
            <div class="panel-block cupad">
                <a href="<?= base_url('user/highlight'); ?>" class="button is-link is-outlined is-fullwidth">
                    Edit Highlight
                </a>
            </div>
            <?php
            if(count($pinned) > 0){
                foreach ($pinned as $pinnedItem){
            ?>
            <div class="panel-block cupad">
                <span style="width:100%">
                    <?= scoup($pinnedItem['card_title']); ?>
                </span>
            </div>
            <?php
                }
            }else{
            ?>
                <div class="panel-block cupad">
                    <span class="has-text-centered" style="width:100%">
                        No Highlighted Links
                    </span>
                </div>
            <?php
            }
            ?>
        </nav>
        <?php } ?>
        <nav class="panel has-background-white">
            <p class="panel-heading has-background-info has-text-white">
                My Links
            </p>
            <div class="panel-block cupad">
                <a href="<?= base_url('user/addcard'); ?>" class="button is-link is-outlined is-fullwidth">
                    Add New Link
                </a>
            </div>
            <?php if(count($card) > 0){
            foreach ($card as $cardItem){
            ?>
            <a href="<?= scoup(base_url('user/editcard/').$cardItem['card_id']); ?>" class="panel-block cupad">
                <span style="width:100%">
                    <?= scoup($cardItem['card_title']); ?>
                </span>
                <span class="panel-icon" style="margin-right:0px">
                    <i class="fas fa-pencil-alt has-text-info"></i>
                </span>
            </a>
            <?php
            }}else{
            ?>
            <div class="panel-block cupad">
                    <span class="has-text-centered" style="width:100%">
                        No Links
                    </span>
                </div>
            <?php
            }
            ?>
        </nav>
    </div>
</section>