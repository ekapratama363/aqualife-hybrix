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
			url: `${beBaseUrl}/subscribe/lists?slug=${slug}`,
			dataType: "json",
			type: "POST",
		},
		columns: [
			{ data: "no" },
			{ data: "email" },
			{ data: "created_at" },
			{ data: "action" },
		],
		columnDefs: [{ orderable: false, targets: [0] }],
		order: [],
	});
}
