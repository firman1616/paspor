$(document).ready(function () {
    tablePaspor();
    $('#id').val('');

    $(document).on("click", "#btnTambahData", function (e) {
        e.preventDefault();
        $("#modalTambah").modal("show"); // bootstrap 4
        // $("#modalTambah").modal("show"); // bootstrap 5 juga sama
    });

    document.getElementById('negara').addEventListener('change', function () {
        let locale = this.value;

        // tampilkan Foto & Stempel kalau negara Rusia
        let fotoStempelGroup = document.getElementById('fotoStempelGroup');
        let fileFotoInput = document.getElementById('filefoto');
        let fileStempelInput = document.getElementById('filestempel');

        if (locale === "ru_RU") {
            fotoStempelGroup.style.display = "flex";
            fileFotoInput.setAttribute("required", true);
            fileStempelInput.setAttribute("required", true);
        } else {
            fotoStempelGroup.style.display = "none";
            fileFotoInput.removeAttribute("required");
            fileStempelInput.removeAttribute("required");
        }

        // isi asal_negara dengan teks yang dipilih
        let selectedText = this.options[this.selectedIndex].text;
        document.getElementById('asal_negara').value = selectedText;

        // tetap jalankan faker generate nama
        if (locale) {
            fetch(BASE_URL + "paspor/generateNama", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "locale=" + encodeURIComponent(locale)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.nama) {
                        document.getElementById('nama').value = data.nama;
                    }
                })
                .catch(err => console.error("Error:", err));
        }
    });


    // simpan data
    $('#formTambahPaspor').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: BASE_URL + "Paspor/simpan",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message
                    }).then(() => {
                        // reload halaman atau reset form
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan sistem: ' + error
                });
            }
        });
    });


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

