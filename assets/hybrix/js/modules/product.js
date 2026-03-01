$(document).ready(function () {
	$("#btn-submit").click(function () {
		submitData();
	});

	table();

	categories("category_id", "", "Select Categories", "");

	var x = 1;
	$(".addDetails").click(function () {
		x++;
		$(".inputDetails").append(`
			<div class="input-group mb-3">
				<input
					class="form-control"
					name="key_field_${x}"
					type="text"
					placeholder="ex: Price"
				/>
				<input
					class="form-control"
					name="value_field_${x}"
					type="text"
					placeholder="ex: 200000"
				/>
				<div class="input-group-append">
		          <button type="button" class="removeDetails btn btn-danger" onclick="handleRemove(this, ${x})"><i class="bi bi-x"></i></button>
				</div>
			</div>`);
	});
});

function handleRemove(param, x) {
	$(param).parent().parent("div").remove();
	x--;
}

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
			url: `${baseUrl}/category/list?level=${level}&parent_id=${parent_id}&slug=${slug}`,
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
	let slug = $("#slug").val();
	$("#myTable").dataTable({
		processing: true,
		serverSide: true,
		pageLength: 10,
		ajax: {
			url: `${beBaseUrl}/products/product/lists?slug=${slug}`,
			dataType: "json",
			type: "POST",
		},
		columns: [
			{ data: "no" },
			{ data: "name" },
			{ data: "c_name" },
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

	let form = $("#form-data")[0]; // Ambil elemen form
	let formData = new FormData(form); // Buat objek FormData

	$.ajax({
		url: `${beBaseUrl}/products/product/update_or_create`,
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
