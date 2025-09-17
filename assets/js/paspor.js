$(document).ready(function () {
	tablePaspor();
	$("#id").val("");

	$(document).on("click", "#btnTambahData", function (e) {
		e.preventDefault();
		$("#modalTambah").modal("show"); // bootstrap 4
		// $("#modalTambah").modal("show"); // bootstrap 5 juga sama
	});

	$(document).on("click", ".print", function () {
		let id = $(this).data("id");
		window.open(BASE_URL + "Paspor/print/" + id, "_blank");
	});



	document.getElementById("negara").addEventListener("change", function () {
		let locale = this.value;

		let fileFotoInput = document.getElementById("filefoto");
		let stempelGroup = document.getElementById("stempelGroup");
		let fileStempelInput = document.getElementById("filestempel");

		if (locale === "ru_RU") {
			// Rusia: foto wajib, stempel muncul & wajib
			fileFotoInput.setAttribute("required", true);
			stempelGroup.style.display = "block";
			fileStempelInput.setAttribute("required", true);
		} else {
			// selain Rusia: foto tidak wajib, stempel hilang
			fileFotoInput.removeAttribute("required");
			stempelGroup.style.display = "none";
			fileStempelInput.removeAttribute("required");
		}

		// isi asal_negara langsung dari option
		let selectedText = this.options[this.selectedIndex].text;
		document.getElementById("asal_negara").value = selectedText;

		// panggil Faker generate data
		if (locale) {
			fetch(BASE_URL + "Paspor/generateNama", {
				method: "POST",
				headers: {
					"Content-Type": "application/x-www-form-urlencoded",
				},
				body: "locale=" + encodeURIComponent(locale),
			})
				.then((response) => response.json())
				.then((data) => {
					if (data.nama_depan) {
						document.getElementById("nama_depan").value = data.nama_depan;
					}
					if (data.nama_belakang) {
						document.getElementById("nama_belakang").value = data.nama_belakang;
					}
					if (data.tempat_lahir) {
						document.getElementById("tempat_lahir").value = data.tempat_lahir;
					}
					if (data.tgl_lahir) {
						document.getElementById("tgl_lahir").value = data.tgl_lahir;
					}
					if (data.gender) {
						document.getElementById("gender").value = data.gender;
					}
					if (data.nama_depan_en) {
						document.getElementById("nama_depan_en").value = data.nama_depan_en;
					}
					if (data.nama_belakang_en) {
						document.getElementById("nama_belakang_en").value =
							data.nama_belakang_en;
					}
					if (data.tempat_lahir_en) {
						document.getElementById("tempat_lahir_en").value =
							data.tempat_lahir_en;
					}
					if (data.tgl_dibuat) {
						document.getElementById("date_create").value =
							data.tgl_dibuat;
					}
				})
				.catch((err) => console.error("Error:", err));
		}
	});

	var canvas = document.getElementById("signature-pad");
	var signaturePad = new SignaturePad(canvas);

	document.getElementById("clear").addEventListener("click", function () {
		signaturePad.clear();
	});

	// simpan data
	$("#formTambahPaspor").on("submit", function (e) {
		e.preventDefault();

		// sebelum submit → cek tanda tangan
		if (!signaturePad.isEmpty()) {
			var dataUrl = signaturePad.toDataURL("image/png"); // hasil base64
			$("#signature").val(dataUrl); // masukkan ke hidden input
		} else {
			Swal.fire({
				icon: "warning",
				title: "Perhatian",
				text: "Silakan isi tanda tangan terlebih dahulu!",
			});
			return; // hentikan submit kalau kosong
		}

		var formData = new FormData(this);

		$.ajax({
			url: BASE_URL + "Paspor/simpan",
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function (response) {
				if (response.status === "success") {
					Swal.fire({
						icon: "success",
						title: "Berhasil",
						text: response.message,
					}).then(() => {
						location.reload();
					});
				} else {
					Swal.fire({
						icon: "error",
						title: "Gagal",
						text: response.message,
					});
				}
			},
			error: function (xhr, status, error) {
				Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Terjadi kesalahan sistem: " + error,
				});
			},
		});
	});
});

// document.addEventListener("DOMContentLoaded", function () {
// 	let today = new Date().toISOString().split('T')[0];
// 	document.getElementById("date_create").value = today;
// });

function tablePaspor() {
	$.ajax({
		url: BASE_URL + "paspor/tablePaspor",
		type: "POST",
		success: function (data) {
			$("#div-table-paspor").html(data);
			$("#tablePaspor").DataTable({
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
		},
	});
}
