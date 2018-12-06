$(document).ready(function () {
    $("#btn-logout").click(function (e) {
        e.preventDefault();
        $("#logout-form").submit();
    });
});
