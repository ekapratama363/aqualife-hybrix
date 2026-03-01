$(document).ready(function () {
	table();

	$("#btn-submit").click(function () {
		submitData();
	});
});

function table() {
	$("#myTable").dataTable({
		processing: true,
		serverSide: true,
		pageLength: 10,
		ajax: {
			url: `${beBaseUrl}/header_page/lists`,
			dataType: "json",
			type: "POST",
		},
		columns: [
			{ data: "no" },
			{ data: "name" },
			{ data: "images" },
			{ data: "description" },
			{ data: "action" },
		],
		columnDefs: [{ orderable: false, targets: [0] }],
		order: [],
	});
}

function submitData() {
	$("#btn-submit").html("Loading...").prop("disabled", true);
	$("#error-message").html("");
	$("#success-message").html("");

	let form = $("#form-data")[0]; // Ambil elemen form
	let formData = new FormData(form); // Buat objek FormData

	$.ajax({
		url: `${beBaseUrl}/header_page/update_or_create`,
		type: "POST",
		data: formData,
		dataType: "json",
		processData: false, // Jangan ubah FormData menjadi string
		contentType: false, // Jangan set Content-Type secara manual
		cache: false, // Hindari caching untuk memastikan data terbaru dikirim
		success: function (response) {
			if (response.status) {
				window.location.href = response.redirect_url;
			}

			$("#btn-submit").prop("disabled", false).html("Submit");
		},
		error: function (xhr, status, error) {
			$("[id$='_error']").text(""); // Menghapus teks error
			$("#btn-submit").prop("disabled", false);
			$("#btn-submit").html("Submit");

			if (xhr?.responseJSON?.errors) {
				for (const [id, message] of Object.entries(xhr.responseJSON.errors)) {
					$(`#${id}_error`).html(message);
				}
			}
		},
	});
}
