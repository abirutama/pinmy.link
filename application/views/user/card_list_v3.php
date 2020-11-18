<?php 
    $pinitem = array_column($pinned, 'card_id');
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<section class="section" style="max-width: 800px; margin:auto">
    <?= $this->session->flashdata('message'); ?>
    <div class="" style="max-width: 800px; margin:auto">
        <?= $this->session->flashdata('message'); ?>
        <a href="<?= base_url('user/addcard') ?>" class="box has-text-centered" style="background:none;border:3px dashed #3273dc; margin-bottom:8px !important;margin-top:3px !important">
        <span class="has-text-link"><i class="fas fa-plus"></i> <strong>New Content</strong></span>
        </a>
        <div class="list-group" id="links">
        <?php           
         foreach ($card as $key=>$cardItem){
        ?>
<div data-id="<?= scoup($cardItem['card_id']); ?>" class="media list-group-item box" style="margin-bottom:3px !important;margin-top:3px !important">
  <figure id="sort-handle" class="media-left" style="cursor:move">
  <i class="fas fa-grip-lines has-text-grey-lighter"></i> 
  </figure>
  <div class="media-content">
    <div class="content">
      <p>
      <?= scoup($cardItem['card_title']); ?>
      </p>
    </div>
  </div>
  <div class="media-right">
    <button class="delete"></button>
  </div>
</div>
<?php } ?>
    </div>
</section>
</div>


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
const Toast = Swal.mixin({
  toast: true,
  position: 'bottom-start',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

//Modal Save Profile
var el = document.getElementById("links");
var sortable = Sortable.create(el,{
  animation: 200,
  handle: "#sort-handle",
  touchStartThreshold: 50,
  onEnd: function (/**Event*/ evt) {
    //var itemEl = evt.item; // dragged HTMLElement
    //evt.to; // target list
    //evt.from; // previous list
    //evt.oldIndex; // element's old index within old parent
    //evt.newIndex; // element's new index within new parent
    //evt.oldDraggableIndex; // element's old index within old parent, only counting draggable elements
    //evt.newDraggableIndex; // element's new index within new parent, only counting draggable elements
    //evt.clone; // the clone element
    //evt.pullMode; // when item is in another sortable: `"clone"` if cloning, `true` if moving
    var urutan=sortable.toArray();
    //alert(urutan);
    $.post( <?= "'".base_url('user/order/')."'"; ?>, { sort: ""+urutan }).done(function(){
      Toast.fire({
        icon: 'success',
        title: 'Sorting Update Saved!'
      });
    });
  }
});


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