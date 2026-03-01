$(document).ready(function () {
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
			url: `${beBaseUrl}/contact_us/lists?slug=${slug}`,
			dataType: "json",
			type: "POST",
		},
		columns: [
			{ data: "no" },
			{ data: "name" },
			{ data: "email" },
			{ data: "phone" },
			{ data: "created_at" },
			{ data: "action" },
		],
		columnDefs: [{ orderable: false, targets: [0] }],
		order: [],
	});
}