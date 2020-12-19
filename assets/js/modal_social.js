var html_tag = document.documentElement;
var open_modal = document.querySelector('#modal-open');
var modal_container = document.querySelector('#modal-social');
var tap_anywhere_close = document.querySelector('#modal-background');
var close_modal = document.querySelector('#modal-close');

open_modal.onclick = function() {
    modal_container.classList.toggle('is-active');
    html_tag.classList.toggle('is-clipped');
}

tap_anywhere_close.onclick = function() {
    modal_container.classList.toggle('is-active');
    html_tag.classList.toggle('is-clipped');
}

close_modal.onclick = function() {
    modal_container.classList.toggle('is-active');
    html_tag.classList.toggle('is-clipped');
}