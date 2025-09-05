$(document).ready(function () {
    tablePaspor();
    $('#id').val('');
    
});

function tablePaspor() {
    $.ajax({
        url: BASE_URL + "paspor/tablePaspor",
        type: "POST",
        success: function (data) {
            $('#div-table-paspor').html(data);
            $('#tablePaspor').DataTable({
                "processing": true,
                "responsive": true,
            });
        }
    });
}
