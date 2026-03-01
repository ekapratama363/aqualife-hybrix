$(document).ready(function () {
	$("#btn-submit").click(function () {
		submitData();
	});

	table();

	products("product_id", "", "Select Products", "");

	CKEDITOR.replace("description"); // 'editor1' is the ID of your textarea
});

function products(
	id,
	level = "",
	placeholder = "Pilih Kategori",
	parent_id = 0
) {
	if ($(`#${id}`).length == 0) {
		return;
	}

	let slug = $("#slug").val();
	$(`#${id}`).select2({
		width: "100%",
		placeholder: placeholder,
		allowClear: true,
		multiple: false,
		ajax: {
			url: `${baseUrl}/product/list?slug=${slug}`,
			dataType: "json",
			type: "GET",
			delay: 250,
			processResults: function (data) {
				return {
					results: $.map(data, function (item) {
						return {
							text: item.name,
							id: item.id,
						};
					}),
				};
			},
			cache: true,
		},
	});
}

function table() {
	let position = $("#position").val();
	let slug = $("#slug").val();
	$("#myTable").dataTable({
		processing: true,
		serverSide: true,
		pageLength: 10,
		ajax: {
			url: `${beBaseUrl}/${slug}/product_description/${position}/lists`,
			dataType: "json",
			type: "POST",
		},
		columns: [
			{ data: "no" },
			{ data: "title" },
			{ data: "subtitle" },
			{ data: "p_name" },
			{ data: "description" },
			{ data: "images" },
			{ data: "link" },
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

	let position = $("#position").val();
	let slug = $("#slug").val();
	
	// Update the textarea with CKEditor content
	let editorData = CKEDITOR.instances["description"].getData(); // Replace 'ckeditor' with your CKEditor ID
	$("#description").val(editorData); // Update the textarea value

	let form = $("#form-data")[0]; // Ambil elemen form
	let formData = new FormData(form); // Buat objek FormData

	$.ajax({
		url: `${beBaseUrl}/${slug}/product_description/${position}/update_or_create`,
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
