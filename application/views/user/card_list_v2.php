<?php 
    $pinitem = array_column($pinned, 'card_id');
?>
<section class="section" style="max-width: 800px; margin:auto">
    <?= $this->session->flashdata('message'); ?>
    <div>
        <nav class="panel has-background-white">
            <div class="panel-block cupad" style="justify-content: center">
                <div class="field has-addons">
                    <p class="control">
                        <a href="<?= base_url('user/addcard') ?>" class="button is-link is-outlined">
                            <span class="icon is-small">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span> New Content</span>
                        </a>
                    </p>
                    <?php if(count($card) > 7){ ?>
                    <p class="control">
                        <a href="<?= base_url('user/highlight') ?>" class="button is-link is-outlined">
                            <span class="icon is-small">
                                <i class="fas fa-star"></i>
                            </span>
                            <span> Edit Highlight</span>
                        </a>
                    </p>
                    <?php } ?>
                </div>
            </div>
            <?php if(count($card) > 0){ ?>
            <div class="panel-block cupad">
                <table class="table" width="100%">
                    <thead>
                        <tr>
                            <th style="width:60px">#</th>
                            <th>Title</th>
                            <th style="width:100px"><abbr title="Action">Act</abbr></th>
                        </tr>
                    </thead>
                    <tbody>
            <?php           
            foreach ($card as $key=>$cardItem){
            ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?php if(count($card) > 7){if(in_array($cardItem['card_id'], $pinitem)){ echo '<abbr title="highlighted"><i class="fas fa-star has-text-warning"></i></abbr>';}} ?>
                                <?= scoup($cardItem['card_title']); ?>
                            </td>
                            <td>
                                <div class="field has-addons">
                                    <p class="control">
                                        <button
                                            title="Get QR Code" class="qr-info qr-generate button is-link is-outlined" data-url="<?= $cardItem['card_slug']; ?>">
                                            <span class="icon is-small">
                                                <i class="fas fa-qrcode"></i>
                                            </span>
                                        </button>
                                    </p>
                                    <p class="control">
                                        <a href="<?= scoup(base_url('user/editcard/').$cardItem['card_id']); ?>"
                                            title="Edit" class="button is-link is-outlined">
                                            <span class="icon is-small">
                                                <i class="fas fa-pencil-alt"></i>
                                            </span>
                                        </a>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <?php
            }
            ?>
                    </tbody>
            </div>
            <?php
    }else{
            ?>
            <div class="panel-block cupad">
                <div class="has-text-centered" style="width:100%; padding:16px">
                <img class="image" src="<?= base_url('assets/img/frontpage/new/')?>undraw_blank_canvas_3rbb.svg" width="220px" alt="" style="margin:auto; margin-bottom:24px;">
                    You don't have any links yet.<br> Let's <a href="<?= base_url('user/addcard') ?>">add new one</a>!
                </div>
            </div>
            <?php
            }
            ?>
        </nav>
    </div>
</section>
<div id="qr-modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card" style="max-width:300px">
    <header class="modal-card-head">
      <p class="modal-card-title">Get QR Code</p>
      <button class="qr-info delete" aria-label="close"></button>
    </header>
    <section id="qr-results" class="modal-card-body">
      <!-- Content ... -->
      <img id="qr-result" width="100%" src="" alt="">
      <div class="notification is-info">
        <p class="is-size-6"><b>Note:</b> This is your QR Content Address. Audience will be redirected to your content after scan it. <a id="download-qr" href="" target="_blank">Download here</a></p>
    </div>
    </section>
    <footer class="modal-card-foot">
    </footer>
  </div>
</div>

<script>
//Modal Save Profile

$('.qr-info').click(function() {
    $('#qr-modal').toggleClass('is-active');
    $('html').toggleClass('is-clipped');
});

$('.qr-generate').click(function() {
    var url_data = '<?= base_url("user/qr_info/")?>'+ '@<?= $user['user_name'] ?>' +'/'+$(this).data('url');
    $( "#qr-result" ).attr('src', url_data );
    $( "#download-qr" ).attr('href', url_data );

});
</script>