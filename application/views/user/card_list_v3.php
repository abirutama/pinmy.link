<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<section class="section" style="max-width: 600px; margin:auto">
    <?= $this->session->flashdata('message'); ?>
    <?php if(count($card)>0){ ?>
    <a href="<?= base_url('user/addcard') ?>" class="box has-text-centered"
        style="background:none;border:3px dashed #3273dc; margin-bottom:8px !important;margin-top:3px !important">
        <span class="has-text-link"><i class="fas fa-plus"></i> <strong>New Content</strong></span>
    </a>
    <?php }else{ ?>
    <span class="box has-text-centered"
        style="margin-bottom:8px !important;margin-top:3px !important; max-width:480px; margin:auto">
        <figure class="image">
            <img src="<?= base_url('assets/img'); ?>/layout/nocontent.webp">
        </figure>
        <div style="margin-top:-40px">
            <h1 class="title is-size-5">Oops you don't have any content yet!</h1>
            <a href="<?= base_url('user/addcard') ?>" class="p-5 box button is-link has-text-centered"
                style="margin-top:16px !important;">
                <span><strong>Create My First Content</strong></span>
            </a>
        </div>
    </span>
    <?php } ?>
    <div class="list-group" id="links">
        <?php           
            foreach ($card as $key=>$cardItem){
            ?>
        <div data-id="<?= scoup($cardItem['card_id']); ?>" class="media list-group-item box"
            style="margin-bottom:3px !important;margin-top:3px !important">
            <figure id="sort-handle" class="media-left" style="cursor:move">
                <i class="fas fa-arrows-alt has-text-grey-lighter is-size-5"></i>
            </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <?= scoup($cardItem['card_title']); ?>
                    </p>
                </div>
            </div>
            <div class="media-right">
                <a href="#get-qr" class="qr-info qr-generate" title="Share" data-url="<?= $cardItem['card_slug']; ?>">
                    <span class="icon">
                        <i class="fas fa-share is-size-5"></i>
                    </span>
                </a>
                <a href="<?= scoup(base_url('user/editcard/').$cardItem['card_id']); ?>" title="Edit"
                    data-url="<?= $cardItem['card_slug']; ?>">
                    <span class="icon">
                        <i class="fas fa-pencil-alt is-size-5"></i>
                    </span>
                </a>
            </div>
        </div>
        <?php } ?>
    </div>
</section>




<div id="qr-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card" style="max-width:360px">
        <header class="modal-card-head">
            <p class="modal-card-title">Share to Everyone!</p>
            <button class="qr-info delete" aria-label="close"></button>
        </header>
        <section id="qr-results" class="modal-card-body">
            <div class="buttons">
                <a id="download-qr" href="" target="_blank" class="button is-link is-outlined is-fullwidth">Download
                    QR</a>
                <button id="copy-url" class="btncopy button is-link is-outlined is-fullwidth"
                    data-clipboard-text="">Copy URL</button>
            </div>
        </section>
        <footer class="modal-card-foot">
        </footer>
    </div>
</div>
<script>
//Modal Save Profile
var el = document.getElementById("links");
var sortable = Sortable.create(el, {
    animation: 200,
    handle: "#sort-handle",
    touchStartThreshold: 50,
    onEnd: function( /**Event*/ evt) {
        var urutan = sortable.toArray();
        //alert(urutan);
        $.post(<?= "'".base_url('user/order/')."'"; ?>, {
            sort: "" + urutan
        }).done(function() {
            Toast.fire({
                icon: 'success',
                title: 'Sorting Update Saved!'
            });
        });
    }
});
</script>
<script>
$('.qr-info').click(function() {
    $('#qr-modal').toggleClass('is-active');
    $('html').toggleClass('is-clipped');
});

$('.qr-generate').click(function() {
    var url_share = 'https://pinmy.link/' + '@<?= $user['user_name'] ?>' + '/' + $(this).data('url') +
        '?utm_source=pinmylink&utm_medium=url&utm_campaign=url_content_share';
    var url_qr = '<?= base_url("user/qr_info/")?>' + '@<?= $user['user_name'] ?>' + '/' + $(this).data('url');
    //$("#qr-result").attr('src', url_data);
    $("#download-qr").attr('href', url_qr);
    $("#copy-url").attr('data-clipboard-text', url_share);

});
</script>
<script>
var clipboard = new ClipboardJS('.btncopy');

clipboard.on('success', function(e) {
    Toast.fire({
        icon: 'success',
        title: 'Copied Successfully!'
    });
});

clipboard.on('error', function(e) {
    console.log(e);
});
</script>