$(document).ready(function () {
	$("#btn-submit").click(function () {
		submitData();
	});

	table();
	CKEDITOR.replace("description"); // 'editor1' is the ID of your textarea
});

function table() {
	let slug = $("#slug").val();
	$("#myTable").dataTable({
		processing: true,
		serverSide: true,
		pageLength: 10,
		ajax: {
			url: `${beBaseUrl}/order/lists?slug=${slug}`,
			dataType: "json",
			type: "POST",
		},
		columns: [
			{ data: "no" },
			{ data: "first_name" },
			{ data: "last_name" },
			{ data: "consultation_date" },
			{ data: "address" },
			{ data: "city" },
			{ data: "province" },
			{ data: "phone" },
			{ data: "email" },
			{ data: "c_name" },
			{ data: "created_at" },
			{ data: "action" },
		],
		columnDefs: [{ orderable: false, targets: [0] }],
		order: [],
	});
}

function submitData() {
	$("#btn-submit").html("Loading...");
	$("#btn-submit").prop("disabled", true);
	$("#error-message").html("");
	$("#success-message").html("");

	// Update the textarea with CKEditor content
	let editorData = CKEDITOR.instances["description"].getData(); // Replace 'ckeditor' with your CKEditor ID
	$("#description").val(editorData); // Update the textarea value

	let form = $("#form-data")[0]; // Ambil elemen form
	let formData = new FormData(form); // Buat objek FormData

	$.ajax({
		url: `${beBaseUrl}/news/update_or_create`,
		type: "POST",
		data: formData,
		dataType: "json",
		processData: false, // Don't process the data
		contentType: false, // Don't set content type
		success: function (response) {
			if (response.status) {
				window.location.href = response.redirect_url;
			}

			$("#btn-submit").prop("disabled", false);
			$("#btn-submit").html("Submit");
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
