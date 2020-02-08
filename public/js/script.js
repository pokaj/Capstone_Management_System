$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

function approved() {
    document.getElementById('pending_students').innerHTML = '';
}

function pending() {
    document.getElementById('approved_students').innerHTML = '';
}
