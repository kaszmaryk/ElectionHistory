$(document).ready(function() {
    var $id = $('#message').text().trim();
    var $login = $('#slogin').text().trim();

    $('#message').load('../../application/models/tests/check_lection.php', {"id":$id, "login":$login});
});
