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
                processing: true,
                responsive: true,
                dom:
                    "<'row'<'col-md-6'f><'col-md-6 d-flex justify-content-end align-items-start'<'btn-group-custom'>>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-md-4'l><'col-md-4 text-center'i><'col-md-4'p>>",

            });
// ${BASE_URL}Stuffing/v_tambah
            $(".btn-group-custom").html(`
					<a href="#" 
					class="btn btn-primary" 
					id="btnTambahData">
					<i class="fa fa-plus"></i> Tambah Data
					</a>
				`);

            setTimeout(function () {
                $(".dataTables_filter").css({
                    float: "left",
                    "text-align": "left",
                });
                $(".dataTables_length").css({
                    float: "left",
                    "text-align": "left",
                });
                $(".dataTables_info").css({
                    "text-align": "center",
                    float: "none",
                    margin: "0 auto",
                    display: "block",
                });
            }, 10);
        }
    });
}

