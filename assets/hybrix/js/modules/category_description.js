$(document).ready(function () {
	$("#btn-submit").click(function () {
		submitData();
	});

	table();

	categories("category_id", "", "Select Category", "");

	CKEDITOR.replace("description");
});

function categories(
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
			url: `${baseUrl}/category/list`,
			dataType: "json",
			type: "GET",
			delay: 250,
			data: function (params) {
				return { q: params.term || "" };
			},
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
			url: `${beBaseUrl}/${slug}/category_description/${position}/lists`,
			dataType: "json",
			type: "POST",
		},
		columns: [
			{ data: "no" },
			{ data: "title" },
			{ data: "subtitle" },
			{ data: "c_name" },
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

	let editorData = CKEDITOR.instances["description"].getData();
	$("#description").val(editorData);

	let form = $("#form-data")[0];
	let formData = new FormData(form);

	$.ajax({
		url: `${beBaseUrl}/${slug}/category_description/${position}/update_or_create`,
		type: "POST",
		data: formData,
		dataType: "json",
		processData: false,
		contentType: false,
		success: function (response) {
			if (response.status) {
				window.location.href = response.redirect_url;
			}

			$("#btn-submit").prop("disabled", false);
			$("#btn-submit").html("Submit");
		},
		error: function (xhr, status, error) {
			$("[id$='_error']").text("");
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
